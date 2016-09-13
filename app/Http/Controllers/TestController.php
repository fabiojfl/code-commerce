<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function getExemplo()
    {
        return "oi";
    }

    public function getLogin()
    {
        $data = [
            'email' => 'fabiojs@gmail.com',
            'password' =>  'admin'
        ];
/*
        if(Auth::attempt($data))
        {
            return "logou";
        }
*/

        return "falhou";
    }

    public function getLogout()
    {
        Auth::logout();

        if(Auth::check())
        {
            return "logado";
        }

        return "NÃO ESTA LOGADO";
    }
}
