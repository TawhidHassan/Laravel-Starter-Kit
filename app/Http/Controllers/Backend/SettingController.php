<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Show General Settings Page
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('Backend.settings.general');
    }
}
