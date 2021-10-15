<?php

namespace App\Http\Controllers;

use App\User;
use App\Posts;
use voku\helper\AntiXSS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOTools;

class MenuController extends Controller
{
  public function index(Request $request)
  {
    SEOTools::metatags();
		SEOTools::twitter();
		SEOTools::opengraph();
		SEOTools::jsonLd();

		SEOTools::setTitle('Feeds');
		SEOTools::setDescription('Find Me matchmaking web-based application is useful for facilitating people who are looking for new relationships');
		SEOTools::setCanonical(URL::current());
		SEOTools::addImages('URL::current()/logo.png');

    $id = Auth::user()->id;
    $user_feed = Posts::orderBy('id');
    $photo = Posts::where('user_id', $id)->first();
    //dd($photo);
    $antiXss = new AntiXSS();
		$antiXss->removeEvilHtmlTags(array('iframe'));
    $value = $antiXss->xss_clean($request->get('search-post'));

    //$value = $request->get('search-post');
    if(!empty($value))
    {
      $search = "search-post $value";
      $user_feed = Posts::where('title', 'LIKE', '%'.$value.'%')->orWhere('content', 'LIKE', '%'.$value.'%')->latest()->paginate(5)->appends(request()->except('page'));
      SEOTools::setTitle('search-post: '.$value);
    }
    else
    {
      $user_feed = Posts::latest()->paginate(5)->appends(request()->except('page'));
      SEOTools::setTitle('search-post: '.$value);
    }
    //$user_feed = Posts::all();
    return view('index', compact('user_feed', 'photo', 'value'));
  }

  public function about()
  {
    SEOTools::metatags();
		SEOTools::twitter();
		SEOTools::opengraph();
		SEOTools::jsonLd();

		SEOTools::setTitle('About Find Me');
		SEOTools::setDescription('Find Me matchmaking web-based application is useful for facilitating people who are looking for new relationships');
		SEOTools::setCanonical(URL::current());
		SEOTools::addImages('URL::current()/logo.png');

    return view('about');
  }

  public function vip()
  {
    SEOTools::metatags();
		SEOTools::twitter();
		SEOTools::opengraph();
		SEOTools::jsonLd();

		SEOTools::setTitle('Vip Plan');
		SEOTools::setDescription('Find Me matchmaking web-based application is useful for facilitating people who are looking for new relationships');
		SEOTools::setCanonical(URL::current());
		SEOTools::addImages('URL::current()/logo.png');

    return view('about');
  }

  public function pricing()
  {
    SEOTools::metatags();
		SEOTools::twitter();
		SEOTools::opengraph();
		SEOTools::jsonLd();

		SEOTools::setTitle('pricing');
		SEOTools::setDescription('Find Me matchmaking web-based application is useful for facilitating people who are looking for new relationships');
		SEOTools::setCanonical(URL::current());
		SEOTools::addImages('URL::current()/logo.png');

    return view('index');
  }

  public function contact()
  {
    SEOTools::metatags();
		SEOTools::twitter();
		SEOTools::opengraph();
		SEOTools::jsonLd();

		SEOTools::setTitle('Help Us Find Me');
		SEOTools::setDescription('Find Me matchmaking web-based application is useful for facilitating people who are looking for new relationships');
		SEOTools::setCanonical(URL::current());
		SEOTools::addImages('URL::current()/logo.png');

    return view('index');
  }

  public function userlist(Request $request)
  {
    SEOTools::metatags();
		SEOTools::twitter();
		SEOTools::opengraph();
		SEOTools::jsonLd();

		SEOTools::setTitle('User Find Me');
		SEOTools::setDescription('Find Me matchmaking web-based application is useful for facilitating people who are looking for new relationships');
		SEOTools::setCanonical(URL::current());
		SEOTools::addImages('URL::current()/logo.png');

    $user_list = User::orderBy('id');

    $antiXss = new AntiXSS();
		$antiXss->removeEvilHtmlTags(array('iframe'));
    $value = $antiXss->xss_clean($request->get('search-user'));
    //$value = $request->get('search-user');
    if(!empty($value))
    {
      $search = "search-user $value";
      $user_list = User::where('name', 'LIKE', '%'.$value.'%')->latest()->paginate(5)->appends(request()->except('page'));
      SEOTools::setTitle('search-user: '.$value);
    }
    else
    {
      $user_list = User::latest()->paginate(5)->appends(request()->except('page'));
      SEOTools::setTitle('search-user: '.$value);
    }
    return view('userlist', compact('user_list', 'value'));
  }

}
