<?php

namespace App\Services;

use App\Models\GoalSection;
use App\Models\GoalSubSection;
use App\Models\Translations;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Traits\Image;

class UpdateGoalSectionService
{
    use Image;
    public $image_en=null,$image_ar=null, $path = 'app-assets/images/goalsection/',$goals_data = [];

    public function updateGoalSection($data)
    {

        $goalSection = (new GoalSection())::find(1);
        try {
            if($data['image_en'] && $data['image_ar'] != null)
            {
                File::delete($this->path.$goalSection->image_en);
                File::delete($this->path.$goalSection->image_ar);

                $this->image_en = $this->imageStore($this->path,$data['image_en']);
                $this->image_ar = $this->imageStore($this->path,$data['image_ar']);
                // dd($this->image_ar);
            }
            else{
                $this->image_en = $goalSection->image_en;
                $this->image_ar = $goalSection->image_ar;
            }

        } catch (\Exception $ex) {
            $this->image_en = $goalSection->image_en;
            $this->image_ar = $goalSection->image_ar;

        }
        $goalSection->image_en = $this->image_en;
        $goalSection->image_ar = $this->image_ar;

        $goalSection->page_id = 1;
        $goalSection->order = 1;
        $heading_en = $goalSection->fieldSingleValue('heading','en');
        $heading_ar = $goalSection->fieldSingleValue('heading','ar');
        $description_en = $goalSection->fieldSingleValue('description','en');
        $description_ar = $goalSection->fieldSingleValue('description','ar');
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
        $goalSection->slug = Str::slug($data['heading_en']);
        $goalSection->save();
    }

    public function storeGoal($id=null,array $data)
    {
        // dd($data);
        if(is_null($id))
        {
            $goal_data = $data['goals'];
            foreach($goal_data as $goals)
            {
                $data =
                [
                    [
                        "field" => 'sub_goal_heading',
                        "value" => $goals['goalheading_en'],
                        "locale" => 'en'
                    ],
                    [
                        "field" => 'sub_goal_heading',
                        "value" => $goals['goalheading_ar'],
                        "locale" => 'ar'
                    ],
                    [
                        "field" => 'sub_goal_description',
                        "value" => $goals['goaldescription_en'],
                        "locale" => 'en'
                    ],
                    [
                        "field" => 'sub_goal_description',
                        "value" => $goals['goaldescription_ar'],
                        "locale" => 'ar'
                    ]
                ];
                $goalsubsection = (new GoalSubSection())->create();
                storeMultiValue($goalsubsection, $data);
            }
        }
        else
        {
            // $sub_goal = Translations::where('transable_type','App\Models\GoalSubSection')->get();
            // dd($sub_goal);
        }
    }

    public function deleteSubGoal($id)
    {
        Translations::where('transable_type','App\Models\GoalSubSection')->where('transable_id',$id)->delete();
        GoalSubSection::where('id',$id)->delete();
    }
}
