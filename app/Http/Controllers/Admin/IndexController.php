<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Dotenv\Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;



class IndexController extends Controller
{
    //
    public function index()
    {
        return view('admin/index');
    }

    public function info()
    {
        return view('admin/info');
    }

    public function exit()
    {
        session(['user'=>null]);
        return redirect('admin/login');
    }

    public function changePass(Request $request)
    {
        if ($request->getMethod() == 'POST') {

            $input = Input::all();

            $rules = ['password' => 'required | between:6,20 | confirmed',];

            $message = ['password.required' => '新密码不能为空',
                        'password.between' => '密码只能在6到20位之间',
                        'password.confirmed' => '新密码和确认密码不一致'
            ];

            $validator = \Validator::make($input, $rules, $message);

            if ($validator->passes()) {
                $user = User::first();
                $passWord = Crypt::decrypt($user->user_pass);
                if ($input['password_o'] = $passWord) {
                    $user->user_pass = Crypt::encrypt($input['password']);
                    $user->update();
                    return back()->with('errors','密码修改成功');

                } else {
                    return back()->with('errors','原密码错误');
                }

            } else {
                return back()->withErrors($validator);
            }

        }

        return view('admin/pass');

    }
}
