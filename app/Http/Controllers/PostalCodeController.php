<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostalCode;

class PostalCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $codes = PostalCode::orderBy('id','DESC')->get();
        return view('admin.codes.index',compact('codes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.codes.create');
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
            'postal_code' => 'required|numeric',
            'net_total' => 'required|numeric',
        ]);

        $code = PostalCode::create($validatedData);

        return redirect()->route('codes.index')->with('success', 'Record added successfully.');
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
        $code = PostalCode::find($id);
        if($code == NULL)
        {
            return redirect()->route('codes.index')->with('error', 'No Record Found');
        }
        return view('admin.codes.edit',compact('code'));
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
        $code = PostalCode::find($id);

        if ($code == null) {
            return redirect()->back()->with('error', 'No Record Found To Update.');
        }

        $validatedData = $request->validate([
            'postal_code' => 'required|numeric',
            'net_total' => 'required|numeric',
        ]);

        $code->update($validatedData);
        
        return redirect()->route('codes.index')->with('success', 'Record pdated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        dd($request->all());
        PostalCode::where('id', $request->banner_id)->delete();
        return response()->json(['status' => 1, 'message' => 'Record deleted successfully.']);
    }
}
