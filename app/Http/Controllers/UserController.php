<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function validateInvitations()
    {
        if(!$this->is_allowed())
        {
            return redirect("login")->withSuccess("You are not allowed to access");
        }

        $data = [];



        $data['page'] = [
            "title" => "Validate Invitations"
        ];
        return view("user.validateInvitations", $data);
    }

    private function is_allowed()
    {
        return Auth::check();
    }
}
