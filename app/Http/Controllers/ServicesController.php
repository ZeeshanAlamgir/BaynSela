<?php

namespace App\Http\Controllers;

use App\Mail\JoinMailSend;
use App\Models\Event;
use App\Models\EventFilter;
use App\Models\Filter;
use App\Models\Join;
use App\Models\OurClient;
use App\Models\OurNumber;
use App\Models\Partner;
use App\Models\PrivacyPolicy;
use App\Models\Project;
use App\Models\Service;
use App\Models\StorySection;
use App\Models\TermCondition;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ServicesController extends Controller
{
    public function ourServices(){


        $data = [
            'services' => (new Service())->all(),
        ];

        return view('app.front-end.our-services.our-services', compact(['data']));
    }

    public function ourServicesEventDetail($id){
        $event = (new Event())->find($id);
        if(!$event){
            return redirect()->back();
        }

        $data = [
            'event' => $event,
            'service' => $event->service
        ];
        return view('app.front-end.our-services.service-detail', compact(['data']));
    }


    public function ourNumbers(){
        $locale = LaravelLocalization::getCurrentLocale();
        $our_number_banner_section = OurNumber::first();
        $our_partner = (new Partner)->with('partnerImages')->get();
        $our_client = (new OurClient)->with('clientImages')->get();
        $our_project = (new Project())->select('image','id')->first();
        $data = [
            'banner_section'    => [
                'banner_section' => [
                    'our_number_heading' => $our_number_banner_section->fieldSingleValue('number_heading',$locale)->value,
                    'our_number_description' => $our_number_banner_section->fieldSingleValue('number_description',$locale)->value,
                    'image' => OurNumber::select('number_banner_section_image')->first()
                ],
                'section'   =>[
                    'who_we_are'    => [
                        'number_wwr_heading' => $our_number_banner_section->fieldSingleValue('number_wwr_heading',$locale)->value,
                        'number_wwr_description' => $our_number_banner_section->fieldSingleValue('number_wwr_description',$locale)->value,
                    ],
                    'what_we_do'    => [
                        'number_wwd_heading' => $our_number_banner_section->fieldSingleValue('number_wwd_heading',$locale)->value,
                        'number_wwd_description' => $our_number_banner_section->fieldSingleValue('number_wwd_description',$locale)->value,
                    ],
                    'number_ovp_heading'    => [
                        'number_ovp_heading' => $our_number_banner_section->fieldSingleValue('number_ovp_heading',$locale)->value,
                        'number_ovp_description' => $our_number_banner_section->fieldSingleValue('number_ovp_description',$locale)->value,
                    ],
                    'number_mo_heading'     => [
                        'number_mo_heading' => $our_number_banner_section->fieldSingleValue('number_mo_heading',$locale)->value,
                        'number_mo_description' => $our_number_banner_section->fieldSingleValue('number_mo_description',$locale)->value,
                    ],
                ],
            ],

            'story_section'    =>[
                'numbers' => (new StorySection())->select(['happy_partner','successful_projects','total_investments','year_of_exp'])->first(),
            ],
            'our_partners'  =>[
                'partner_heading'   => $our_partner[0]->fieldSingleValue('partner_heading',$locale)->value,
                'partner_description'   => $our_partner[0]->fieldSingleValue('partner_description',$locale)->value,
                'images'    => $our_partner[0]->partnerImages->toArray()
            ],
            'our_client'   =>[
                'client_heading'    => $our_client[0]->fieldSingleValue('client_heading',$locale)->value,
                'client_images'     => $our_client[0]->clientImages->toArray()
            ],
            'our_project'   => [
                'project_heading'   => $our_project->fieldSingleValue('project_heading',$locale)->value,
                'project_description'   => $our_project->fieldSingleValue('project_description',$locale)->value,
                'image'     => $our_project->image
            ]
        ];

        return view('app.front-end.our-numbers.our-numbers',compact('data'));
    }

    public function privacyPolicy()
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $privacyPolicy = PrivacyPolicy::first();
        $privacy_policy['heading'] = $privacyPolicy->fieldSingleValue('privacy_heading',$locale)->value;
        $privacy_policy['content'] = $privacyPolicy->fieldSingleValue('privacy_description',$locale)->value;
        return view('app.front-end.privacy-policy.privacy-policy',compact('privacy_policy'));
    }

    public function termsAndConditions()
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $terms_and_conditions = TermCondition::first();
        $terms_conditions['heading'] = $terms_and_conditions->fieldSingleValue('term_heading',$locale)->value;
        $terms_conditions['content'] = $terms_and_conditions->fieldSingleValue('term_description',$locale)->value;
        return view('app.front-end.terms-and-conditions.terms-and-conditions',compact('terms_conditions'));
    }

    public function ourServicesEvents(Request $request)
    {
        if($request->ajax())
        {
            try {
                $locale = LaravelLocalization::getCurrentLocale();
                $service_id = $request->service_id;
                $start_date = $request->start_date;
                $end_date = $request->end_date;
                $filter_ids_array = $request->filter_ids_array;
                $filter_value_ids_array = $request->filter_value_ids_array;
                $service = (new Service())->find($service_id);
                $events = [];
                $event_ids_array = [];

                if(!empty($filter_value_ids_array)){
                    foreach ($filter_value_ids_array as $key => $value) {
                        $event_filters = (new EventFilter())->where('filter_value_id', $value)->get();
                        foreach ($event_filters as $key2 => $value2) {
                            $event = (new Event())->where('deleted_at',null)->where('id',$value2->event_id)->first();
                            if(empty($start_date)){
                                if(isset($event))
                                {
                                    if(($event->service_id == $service_id) && (array_search($event->id,$event_ids_array) === false)){
                                        $data = [
                                            "id" => $event->id,
                                            "service_heading" => $service->fieldSingleValue('service_heading',$locale)->value,
                                            "title" => $event->fieldSingleValue('title',$locale)->value,
                                            "description" => ($event->fieldSingleValue('description',$locale) ? $event->fieldSingleValue('description',$locale)->value : '') ?? '',
                                            "image" => $event->images[0]->image,
                                        ];
                                        array_push($events,$data);
                                        array_push($event_ids_array,$event->id);
                                    }
                                }
                            }
                            else{

                                if(($event->start_date >= $start_date) && $event->end_date <= $end_date){

                                    if(($event->service_id == $service_id) && (array_search($event->id,$event_ids_array) === false)){
                                        $data = [
                                            "id" => $event->id,
                                            "service_heading" => $service->fieldSingleValue('service_heading',$locale)->value,
                                            "title" => $event->fieldSingleValue('title',$locale)->value,
                                            "description" => ($event->fieldSingleValue('description',$locale) ? $event->fieldSingleValue('description',$locale)->value : '') ?? '',
                                            "image" => $event->images[0]->image,
                                        ];
                                        array_push($events,$data);
                                        array_push($event_ids_array,$event->id);
                                    }
                                }
                            }
                        }

                    }
                }
                elseif(!empty($start_date)){
                    $all_events = (new Event())->where('service_id', $service->id)->where('start_date','>=',$start_date)->where('end_date','<=',$end_date)->get();
                    foreach ($all_events as $key => $value) {
                        $data = [
                            "id" => $value->id,
                            "service_heading" => $service->fieldSingleValue('service_heading',$locale)->value,
                            "title" => $value->fieldSingleValue('title',$locale)->value,
                            "description" => ($value->fieldSingleValue('description',$locale) ? $value->fieldSingleValue('description',$locale)->value : '') ?? '',
                            "image" => $value->images[0]->image,
                        ];
                        array_push($events,$data);
                    }
                }
                else{
                    $all_events = $service->events;
                    foreach ($all_events as $key => $value) {
                        $data = [
                            "id" => $value->id,
                            "service_heading" => $service->fieldSingleValue('service_heading',$locale)->value,
                            "title" => $value->fieldSingleValue('title',$locale)->value,
                            "description" => ($value->fieldSingleValue('description',$locale) ? $value->fieldSingleValue('description',$locale)->value : '')?? '',
                            "image" => $value->images[0]->image,
                        ];
                        array_push($events,$data);
                    }
                }
                return response()->json([
                    'status' => true,
                    'events' => $events,
                ]);

            } catch (Exception $ex) {
                return response()->json([
                    'status' => false,
                    'message' => $ex->getMessage()
                ]);
            }

        }
        return response()->json([
            'status' => false
        ]);
    }

    public function ourServicesFilters(Request $request){
        if($request->ajax()){
            try {
                $service_id = $request->id;
                if($service_id){
                    $filters = (new Filter())->where('service_id', $service_id)->select('id')->get();
                    return response()->json([
                        'status' => true,
                        'filters' => $filters,
                    ]);
                }

            } catch (Exception $ex) {
                return response()->json([
                    'status' => false,
                    'message' => $ex
                ]);
            }
        }
        return response()->json([
            'status' => false
        ]);
    }

    public function ourServicesFiltersData(Request $request){
        if($request->ajax()){
            try {
                $locale = LaravelLocalization::getCurrentLocale();
                $filter_id = $request->id;
                if($filter_id){
                    $filter = (new Filter())->find($filter_id);
                    $data = [];
                    $label = $filter->fieldSingleValue('label',$locale)->value;
                    $filter_values = $filter->filterValues;
                    $filter_values_array = [];
                    foreach ($filter_values as $key => $filter_value) {
                        $filter_value_label = $filter_value->fieldSingleValue('label',$locale)->value;
                        array_push($filter_values_array, [
                            'id' => $filter_value->id,
                            'filter_value_label' => $filter_value_label,
                        ]);
                    }
                    array_push($data,[
                        'label' => $label,
                        'filter_values_array' => $filter_values_array,
                    ]);

                    return response()->json([
                        'status' => true,
                        'data' => $data,
                    ]);
                }

            } catch (Exception $ex) {
                return response()->json([
                    'status' => false,
                    'message' => $ex
                ]);
            }
        }
        return response()->json([
            'status' => false
        ]);
    }

    public function loginUserJoinEvent(Request $request)
    {
        $event_id = (int)$request->input('event_id');
        $service_id = (int)$request->input('service_id');
        if(Auth::check())
        {
            $user=Auth::user();
            return response()->json([$this->storeEventData($user->first_name,$user->email,$message=null,$service_id,$event_id),'status'=>200]);
        }
        else
        {
            return response()->json(['status'=>201]);
        }
    }

    public function joinEvent(Request $request)
    {
        return response()->json([$this->storeEventData($request->name,$request->email,$request->message,$request->service_id,$request->event_id),'status'=>200]);

    }

    public function storeEventData($name=null,$email=null,$message,$service_id,$event_id)
    {
        (new Join())->create([
            'name'  => $name,
            'email'  => $email,
            'message'   => $message,
            'service_id'    => $service_id,
            'event_id'    => $event_id,
        ]);
        $join_event = Join::with(['service','event'])->first();
        $service = $join_event->service ? $join_event->service->fieldSIngleValue('service_heading','en')->value : '';
        $event = $join_event->event ? $join_event->event->fieldSIngleValue('title','en')->value : '';

        $mail_details = [
            'name' => $name,
            'email' => $email,
            'message' => $message,
            'service' => $service,
            'event' => $event,
            'joined_at' => date('d-m-Y', strtotime(Carbon::now())),
        ];
        $mail_address = env('MAIL_TO_ADDRESS');
        Mail::to($mail_address)->send(new JoinMailSend($mail_details));
        // return response()->json(['status'=>200]);
        // return redirect()->back()->withSuccess("Event Joined Successfully...");
    }

}
