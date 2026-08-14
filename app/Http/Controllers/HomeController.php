<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Faq;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->get();
        $faqs = Faq::orderBy('order')->get();

        return view('home', compact('services', 'faqs'));
    }
}
