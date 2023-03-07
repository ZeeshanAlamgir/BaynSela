<?php

namespace App\Http\Controllers\HomePage;
use App\Http\Controllers\Controller;
use App\Models\ProjectSection;
use App\Services\ProjectSectionService;
use Illuminate\Http\Request;

class ProjectSectionController extends Controller
{
    public $projectSec = null;
    public function __construct(ProjectSectionService $projectSec)
    {
        $this->projectSec = $projectSec;
    }

    public function projectView()
    {
        $projectSection = (new ProjectSection())::find(1);
        $projectSectionData['project_heading_en'] = $projectSection ? ($projectSection->fieldSingleValue('project_heading', 'en') ? $projectSection->fieldSingleValue('project_heading', 'en')->value : '') : '';
        $projectSectionData['project_heading_ar'] = $projectSection ? ($projectSection->fieldSingleValue('project_heading', 'ar') ? $projectSection->fieldSingleValue('project_heading', 'ar')->value : '') : '';
        $projectSectionData['project_description_en'] = $projectSection ? ($projectSection->fieldSingleValue('project_description', 'en') ? $projectSection->fieldSingleValue('project_description', 'en')->value : '') : '';
        $projectSectionData['project_description_ar'] = $projectSection ? ($projectSection->fieldSingleValue('project_description', 'ar') ? $projectSection->fieldSingleValue('project_description', 'ar')->value : '') : '';
        $projectSectionData['project_slug'] = $projectSection ? $projectSection->slug : '';
        $projectSectionData['project_image'] = $projectSection ? $projectSection->image : '';
        return view('app.admin-panel.home-page.project-section.index',compact('projectSectionData'));
    }

    public function updateProject(Request $request)
    {
        $this->validate($request,[
            'heading_en'    =>'required',
            'heading_ar'    =>'required',
            'description_en'    =>'required',
            'description_ar'    =>'required',
        ]);
        return $this->projectSec->updateProject($request->all());
        // return response()->json([$this->projectSec->updateProject($request->all()),'status'=>200]);
    }
}
