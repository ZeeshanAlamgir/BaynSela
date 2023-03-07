<?php

namespace App\Http\Controllers;

use App\Models\AboutSection;
use App\Models\Event;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LogoutResponse;

class DashboardController extends Controller
{
    public function dashboard(Request $request){
        
        $users = User::count();
        $services=Service::count();
        $events=Event::count();
        $data=[
            'Users'=>$users,
            'Services'=>$services,
            'Events'=>$events,
        ];
        $graphdata_keys = array_keys($data); 
        $graphdata_values = array_values($data);
        return view('app.dashboard', [
            'data' => $data,
            'graphdata_keys' => $graphdata_keys,
            'graphdata_values' => $graphdata_values
        ]);
    }
    public function cacheFlush(Request $request){
        cache()->flush();
        return redirect()->back()->withSuccess('Site cache refreshed.');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return app(LogoutResponse::class);
    }
}