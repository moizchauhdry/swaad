<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Banner;
use Validator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $banners = Banner::orderBy('id','DESC')->get();
        return view('admin.banners.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {           
        $validatedData = $request->validate([
            'image_url' => 'required|image|mimes:jpeg,jpg,png',
            'status' => 'required',
        ]);

        $data = [
            'status' => $request->input('status'),
        ];

        $banner = Banner::create($data);

        $bannerImageDirectory = 'bannerImages';
        if ($request->hasFile('image_url')) {
            
            $fileName = $request->file('image_url')->getClientOriginalName();

            if(!Storage::exists($bannerImageDirectory)){
                Storage::makeDirectory($bannerImageDirectory);
            }
            $imageUrl = Storage::putFile($bannerImageDirectory, new File($request->file('image_url')));
            $banner->update(['image_url'=> $imageUrl]);
        }

        return redirect()->route('banners.index')->with('success', 'Record added successfully.');
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
        $banner = Banner::find($id);
        if($banner == null)
        {
            return redirect()->route('banners.index')->with('error', 'No Record Found');
        }
        return view('admin.banners.edit',compact('banner'));
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
        $banner = Banner::find($id);

        if ($banner == null) {
            return redirect()->back()->with('error', 'No Record Found To Update.');
        }

        $rules = [
            'image' => 'image|mimes:jpeg,jpg,png',
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = [
            'status' => $request->input('status'),
        ];

        $bannerImageDirectory = 'bannerImages';
        if ($request->hasFile('image_url')) {
            
            if(!Storage::exists($bannerImageDirectory)){
                Storage::makeDirectory($bannerImageDirectory);
            }
            Storage::delete('/'.$banner->image_url);
            $imageUrl = Storage::putFile($bannerImageDirectory, new File($request->file('image_url')));
            $data['image_url'] = $imageUrl;
        }

        $banner->update($data);
        
        return redirect()->route('banners.index')->with('success', 'Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Banner::where('id', $request->banner_id)->delete();
        return response()->json(['status' => 1, 'message' => 'Record deleted successfully.']);
    }
}
