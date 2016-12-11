<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\Stevenmaguire;
use Illuminate\Support\Facades\Auth;
use App\Like;

class HomeController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function storeYelp(Request $request)
    {
//        $posts = Post::all();
        $name = $request->input('search');
        $yelpResults = Stevenmaguire::search(array('term' => 'Bars', 'location' => $name, 'limit' => 14));
//        dd($yelpResults);

//        return redirect()->route('index')->with($yelpResult);
        return view('home')->with('yelpResults', $yelpResults);
//            ->with('posts', $posts);
    }

    public function postLikePost(Request $request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post_id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }

}
