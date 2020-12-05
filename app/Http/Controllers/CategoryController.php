<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('status','1')->orderby('id','DESC')->get();
        return view('admin.categories.index',compact('categories') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $this->validate($request, [
            'title' => 'required|string|max:70',
            'image_url'=>'required|image|mimes:jpg,jpeg,png',
        ]);
    
        $slug = strtolower($request->input('title'));

        $data = [
            'title' => $request->input('title'),
            'slug' =>  preg_replace('/\s+/', '-', $slug),
        ];

        $category = Category::create($data);

        $categoryImagesDirectory = 'categoryImages';
        if ($request->hasFile('image_url')) {
            
            if(!Storage::exists($categoryImagesDirectory)){
                Storage::makeDirectory($categoryImagesDirectory);
            }
            
            $imageUrl = Storage::putFile($categoryImagesDirectory , new File($request->file('image_url')));
            $category->update(['image_url'=> $imageUrl]);
        }

        return redirect()->route('categories.index')->with('success', 'Record added successfully.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
