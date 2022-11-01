<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\Artist;
use Illuminate\Database\Eloquent\Builder;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Link::get();
        return view('create')->with('songs', $songs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $link = new Link;

        $link->name = $request->name;
        $singers = explode("-", $request->artist);
        $link->link = $request->link;
        $link->save();
        foreach ($singers as $singer) {
            $artist = Artist::firstOrCreate(['name' => $singer]);
            $link->artists()->attach($artist);
        }
        return redirect('/')->with('status', 'Link post form data has been inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $songs = Link::where('id', $request->id)->get();
        foreach ($songs as $song) {
            $song->name = $request->name;
            $song->save();
        }
        return redirect('/')->with('status', 'Song updated');
    }

    /**
     * Search for a specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function searchArtist(Request $request)
    {

        $songs = Link::whereHas('artists', function (Builder $query) use ($request) {
            $query->where('name', 'like', '%' . $request->artist . '%');
        })->get();
        return view('create')->with('songs', $songs);
    }

    /**
     * Search for a specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function searchSong(Request $request)
    {

        $songs = Link::where('name', 'LIKE', '%' . $request->name . '%')->get();
        return view('create')->with('songs', $songs);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Link::destroy($request->id);
        return redirect('/')->with('status', 'Song deleted');
    }
}