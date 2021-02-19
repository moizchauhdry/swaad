<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Category;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderby('id','DESC')->get();
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
            'title_gr' => 'required|string|max:70',
            'image_url'=>'required|image|mimes:jpg,jpeg,png',
        ]);
    
        $slug = strtolower($request->input('title'));

        $data = [
            'title' => $request->input('title'),
            'title_gr' => $request->input('title_gr'),
            'slug' =>  preg_replace('/\s+/', '-', $slug),
        ];

        $category = Category::create($data);

        // CATEGORY SINGLE IMAGE
        $categoryImagesDirectory = 'categoryImages';
        if($request->hasFile('image_url')) 
        {
            if (!Storage::exists($categoryImagesDirectory . '/' . $category->id)) {
                Storage::makeDirectory($categoryImagesDirectory . '/' . $category->id);
            }

            $fileNameWithExtension = $request->file('image_url')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('image_url')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            
            $imagePath = storage_path('app/public/'.$categoryImagesDirectory.'/'.$category->id.'/'.$fileNameToStore);
            $imageRealPath = $categoryImagesDirectory.'/'.$category->id.'/'.$fileNameToStore;

            $image = Image::make($request->file('image_url')->getRealPath())->encode('jpg', 25);
            $image->save($imagePath, 25, 'jpg');
            $category->update(['image_url' => $imageRealPath]);
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
        $category = Category::findOrFail($id);
        return view('admin.categories.edit',compact('category'));
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
        $this->validate($request, [
            'title' => 'required|string|max:70',
            'title_gr' => 'required|string|max:70',
            'image_url'=>'image|mimes:jpg,jpeg,png',
        ]);

        if ($request->has('status')) {
            $status = 0;
        } else {
            $status = 1;
        }
    
        $slug = strtolower($request->input('title'));

        $data = [
            'title' => $request->input('title'),
            'title_gr' => $request->input('title_gr'),
            'slug' =>  preg_replace('/\s+/', '-', $slug),
            'status' => $status,
        ];

        $category = Category::findOrFail($id);
        $category->update($data);

        // CATEGORY SINGLE IMAGE
        $categoryImagesDirectory = 'categoryImages';
        if($request->hasFile('image_url')) 
        {
            if (!Storage::exists($categoryImagesDirectory . '/' . $category->id)) {
                Storage::makeDirectory($categoryImagesDirectory . '/' . $category->id);
            }

            $fileNameWithExtension = $request->file('image_url')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('image_url')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            
            $imagePath = storage_path('app/public/'.$categoryImagesDirectory.'/'.$category->id.'/'.$fileNameToStore);
            $imageRealPath = $categoryImagesDirectory.'/'.$category->id.'/'.$fileNameToStore;

            $image = Image::make($request->file('image_url')->getRealPath())->encode('jpg', 25);
            $image->save($imagePath, 25, 'jpg');
            $category->update(['image_url' => $imageRealPath]);
        }
        
        return redirect()->route('categories.index')->with('success', 'Record Updated successfully.');
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
