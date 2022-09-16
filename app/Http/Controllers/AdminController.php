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

class AdminController extends Controller
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
        $paid_dues = MyDue::latest()->get();
        $dues = Due::latest()->get();
        $members = User::latest()->get();
        $fivemembers = User::latest()->where('user_type', 'Member')->take(5)->get();

        return view('admin.dashboard', [
            'paid_dues' => $paid_dues,
            'dues' => $dues,
            'members' => $members,
            'fivemembers' => $fivemembers
        ]);
    }

    public function logout()
    {
        $user = User::findorfail(Auth::user()->id);

        if ($user->user_type == 'Administrator') {
            Session::flush();

            Auth::logout();

            return redirect('admin/login');
        }

        if ($user->user_type == 'Member') {
            Session::flush();

            Auth::logout();

            return redirect('/');
        }
    }

    public function member()
    {
        return view('admin.add_member');
    }

    public function add_member(Request $request)
    {
        //Validate Request
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string'],
            // 'phone_number' => ['numeric'],
            // 'occupation' => ['string'],
        ]);
        

        if($request->email == "")
        {
            User::create([
                'user_type' => 'Member',
                'membership_id' => 'SOE'.$this->membership_id(6),
                'title' => $request->title,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'occupation' => $request->occupation,
                'password' => Hash::make('Password'),
            ]);
    
            return back()->with([
                'type' => 'success',
                'message' => 'Member Created Successfully!'
            ]);     
        } else {
            //Validate Request
            $this->validate($request, [
                'email' => ['string', 'email', 'max:255', 'unique:users']
            ]);

            User::create([
                'user_type' => 'Member',
                'membership_id' => 'SOE'.$this->membership_id(6),
                'title' => $request->title,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'occupation' => $request->occupation,
                'password' => Hash::make('Password'),
            ]);

            return back()->with([
                'type' => 'success',
                'message' => 'Member Created Successfully!'
            ]);
        }  
    }

    function membership_id($input, $strength = 6) 
    {
        $input = '0123456789';
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
    
        return $random_string;
    }

    public function view_members()
    {
        $members = User::latest()->where('user_type', 'Member')->get();
        return view('admin.view_members',[
            'members' => $members
        ]);
    }

    public function update_member($id, Request $request) 
    {
        //Find User
        $userFinder = Crypt::decrypt($id);

        $member = User::findorfail($userFinder);

        if($member->email == $request->email)
        {
            $member->update([
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
                'message' => 'Member Updated Successfully!'
            ]); 
        } else {
            //Validate Request
            $this->validate($request, [
                'email' => ['string', 'email', 'max:255', 'unique:users'],
            ]);

            $member->update([
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
                'message' => 'Member Updated Successfully!'
            ]); 
        }       
    }

    public function delete_member($id) 
    {
        //Find User
        $userFinder = Crypt::decrypt($id);
  
        //Member
        User::find($userFinder)->delete();

        return back()->with([
            'type' => 'success',
            'message' => 'Member Deleted Successfully!'
        ]); 
    }

    public function due()
    {
        return view('admin.add_due');
    }

    public function add_due(Request $request)
    {
        //Validate Request
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'numeric'],
            'description' => ['required', 'string'],
            'validity' => ['required', 'numeric'],
        ]);
        
        Due::create([
            'title' => $request->title,
            'amount' => $request->amount,
            'description' => $request->description,
            'validity' => $request->validity
        ]);

        return back()->with([
            'type' => 'success',
            'message' => 'Due Created Successfully!'
        ]);         
    }
    
    public function view_dues()
    {
        $dues = Due::latest()->get();
        return view('admin.view_dues', [
            'dues' => $dues
        ]);
    }

    public function delete_due($id) 
    {
        $dueFinder = Crypt::decrypt($id);
  
        Due::find($dueFinder)->delete();

        return back()->with([
            'type' => 'success',
            'message' => 'Due Deleted Successfully!'
        ]); 
    }

    public function profile()
    {
        return view('admin.profile');
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
        ]);

        //Find User
        $userFinder = Crypt::decrypt($id);

        $profile = User::findorfail($userFinder);

        if($profile->email == $request->email)
        {
            $profile->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email
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
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email
            ]);

            return back()->with([
                'type' => 'success',
                'message' => 'Profile Updated Successfully!'
            ]); 
        }  
    }

    public function update_password ($id, Request $request) 
    {
        $this->validate($request, [
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $userFinder = Crypt::decrypt($id);

        $user = User::findorfail($userFinder);
        
        $user->password = Hash::make($request->new_password);

        $user->save();

        return back()->with([
            'type' => 'success',
            'message' => 'Password Updated Successfully!'
        ]); 
    }

    public function view_payments()
    {
        $payments = PaymentHistory::latest()->get();

        return view('admin.view_payments', [
            'payments' => $payments
        ]);
    }
}