<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\SEOTools;

class LandingController extends Controller
{
  public function index()
  {
    SEOTools::metatags();
		SEOTools::twitter();
		SEOTools::opengraph();
		SEOTools::jsonLd();

		SEOTools::setTitle('Welcome Find Me');
		SEOTools::setDescription('Find Me matchmaking web-based application is useful for facilitating people who are looking for new relationships');
		SEOTools::setCanonical(URL::current());
		SEOTools::addImages('URL::current()/logo.png');

    return view('welcome');
  }
}
