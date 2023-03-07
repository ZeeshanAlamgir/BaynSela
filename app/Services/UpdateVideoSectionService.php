<?php

namespace App\Services;

use App\Models\VideoSection;
use App\Models\Translations;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Traits\Image;

class UpdateVideoSectionService
{
    use Image;
    public $image=null,$path = 'app-assets/images/video/';
    public function updateVideoSection($data)
    {
        $video = (new VideoSection())::find(1);
        try {
            if($data['image'] != null)
            {
                File::delete($this->path.$video->image);
                $this->image = $this->imageStore($this->path,$data['image']);
            }
            else

                $this->image = $video->image;

        } catch (\Exception $ex) {
            $this->image = $video->image;
        }
        $video->image = $this->image;
        $video->video_url = $data['video_url'];
        $video->page_id = 1;
        $video->order = 1;
        $heading_en = $video->fieldSingleValue('heading','en') ?? '';
        $heading_ar = $video->fieldSingleValue('heading','ar') ?? '';
        $description_en = $video ? $video->fieldSingleValue('description','en') : '';
        $description_ar = $video ? $video->fieldSingleValue('description','ar') : '';

        $heading_en->update([
            'value'=>$data['heading_en']
        ]);
        $heading_ar->update([
            'value'=>$data['heading_ar']
        ]);
        $description_en->update([
            'value'=>$data ? $data['description_en'] : ''
        ]);
        $description_ar->update([
            'value'=>$data ? $data['description_ar'] : ''
        ]);
        $video->slug = Str::slug($data['heading_en']);
        $video->save();
        return redirect()->back()->withSuccess("Updated Successfully.");
    }
}
