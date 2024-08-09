<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DashboardCoordo extends Controller
{
    public function index()
    {
        return view('coordo/dashboard');
    }
}
