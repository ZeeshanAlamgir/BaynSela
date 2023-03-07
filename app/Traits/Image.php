<?php

namespace App\Traits;
use Illuminate\Support\Str;


trait Image
{
    public function imageStore($path,$file)
    {
        if($file)
        {
            $fileName = uniqid() . Str::kebab($file->getClientOriginalName());
            $file->move(public_path($path),$fileName);
            return $fileName;
        }
    }
    public function imageStoreUniqueName($path,$file)
    {
        if($file)
        {
            // dd($fileName);
            // $fileName = $file.$extension;
            // dd($fileName);
            $fileName = uniqid() . Str::kebab($file->getClientOriginalName());
            $file->move(public_path($path),$fileName);
            return $fileName;
        }
    }

    public function deleteImage($path)
    {
        return public_path('app-assets/images/'.$path.'/');
    }
}
