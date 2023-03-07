<?php

namespace App\Http\Controllers;

use App\Models\RegisterProjectDuration;
use App\Models\RegisterProjectType;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterUserController extends Controller
{
    public function register(Request $request)
    {
        try {
            $user = (new User())->where('email', $request->email)->first();
            if (is_null($user))
            {
                $user = (new User());
                $user->first_name = $request->input('first_name') ?? '';
                $user->last_name = $request->input('last_name') ?? '';
                $user->email = $request->input('email') ?? '';
                $user->password = Hash::make($request->input('password'));
                $user->is_admin = false;
                $user->phone_code = $request->input('phone_no_code') ?? '0';
                $user->phone = $request->input('phone') ?? '';
                $user->client_id = $request->input('client_id') ?? '0';
                $user->company_name = $request->input('company_name') ?? '';
                $user->country = $request->input('country') ?? '';
                $user->city = $request->input('city') ?? '';
                $user->industry = $request->input('industry') ?? '';
                $user->company_size = $request->input('company_size') ?? '';
                $user->annual_marketing_budget = $request->input('annual_marketing_budget') ?? '';
                $user->save();

                if(isset($request['project_duration']))
                {
                    foreach($request['project_duration'] as $duration)
                    {
                        RegisterProjectDuration::create([
                            'project_duration_id'   => $duration,
                            'user_id'   => $user->id,
                        ]);
                    }
                }

                if(isset($request['project_types']))
                {
                    foreach($request['project_types'] as $type)
                    {
                        RegisterProjectType::create([
                            'project_type_id'   => $type,
                            'user_id'   => $user->id,
                        ]);
                    }
                }
                Session::flash('created', '');
                return redirect()->route('login.view');
            }
            else
            {
                Session::flash('exists', '');
                return redirect()->route('signup');
            }
        } catch (Exception $ex) {
            Session::flash('exception', '');
            return redirect()->route('signup');
        }

    }
}
