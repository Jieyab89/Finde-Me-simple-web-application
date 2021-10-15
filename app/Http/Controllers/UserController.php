<?php

namespace App\Http\Controllers;

use App\User;
use App\Posts;
use voku\helper\AntiXSS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\SEOTools;

class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');//this auth middleware
  }

  public function post()
  {
    SEOTools::metatags();
		SEOTools::twitter();
		SEOTools::opengraph();
		SEOTools::jsonLd();

		SEOTools::setTitle('Post Feeds');
		SEOTools::setDescription('Find Me matchmaking web-based application is useful for facilitating people who are looking for new relationships');
		SEOTools::setCanonical(URL::current());
		SEOTools::addImages('URL::current()/logo.png');

     return view('post');
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate
    ([
      'title' => 'required|min:5|max:55',
      'content' => 'required|min:10',
      'photo' => 'image|mimes:jpeg,png,jpg,gif|max:5408',
    ]);

    $antiXss = new AntiXSS();
		$antiXss->removeEvilHtmlTags(array('iframe'));
    $content = $antiXss->xss_clean($request->content);

    $id = Auth::user()->id;
    $user = User::find($id);
    //dd($user);
    $photo = $request->file('photo');
    $file = time()."_".$photo->getClientOriginalName();

    $feed_upload = 'feed';
    $photo->move($feed_upload, $file);
    Posts::create
    ([
      'user_id' => $id,
      'title' => $request->title,
      'content' => $content,
      'photo' => $file,
    ]);

    //next update
    /*
    if($request->hasFile('photo')){
      $photo = $request->file('photo');
      $file = time()."_".$photo->getClientOriginalName();
      $feed_upload = 'feed';
      $photo->move($feed_upload, $file);
		}
    */

    return back()->with('sukses data masuk');
  }

  public function activity()
  {
    SEOTools::metatags();
		SEOTools::twitter();
		SEOTools::opengraph();
		SEOTools::jsonLd();

		SEOTools::setTitle('My activity');
		SEOTools::setDescription('Find Me matchmaking web-based application is useful for facilitating people who are looking for new relationships');
		SEOTools::setCanonical(URL::current());
		SEOTools::addImages('URL::current()/logo.png');

    $id = Auth::user()->id;
    $total_post = Posts::where('user_id', $id)->latest()->paginate(5);

    return view('users.index', compact('total_post'));
  }

  public function editpost(Posts $post)
	{
    SEOTools::metatags();
		SEOTools::twitter();
		SEOTools::opengraph();
		SEOTools::jsonLd();

		SEOTools::setTitle('Post Edit');
		SEOTools::setDescription('Find Me matchmaking web-based application is useful for facilitating people who are looking for new relationships');
		SEOTools::setCanonical(URL::current());
		SEOTools::addImages('URL::current()/logo.png');

		$id = Auth::user()->id;
		if($post->user_id !== $id){
			return abort(404);
		}

		$user = User::find($id);
		$total_post = Posts::where('user_id', $id)->get();
    //$post = Posts::find($id);

		return view('users.editpost', compact('user', 'total_post', 'post'));
	}

  public function updatepost(Request $request, $id)
	{
		$validatedData = $request->validate([
			'title' => 'required|max:150|min:5',
			'content' => 'required|min:5',
      'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:5408|nullable',

		]);

    $antiXss = new AntiXSS();
		$antiXss->removeEvilHtmlTags(array('iframe'));
    $content = $antiXss->xss_clean($request->content);

		$idUser = Auth::user()->id;
		$user = User::find($idUser);
		$post = Posts::findOrFail($id);
		if($post->user_id !== $idUser){
			return abort(404);
		}

    $photo = $request->file('photo');
    $file = time()."_".$photo->extension();

    $feed_upload = 'feed';
    $photo->move($feed_upload, $file);

		$post->update([
			'title' => $request->title,
			'content' => $content,
      'photo' => $file,

		]);

		return redirect()->route('activity')->with('Sukses');
	}

  public function delpost($id)
	{
		$post = Posts::findOrFail($id);
		$post->delete();

		return redirect()->back()->with('data hapus');
	}

  public function profiles()
  {
    SEOTools::metatags();
		SEOTools::twitter();
		SEOTools::opengraph();
		SEOTools::jsonLd();

		SEOTools::setTitle('My Profiles');
		SEOTools::setDescription('Find Me matchmaking web-based application is useful for facilitating people who are looking for new relationships');
		SEOTools::setCanonical(URL::current());
		SEOTools::addImages('URL::current()/logo.png');

    $id = Auth::user()->id;
		$user = User::find($id);

    return view('users.profiles', compact('user'));
  }

  public function update(Request $request)
	{
    $id = Auth::user()->id;

		$validation = $request->validate([
			'name' => 'required|min:5|max:150|',
			'email' => 'required|min:8|max:45|nullable',
      'gender' => 'required|nullable',
      'relationship' => 'required|nullable',
      'alamat' => 'required|min:5|max:150|nullable',
      'phone' => 'required|min:5|max:150|nullable|unique:users,phone,'  .  $id,
			'photo' => 'image|mimes:jpeg,png,jpg|max:2408',
		]);

    $antiXss = new AntiXSS();
		$antiXss->removeEvilHtmlTags(array('iframe'));
    $name = $antiXss->xss_clean($request->name);
    $alamat = $antiXss->xss_clean($request->alamat);

    $user = User::findOrFail($id);
    $profile_photo = $request->file('photo');
    $file = time()."_".$profile_photo->getClientOriginalName();

    $user_photo = 'images/user';
    $profile_photo->move($user_photo, $file);

    $user->update([
			'name' => $request->name,
      'email' => $request->email,
      'gender' => $request->gender,
      'relationship' => $request->relationship,
      'alamat' => $request->alamat,
      'phone' => $request->phone,
      'photo' => $file,
		]);

		return back()->with('sukses');
	}

}
