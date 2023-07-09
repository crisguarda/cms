<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{
    public function index()
    {
        if (Auth::User()) {

            $user = Auth::user();

            if ($user->authorizeRoles(['superadmin', 'admin', 'editor'])){
                return view('backend.views.index');
            }else {
                return view('home');
            }

        } else {

            return view('backend.views.auth.login');
        }
    }
}
