<?php

namespace App\Services;

use App\Models\BannerSection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Traits\Image;

class UpdateBannerSectionService
{
    use Image;
    public $image=null,$path = 'app-assets/images/banner/';
    public function updateBannerSection($data)
    {
        $banner = (new BannerSection())::find(1);
        try {
            if($data['image'] != null)
            {
                File::delete($this->path.$banner->image);
                $this->image = $this->imageStore($this->path,$data['image']);
            }
            else

                $this->image = $banner->image;

        } catch (\Exception $ex) {
            $this->image = $banner->image;
        }
        $banner->image = $this->image;
        $banner->page_id = 1;
        $banner->order = 1;
        $heading_en = $banner->fieldSingleValue('heading','en');
        $heading_ar = $banner->fieldSingleValue('heading','ar');
        $description_en = $banner->fieldSingleValue('description','en');
        $description_ar = $banner->fieldSingleValue('description','ar');
        $description_en_2 = $banner->fieldSingleValue('description2','en');
        $description_ar_2 = $banner->fieldSingleValue('description2','ar');
        $meta_description_en = $banner->fieldSingleValue('meta_description','en');
        $meta_description_ar = $banner->fieldSingleValue('meta_description','ar');
        $heading_en->update([
            'value'=>$data['heading_en']
        ]);
        $heading_ar->update([
            'value'=>$data['heading_ar']
        ]);
        $description_en->update([
            'value'=>$data['description_en']
        ]);
        $description_ar->update([
            'value'=>$data['description_ar']
        ]);

        if(is_null($description_en_2) && is_null($description_ar_2)){
            $data2 = [
                [
                    "field" => "description2",
                    "value" => $data['description_en_2'],
                    "locale" => "en",
                ],
                [
                    "field" => "description2",
                    "value" => $data['description_ar_2'],
                    "locale" => "ar",
                ],
            ];

            storeMultiValue($banner,$data2);
        }
        else{
            $description_en_2->update([
                'value'=>$data['description_en_2']
            ]);
            $description_ar_2->update([
                'value'=>$data['description_ar_2']
            ]);
        }


        $meta_description_en->update([
            'value'=>$data['meta_description_en']
        ]);
        $meta_description_ar->update([
            'value'=>$data['meta_description_ar']
        ]);
        $banner->slug = Str::slug($data['heading_en']);
        $banner->save();
        return redirect()->back()->withSuccess("Updated Successfully.");
    }
}
