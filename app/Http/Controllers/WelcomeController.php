<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $readmeContent = file_get_contents(base_path('README.md'));
        return view('welcome', ['content' => $readmeContent]);
    }
}
