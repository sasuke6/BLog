<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;


class LoginController extends Controller
{
    //
    public function login()
    {
//        echo 11222434;
        return view('admin/login');

    }
}

