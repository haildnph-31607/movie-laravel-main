<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home()
    {
        $movie_hot = Movie::where('movie_hot', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->get();
        $movie_hot_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderBy('updated_at','DESC')->take(10)->get();

        $category = Category::where('status', 1)->get();
        $genre = Genre::where('status', 1)->get();

        $country = Country::where('status', 1)->get();
        $category_home = Category::with('movie')->orderBy('id', 'DESC')->where('status', 1)->get();

        return view('pages.home', compact('category', 'genre', 'country', 'category_home', 'movie_hot','movie_hot_sidebar'));
    }
    public function category($slug)
    {
        $category = Category::where('status', 1)->get();
        $genre = Genre::where('status', 1)->get();
        $movie_hot_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderBy('updated_at','DESC')->take(10)->get();

        $country = Country::where('status', 1)->get();
        $cate_slug = Category::where('slug', $slug)->first();
        $movie = Movie::where('category_id', $cate_slug->id)->orderBy('updated_at', 'DESC')->paginate(20);
        return view('pages.category', compact('category', 'genre', 'country', 'cate_slug', 'movie','movie_hot_sidebar'));
    }
    public function watch($slug,$id)
    {
        $movie_hot = Movie::where('movie_hot', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->get();
        $movie_hot_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderBy('updated_at','DESC')->take(10)->get();

        $category = Category::where('status', 1)->get();
        $genre = Genre::where('status', 1)->get();

        $country = Country::where('status', 1)->get();
        $category_home = Category::with('movie')->orderBy('id', 'DESC')->where('status', 1)->get();
        $movie = Movie::with('category','genre','country','episode')->where('slug',$slug)->where('status',1)->first();
        $detail_lq = Movie::where('category_id', $movie->category_id)->get();
        $firtfilm = Episode::where('movie_id',$movie->id)->first();
        // return response()->json($firtfilm);
        return view('pages.watch', compact('category', 'genre', 'country', 'category_home', 'movie_hot','movie_hot_sidebar','movie','detail_lq','firtfilm'));
    }
    public function country($slug)
    {
        $category = Category::where('status', 1)->get();
        $genre = Genre::where('status', 1)->get();
        $movie_hot_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderBy('updated_at','DESC')->take(10)->get();

        $country = Country::where('status', 1)->get();
        $coun_slug = Country::where('slug', $slug)->first();
        $movie = Movie::where('country_id', $coun_slug->id)->orderBy('updated_at', 'DESC')->paginate(20);

        return view('pages.country', compact('category', 'genre', 'country', 'coun_slug', 'movie','movie_hot_sidebar'));
    }
    public function year($year)
    {
        $category = Category::where('status', 1)->get();
        $genre = Genre::where('status', 1)->get();
        $movie_hot_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderBy('updated_at','DESC')->take(10)->get();

        $country = Country::where('status', 1)->get();

        $movie = Movie::where('year',$year)->orderBy('updated_at', 'DESC')->paginate(20);

        return view('pages.year', compact('category', 'genre', 'country', 'movie','year','movie_hot_sidebar'));
    }
    public function genre($slug)
    {
        $category = Category::where('status', 1)->get();
        $genre = Genre::where('status', 1)->get();
        $movie_hot_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderBy('updated_at','DESC')->take(10)->get();

        $country = Country::where('status', 1)->get();
        $genre_slug = Genre::where('slug', $slug)->first();
        $movie = Movie::where('genre_id', $genre_slug->id)->orderBy('updated_at', 'DESC')->paginate(20);

        return view('pages.genre', compact('category', 'genre', 'country', 'genre_slug', 'movie','movie_hot_sidebar'));
    }
    public function movie($slug)
    {

        $category = Category::where('status', 1)->get();
        $genre = Genre::where('status', 1)->get();
        $movie_hot_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderBy('updated_at','DESC')->take(10)->get();

        $country = Country::where('status', 1)->get();
        $detail = Movie::where('slug', $slug)->where('status', 1)->first();
        $genre_detail = Genre::where('id', $detail->genre_id)->first();
        $coun_detail = Country::where('id', $detail->country_id)->first();
        $cate_detail = Category::where('id', $detail->category_id)->first();
        $detail_lq = Movie::where('category_id', $detail->category_id)->get();

        return view('pages.movie', compact('category', 'genre', 'country', 'detail', 'genre_detail', 'coun_detail', 'cate_detail', 'detail_lq'));
    }
    public function episode()
    {

        $category = Category::where('status', 1)->get();
        $genre = Genre::where('status', 1)->get();

        $country = Country::where('status', 1)->get();
        return view('pages.episode');
    }
    public function search(){
       if(isset($_GET['search'])){

        $movie_hot = Movie::where('movie_hot', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->get();
        $movie_hot_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderBy('updated_at','DESC')->take(10)->get();

        $category = Category::where('status', 1)->get();
        $genre = Genre::where('status', 1)->get();

        $country = Country::where('status', 1)->get();
        $category_home = Category::with('movie')->orderBy('id', 'DESC')->where('status', 1)->get();
        $movie = Movie::where('title','LIKE','%'.$_GET['search'].'%')->orderBy('updated_at','DESC')->where('status', 1)->paginate(10);


        return view('pages.search', compact('category', 'genre', 'country', 'category_home', 'movie_hot','movie','movie_hot_sidebar'));
       }else{
        return redirect()->to('/');
       }
    }
}
