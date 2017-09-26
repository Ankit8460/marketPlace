<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Validator;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index() {

        $users = User::paginate(15);
        return view('admin.adminusers.index', compact('users'));
    }

   
    public function create() {
        return view('admin.adminusers.create');
    }

     public function show($id) {
        $user = User::findOrFail($id);
       
        return view('admin.adminusers.show', compact('user'));
    }

   
    public function store(Request $request) {
        $input = $request->all();
        $validation = Validator::make(
                        $input, array(
                    'name' => array('required', 'alpha_dash'),
                    'email' => array('required', 'email', 'unique:users'),
                    'password' => array('required'),
                        )
        );
        if ($validation->fails()) {
            return redirect('admin/adminusers/create')
                            ->withErrors($validation)
                            ->withInput();
        }
        $input['password'] = Hash::make($input['password']);
        $input['is_active'] = 1;
        $input['user_type'] = "sub";

        User::create($input);

        Session::flash('flash_message', 'User added!');

        return redirect('admin/adminusers/show');
    }

   
    public function update($id, Request $request) {

        $validation = Validator::make(
                        $request->all(), array(
                    'name' => array('required'),
                    'email' => array('required', 'email'),
                        )
        );
        if ($validation->fails()) {
            return redirect('admin/adminusers/' . $id . '/edit')
                            ->withErrors($validation)
                            ->withInput();
        }
        $user = User::findOrFail($id);

        $user->update($request->all());

        Session::flash('flash_message', 'User updated!');

        return redirect('admin/adminusers/index');
    }

    public function destroy($id) {
        User::destroy($id);

        Session::flash('flash_message', 'User deleted!');

        return redirect('admin/adminusers/index');
    }


    public function Profile() {
        $user = \Illuminate\Support\Facades\Auth::user();
        return view('admin.adminusers.profile', compact('user'));
    }
    public function ProfileEdit() {
        $user = User::findOrFail(\Illuminate\Support\Facades\Auth::user()->id);
        return view('admin.adminusers.profileEdit', compact('user'));
    }
    public function ProfileUpdate(Request $request) {
        $validation = Validator::make(
                        $request->all(), array(
                    'name' => array('required'),
                    'email' => array('required', 'email'),
                        )
        );
        if ($validation->fails()) {
            return redirect('admin/profile/edit')
                            ->withErrors($validation)
                            ->withInput();
        }
        
        $user = \Illuminate\Support\Facades\Auth::user();
        $users = User::findOrFail($user->id);

        $users->update($request->all());
        return redirect('admin/profile');
    }
    public function ChangePassword() {
        return view('admin.adminusers.password');
    } 
    

  
    public function Password(Request $request) {
        $input = $request->all();
        $validation = Validator::make(
                        $input, array(
                     'password' => array('required','confirmed'),
                        )
        );
        
        
        $user = \Illuminate\Support\Facades\Auth::user();
        $users = User::findOrFail($user->id);
        $data['password'] = Hash::make($input['password']);
                
        $users->update($data);
        return redirect('admin/password');
    }
}
