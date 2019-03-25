<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = album::all();

        return response()->json($albums);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'album_img' => 'required',
            'album_title' => 'required',
            'artiste_name' => 'required',
            'album_gender' => 'required',
            'product_date' => 'required',
            'album_label' => 'required',
            'album_song' => 'required',
            'album_moyen' => 'required',
        ]);

        $album = Album::create($request->all());

        return response()->json([
            'message' => 'Great success! New album created',
            'album' => $album
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        return $album;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'album_img' => 'nullable',
            'album_title' => 'nullable',
            'artiste_name' => 'nullable',
            'album_gender' => 'nullable',
            'product_date' => 'nullable',
            'album_label' => 'nullable',
            'album_song' => 'nullable',
            'album_moyen' => 'nullable',
        ]);
        $album->update($request->all());

        return response()->json([
            'message' => 'Great success! Album updated',
            'album' => $album
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->delete();

        return response()->json([
            'message' => 'Successfully deleted album!'
        ]);
    }
}
