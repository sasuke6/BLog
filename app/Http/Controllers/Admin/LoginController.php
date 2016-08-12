<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\User;
use Dotenv\Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class LoginController extends Controller
{

    public function login()
    {
        if ($input = Input::all()) {
            if (captcha_check($input['code'])) {
                $user = User::first();
                if ($user->user_name != $input['username'] || Crypt::decrypt($user->user_pass) != $input['password'])
                {
                    return back()->with('message', '用户名或者密码错误');
                } else {
                    echo 'ok';
                }
            } else {
                return back()->with('message', '验证码错误');
            }


        } else {

            return view('admin/login');
        }

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
        return captcha_img();
    }

    public function crypt()
    {
        $password = '111111';

        echo Crypt::encrypt($password);
//        echo Crypt::decrypt($passwordDe);
    }

}

