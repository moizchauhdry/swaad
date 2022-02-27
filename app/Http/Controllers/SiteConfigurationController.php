<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

use App\SiteConfiguration;
use Validator;

class SiteConfigurationController extends Controller
{
    public function index()
    {
        $site = SiteConfiguration::first();

        if(empty($site)){
           $site = new SiteConfiguration();
           $site->store_timing = NULL;
           $site->save();
        }

        return view('admin.site-configuration.index', ['site' => $site]);
    }

    public function update(Request $request)
    {
        $rules = [
            'store_timing' => 'required',
            'rsv_accepted_msg' => 'required',
            'rsv_rejected_msg' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = [
            'store_timing' => $request->store_timing,
            'rsv_accepted_msg' => $request->rsv_accepted_msg,
            'rsv_rejected_msg' => $request->rsv_rejected_msg,
        ];

        $site = SiteConfiguration::first();

        $site->update($data);

        return redirect()->route('site-configuration.index')->with('success', 'Updated Successfully');
    }
}
