<?php

namespace App\Http\Controllers;

use App\User;
use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth'); //this auth middleware
  }

  public function index(Request $request)
  {
    $id = Auth::user()->id;
    $user_feed = Posts::orderBy('id');
    $photo = Posts::where('user_id', $id)->first();
    //dd($photo);
    $value = $request->get('search-post');
    if(!empty($value))
    {
      $search = "search-post $value";
      $user_feed = Posts::where('title', 'LIKE', '%'.$value.'%')->orWhere('content', 'LIKE', '%'.$value.'%')->latest()->paginate(5)->appends(request()->except('page'));
    }
    else
    {
      $user_feed = Posts::latest()->paginate(5)->appends(request()->except('page'));
    }
    //$user_feed = Posts::all();
    return view('index', compact('user_feed', 'photo', 'value'));
  }

  public function about()
  {
    return view('about');
  }

  public function vip()
  {
    return view('about');
  }

  public function pricing()
  {
    return view('index');
  }

  public function contact()
  {
    return view('index');
  }

  public function userlist(Request $request)
  {
    $user_list = User::orderBy('id');

    $value = $request->get('search-user');
    if(!empty($value))
    {
      $search = "search-user $value";
      $user_list = User::where('name', 'LIKE', '%'.$value.'%')->latest()->paginate(5)->appends(request()->except('page'));
    }
    else
    {
      $user_list = User::latest()->paginate(5)->appends(request()->except('page'));
    }
    return view('userlist', compact('user_list', 'value'));
  }

}
