<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('order')->get();
        return view('about', compact('faqs'));
    }
}
