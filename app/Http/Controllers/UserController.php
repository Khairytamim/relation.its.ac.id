<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;

class UserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	$this->data['users'] = User::get();


    	$this->setActive('users');
    	$this->setTitle('users');
    	return view('admin.users.index', $this->data);
    }

    public function add(Request $request)
    {
    	Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:6|confirmed',
        ])->validate();

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'username' => $request['username'],
            // 'role' => $request['hak'],
            'password' => bcrypt($request['password']),
        ]);

        return back()->with('status', 'Sukses mendaftarkan user baru!');
    }
}
