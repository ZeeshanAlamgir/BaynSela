<?php

namespace App\Services;
use App\Models\AboutSection;
class UpdateAboutSectionService
{
    public function updateAboutSection($data)
    {
        $about = (new AboutSection())::find(1);
        $about->page_id = 1;
        $about->order = 1;
        $about_heading_en = $about->fieldSingleValue('about_heading','en');
        $about_heading_ar = $about->fieldSingleValue('about_heading','ar');
        $about_description_en = $about->fieldSingleValue('about_description','en');
        $about_description_ar = $about->fieldSingleValue('about_description','ar');
        $about_heading_en->update([
            'value'=>$data['about_heading_en']
        ]);
        $about_heading_ar->update([
            'value'=>$data['about_heading_ar']
        ]);
        $about_description_en->update([
            'value'=>$data ? $data['about_description_en'] : ''
        ]);
        $about_description_ar->update([
            'value'=>$data ? $data['about_description_ar'] : ''
        ]);
        $about->slug = "About-Section";
        $about->save();
    }

}
