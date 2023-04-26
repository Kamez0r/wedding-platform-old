<?php

namespace App\Http\Controllers;

use App\Models\User;
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


    private function is_allowed()
    {
        return Auth::check();
    }
}
