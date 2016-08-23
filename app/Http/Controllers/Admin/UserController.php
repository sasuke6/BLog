<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    //
    public function avatar()
    {
        return view('admin/article/avatar');
    }

    public function avatarUpload()
    {
        $this->wrongTokenAjax();
        $file = Input::file('image');
        $input = array('image' => $file);
        $rules = array(
            'image' => 'image'
        );
        $validator = \Validator::make($input, $rules);
        if ( $validator->fails() ) {
            return Response::json([
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ]);

        }

        $destinationPath = 'uploads/';
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        return Response::json(
            [
                'success' => true,
                'avatar' => asset($destinationPath.$filename),
            ]
        );
    }

    public function wrongTokenAjax()
    {
        if ( Session::token() !== Request::get('_token') ) {
            $response = [
                'status' => false,
                'errors' => 'Wrong Token',
            ];
            return Response::json($response);
        }

    }
}
