<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\Stevenmaguire;
//use App\Post;

class YelpController extends Controller
{

    public function index()
    {
//        $posts = Post::all();
        return view('welcome');
//            ->with('posts', $posts);
    }

    //
    public function storeYelp(Request $request)
    {
//        $posts = Post::all();
        $name = $request->input('search');
        $yelpResults = Stevenmaguire::search(array('term' => 'Bars', 'location' => $name));

//        dd($yelpResults);
        return view('yelpResults')->with('yelpResults', $yelpResults); //->with('posts', $posts)
    }
}