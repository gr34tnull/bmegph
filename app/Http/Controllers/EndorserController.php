<?php

namespace App\Http\Controllers;

use App\Models\Endorser;
use App\Models\Bloodline;
use App\Models\Gallery;
use Illuminate\Http\Request;

class EndorserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Endorser $endorsers)
    {
        $endorsers = $endorsers->all();
        return view('endorsers.index',compact('endorsers'));
    }

    public function national(Endorser $endorsers)
    {
        $endorsers = $endorsers->where('national',true)->get();
        return view('endorsers.national',compact('endorsers'));
    }

    public function regional(Endorser $endorsers)
    {
        $endorsers = $endorsers->where('national',false)->get();
        return view('endorsers.regional',compact('endorsers'));
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
        Endorser::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Endorser  $endorser
     * @return \Illuminate\Http\Response
     */
    public function show(Endorser $endorser)
    {
        $bloodlines = Bloodline::where('endorser_id',$endorser->id)->get();
        $galleries = Gallery::where('endorser_id',$endorser->id)->get();
        return view('endorsers.show',compact('endorser','bloodlines','galleries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Endorser  $endorser
     * @return \Illuminate\Http\Response
     */
    public function edit(Endorser $endorser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Endorser  $endorser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Endorser $endorser)
    {
        if($request->has('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
        
            $imageName = time().'.'.$request->image->extension();  
         
            $request->image->move(public_path('endorsers'), $imageName);

            $endorser->image = $imageName;
        } else {
            $endorser->fill($request->all());
        }
        $endorser->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Endorser  $endorser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Endorser $endorser)
    {
        $endorser->delete();
        return back();
    }
}
