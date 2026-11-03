<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Faq;
use App\Models\Transformation;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->get();
        $faqs = Faq::orderBy('order')->get();
        $transformations = Transformation::where('is_featured', true)->orderBy('order')->take(4)->get();
        $testimonials = Testimonial::where('is_published', true)->orderBy('order')->take(4)->get();

        return view('home', compact('services', 'faqs', 'transformations', 'testimonials'));
    }
}
