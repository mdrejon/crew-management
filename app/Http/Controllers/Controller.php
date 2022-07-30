<?php

namespace App\Http\Controllers;

use Image;
// use Intervention\Image\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function setPageTitle($title,$metaTitle = null,$metaDescription = null){
        view()->share(['title'=>$title,'metaTitle'=>$metaTitle,'metaDescription'=>$metaDescription]);
    }

    /**
     * new image upload from media
     *
     * @param $file
     * @param $folder
     * @param $width
     * @param $heidth\
     * @param \Illuminate\Http\Response
     *
     */
    public function imageUpload($file,$folder,$width,$height){
        // if not have a folder create folder
        !File::exists($folder) ? File::makeDirectory($folder, 0777, true, true) : false;

        if ($file) {
            $imageEx = $file->getClientOriginalExtension();
            $imageName = uniqid(time().rand()).'.'.$imageEx;
            if ($width != null && $height != null) {
                Image::make($file)->resize($width, $height)->save($folder.$imageName);
            }
            else{
                $file->move($folder,$imageName);
            }

            return $folder.$imageName;
        }else{
            return '';
        }
    }
}
