<?php

namespace App\Services;
use App\Traits\Image;
use App\Models\Review;
use App\Models\StoryImage;
use Illuminate\Support\Str;

use App\Models\StorySection;
use Illuminate\Support\Facades\File;

class UpdateStorySectionService
{

    use Image;
    // public $image1=null,$image2=null,$image3=null,$image4=null,$image5=null,$path = 'app-assets/images/story/';
    public function updateStorySection($data)
    {
        $story = (new StorySection())::find(1);
        $story->page_id = 1;
        $story_heading_en = $story->fieldSingleValue('story_heading','en');
        $story_heading_ar = $story->fieldSingleValue('story_heading','ar');
        $story_description_en = $story ? $story->fieldSingleValue('story_description','en') : '';
        $story_description_ar = $story ? $story->fieldSingleValue('story_description','ar') : '';
        $story_heading_en->update([
            'value'=>$data['story_heading_en']
        ]);
        $story_heading_ar->update([
            'value'=>$data['story_heading_ar']
        ]);

        $story_description_en->update([
            'value'=>$data ? $data['story_description_en'] : ''
        ]);
        $story_description_ar->update([
            'value'=>$data ? $data['story_description_ar'] : ''
        ]);
        $story->slug = 'Story-Section';
        $story_section= StorySection::find(1);
        $story_section->happy_partner = ($data['happy_partner']);
        $story_section->successful_projects = ($data['successful_projects']);
        $story_section->total_investments = ($data['total_investments']);
        $story_section->year_of_exp = ($data['year_of_exp']);
        $story_section->save();
    }

}
