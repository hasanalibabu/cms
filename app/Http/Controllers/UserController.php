<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    private $user;
    private $users;

    public function index()
    {
        return view('admin.user.add');
    }

    public function create(Request $request)
    {
        User::newUser($request);

        return redirect('add-user')->with('message', 'User info create successfully');
    }

    public function manage()
    {

        $this->users = User::all();
        return view('admin.user.manage', ['users'=>$this->users]);
    }

    public function edit($id)
    {
        $this->user = User::find($id);
        return view('admin.user.edit',['user'=>$this->user]);
    }

    public function delete($id)
    {
        $this->user = User::find($id);

        $this->user->delete();
        return redirect('/manage-user')->with('message','User Delete Successfully');
    }

    public function update(Request $request, $id)
    {

        User::updateUser($request, $id);
        return redirect('manage-user')->with('message', 'Update user info successfully');

    }
}
