<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

use App\Models\Slider;
use App\Models\Service;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();

        return view('home.index', compact('sliders'));
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function vendor()
    {
        $testimonials = Testimonial::all();
        return view('home.vendor', compact('testimonials'));
    }

    public function gallery()
    {
        $services = Service::all();

        return view('home.gallery', compact('services'));
    }

    public function paket()
    {
        $portfolios = Portfolio::all();
        return view('home.paket', compact('portfolios'));
    }

    public function about()
    {
        return view('home.about');
    }
}
