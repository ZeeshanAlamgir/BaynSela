<?php

namespace App\Http\Controllers\ProjectDuration;

use App\Http\Controllers\Controller;
use App\Interface\ProjectDurationInterface;
use App\Models\ProjectDuration;
use App\Models\RegisterProjectDuration;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class RegisterProjectDurationController extends Controller
{
    private $project_duration;
    public function __construct(ProjectDurationInterface $project_duration_interface)
    {
        $this->project_duration = $project_duration_interface;
    }

    public function index():View
    {
        $project_duration = (new RegisterProjectDuration())->first();//find(1)
        $data['project_duration_en'] = $project_duration ? ($project_duration->fieldSingleValue('project_duration_heading','en') ? $project_duration->fieldSingleValue('project_duration_heading','en')->value : '') : '';
        $data['project_duration_ar'] = $project_duration ? ($project_duration->fieldSingleValue('project_duration_heading','ar') ? $project_duration->fieldSingleValue('project_duration_heading','ar')->value : '') : '';
        $project_durations = (new ProjectDuration())->get();
        // dd(($data['project_duration_en']));
        return view('app.admin-panel.project-duration.index',compact(['data','project_durations']));
    }

    public function update(Request $request)
    {
        return response()->json([$this->project_duration->update($request->all()),'status'=>201]);
    }

    public function addOrUpdateProjectDuration(Request $request)
    {
        $this->validate($request, [
            'projectDurations' => 'required|array',
        ]);
        try {
            $projectDurations = $request->projectDurations;
            $new_projects_durations = [];
                foreach ($request->projectDurations as $key => $value) {
                    if(!is_null((int)$value['project_duration_id'])){
                        array_push($new_projects_durations,$value['project_duration_id']);
                    }
                }
            $old_project_durations = (new ProjectDuration())->whereNotIn('id',$new_projects_durations)->get();
            foreach ($old_project_durations as $key => $value) {
                $value->multiValues()->delete();
                $value->delete();
            }

            foreach ($projectDurations as $key => $value) {
                $id = $value['project_duration_id'];
                if(!is_null($id))
                {
                    $project_duration = (new ProjectDuration())->find($id);
                    $project_duration_en = $project_duration->fieldSingleValue('reg_project_duration', 'en');
                    $project_duration_en->update([
                        'value' => $value['reg_project_duration_en']
                    ]);
                    $project_duration_ar = $project_duration->fieldSingleValue('reg_project_duration', 'ar');
                    $project_duration_ar->update([
                        'value' => $value['reg_project_duration_ar']
                    ]);
                }
                else{
                    $project_duration = (new ProjectDuration())->create(['user_id'=>Auth::user()->id]);
                    $data =
                    [
                        [
                            "field" => 'reg_project_duration',
                            "value" => $value['reg_project_duration_en'],
                            "locale" => 'en'
                        ],
                        [
                            "field" => 'reg_project_duration',
                            "value" => $value['reg_project_duration_ar'],
                            "locale" => 'ar'
                        ]
                    ];

                    storeMultiValue($project_duration, $data);
                }
            }

            return redirect()->route('project-duration.index.project-duration')->withSuccess('Updated!');
        } catch (Exception $ex) {
            return redirect()->route('project-duration.index.project-duration')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }
}
