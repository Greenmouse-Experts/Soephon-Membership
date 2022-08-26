<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomePageController extends Controller
{
    public function login()
    {
        return view('welcome');
    }

    public function admin_login()
    {
        return view('admin_login');
    }

    public function post_member_login(Request $request)
    {
        $this->validate($request, [
            'membership_id' => 'exists:users,membership_id',
        ]);

        $input = $request->only('membership_id', 'password');
        
        $user = User::query()->where('membership_id', $request->membership_id)->first();

        // authentication attempt
        if (auth()->attempt($input)) {
            if($user->user_type == 'Member'){
                return redirect()->route('home');
            }
           
            return back()->with('failure_report', 'You are not a Member');
        } else {
            return back()->with('failure_report', 'User authentication failed.');
        }
    }

    public function post_admin_login(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        
        $input = $request->only(['email', 'password']);
        
        $user = User::query()->where('email', $request->email)->first();

        if ($user && !Hash::check($request->password, $user->password)){
            return back()->with('failure_report', 'Incorrect Password!');
        }

        if(!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('failure_report', 'Email does\'nt exist');
        }

        // authentication attempt
        if (auth()->attempt($input)) {
            if($user->user_type == 'Administrator'){
                return redirect()->route('admin.dashboard');
            }
           
            return back()->with('failure_report', 'You are not an Administrator');
                    
        } else {
            return back()->with('failure_report', 'User authentication failed.');
        }
    }

    public function store(Request $request)
    {
        $url = __DIR__.'\test.json';

        $string = file_get_contents($url);
        if ($string === false) {
            // deal with error...
        }
        // convert json to object
        $json_a = json_decode($string, true);
        if ($json_a === null) {
            // deal with error...
        }

        foreach ($json_a as $key => $data) {
            $member[] = [
                'user_type' => 'Member',
                'membership_id' => $data['user_code'],
                'title' => $data['title'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'email_verified_at' => now(),
                'avatar' => Null,
                'phone_number' => Null,
                'address' => Null,
                'occupation' => Null,
                'password' => Hash::make('Password'),
                'created_at' => now(),
                'updated_at' => now(),
            ];

        }

        User::insert($member);

        dd('Completed');
    }
}
