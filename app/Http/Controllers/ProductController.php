<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Product;
use App\Category;

use Validator;

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
            'image_url' => 'required|image|mimes:jpeg,jpg,png',
            'category_id' => 'required',
            'price' => 'required|numeric|gt:0',
            'description' => 'required|string|max:5000',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $data = [
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
        ];

        $product = Product::create($data);

        $productImagesDirectory = 'productImages';
        if ($request->hasFile('image_url')) {
            if(!Storage::exists($productImagesDirectory)){
                Storage::makeDirectory($productImagesDirectory);
            }
            $imageUrl = Storage::putFile($productImagesDirectory , new File($request->file('image_url')));
            $product->update(['image_url'=> $imageUrl]);
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
