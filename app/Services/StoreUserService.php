<?php

namespace App\Services;

use App\Interface\StoreUserInterface;
use App\Models\ProjectDuration;
use App\Models\ProjectType;
use App\Models\RegisterProjectDuration;
use App\Models\RegisterProjectType;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreUserService implements StoreUserInterface
{
    public function storeOrUpdate(array $data, $id=null)
    {
            $user_exists = (new User())->where('email',$data['email'])->get();
            if(count($user_exists)>0)
            {
                return redirect()->back()->withInput($data)->withDanger('User Email Already Exists!');
            }
            else
            {
                $user = new User();
                $user->first_name = $data['first_name'] ?? '';
                $user->last_name = $data['last_name'] ?? '';
                $user->email = isset($data['email']) ? $data['email'] : $user->email;
                $user->password = isset($data['user_password']) ? Hash::make($data['user_password']) : $user->password;
                $user->phone = $data['phone'] ?? 0;
                $user->client_id = $data['client_id'] ?? 0;
                $user->company_name = $data['company_name'] ?? '';
                $user->country = $data['country'] ?? '';
                $user->city = $data['city'] ?? '';
                $user->industry = $data['industry'] ?? '';
                $user->company_size = $data['company_size'] ?? 0;
                $user->annual_marketing_budget = $data['annual_marketing_budget'] ?? 0;
                $user->save();

                if(isset($data['project_type_id']))
                {
                    foreach($user->regProjectType as $reg_project_type)
                        $reg_project_type->delete();
                    foreach($data['project_type_id'] as $project_type)
                    {
                        (new RegisterProjectType())->create([
                            'project_type_id'   => (int)$project_type,
                            'user_id'   => (int)$user->id
                        ]);
                    }
                }

                if(isset($data['project_duration_id']))
                {
                    foreach($user->regProjectDuration as $reg_project_duration)
                        $reg_project_duration->delete();
                    foreach($data['project_duration_id'] as $project_duration)
                    {
                        (new RegisterProjectDuration())->create([
                            'project_duration_id'   => (int)$project_duration,
                            'user_id'   => (int)$user->id
                        ]);
                    }
                }
                return redirect()->route('user-list.users.index')->withSuccess('User Created!');
            }    
       
    }
        
}
