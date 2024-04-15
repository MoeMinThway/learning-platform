<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function loginPage(){
        // return views('login.index');
        return view('login.index');
    }

}
