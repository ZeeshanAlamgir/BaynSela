<?php

namespace App\Http\Controllers;

use App\Mail\PasswordResetMail;
use App\Models\ProjectDuration;
use App\Models\ProjectType;
use App\Models\ResetPassword;
use App\Models\Translations;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AuthController extends Controller
{
    public function login(){
        return view('app.front-end.auth.login');
    }

    public function signup(){
        $locale = LaravelLocalization::getCurrentLocale();
        $project_types = (new ProjectType())->all();
        $project_type_data = [];
        foreach ($project_types as $key => $value)
        {
            array_push($project_type_data, [
                'project_type_id'    => $value->id,
                "value" =>  $value->fieldSingleValue('reg_project_type', $locale),
            ]);
        }
        $project_durations = (new ProjectDuration())->all();
        $project_duration_data = [];
        foreach ($project_durations as $key => $value)
        {
            array_push($project_duration_data, [
                'project_duration_id'   => $value->id,
                "value" =>  $value->fieldSingleValue('reg_project_duration', $locale),
            ]);
        }
        $data = [
            'project_types' => $project_type_data,
            'project_durations' => $project_duration_data
        ];
        return view('app.front-end.auth.signup',compact('data'));
    }

    public function forgotPassword(){
        return view('auth.forgot-password');
    }

    public function passwordResetMail(Request $request){

        if($request->ajax()){

            $locale = LaravelLocalization::getCurrentLocale();

            $email = $request->email;

            $user = (new User())->where('email', $email)->first();

            if($user){

                $reset_password = (new ResetPassword())->where('user_id', $user->id)->first();

                if($reset_password){
                    $reset_password->delete();
                }

                $key = $this->generateKey();

                (new ResetPassword())->create([
                    'user_id' => $user->id,
                    'key' => $key
                ]);

                $mail_details = [
                    'name' => $user->first_name . ' ' . $user->last_name,
                    'key' => encryptParams($key),
                ];

                Mail::to($email)->send(new PasswordResetMail($mail_details));

                return response()->json([
                    'status' => true,
                ]);
            }
            else{
                return response()->json([
                    'status' => false,
                    'message' => $locale == 'ar' ? 'لا يوجد سجلات. الرجاء التسجيل أولا.' : 'No record found. Please signup first.'
                ]);
            }

        }

    }

    private function generateKey(){

        $key = rand(8, 10);

        $reset_password = (new ResetPassword())->where('key', $key)->first();

        if($reset_password){
            $this->generateKey();
        }
        else{
            return $key;
        }
    }

    public function passwordResetLink(Request $request, $key){
        try {
            $d_key = decryptParams($key);
            $reset_password = (new ResetPassword())->where('key', $d_key)->first();
            if($reset_password){
                $data = $key;
                return view('auth.reset-password')->with('data', $data);
            }

        } catch (Exception $ex) {
            return view('auth.reset-password');
        }
    }

    public function resetPassword(Request $request){
        if($request->ajax()){
            try {
                $key = decryptParams($request->data);
                $reset_password = (new ResetPassword())->where('key', $key)->first();
                if($reset_password){
                    $user = (new User())->find($reset_password->user_id);
                    if($user){
                        $user->password = Hash::make($request->new_password);
                        $user->save();
                        $reset_password->delete();
                        return response()->json([
                            'status' => true,
                        ]);
                    }
                }
                return response()->json([
                    'status' => false,
                ]);
            } catch (Exception $e) {
                return response()->json([
                    'status' => false,
                ]);
            }
        }
    }
}
