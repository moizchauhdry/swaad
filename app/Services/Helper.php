<?php

namespace App\Services;

use App\Conversation;
use http\Env\Request;
use Illuminate\Support\Facades\Validator;

class Helper
{
    public static function uploadFile($file){
        if (empty($file)) {
            return Self::jsonResponse(0, 'Please upload the file', []);
        }
        $fileName = $file->getClientOriginalName();
        $fileSize = ($file->getSize())/1000;    //Size in kb
        $explodeImage = explode('.', $fileName);
        $fileName = $explodeImage[0];
        $extension = end($explodeImage);
        $fileName = time() . "-" . $fileName . ".".$extension;
        $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'heif', 'hevc', 'heic', 'PNG'];

        if(in_array($extension, $imageExtensions))
        {
            if($fileSize > 5000){
                return Self::jsonResponse(0, 'Image size should be less than 5 MB', '');
            }

            $folderName = "project-assets/images/";
            $file->move($folderName,$fileName);

            return Self::jsonResponse(1, 'Image Uploaded', ["path"=> asset($folderName), "filename"=>$fileName]);
        }
        else
        {
            if($fileSize > 5000){
                return Self::jsonResponse(0, 'File size should be less than 5 MB', '');
            }
            $folderName = "project-assets/files/";
            $file->move($folderName,$fileName);
            return Self::jsonResponse(1, 'File Uploaded', ["path"=> asset($folderName), "filename"=>$fileName]);
        }
    }

    public static function deleteImage($image){
        if(!is_file(public_path('project-assets/images/'.$image))){
            return Self::jsonResponse(0, '', [], 'Image not exists');
        }
        unlink(public_path('project-assets/images/'.$image));
        return Self::jsonResponse(1, 'Image has been deleted.', '');

    }


    public static function jsonResponse($status, $message, $data = null, $error= "", $statuscode = 200){
        return response()->json(['status'=>$status, 'message'=>$message, 'data'=>$data, 'error'=>$error], $statuscode);
    }

    public static function paginateHelper($results){
        return [
            "current_page" => $results->currentPage(),
            "total_records" => $results->total(),
            "current_page_records" => $results->count(),
            "next_page" => ($results->hasMorePages()) ? $results->currentPage()+1 : 0,
            "total_pages" => $results->lastPage(),
        ];
    }

}
