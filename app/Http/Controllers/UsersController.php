<?php

namespace App\Http\Controllers;

use App\Models\ProjectDuration;
use App\Models\ProjectType;
use App\Models\RegisterProjectDuration;
use App\Models\RegisterProjectType;
use App\Models\Translations;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class UsersController extends Controller
{
    public function dashboard(){
        return view('app.front-end.user.dashboard');
    }

    public function profile(){
        $user = Auth::user();
        $locale = 'Mcamara\LaravelLocalization\Facades\LaravelLocalization'::getCurrentLocale();
        $project_type_id = RegisterProjectType::where('user_id',$user['id'])->get()->unique();
        $project_duration_id = RegisterProjectDuration::where('user_id',$user['id'])->get();

        if(Auth::check()==true && $user->is_admin==false)
        {
            return view('app.front-end.user.profile',compact('user','project_type_id','project_duration_id'));
        }
        else
            return redirect()->route('home');

    }

    public function updateProfile($id)
    {
        $locale = LaravelLocalization::getCurrentLocale();

        $project_type_array = [];
        $user_project_type_array = [];

        $project_duration_array = [];
        $user_project_duration_array = [];

        $user = (new User())->find($id);
        $user_project_types = RegisterProjectType::where('user_id',$user['id'])->get();
        $user_project_durations = RegisterProjectDuration::where('user_id',$user['id'])->get();

        foreach($user_project_types as $user_types)
        {
            array_push($user_project_type_array,$user_types->project_type_id);
        }

        foreach($user_project_durations as $user_durations)
        {
            array_push($user_project_duration_array,$user_durations->project_duration_id);
        }

        $project_types = (new ProjectType())->all();
        $project_durations = (new ProjectDuration())->all();

        foreach($project_types as $project_type)
        {
            array_push($project_type_array,[
                'project_type_id'    => $project_type->id,
                'value' => $project_type->fieldSingleValue('reg_project_type', $locale),
            ]);
        }

        foreach ($project_durations as $key => $project_duration)
        {
            array_push($project_duration_array, [
                'project_duration_id'   => $project_duration->id,
                "value" =>  $project_duration->fieldSingleValue('reg_project_duration', $locale),
            ]);
        }


        $data = [
            'project_types' => $project_type_array,
            'user_types_id' => $user_project_type_array,
            'project_durations' => $project_duration_array,
            'user_duration_id'  => $user_project_duration_array,
            'phone_code'    => $user->phone_code
        ];


        return view('app.front-end.user.update-profile',compact('user','data'));
    }

    public function updateUserProfile($id,Request $request)
    {
        $user = (new User())->find($id);
        $old_project_types = RegisterProjectType::where('user_id',$id)->get();
        $old_project_durations = RegisterProjectDuration::where('user_id',$id)->get();

        if(!$user || $user!=null)
        {
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            // $user->phone = $request->input('phone');
            // $user->email = $request->input('email');
            $user->company_name = $request->input('company_name');
            $user->country = $request->input('country');
            $user->city = $request->input('city');
            $user->industry = $request->input('industry');
            $user->company_size = $request->input('company_size');
            $user->annual_marketing_budget = $request->input('annual_marketing_budget');
            $user->update();
            foreach($old_project_durations as $old_duration)
            {
                $old_duration->delete();
            }
            if(isset($request['project_duration']))
            {
                foreach($request['project_duration'] as $duration)
                {
                    (new RegisterProjectDuration())->create([
                        'project_duration_id'   => $duration,
                        'user_id'   => $user->id,
                    ]);
                }
            }

            foreach($old_project_types as $old_type)
            {
                $old_type->delete();
            }
            if(isset($request['project_type']))
            {
                foreach($request['project_type'] as $type)
                {
                    (new RegisterProjectType())->create([
                        'project_type_id'   => $type,
                        'user_id'   => $user->id,
                    ]);
                }
            }

            return response()->json([
                'status'    => 201
            ]);
        }
    }
}
