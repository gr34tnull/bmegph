<?php

namespace App\Http\Controllers;

use App\Models\Endorser;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $imageName = time().'.'.$request->video->extension();
        $request->video->move(public_path('gallery'), $imageName);

        Gallery::create([
            'endorser_id' => $request->endorser_id,
            'name' => $request->name,
            'video' => $imageName,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $endorser = Endorser::findOrFail($id);
        $galleries = Gallery::where('endorser_id',$endorser->id)->get();
        return view('galleries.show',compact('endorser','galleries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        if($request->has('video')){
        
            $imageName = time().'.'.$request->video->extension();
            $request->video->move(public_path('gallery'), $imageName);

            $gallery->video = $imageName;
        } else {
            $gallery->fill($request->all());
        }
        $gallery->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return back();
    }
}
