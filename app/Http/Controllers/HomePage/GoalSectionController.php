<?php

namespace App\Http\Controllers\HomePage;

use App\Models\GoalSection;
use App\Services\UpdateGoalSectionService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGoalSectionRequest;
use App\Models\GoalSubSection;
use App\Models\Translations;
use Exception;
use Illuminate\View\View;

class GoalSectionController extends Controller
{
    public $goalService = null;
    public function __construct(UpdateGoalSectionService $goalService)
    {
        $this->goalService = $goalService;
    }
    public function goalSection()
    {
        $goalSection = (new GoalSection())->find(1);
        $goalSectionData['heading_en'] = $goalSection ? $goalSection->fieldSingleValue('heading', 'en')->value : '';
        $goalSectionData['heading_ar'] = $goalSection ? $goalSection->fieldSingleValue('heading', 'ar')->value : '';
        $goalSectionData['description_en'] = $goalSection ? $goalSection->fieldSingleValue('description', 'en')->value : '';
        $goalSectionData['description_ar'] = $goalSection ? $goalSection->fieldSingleValue('description', 'ar')->value : '';
        $goalSectionData['slug'] = $goalSection ? $goalSection->slug : '';
        $goalSectionData['image_en'] = $goalSection ? $goalSection->image_en : '';
        $goalSectionData['image_ar'] = $goalSection ? $goalSection->image_ar : '';
        $subGoal = GoalSubSection::get();
        return view('app.admin-panel.home-page.goal-section.index',compact(['goalSectionData', 'subGoal']));
    }

    public function updateGoalSection(StoreGoalSectionRequest $request)
    {

       return response()->json([$this->goalService->updateGoalSection($request->all()),200]);
    }

    public function goalView() : View
    {
        $subGoal = GoalSubSection::get();
        return view('app.admin-panel.home-page.goal-section.create',compact('subGoal'));
    }

    public function storeGoal(Request $request)
    {
        return response()->json([$this->goalService->storeGoal($id=null,$request->all()),'status'=>200]);
    }

    public function storeUpdateGoals(Request $request)
    {
        $this->validate($request, [
            'goals' => 'required|array',
        ]);
        try {
            $goals = $request->goals;

            $prev_goals = [];
                foreach ($request->goals as $key => $value) {
                    if(!is_null($value['sub_goal_id'])){
                        array_push($prev_goals,$value['sub_goal_id']);
                    }
                }

            $old_goals = (new GoalSubSection())->whereNotIn('id',$prev_goals)->get();

            foreach ($old_goals as $key => $value) {
                $value->multiValues()->delete();
                $value->delete();
            }

            foreach ($goals as $key => $value) {
                $id = $value['sub_goal_id'];
                if(!is_null($id)){
                    $sub_goal = (new GoalSubSection())->find($id);
                    $sub_goal->fieldSingleValue('sub_goal_heading', 'en')->update([
                        'value' => $value['goalheading_en']
                    ]);
                     $sub_goal->fieldSingleValue('sub_goal_heading', 'ar')->update([
                        'value' => $value['goalheading_ar']
                    ]);
                     $sub_goal->fieldSingleValue('sub_goal_description', 'en')->update([
                        'value' => $value['goaldescription_en']
                    ]);
                     $sub_goal->fieldSingleValue('sub_goal_description', 'ar')->update([
                        'value' => $value['goaldescription_ar']
                    ]);
                }
                else{
                    $sub_goal = (new GoalSubSection())->create();
                    $data =
                    [
                        [
                            "field" => 'sub_goal_heading',
                            "value" => $value['goalheading_en'],
                            "locale" => 'en'
                        ],
                        [
                            "field" => 'sub_goal_heading',
                            "value" => $value['goalheading_ar'],
                            "locale" => 'ar'
                        ],
                        [
                            "field" => 'sub_goal_description',
                            "value" => $value['goaldescription_en'],
                            "locale" => 'en'
                        ],
                        [
                            "field" => 'sub_goal_description',
                            "value" => $value['goaldescription_ar'],
                            "locale" => 'ar'
                        ]
                    ];

                    storeMultiValue($sub_goal, $data);
                }
            }

            return redirect()->route('homepage.goalsection')->withSuccess('Updated!');
        } catch (Exception $ex) {
            return redirect()->route('homepage.goalsection')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function updateSubGoal($id,Request $request)
    {
        return response()->json([$this->goalService->storeGoal($id,$request->all()),'status'=>202]);
    }

    public function deleteGoal($id)
    {
        // dd("df");
        return response()->json([$this->goalService->deleteSubGoal($id),'status'=>200]);
    }
}
