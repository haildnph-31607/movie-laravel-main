<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Movie;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Episode::with('movie')->orderBy('id','DESC')->get();
        return view('admin.episode.index' , compact('list'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = Episode::with('movie')->orderBy('id','DESC')->get();
        $movie = Movie::pluck('title', 'id');
        // return response()->json($list);
        return view('admin.episode.form',compact('movie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $episode = new Episode();
        $data = $request->all();

        $episode->movie_id = $data['movie'];
        $episode->link = $data['link'];
        $episode->episode = $data['episode'];
        $episode->save();
        return redirect()->to('episode');
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
        $movie = Movie::pluck('title', 'id');
        $episode = Episode::find($id);
        return view('admin.episode.form' , compact('episode','movie'));
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
        $episode = Episode::find($id);
        $data = $request->all();
        $episode->movie_id = $data['movie'];
        $episode->link = $data['link'];
        $episode->episode = $data['episode'];
        $episode->save();
        return redirect()->to('episode');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Episode::find($id)->delete();
        return redirect()->to('episode');
    }
    public function episodeMovie(Request $request){
       $id = $_GET['id'];
       $movie =Movie::find($id);
      $output = '<option value="">----Chọn Tập----</option>';
     for($i=0;$i<$movie->episode_number;$i++){
        $output.='<option value="'.$i.'">'.$i.'</option>';
     }
    //  echo $output;
     return $output;

    }
}
