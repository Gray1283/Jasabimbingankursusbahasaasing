<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function index()
    // {
    //     return view('home');
    // }

    // public function contact()
    // {
    //     return view('contact');
    // }

    public function landingpage()
    {
        return view('landingpage');
    }
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function dashboard()
    {
        return view('pengguna.dashboard');  // Pastikan file dashboard.blade.php ada di dalam folder resources/views
    }
    

    public function dashboardadmin()
    {
        return view('admin_tutor.dashboardadmin');
    }
}

