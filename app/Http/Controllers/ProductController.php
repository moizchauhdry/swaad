<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Product;
use App\Category;

use Validator;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('status','1')->orderBy('id','DESC')->get();
        return view ('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', '1')->orderBy('title','DESC')->get();
        return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'title_gr' => 'required|string|max:255',
            'image_url' => 'required|image|mimes:jpeg,jpg,png|max:1024',
            'category_id' => 'required',
            'price' => 'required|gt:0',
            'spice_level' => 'required|numeric',
            'description' => 'required|string|max:5000',
            'description_gr' => 'required|string|max:5000',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = [
            'title' => $request->input('title'),
            'title_gr' => $request->input('title_gr'),
            'category_id' => $request->input('category_id'),
            'price' => $request->input('price'),
            'spice_level' => $request->input('spice_level'),
            'description' => $request->input('description'),
            'description_gr' => $request->input('description_gr'),
        ];

        $product = Product::create($data);

        $productImageDirectory = 'productImages';

        // PRODUCT SINGLE IMAGE
        if($request->hasFile('image_url')) 
        {
            if (!Storage::exists($productImageDirectory . '/' . $product->id)) {
                Storage::makeDirectory($productImageDirectory . '/' . $product->id);
            }

            $fileNameWithExtension = $request->file('image_url')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('image_url')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            
            $imagePath = storage_path('app/public/'.$productImageDirectory.'/'.$product->id.'/'.$fileNameToStore);
            $imageRealPath = $productImageDirectory.'/'.$product->id.'/'.$fileNameToStore;

            $image = Image::make($request->file('image_url')->getRealPath())->encode('jpg', 50);
            $image->save($imagePath, 50, 'jpg');
            $product->update(['image_url' => $imageRealPath]);
        }
    
        return redirect()->route('products.index')->with('success', 'Record Added Successfully.');
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
        $product = Product::findOrFail($id);
        $categories = Category::where('status', '1')->orderBy('title','DESC')->get();
        return view('admin.products.edit',compact('product','categories'));
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
        $rules = [
            'title' => 'required|string|max:255',
            'title_gr' => 'required|string|max:255',
            'image_url' => 'image|mimes:jpeg,jpg,png',
            'category_id' => 'required',
            'price' => 'required|gt:0',
            'spice_level' => 'required|numeric',
            'description' => 'required|string|max:5000',
            'description_gr' => 'required|string|max:5000',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = [
            'title' => $request->input('title'),
            'title_gr' => $request->input('title_gr'),
            'category_id' => $request->input('category_id'),
            'price' => $request->input('price'),
            'spice_level' => $request->input('spice_level'),
            'description' => $request->input('description'),
            'description_gr' => $request->input('description_gr'),
        ];
        $product = Product::findOrFail($id);
        $product->update($data);

        $productImageDirectory = 'productImages';

        // PRODUCT SINGLE IMAGE
        if($request->hasFile('image_url')) 
        {
            if (!Storage::exists($productImageDirectory . '/' . $product->id)) {
                Storage::makeDirectory($productImageDirectory . '/' . $product->id);
            }

            $fileNameWithExtension = $request->file('image_url')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('image_url')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            
            $imagePath = storage_path('app/public/'.$productImageDirectory.'/'.$product->id.'/'.$fileNameToStore);
            $imageRealPath = $productImageDirectory.'/'.$product->id.'/'.$fileNameToStore;

            $image = Image::make($request->file('image_url')->getRealPath())->encode('jpg', 50);
            $image->save($imagePath, 50, 'jpg');
            $product->update(['image_url' => $imageRealPath]);
        }
    
        return redirect()->route('products.index')->with('success', 'Record Updated Successfully.');
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
