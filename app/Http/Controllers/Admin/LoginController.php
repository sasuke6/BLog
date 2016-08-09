<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommomController;
use Illuminate\Http\Request;

use App\Http\Requests;


class LoginController extends CommomController
{
    //
    public function login()
    {
//        echo 11222434;

        return view('admin.login');

    }
}

