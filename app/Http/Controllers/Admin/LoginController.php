<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Dotenv\Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;


class LoginController extends Controller
{

    public function login()
    {
//        echo 11222434;
        return view('admin/login');

    }

    public function captcha(Request $request)
    {
        if ($request->getMethod() == 'POST')
        {
            $rules = ['array' => 'required | captcha'];
            $validtor = Validator::make(Input::all() , $rules);
            if ($validtor->fails())
            {
                echo '<p style="color: #ff0000;">Incorrect!</p>';
            }
            else
            {
                echo '<p style="color: #00ff30;">Matched :)</p>';
            }
        }
        return captcha();
    }

}

