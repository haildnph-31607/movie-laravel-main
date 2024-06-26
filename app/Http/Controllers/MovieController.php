<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Movie::with('category', 'genre', 'country')->get();
        $category = Category::pluck('title', 'id');
        $country = Country::pluck('title', 'id');
        $genre = Genre::pluck('title', 'id');
        $path = public_path() . "/public_json/";
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        File::put($path."compare.json",json_encode($list));
        return view('admin.movie.index', compact('list', 'category', 'country', 'genre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = Movie::with('category', 'genre', 'country')->get();
        $category = Category::pluck('title', 'id');
        $country = Country::pluck('title', 'id');
        $genre = Genre::pluck('title', 'id');
        return view('admin.movie.form', compact('list', 'category', 'country', 'genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $movie = new Movie();
        $movie->title = $data['title'];
        $movie->status = $data['status'];
        $movie->slug = $data['slug'];
        $movie->resolution = $data['resolution'];
        $movie->subtitle = $data['phude'];
        $movie->movie_duration = $data['duration'];
        $movie->description = $data['description'];
        $movie->category_id = $data['category_id'];
        $movie->tags = $data['tags'];
        $movie->trailer = $data['trailer'];
        $movie->episode = $data['episode'];


        $movie->genre_id = $data['genre_id'];
        $movie->movie_hot = $data['movie_hot'];
        $movie->country_id = $data['country_id'];
        $movie->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        //them hinh anh
        $get_image = $request->file('image');
        // luu tru
        $path = 'uploads/movie';
        if ($get_image) {
            // lấy name file
            $get_naem_file = $get_image->getClientOriginalName();
            $name_imgae = current(explode('.', $get_naem_file)); // tách tên file và .jpg + import
            $new_img = $name_imgae . '_' . rand(1, 99) . '.' . $get_image->getClientOriginalExtension();    // -> tên chính thức getCl lắys đuôi ảnh
            $get_image->move($path, $new_img);
            $movie->image = $new_img;
        }
        $movie->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $list = Movie::with('category', 'genre', 'country')->get();
        $category = Category::pluck('title', 'id');
        $country = Country::pluck('title', 'id');
        $genre = Genre::pluck('title', 'id');
        $movie = Movie::find($id);
        return view('admin.movie.form', compact('list', 'category', 'country', 'genre', 'movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $request->all();
        $movie = Movie::find($id);
        $movie->title = $data['title'];
        $movie->status = $data['status'];
        $movie->slug = $data['slug'];
        $movie->movie_hot = $data['movie_hot'];
        $movie->resolution = $data['resolution'];
        $movie->subtitle = $data['phude'];
        $movie->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->movie_duration = $data['duration'];
        $movie->description = $data['description'];
        $movie->category_id = $data['category_id'];
        $movie->episode = $data['episode'];

        $movie->tags = $data['tags'];
        $movie->trailer = $data['trailer'];


        $movie->genre_id = $data['genre_id'];
        $movie->country_id = $data['country_id'];
        //them hinh anh
        $get_image = $request->file('image');
        // luu tru
        $path = 'uploads/movie';
        if ($get_image) {
            if (file_exists('uploads/movie/' . $movie->image)) {
                unlink('uploads/movie/' . $movie->image);
            } else {
                $get_naem_file = $get_image->getClientOriginalName();
                $name_imgae = current(explode('.', $get_naem_file)); // tách tên file và .jpg + import
                $new_img = $name_imgae . '_' . rand(1, 99) . '.' . $get_image->getClientOriginalExtension();    // -> tên chính thức getCl lắys đuôi ảnh
                $get_image->move($path, $new_img);
                $movie->image = $new_img;
            }
        }
        $movie->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        if (file_exists('uploads/movie/' . $movie->image)) {
            unlink('uploads/movie/' . $movie->image);
        };
        $movie->delete();
        return redirect()->back();
    }
    public function yearSelected(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id']);
        $movie->year = $data['year'];
        $movie->save();
    }
    public function SessionChange(Request $request)
    {
        $data = $request->all();
        $session = Movie::find($data['id']);
        $session->session = $data['session'];
        $session->save();
    }
}
