<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Gallery;
use Validator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::orderBy('id','desc')->get();
        return view('admin.galleries.index',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galleries.create');
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

        $gallery = Gallery::create($data);

        $galleryImageDirectory = 'galleryImages';
        if ($request->hasFile('image_url')) {

            $fileName = $request->file('image_url')->getClientOriginalName();

            if(!Storage::exists($galleryImageDirectory)){
                Storage::makeDirectory($galleryImageDirectory);
            }
            $imageUrl = Storage::putFile($galleryImageDirectory, new File($request->file('image_url')));
            $gallery->update(['image_url'=> $imageUrl]);
        }

        return redirect()->route('gallery.index')->with('success', 'Record added successfully.');
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
        $gallery = Gallery::findOrFail($id);
        return view('admin.galleries.edit',compact('gallery'));
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
        $gallery = Gallery::findOrFail($id);

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

        $galleryImageDirectory = 'galleryImages';
        if ($request->hasFile('image_url')) {

            if(!Storage::exists($galleryImageDirectory)){
                Storage::makeDirectory($galleryImageDirectory);
            }
            Storage::delete('/'.$gallery->image_url);
            $imageUrl = Storage::putFile($galleryImageDirectory, new File($request->file('image_url')));
            $data['image_url'] = $imageUrl;
        }

        $gallery->update($data);

        return redirect()->route('gallery.index')->with('success', 'Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Gallery::where('id', $request->gallery_id)->delete();
        return response()->json(['status' => 1, 'message' => 'Record deleted successfully.']);
    }
}
