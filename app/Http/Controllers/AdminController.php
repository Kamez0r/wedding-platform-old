<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function manageUsers()
    {
        if(!$this->is_allowed())
        {
            return redirect("login")->withSuccess("You are not allowed to access");
        }

        $users = User::all();

        $data = [];

        $data['users'] = $users;

        $data['page'] = [
            "title" => "Manage Users",
        ];
        return view("admin.manageUsers", $data);
    }

    public function createUser()
    {
        try {
            $newUser = new User();

            $newUser->name = "";
            $newUser->email = "";
            $newUser->password = "";

            $newUser->save();

            return redirect("admin/manage-users");
        }
        catch(QueryException $e)
        {
            return redirect("admin/manage-users");
        }
    }

    public function viewUser(User $user)
    {
        if(!$this->is_allowed()) {
            return redirect("login")->withSuccess("You are not allowed to access");
        }
        $data = [];

        $data['user'] = $user;

        $data['readonly'] = true;

        $data['page'] = [
            "title" => "View User (Read Only)"
        ];
        return view("admin.manageUsers.edit", $data);
    }

    public function editUser(User $user)
    {
        if(!$this->is_allowed()) {
            return redirect("login")->withSuccess("You are not allowed to access");
        }
        $data = [];

        $data['user'] = $user;

        $data['readonly'] = false;

        $data['page'] = [
            "title" => "Edit User"
        ];
        return view("admin.manageUsers.edit", $data);
    }

    public function removeUser(User $user)
    {
        if(!$this->is_allowed()) {
            return redirect("login")->withSuccess("You are not allowed to access");
        }

        return "Remove User: Work in progress";
    }



    private function is_allowed()
    {
        return Auth::check();
    }
}
