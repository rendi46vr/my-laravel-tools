<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersCon extends Controller
{
    public $users;
    public function __construct()
    {
        $this->users = user::select('username', 'name', 'role', 'id')->paginate(10);
    }
    private function users($message = null, $page = 1,  $search = null)
    {
        if ($search == null) {
            $users = user::select('username', 'name', 'role', 'id')->orderBy('id', 'desc')->paginate(10, ['*'], 'pageusers', $page);
        } else {
            $users = user::select('username', 'name', 'role', 'id')->where('username', 'like', "%$search%")->orderBy('id', 'desc')->paginate(10, ['*'], 'pageusers', $page);
        }
        return view('users.table-users', compact('users'))->with("message", $message)->render();
    }
    public function index()
    {
        $users = $this->users();
        return view('users.users', compact('users'));
    }

    public function AddUser(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|unique:users',
            'name' => 'required|max:60',
            'role' => 'required:max:60',
        ]);
        $data['password'] =  Hash::make('123456');
        User::create($data);
        return $this->users();
    }
    public function editUser(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|unique:users,username,' . $request->uniq,
            'name' => 'required|max:60',
            'role' => 'required:max:60',
        ]);
        User::find($request->uniq)->update($data);
        return $this->users();
    }

    public function getUser($id)
    {
        try {
            $user = User::find($id);
            return view("users.edit-user", compact("user"))->render();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function delete($id)
    {
        try {
            $user = User::destroy($id);
            return $this->users();
        } catch (\Throwable $th) {
            return $this->users("Users Not Found!");
        }
    }

    //pagination
    public function pageUsers($page, Request $request)
    {
        if ($request->search) {
            return $this->users(null, $page, $request->search);
        } else {
            return $this->users(null, $page);
        }
    }
    public function searchusers($search = null)
    {
        return $this->users(null, null, $search);
    }
}
