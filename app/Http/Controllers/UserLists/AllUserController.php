<?php

namespace App\Http\Controllers\UserLists;

use App\DataTables\UserListDataTable;
use App\Http\Controllers\Controller;
use App\Interface\StoreUserInterface;
use App\Models\ProjectDuration;
use App\Models\ProjectType;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;


class AllUserController extends Controller
{

    protected $user = '';
    public function __construct(StoreUserInterface $storeUserInterface)
    {
        $this->user = $storeUserInterface;
    }

    public function allUsers(UserListDataTable $userListDataTable)
    {
        return $userListDataTable->render('app.admin-panel.users.index');
    }

    public function create() :View
    {
        $data = $this->getProjectTypesAndDurations();
        $is_password = true;
        return view('app.admin-panel.users.create',compact('data','is_password'));
    }

    public function store(Request $request, $id=null)
    {
        $this->validate($request,[
            'first_name'  => 'required',
            'last_name'  => 'required',
            'email'  => 'required|email',
            'confirm_email'  => 'required|same:email',
            'user_password'  => 'required|min:6',
            'confirm_password'  => 'required|same:user_password',
            'phone'  => 'required',
            'phone'  => 'required',
            'project_type_id'   => 'required',
            'project_duration_id'   => 'required',
        ]);
        
        return $this->user->storeOrUpdate($request->all(), $id=null);

    }

    public function getUserDetails($id)
    {
        $type_ids = [];
        $duration_ids = [];
        $id = decryptParams($id);
        $user = (new User())->with('regProjectType','regProjectDuration')->find($id);
        $data = $this->getProjectTypesAndDurations();
        $is_password = false;
        foreach($user->regProjectType as $key=>$project_type)
            array_push($type_ids,(new ProjectType())->where('id',$project_type->project_type_id)->pluck('id')->first());

        foreach($user->regProjectDuration as $key=>$project_duration)
            array_push($duration_ids,(new ProjectDuration())->where('id',$project_duration->project_duration_id)->pluck('id')->first());
 
        return view('app.admin-panel.users.edit',compact('user','id','type_ids','duration_ids','data','is_password'));
    }

    public function updateUser(Request $request, $id)
    {
        $this->validate($request,[
            'first_name'  => 'required',
            'last_name'  => 'required',
            'email'  => 'required_if:user_id,0|email',
            'confirm_email'  => 'required_if:user_id,0|email',
            'password'  => 'required_if:user_id,0',
            'confirm_password'  => 'required_if:user_id,0',
            'phone'  => 'required',
            'phone'  => 'required',
            'project_type_id'   => 'required',
            'project_duration_id'   => 'required',
        ]);
        try
        {
            $this->user->storeOrUpdate($request->all(), $id);
            return redirect()->route('user-list.users.index')->withSuccess('User Updated!');
        }
        catch(Exception $ex)
        {
            return redirect()->back()->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function getProjectTypesAndDurations()
    {
        $proj_types_arr = [];
        $proj_durations_arr = [];

        $project_types = ProjectType::with('multiValues')->get();
        foreach ($project_types as $key => $project_type) 
        {
            foreach($project_type->multiValues as $multiValue)
            {
                array_push($proj_types_arr, [
                    'types'=>$multiValue->where('field','reg_project_type')->where('locale','en')->get()->pluck('value','transable_id')
                ]);
            }
        }

        $project_durations = ProjectDuration::with('multiValues')->get();
        foreach ($project_durations as $key => $project_duration) 
        {
            foreach($project_duration->multiValues as $multiValue)
            {
                array_push($proj_durations_arr, [
                    'durations'=>$multiValue->where('field','reg_project_duration')->where('locale','en')->get()->pluck('value','transable_id')
                ]);
            }
        }
        $data = [
            'project_types' =>  $proj_types_arr[0],
            'project_durations' =>  $proj_durations_arr[0]
        ];
        return $data;
    }
}
