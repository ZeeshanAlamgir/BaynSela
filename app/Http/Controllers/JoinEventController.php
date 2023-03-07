<?php

namespace App\Http\Controllers;

use App\Models\Join;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JoinEventController extends Controller
{
    public function index(Request $request)
    {
        // $join = (new Join())->with(['service','event'])->get();
        // dd($join[0]->service->fieldSIngleValue('service_heading','en')->value);
        if($request->ajax())
        {
            $join_events = (new Join())->with(['service','event'])->get();
            // dd($join_events);
            return Datatables::of($join_events)
                ->addIndexColumn()
                ->editColumn('check', function ($row) {
                    return $row;
                })
                ->addColumn('service', function ($row) { 
                    return $row->service ? $row->service->fieldSIngleValue('service_heading','en')->value : '';
                })
                ->addColumn('event', function ($row) { 
                    return $row->event ? $row->event->fieldSIngleValue('title','en')->value : '';
                })
                ->editColumn('join_at', function ($row) {
                    return editDateColumn($row->created_at);
                })
                ->rawColumns(['event','service','join_at'])
                ->make(true);
        }
        return view('app.admin-panel.events.index');
    }
}
