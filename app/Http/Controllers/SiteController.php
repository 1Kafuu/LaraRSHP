<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function dashboard() {
        return view('dashboard');
    }

    public function organisasi() {
        return view('struktur-organisasi');
    }

    public function layanan() {
        return view('layanan');
    }

    public function login() {
        return view('login');
    }

    public function visi() {
        return view('visi');
    }
}
