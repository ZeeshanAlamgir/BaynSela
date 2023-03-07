<?php

namespace App\Http\Controllers\ProjectType;

use App\Http\Controllers\Controller;
use App\Interface\ProjectTypeInterface;
use App\Models\ProjectType;
use App\Models\RegisterProjectType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisterProjectTypeController extends Controller
{
    private $project_type;
    public function __construct(ProjectTypeInterface $project_interface)
    {
        $this->project_type = $project_interface;
    }

    public function index():View
    {
        $project_type = (new RegisterProjectType())->first();//find(1)
        $data['project_type_en'] = $project_type ? ($project_type->fieldSingleValue('project_type_heading','en') ? $project_type->fieldSingleValue('project_type_heading','en')->value : '') : '';
        $data['project_type_ar'] = $project_type ? ($project_type->fieldSingleValue('project_type_heading','ar') ? $project_type->fieldSingleValue('project_type_heading','ar')->value : '') : '';
        $projectTypes = (new ProjectType())->get();
        return view('app.admin-panel.project-type.index',compact(['data','projectTypes']));
    }

    public function update(Request $request)
    {
        return response()->json([$this->project_type->update($request->all()),'status'=>201]);
    }

    public function addOrUpdateProjectType(Request $request)
    {
        $this->validate($request, [
            'projectTypes' => 'required|array',
        ]);
        try {
            $project_types = $request->projectTypes;
            $new_projects_types = [];
                foreach ($request->projectTypes as $key => $value) {
                    if(!is_null((int)$value['project_type_id'])){
                        array_push($new_projects_types,$value['project_type_id']);
                    }
                }
            $old_project_types = (new ProjectType())->whereNotIn('id',$new_projects_types)->get();
            foreach ($old_project_types as $key => $value) {
                $value->multiValues()->delete();
                $value->delete();
            }

            foreach ($project_types as $key => $value) {
                $id = $value['project_type_id'];
                if(!is_null($id))
                {
                    $project_type = (new ProjectType())->find($id);
                    $project_type_en = $project_type->fieldSingleValue('reg_project_type', 'en');
                    $project_type_en->update([
                        'value' => $value['reg_project_type_en']
                    ]);
                    $project_type_ar = $project_type->fieldSingleValue('reg_project_type', 'ar');
                    $project_type_ar->update([
                        'value' => $value['reg_project_type_ar']
                    ]);
                }
                else{
                    $project_type = (new ProjectType())->create(['user_id'=>Auth::user()->id]);
                    $data =
                    [
                        [
                            "field" => 'reg_project_type',
                            "value" => $value['reg_project_type_en'],
                            "locale" => 'en'
                        ],
                        [
                            "field" => 'reg_project_type',
                            "value" => $value['reg_project_type_ar'],
                            "locale" => 'ar'
                        ]
                    ];

                    storeMultiValue($project_type, $data);
                }
            }

            return redirect()->route('project-type.index.project-type')->withSuccess('Updated!');
        } catch (Exception $ex) {
            return redirect()->route('project-type.index.project-type')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

}
