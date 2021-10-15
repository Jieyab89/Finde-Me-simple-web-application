<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\SEOTools;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function dashboard()
    {
      SEOTools::metatags();
  		SEOTools::twitter();
  		SEOTools::opengraph();
  		SEOTools::jsonLd();

  		SEOTools::setTitle('Dashboard');
  		SEOTools::setDescription('Find Me matchmaking web-based application is useful for facilitating people who are looking for new relationships');
  		SEOTools::setCanonical(URL::current());
  		SEOTools::addImages('URL::current()/logo.png');

      return view('users.home');
    }
}
