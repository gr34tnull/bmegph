<?php

namespace App\Http\Controllers;

use App\Models\Endorser;
use App\Models\Bloodline;
use Illuminate\Http\Request;

class BloodlineController extends Controller
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
        Bloodline::create([
            'endorser_id' => $request->endorser_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return back();
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bloodline  $bloodline
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $endorser = Endorser::findOrFail($id);
        $bloodlines = Bloodline::where('endorser_id',$endorser->id)->get();
        return view('bloodlines.show',compact('endorser','bloodlines'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bloodline  $bloodline
     * @return \Illuminate\Http\Response
     */
    public function edit(Bloodline $bloodline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bloodline  $bloodline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bloodline $bloodline)
    {
        if($request->has('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
        
            $imageName = time().'.'.$request->image->extension();  
         
            $request->image->move(public_path('bloodlines'), $imageName);

            $bloodline->image = $imageName;
        } else {
            $bloodline->fill($request->all());
        }
        $bloodline->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bloodline  $bloodline
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bloodline $bloodline)
    {
        $bloodline->delete();
        return back();
    }
}
