<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Due;
use App\Models\MyDue;
use App\Models\PaymentHistory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $paid_dues = MyDue::latest()->where('user_id', Auth::user()->id)->take(5)->get();
        $dues = Due::latest()->get();
        $my_dues = MyDue::latest()->where('user_id', Auth::user()->id)->get();

        return view('member.dashboard', [
            'dues' => $dues,
            'my_dues' => $my_dues,
            'paid_dues' => $paid_dues,
        ]);
    }

    public function my_dues()
    {
        $my_dues = MyDue::latest()->where('user_id', Auth::user()->id)->get();

        return view('member.my_dues', [
            'my_dues' => $my_dues
        ]);
    }

    public function dues()
    {
        $dues = Due::latest()->get();
        return view('member.dues', [
            'dues' => $dues
        ]);
    }

    public function payment_history()
    {
        $payments = PaymentHistory::latest()->where('membership_id', Auth::user()->membership_id)->get();

        return view('member.payment_histories', [
            'payments' => $payments
        ]);
    }

    public function profile()
    {
        return view('member.profile');
    }

    public function make_payment($id, Request $request) 
    {
        $Finder = Crypt::decrypt($id);

        $due = Due::findorfail($Finder);

        $mydues = MyDue::latest()->where('membership_id', Auth::user()->membership_id)->get();

        if ($mydues->isEmpty()) 
        {
            $SECRET_KEY = config('app.paystack_secret_key');;

            $url = "https://api.paystack.co/transaction/initialize";

            $fields = [
                'email' => Auth::user()->email,
                'amount' => $due->amount * 100,
                'callback_url' => url('/member/payment/callback'),
                'metadata' => [
                    'due_id' => $due->id,
                    'due_title' => $due->title,
                    'membership_id' => Auth::user()->membership_id,
                    'name' => Auth::user()->first_name . ' ' . Auth::user()->last_name
                ]
            ];

            $fields_string = http_build_query($fields);
            //open connection
            $ch = curl_init();
            
            //set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Authorization: Bearer $SECRET_KEY",
                "Cache-Control: no-cache",
            ));
            
            //So that curl_exec returns the contents of the cURL; rather than echoing it
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            
            //execute post
            $paystack_result = curl_exec($ch);
            
            $result = json_decode($paystack_result);

            //  return $result;
            $authorization_url = $result->data->authorization_url;
            $paystack_status = $result->status;

            // return dd($result->status);

            if ($paystack_status == true) {
                return redirect()->to($authorization_url);
            } else {
                return back()->with([
                    'type' => 'danger',
                    'message' => 'Payment failed. Response not ok'
                ]); 
            }
        } else {
            foreach ($mydues as $mydue) {
                $due_id[] = $mydue->due_id;
            }
            if (in_array($due->id, $due_id)) {
                return back()->with([
                    'type' => 'danger',
                    'message' => 'Payment has been made!'
                ]);
            } else {
                $SECRET_KEY = config('app.paystack_secret_key');;

                $url = "https://api.paystack.co/transaction/initialize";

                $fields = [
                    'email' => Auth::user()->email,
                    'amount' => $due->amount * 100,
                    'callback_url' => url('/member/payment/callback'),
                    'metadata' => [
                        'due_id' => $due->id,
                        'due_title' => $due->title,
                        'membership_id' => Auth::user()->membership_id,
                        'name' => Auth::user()->first_name . ' ' . Auth::user()->last_name
                    ]
                ];

                $fields_string = http_build_query($fields);
                //open connection
                $ch = curl_init();
                
                //set the url, number of POST vars, POST data
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    "Authorization: Bearer $SECRET_KEY",
                    "Cache-Control: no-cache",
                ));
                
                //So that curl_exec returns the contents of the cURL; rather than echoing it
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
                
                //execute post
                $paystack_result = curl_exec($ch);
                
                $result = json_decode($paystack_result);

                //  return $result;
                $authorization_url = $result->data->authorization_url;
                $paystack_status = $result->status;

                // return dd($result->status);

                if ($paystack_status == true) {
                    return redirect()->to($authorization_url);
                } else {
                    return back()->with([
                        'type' => 'danger',
                        'message' => 'Payment failed. Response not ok'
                    ]); 
                }
            }
        }
    }

    public function handleGatewayCallback()
    {
        $SECRET_KEY = config('app.paystack_secret_key');
        
        $curl = curl_init();

        $reference = isset($_GET['reference']) ? $_GET['reference'] : '';
            if(!$reference){
            die('No reference supplied');
        }
  
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $SECRET_KEY",
                "Cache-Control: no-cache",
            ),
        ));
        
        $paystack_response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
            
        $result = json_decode($paystack_response);
        
        if ($err) {
            // there was an error contacting the Paystack API
            die('Curl returned error: ' . $err);
        } else {
            // dd($result);

            MyDue::create([
                'due_id' => $result->data->metadata->due_id,
                'due_title' => $result->data->metadata->due_title,
                'amount' => ($result->data->amount / 100),
                'membership_id' => $result->data->metadata->membership_id,
                'user_id' => Auth::user()->id
            ]);

            PaymentHistory::create([
                'due_id' => $result->data->metadata->due_id,
                'due_title' => $result->data->metadata->due_title,
                'membership_id' => $result->data->metadata->membership_id,
                'name' => $result->data->metadata->name,
                // 'email' => $result->data->customer->email,
                'amount' => ($result->data->amount / 100),
                'transaction_id' => $result->data->id,
                'ref_id' => $result->data->reference,
                'paid_at' => $result->data->paid_at,
                'status' => $result->data->status,
            ]);

            return redirect()->route('payment.history')->with([
                'type' => 'success',
                'message' => 'Payment Successful'
            ]);
        }
    }

    public function upload_avatar($id, Request $request) 
    {
        //Validate Request
        $this->validate($request, [
            'avatar' => 'required|mimes:jpeg,png,jpg',
        ]);

        //Find User
        $userFinder = Crypt::decrypt($id);

        //Profile
        $profile = User::find($userFinder);

        //Validate User
        if (request()->hasFile('avatar')) {
            $filename = request()->avatar->getClientOriginalName();
            if($profile->avatar) {
                Storage::delete('/public/avatars/'. $profile->avatar);
            }
            request()->avatar->storeAs('avatars', $filename, 'public');
            $profile->avatar = $filename;
            $profile->save();
            
            return back()->with([
                'type' => 'success',
                'message' => 'Profile Picture Update Successfully!'
            ]);
        } else {
            return back()->with([
                'type' => 'danger',
                'message' => 'Access denied!',
            ]);
        }
    }

    public function profile_update($id, Request $request) 
    {
        //Validate Request
        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => 'required|numeric',
        ]);

        //Find User
        $userFinder = Crypt::decrypt($id);

        $profile = User::findorfail($userFinder);

        if($profile->email == $request->email)
        {
            $profile->update([
                'title' => $request->title,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'occupation' => $request->occupation,
            ]);

            return back()->with([
                'type' => 'success',
                'message' => 'Profile Updated Successfully!'
            ]); 
        } else {
            //Validate Request
            $this->validate($request, [
                'email' => ['string', 'email', 'max:255', 'unique:users'],
            ]);

            $profile->update([
                'title' => $request->title,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'occupation' => $request->occupation,
            ]);

            return back()->with([
                'type' => 'success',
                'message' => 'Profile Updated Successfully!'
            ]); 
        }      
    }

}
