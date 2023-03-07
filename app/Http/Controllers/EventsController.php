<?php

namespace App\Http\Controllers;

use App\DataTables\EventsDataTable;
use App\Models\Event;
use App\Models\EventFilter;
use App\Models\EventImage;
use App\Models\EventNumber;
use App\Models\EventPartnership;
use App\Models\Filter;
use App\Models\FilterValue;
use App\Models\ImageMap;
use App\Models\ImageMapLoad;
use App\Models\PartnershipItem;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class EventsController extends Controller
{
    public function index(EventsDataTable $eventsDataTable, $id){
        $data = [
            'id' => decryptParams($id),
        ];
        $service = (new Service())->find(decryptParams($id));
        return $eventsDataTable->with($data)->render('app.admin-panel.service-events.index', ['id' => $id, 'service' => $service]);
    }

    public function destroySelected(Request $request, $serviceId)
    {
        try {
            if ($request->has('chkData')) {

                (new Event())->whereIn('id', $request->chkData)->delete();

                return redirect()->route('services.events.index', ['id' => $serviceId])->withSuccess('Data deleted!');
            } else {
                return redirect()->route('services.events.index', ['id' => $serviceId])->withWarning('Please select at least one item!');
            }
        } catch (Exception $ex) {
            return redirect()->route('services.events.index', ['id' => $serviceId])->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'service_id' => 'required|exists:services,id',
            "location" => 'required|string',
            "logo" => "required|file",
            "title_en" => "required|string",
            "title_ar" => "required|string",
            "description_en" => "required|string",
            "description_ar" => "required|string",
            "about_en" => "required|string",
            "about_ar" => "required|string",
            "number" => "required|sometimes|array",
            "label_en" => "required|sometimes|array",
            "label_ar" => "required|sometimes|array",
            "gallery" => "required|array",
            "partnership_title_en" => "required|sometimes|array",
            "partnership_title_ar" => "required|sometimes|array",
            "partnership_description_en" => "required|sometimes|array",
            "partnership_description_ar" => "required|sometimes|array",
            "popup_description_en" => "required|sometimes|array",
            "popup_description_ar" => "required|sometimes|array",
        ]);

        try {

            $file = $request->file('logo');
            $name = $file->getClientOriginalName();
            $new_name = time() . '.' . $name;
            $destinationPath = public_path('app-assets/images/services/events/logo');
            $file->move($destinationPath, $new_name);

            $event = (new Event())->create([
                'service_id' => $request->service_id,
                'location' => $request->location,
                'logo' => $new_name
            ]);

            if ($event) {
                $data =
                    [
                        [
                            "field" => 'title',
                            "value" => $request->title_en,
                            "locale" => 'en'
                        ],
                        [
                            "field" => 'title',
                            "value" => $request->title_ar,
                            "locale" => 'ar'
                        ],
                        [
                            "field" => 'description',
                            "value" => $request->description_en,
                            "locale" => 'en'
                        ],
                        [
                            "field" => 'description',
                            "value" => $request->description_ar,
                            "locale" => 'ar'
                        ],
                        [
                            "field" => 'about',
                            "value" => $request->about_en,
                            "locale" => 'en'
                        ],
                        [
                            "field" => 'about',
                            "value" => $request->about_ar,
                            "locale" => 'ar'
                        ]
                    ];

                storeMultiValue($event, $data);

                //Numbers
                if ($request->has('number')) {
                    foreach ($request->number as $key => $value) {
                        $number = (new EventNumber())->create([
                            'event_id' => $event->id,
                            'number' => $value
                        ]);
                        if ($number) {
                            $data =
                                [
                                    [
                                        "field" => 'label',
                                        "value" => $request->label_en[$key],
                                        "locale" => 'en'
                                    ],
                                    [
                                        "field" => 'label',
                                        "value" => $request->label_ar[$key],
                                        "locale" => 'ar'
                                    ],
                                ];

                            storeMultiValue($number, $data);
                        }
                    }
                }


                //Gallery
                $files = $request->file('gallery');
                foreach ($files as $key => $file) {
                    $name = $file->getClientOriginalName();
                    $new_name = time() . '.' . $name;
                    $destinationPath = public_path('app-assets/images/services/events/gallery');
                    $file->move($destinationPath, $new_name);

                    (new EventImage())->create([
                        'event_id' => $event->id,
                        'image' => $new_name
                    ]);
                }


                //Partnerships
                if ($request->has('partnership_title_en')) {
                    foreach ($request->partnership_title_en as $key => $value) {
                        $partnership = (new EventPartnership())->create([
                            'event_id' => $event->id
                        ]);
                        if ($partnership) {
                            $data =
                                [
                                    [
                                        "field" => 'title',
                                        "value" => $value,
                                        "locale" => 'en'
                                    ],
                                    [
                                        "field" => 'title',
                                        "value" => $request->partnership_title_ar[$key],
                                        "locale" => 'ar'
                                    ],
                                    [
                                        "field" => 'description',
                                        "value" => $request->partnership_description_en[$key],
                                        "locale" => 'en'
                                    ],
                                    [
                                        "field" => 'description',
                                        "value" => $request->partnership_description_ar[$key],
                                        "locale" => 'ar'
                                    ],
                                    [
                                        "field" => 'popup_description',
                                        "value" => $request->popup_description_en[$key],
                                        "locale" => 'en'
                                    ],
                                    [
                                        "field" => 'popup_description',
                                        "value" => $request->popup_description_ar[$key],
                                        "locale" => 'ar'
                                    ],
                                ];

                            storeMultiValue($partnership, $data);

                            if ($request['item_title_en_' . $key]) {
                                $items_data = $request['item_title_en_' . $key];
                                if($items_data){
                                    foreach ($items_data as $key2 => $value2) {
                                        $item = (new PartnershipItem())->create([
                                            'event_partnership_id' => $partnership->id
                                        ]);
                                        if ($item) {
                                            $data =
                                                [
                                                    [
                                                        "field" => 'title',
                                                        "value" => $request['item_title_en_' . $key][$key2],
                                                        "locale" => 'en'
                                                    ],
                                                    [
                                                        "field" => 'title',
                                                        "value" => $request['item_title_ar_' . $key][$key2],
                                                        "locale" => 'ar'
                                                    ],
                                                    [
                                                        "field" => 'description',
                                                        "value" => $request['item_description_en_' . $key][$key2],
                                                        "locale" => 'en'
                                                    ],
                                                    [
                                                        "field" => 'description',
                                                        "value" => $request['item_description_ar_' . $key][$key2],
                                                        "locale" => 'ar'
                                                    ],
                                                ];

                                            storeMultiValue($item, $data);
                                        }
                                    }
                                }

                            }
                        }
                    }
                }

                //Filters
                $service = (new Service())->find($request->service_id);
                $filters = $service->filters;
                // $filters = $request->filters;
                if ($filters) {
                    foreach ($filters as $key => $filter) {
                        $filter_value = $filter->filterValues()->get()->first();
                        (new EventFilter())->create([
                            'event_id' => $event->id,
                            'filter_id' => $filter->id,
                            'filter_value_id' => $filter_value->id,
                        ]);
                    }
                }

                //Image Maps

                //OLD
                // $maps = $request->scripts;
                // if ($maps) {
                //     foreach ($maps as $key => $value) {
                //         (new ImageMap())->create([
                //             'event_id' => $event->id,
                //             'script' => $value
                //         ]);
                //     }
                // }

                //NEW
                // $event->maps()->detach();
                $map_loads = $request->map_loads;
                if($map_loads){
                    $event->maps()->sync($map_loads);
                }

            }

            return redirect()->route('services.index')->withSuccess('New Service Added!');
        } catch (Exception $ex) {
            return redirect()->route('services.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function update(Request $request)
    {

        $this->validate($request, [
            'event_id' => 'required|exists:events,id',
            "location" => 'required|string',
            "logo" => "required|file",
            "title_en" => "required|string",
            "title_ar" => "required|string",
            "description_en" => "required|string",
            "description_ar" => "required|string",
            "about_en" => "required|string",
            "about_ar" => "required|string",
            "gallery" => "required|array",
            'date' => 'required_if:date_filter,true'
        ],[
            "date" => "The date field is required"
        ]);

        try {

            $event = (new Event())->find($request->event_id);

            if ($event) {
                $file = $request->file('logo');
                $name = $file->getClientOriginalName();
                $prev_name = $event->logo;
                if ($name != $prev_name) {
                    $destinationPath = public_path('app-assets/images/services/events/logo/' . $prev_name);
                    if (File::exists($destinationPath)) {
                        $deleted = File::delete($destinationPath);
                    }
                    $new_name = time() . '.' . $name;
                    $destinationPath = public_path('app-assets/images/services/events/logo');
                    $file->move($destinationPath, $new_name);
                    $event->logo = $new_name;
                }

                $event->location = $request->location;

                $event->fieldSingleValue('title', 'en')->update([
                    'value' => $request->title_en
                ]);

                $event->fieldSingleValue('title', 'ar')->update([
                    'value' => $request->title_ar
                ]);

                $event->fieldSingleValue('description', 'en')->update([
                    'value' => $request->description_en
                ]);

                $event->fieldSingleValue('description', 'ar')->update([
                    'value' => $request->description_ar
                ]);

                $event->fieldSingleValue('about', 'en')->update([
                    'value' => $request->about_en
                ]);

                $event->fieldSingleValue('about', 'ar')->update([
                    'value' => $request->about_ar
                ]);

                //Date Filter
                if($request->has('date')){
                    $date = $request->date;
                    if(strlen($date) > 10){
                        $start_date = substr($date,0,10);
                        $end_date = substr($date,14,24);
                        $event->start_date = $start_date;
                        $event->end_date = $end_date;
                    }
                    else{
                        $event->start_date = $date;
                        $event->end_date = $date;
                    }
                }

                //Gallery
                $files = $request->file('gallery');
                $new_images = [];
                foreach ($files as $file) {
                    array_push($new_images, $file->getClientOriginalName());
                }
                $event_images = (new EventImage())->where('event_id', $event->id)->select('image', 'id')->get();
                foreach ($event_images as $event_image) {
                    if (array_search($event_image->image, $new_images) === false) {
                        $image_path = public_path('app-assets/images/services/events/gallery/' . $event_image->image);
                        if (File::exists(($image_path))) {
                            $deleted = File::delete($image_path);
                        }
                        $event_image->delete();
                    }
                }

                foreach ($files as $key => $file) {

                    $name = $file->getClientOriginalName();
                    $event_image = (new EventImage())->where('image', $name)->get()->first();
                    if ((empty($event_image))) {
                        $new_name = time() . '.' . $name;
                        $destinationPath = public_path('app-assets/images/services/events/gallery');
                        $file->move($destinationPath, $new_name);

                        (new EventImage())->create([
                            'event_id' => $event->id,
                            'image' => $new_name
                        ]);
                    }
                }

                //Filters
                $filter_values = $request->filtersvalues;
                if($filter_values){
                    (new EventFilter())->where('event_id', $event->id)->delete();
                    foreach ($filter_values as $key => $value) {
                        $filter_value = (new FilterValue())->find($value);
                        if($filter_value){
                            (new EventFilter())->create([
                                'event_id' => $event->id,
                                'filter_id' => $filter_value->filter_id,
                                'filter_value_id' => $filter_value->id
                            ]);
                        }
                    }
                }

                // $filters = $request->filters;

                // $event_filters = $event->filters;

                // foreach ($event_filters as $key => $value) {

                //     if(is_null($filters)){
                //         (new EventFilter())->where('event_id', $event->id)->where('filter_id', $value->id)->delete();
                //     }
                //     else{
                //         if (array_search($value->id, $filters) === false) {
                //             (new EventFilter())->where('event_id', $event->id)->where('filter_id', $value->id)->delete();
                //         }
                //     }
                // }

                // if(!is_null($filters)){
                //     foreach ($filters as $key => $value) {
                //         $event_filter = (new EventFilter())->where('event_id', $event->id)->where('filter_id', $value)->get()->first();
                //         if (empty($event_filter)) {
                //             (new EventFilter())->create([
                //                 'event_id' => $event->id,
                //                 'filter_id' => $value,
                //             ]);
                //         }
                //     }
                // }


                //Numbers

                $number_ids = $request->number_ids;

                if($number_ids){

                    $old_numbers = (new EventNumber())->where('event_id', $event->id)->whereNotIn('id',$number_ids)->get();
                    foreach ($old_numbers as $key => $value) {
                        $value->multiValues()->delete();
                        $value->delete();
                    }

                    foreach ($number_ids as $key => $value) {
                        $number = (new EventNumber())->find($value);
                        if($number){
                            $number->number = $request->number[$key];
                            $number->save();
                            $number->fieldSingleValue('label', 'en')->update([
                                'value' => $request->label_en[$key]
                            ]);
                            $number->fieldSingleValue('label', 'ar')->update([
                                'value' => $request->label_ar[$key]
                            ]);
                        }
                    }

                }

                if ($request->has('new_number')) {
                    foreach ($request->new_number as $key => $value) {
                        $number = (new EventNumber())->create([
                            'event_id' => $event->id,
                            'number' => $value
                        ]);
                        if ($number) {
                            $data =
                                [
                                    [
                                        "field" => 'label',
                                        "value" => $request->new_label_en[$key],
                                        "locale" => 'en'
                                    ],
                                    [
                                        "field" => 'label',
                                        "value" => $request->new_label_ar[$key],
                                        "locale" => 'ar'
                                    ],
                                ];

                            storeMultiValue($number, $data);
                        }
                    }
                }


                //Image Maps

                //OLD
                // $old_map_ids = $request->map_ids;
                // if($old_map_ids){
                //     (new ImageMap())->where('event_id', $event->id)->whereNotIn('id',$old_map_ids)->delete();
                //     foreach ($old_map_ids as $key => $value) {
                //         $old_map = (new ImageMap())->find($value);
                //         if($old_map){
                //             $old_map->script = $request->scripts[$key];
                //             $old_map->save();
                //         }
                //     }
                // }

                // $new_scripts = $request->new_scripts;
                // if ($new_scripts) {
                //     foreach ($new_scripts as $key => $value) {
                //         (new ImageMap())->create([
                //             'event_id' => $event->id,
                //             'script' => $value
                //         ]);
                //     }
                // }

                //NEW
                $event->maps()->detach();
                $map_loads = $request->map_loads;
                if($map_loads){
                    $event->maps()->sync($map_loads);
                }

                //Partnerships
                $partnership_ids = $request->partnership_ids;
                if($partnership_ids){
                    $partnerships = (new EventPartnership())->where('event_id', $event->id)->whereNotIn('id',$partnership_ids)->get();
                    foreach ($partnerships as $key => $partnership) {
                        $partnership->multiValues()->delete();
                        $items = $partnership->items;
                        foreach ($items as $key => $item) {
                            $item->multiValues()->delete();
                            $item->delete();
                        }
                        $partnership->delete();
                    }

                    foreach ($partnership_ids as $key => $value) {
                        $partnership = (new EventPartnership())->find($value);
                        if(!is_null($partnership)){
                            $partnership->fieldSingleValue('title', 'en')->update([
                                'value' => $request->partnership_title_en[$key]
                            ]);
                            $partnership->fieldSingleValue('title', 'ar')->update([
                                'value' => $request->partnership_title_ar[$key]
                            ]);
                            $partnership->fieldSingleValue('description', 'en')->update([
                                'value' => $request->partnership_description_en[$key]
                            ]);
                            $partnership->fieldSingleValue('description', 'ar')->update([
                                'value' => $request->partnership_description_ar[$key]
                            ]);
                            $partnership->fieldSingleValue('popup_description', 'en')->update([
                                'value' => $request->popup_description_en[$key]
                            ]);
                            $partnership->fieldSingleValue('popup_description', 'ar')->update([
                                'value' => $request->popup_description_ar[$key]
                            ]);

                            $item_ids = $request['p_items_' . $value];
                            if($item_ids){
                                $items = (new PartnershipItem())->where('event_partnership_id', $partnership->id)->whereNotIn('id',$item_ids)->get();
                                foreach ($items as $key2 => $value2) {
                                    $value2->multiValues()->delete();
                                    $value2->delete();
                                }

                                foreach ($item_ids as $key3 => $value3) {
                                    $item = (new PartnershipItem())->find($value3);
                                    if(!is_null($item)){

                                        $item->fieldSingleValue('title', 'en')->update([
                                            'value' => $request['u_e_item_title_en_' .$value3][0]
                                        ]);

                                        $item->fieldSingleValue('title', 'ar')->update([
                                            'value' => $request['u_e_item_title_ar_' .$value3][0]
                                        ]);

                                        $item->fieldSingleValue('description', 'en')->update([
                                            'value' => $request['u_e_item_description_en_' .$value3][0]
                                        ]);

                                        $item->fieldSingleValue('description', 'ar')->update([
                                            'value' => $request['u_e_item_description_ar_' .$value3][0]
                                        ]);
                                    }
                                }
                            }

                            $new_item_title_en = $request['new_item_title_en_' . $partnership->id];
                            if($new_item_title_en){
                                foreach ($new_item_title_en as $key4 => $value2) {
                                    $item = (new PartnershipItem())->create([
                                        'event_partnership_id' => $partnership->id
                                    ]);
                                    if ($item) {
                                        $data =
                                            [
                                                [
                                                    "field" => 'title',
                                                    "value" => $request['new_item_title_en_' . $partnership->id][$key4],
                                                    "locale" => 'en'
                                                ],
                                                [
                                                    "field" => 'title',
                                                    "value" => $request['new_item_title_ar_' . $partnership->id][$key4],
                                                    "locale" => 'ar'
                                                ],
                                                [
                                                    "field" => 'description',
                                                    "value" => $request['new_item_description_en_' . $partnership->id][$key4],
                                                    "locale" => 'en'
                                                ],
                                                [
                                                    "field" => 'description',
                                                    "value" => $request['new_item_description_ar_' . $partnership->id][$key4],
                                                    "locale" => 'ar'
                                                ],
                                            ];

                                        storeMultiValue($item, $data);
                                    }
                                }
                            }
                        }
                    }

                }

                $new_partnership_title_en = $request->new_partnership_title_en;
                if($new_partnership_title_en){
                    foreach ($new_partnership_title_en as $key2 => $value2) {
                        $new_partnership = (new EventPartnership())->create([
                            'event_id' => $event->id
                        ]);
                        if ($new_partnership) {
                            $data =
                                [
                                    [
                                        "field" => 'title',
                                        "value" => $value2,
                                        "locale" => 'en'
                                    ],
                                    [
                                        "field" => 'title',
                                        "value" => $request->new_partnership_title_ar[$key2],
                                        "locale" => 'ar'
                                    ],
                                    [
                                        "field" => 'description',
                                        "value" => $request->new_partnership_description_en[$key2],
                                        "locale" => 'en'
                                    ],
                                    [
                                        "field" => 'description',
                                        "value" => $request->new_partnership_description_ar[$key2],
                                        "locale" => 'ar'
                                    ],
                                    [
                                        "field" => 'popup_description',
                                        "value" => $request->new_popup_description_en[$key2],
                                        "locale" => 'en'
                                    ],
                                    [
                                        "field" => 'popup_description',
                                        "value" => $request->new_popup_description_ar[$key2],
                                        "locale" => 'ar'
                                    ],
                                ];

                            storeMultiValue($new_partnership, $data);

                            if ($request['item_title_en_' . $key2]) {
                                $items_data = $request['item_title_en_' . $key2];
                                if($items_data){
                                    foreach ($items_data as $key3 => $value3) {
                                        $item = (new PartnershipItem())->create([
                                            'event_partnership_id' => $new_partnership->id
                                        ]);
                                        if ($item) {
                                            $data =
                                                [
                                                    [
                                                        "field" => 'title',
                                                        "value" => $request['item_title_en_' . $key2][$key3],
                                                        "locale" => 'en'
                                                    ],
                                                    [
                                                        "field" => 'title',
                                                        "value" => $request['item_title_ar_' . $key2][$key3],
                                                        "locale" => 'ar'
                                                    ],
                                                    [
                                                        "field" => 'description',
                                                        "value" => $request['item_description_en_' . $key2][$key3],
                                                        "locale" => 'en'
                                                    ],
                                                    [
                                                        "field" => 'description',
                                                        "value" => $request['item_description_ar_' . $key2][$key3],
                                                        "locale" => 'ar'
                                                    ],
                                                ];

                                            storeMultiValue($item, $data);
                                        }
                                    }
                                }

                            }
                        }
                    }
                }


                $event->save();
            }

            return redirect()->route('services.index')->withSuccess('Service Updated!');
        } catch (Exception $ex) {
            dd($ex);
            return redirect()->route('services.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function create($serviceId){
        $serviceId = decryptParams($serviceId);
        $service = (new Service())->find(decryptParams($serviceId));
        $image_map_loads = (new ImageMapLoad())->all();
        return view('app.admin-panel.service-events.create', ['serviceId' => $serviceId , 'service' => $service, 'image_map_loads' => $image_map_loads]);
    }

    public function edit($serviceId, $id){
        $serviceId = decryptParams($serviceId);
        $service = (new Service())->find($serviceId);
        $eventId = decryptParams($id);
        $event = (new Event())->find($eventId);
        $image_map_loads = (new ImageMapLoad())->all();

        $maps_array = [];
        $event_loads = $event->maps;
        if($event_loads){
            foreach ($event_loads as $key => $event_load) {
                array_push($maps_array, $event_load->id);
            }
        }

        return view('app.admin-panel.service-events.edit', ['serviceId' => encryptParams($serviceId) , 'service' => $service,
         'event' =>  $event, 'eventId' => encryptParams($eventId),
         'image_map_loads' => $image_map_loads,
         'maps_array' => $maps_array
        ]);
    }

    public function updateEvent(Request $request, $serviceId, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            // "location" => 'required|string',
            // "logo" => "required|file",
            "title_en" => "required|string",
            "title_ar" => "required|string",
            // "description_en" => "required|string",
            // "description_ar" => "required|string",
            // "about_en" => "required|string",
            // "about_ar" => "required|string",
            "gallery" => "required|array",
            // 'date' => 'required_if:date_filter,true'
        ],[
            "date" => "The date field is required"
        ]);
        // dd($request);

        try {

            $event = (new Event())->find(decryptParams($id));
            $serviceId = decryptParams($serviceId);

            if ($event) {
                $exists = array_key_exists('logo',$request->all());
                $file = $request->file('logo');
                $prev_name = $event->logo;
                $destinationPath = public_path('app-assets/images/services/events/logo/' . $prev_name);

                if($exists)
                {
                    $name = $file->getClientOriginalName();
                    if($file)
                    {
                        // $name = $file->getClientOriginalName();
                        // $prev_name = $event->logo;
                        if ($name != $prev_name) {
                            // $destinationPath = public_path('app-assets/images/services/events/logo/' . $prev_name);
                            if (File::exists($destinationPath)) {
                                $deleted = File::delete($destinationPath);
                            }
                            $new_name = time() . '.' . $name;
                            $destinationPath = public_path('app-assets/images/services/events/logo');
                            $file->move($destinationPath, $new_name);
                            $event->logo = $new_name;
                        }
                    }

                }
                else
                {
                    if (File::exists($destinationPath)) {
                        $deleted = File::delete($destinationPath);
                        $event->logo = '';
                    }
                }

                //Gallery
                $exists = array_key_exists('gallery',$request->all());
                $files = $request->file('gallery') ?? '';
                $event_images = (new EventImage())->where('event_id', $event->id)->select('image', 'id')->get();
                if($exists)
                {
                    if($files)
                    {
                        $new_images = [];
                        foreach ($files as $file) {
                            array_push($new_images, $file->getClientOriginalName());
                        }
                        foreach ($event_images as $event_image) {
                            $image_path = public_path('app-assets/images/services/events/gallery/' . $event_image->image);
                            if (array_search($event_image->image, $new_images) === false) {
                                if (File::exists(($image_path))) {
                                    $deleted = File::delete($image_path);
                                }
                                $event_image->delete();
                            }
                        }

                        foreach ($files as $key => $file) {

                            $name = $file->getClientOriginalName();
                            $event_image = (new EventImage())->where('image', $name)->get()->first();
                            if ((empty($event_image))) {
                                $new_name = time() . '.' . $name;
                                $destinationPath = public_path('app-assets/images/services/events/gallery');
                                $file->move($destinationPath, $new_name);

                                (new EventImage())->create([
                                    'event_id' => $event->id,
                                    'image' => $new_name
                                ]);
                            }
                        }
                    }
                }
                else
                {
                    // if (File::exists(($image_path))) {
                    //     $deleted = File::delete($image_path);
                    //     if ($deleted){
                    //         $event_images->delete();
                    //     }
                    // }
                    foreach ($event_images as $event_image) {
                        $image_path = public_path('app-assets/images/services/events/gallery/' . $event_image->image);
                        // if (array_search($event_image->image, $new_images) === false) {
                            if (File::exists(($image_path))) {
                                $deleted = File::delete($image_path);
                            }
                            $event_image->delete();
                        // }
                    }
                }


                $event->location = $request->location ?? '';

                $event->fieldSingleValue('title', 'en')->update([
                    'value' => $request->title_en
                ]);

                $event->fieldSingleValue('title', 'ar')->update([
                    'value' => $request->title_ar
                ]);

                $event->fieldSingleValue('description', 'en')->update([
                    'value' => $request->description_en ?? ''
                ]);

                $event->fieldSingleValue('description', 'ar')->update([
                    'value' => $request->description_ar ?? ''
                ]);

                $event->fieldSingleValue('about', 'en')->update([
                    'value' => $request->about_en
                ]);

                $event->fieldSingleValue('about', 'ar')->update([
                    'value' => $request->about_ar
                ]);

                //Date Filter
                if($request->has('date')){
                    $date = $request->date;
                    if(strlen($date) > 10){
                        $start_date = substr($date,0,10);
                        $end_date = substr($date,14,24);
                        $event->start_date = $start_date;
                        $event->end_date = $end_date;
                    }
                    else{
                        $event->start_date = $date;
                        $event->end_date = $date;
                    }
                }
                //Filters
                $filter_values = $request->filtersvalues;
                if($filter_values){
                    (new EventFilter())->where('event_id', $event->id)->delete();
                    foreach ($filter_values as $key => $value) {
                        $filter_value = (new FilterValue())->find($value);
                        if($filter_value){
                            (new EventFilter())->create([
                                'event_id' => $event->id,
                                'filter_id' => $filter_value->filter_id,
                                'filter_value_id' => $filter_value->id
                            ]);
                        }
                    }
                }
                else
                {
                    (new EventFilter())->where('event_id', $event->id)->delete();
                }

                //Numbers

                $number_ids = $request->number_ids;

                if($number_ids){

                    $old_numbers = (new EventNumber())->where('event_id', $event->id)->whereNotIn('id',$number_ids)->get();
                    foreach ($old_numbers as $key => $value) {
                        $value->multiValues()->delete();
                        $value->delete();
                    }

                    foreach ($number_ids as $key => $value) {
                        $number = (new EventNumber())->find($value);
                        if($number){
                            $number->number = $request->old_number[$key];
                            $number->save();
                            $number->fieldSingleValue('label', 'en')->update([
                                'value' => $request->old_label_en[$key]
                            ]);
                            $number->fieldSingleValue('label', 'ar')->update([
                                'value' => $request->old_label_ar[$key]
                            ]);
                        }
                    }

                }
                else{
                    $old_numbers = (new EventNumber())->where('event_id', $event->id)->get();
                    foreach ($old_numbers as $key => $value) {
                        $value->multiValues()->delete();
                        $value->delete();
                    }
                }

                if ($request->has('number')) {
                    foreach ($request->number as $key => $value) {
                        $number = (new EventNumber())->create([
                            'event_id' => $event->id,
                            'number' => $value
                        ]);
                        if ($number) {
                            $data =
                                [
                                    [
                                        "field" => 'label',
                                        "value" => $request->label_en[$key],
                                        "locale" => 'en'
                                    ],
                                    [
                                        "field" => 'label',
                                        "value" => $request->label_ar[$key],
                                        "locale" => 'ar'
                                    ],
                                ];

                            storeMultiValue($number, $data);
                        }
                    }
                }

                //Image Maps

                //OLD
                // $old_map_ids = $request->map_ids;
                // if($old_map_ids){
                //     (new ImageMap())->where('event_id', $event->id)->whereNotIn('id',$old_map_ids)->delete();
                //     foreach ($old_map_ids as $key => $value) {
                //         $old_map = (new ImageMap())->find($value);
                //         if($old_map){
                //             $old_map->script = $request->old_scripts[$key];
                //             $old_map->save();
                //         }
                //     }
                // }

                // $new_scripts = $request->scripts;
                // if ($new_scripts) {
                //     foreach ($new_scripts as $key => $value) {
                //         (new ImageMap())->create([
                //             'event_id' => $event->id,
                //             'script' => $value
                //         ]);
                //     }
                // }

                //NEW
                $event->maps()->detach();
                $map_loads = $request->map_loads;
                if($map_loads){
                    $event->maps()->sync($map_loads);
                }


                //Partnerships
                $partnership_ids = $request->partnership_ids;
                if($partnership_ids){
                    $partnerships = (new EventPartnership())->where('event_id', $event->id)->whereNotIn('id',$partnership_ids)->get();
                    foreach ($partnerships as $key => $partnership) {
                        $partnership->multiValues()->delete();
                        $items = $partnership->items;
                        foreach ($items as $key => $item) {
                            $item->multiValues()->delete();
                            $item->delete();
                        }
                        $partnership->delete();
                    }

                    foreach ($partnership_ids as $key => $value) {
                        $partnership = (new EventPartnership())->find($value);
                        if(!is_null($partnership)){
                            $partnership->fieldSingleValue('title', 'en')->update([
                                'value' => $request->old_partnership_title_en[$key]
                            ]);
                            $partnership->fieldSingleValue('title', 'ar')->update([
                                'value' => $request->old_partnership_title_ar[$key]
                            ]);
                            $partnership->fieldSingleValue('description', 'en')->update([
                                'value' => $request->old_partnership_description_en[$key]
                            ]);
                            $partnership->fieldSingleValue('description', 'ar')->update([
                                'value' => $request->old_partnership_description_ar[$key]
                            ]);
                            $partnership->fieldSingleValue('popup_description', 'en')->update([
                                'value' => $request->old_popup_description_en[$key]
                            ]);
                            $partnership->fieldSingleValue('popup_description', 'ar')->update([
                                'value' => $request->old_popup_description_ar[$key]
                            ]);

                            $item_ids = $request['p_items_' . $value];
                            if($item_ids){
                                $items = (new PartnershipItem())->where('event_partnership_id', $partnership->id)->whereNotIn('id',$item_ids)->get();
                                foreach ($items as $key2 => $value2) {
                                    $value2->multiValues()->delete();
                                    $value2->delete();
                                }

                                foreach ($item_ids as $key3 => $value3) {
                                    $item = (new PartnershipItem())->find($value3);
                                    if(!is_null($item)){

                                        $item->fieldSingleValue('title', 'en')->update([
                                            'value' => $request['u_e_item_title_en_' .$value3][0]
                                        ]);

                                        $item->fieldSingleValue('title', 'ar')->update([
                                            'value' => $request['u_e_item_title_ar_' .$value3][0]
                                        ]);

                                        $item->fieldSingleValue('description', 'en')->update([
                                            'value' => $request['u_e_item_description_en_' .$value3][0]
                                        ]);

                                        $item->fieldSingleValue('description', 'ar')->update([
                                            'value' => $request['u_e_item_description_ar_' .$value3][0]
                                        ]);
                                    }
                                }
                            }

                            $new_item_title_en = $request['new_item_title_en_' . $partnership->id];
                            if($new_item_title_en){
                                foreach ($new_item_title_en as $key4 => $value2) {
                                    $item = (new PartnershipItem())->create([
                                        'event_partnership_id' => $partnership->id
                                    ]);
                                    if ($item) {
                                        $data =
                                            [
                                                [
                                                    "field" => 'title',
                                                    "value" => $request['new_item_title_en_' . $partnership->id][$key4],
                                                    "locale" => 'en'
                                                ],
                                                [
                                                    "field" => 'title',
                                                    "value" => $request['new_item_title_ar_' . $partnership->id][$key4],
                                                    "locale" => 'ar'
                                                ],
                                                [
                                                    "field" => 'description',
                                                    "value" => $request['new_item_description_en_' . $partnership->id][$key4],
                                                    "locale" => 'en'
                                                ],
                                                [
                                                    "field" => 'description',
                                                    "value" => $request['new_item_description_ar_' . $partnership->id][$key4],
                                                    "locale" => 'ar'
                                                ],
                                            ];

                                        storeMultiValue($item, $data);
                                    }
                                }
                            }
                        }
                    }

                }
                else{

                    $partnerships = (new EventPartnership())->where('event_id', $event->id)->get();
                    foreach ($partnerships as $key => $partnership) {
                        $partnership->multiValues()->delete();
                        $items = $partnership->items;
                        foreach ($items as $key => $item) {
                            $item->multiValues()->delete();
                            $item->delete();
                        }
                        $partnership->delete();
                    }
                }

                $new_partnership_title_en = $request->partnership_title_en;
                if($new_partnership_title_en){
                    foreach ($new_partnership_title_en as $key2 => $value2) {
                        $new_partnership = (new EventPartnership())->create([
                            'event_id' => $event->id
                        ]);
                        if ($new_partnership) {
                            $data =
                                [
                                    [
                                        "field" => 'title',
                                        "value" => $value2,
                                        "locale" => 'en'
                                    ],
                                    [
                                        "field" => 'title',
                                        "value" => $request->partnership_title_ar[$key2],
                                        "locale" => 'ar'
                                    ],
                                    [
                                        "field" => 'description',
                                        "value" => $request->partnership_description_en[$key2],
                                        "locale" => 'en'
                                    ],
                                    [
                                        "field" => 'description',
                                        "value" => $request->partnership_description_ar[$key2],
                                        "locale" => 'ar'
                                    ],
                                    [
                                        "field" => 'popup_description',
                                        "value" => $request->popup_description_en[$key2],
                                        "locale" => 'en'
                                    ],
                                    [
                                        "field" => 'popup_description',
                                        "value" => $request->popup_description_ar[$key2],
                                        "locale" => 'ar'
                                    ],
                                ];

                            storeMultiValue($new_partnership, $data);

                            if ($request['item_title_en_' . $key2]) {
                                $items_data = $request['item_title_en_' . $key2];
                                if($items_data){
                                    foreach ($items_data as $key3 => $value3) {
                                        $item = (new PartnershipItem())->create([
                                            'event_partnership_id' => $new_partnership->id
                                        ]);
                                        if ($item) {
                                            $data =
                                                [
                                                    [
                                                        "field" => 'title',
                                                        "value" => $request['item_title_en_' . $key2][$key3],
                                                        "locale" => 'en'
                                                    ],
                                                    [
                                                        "field" => 'title',
                                                        "value" => $request['item_title_ar_' . $key2][$key3],
                                                        "locale" => 'ar'
                                                    ],
                                                    [
                                                        "field" => 'description',
                                                        "value" => $request['item_description_en_' . $key2][$key3],
                                                        "locale" => 'en'
                                                    ],
                                                    [
                                                        "field" => 'description',
                                                        "value" => $request['item_description_ar_' . $key2][$key3],
                                                        "locale" => 'ar'
                                                    ],
                                                ];

                                            storeMultiValue($item, $data);
                                        }
                                    }
                                }

                            }
                        }
                    }
                }


                $event->save();

            }
            return redirect()->route('services.events.index', ['id' => encryptParams($serviceId)])->withSuccess('Event Updated!');
        } catch (Exception $ex) {
            return redirect()->route('services.events.index', ['id' => encryptParams($serviceId)])->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function storeEvent(Request $request, $serviceId)
    {
        $this->validate($request, [
            // "location" => 'required|string',
            // "logo" => "required|file",
            "title_en" => "required|string",
            "title_ar" => "required|string",
            // "description_en" => "required|string",
            // "description_ar" => "required|string",
            // "about_en" => "required|string",
            // "about_ar" => "required|string",
            "number" => "required|sometimes|array",
            "label_en" => "required|sometimes|array",
            "label_ar" => "required|sometimes|array",
            "gallery" => "required|array",
            "partnership_title_en" => "required|sometimes|array",
            "partnership_title_ar" => "required|sometimes|array",
            "partnership_description_en" => "required|sometimes|array",
            "partnership_description_ar" => "required|sometimes|array",
            "popup_description_en" => "required|sometimes|array",
            "popup_description_ar" => "required|sometimes|array",
        ]);

        $id = decryptParams($serviceId);

        try {

            DB::transaction(function() use ($request, $id){

                $file = $request->file('logo') ?? '';
                if($file)
                {
                    $name = $file->getClientOriginalName();
                    $new_name = time() . '.' . $name;
                    $destinationPath = public_path('app-assets/images/services/events/logo');
                    $file->move($destinationPath, $new_name);
                }

                $event = (new Event())->create([
                    'service_id' => $id,
                    'location' => $request->location ?? '',
                    'logo' => $new_name ?? ''
                ]);

                if ($event) {
                    $data =
                        [
                            [
                                "field" => 'title',
                                "value" => $request->title_en,
                                "locale" => 'en'
                            ],
                            [
                                "field" => 'title',
                                "value" => $request->title_ar,
                                "locale" => 'ar'
                            ],
                            [
                                "field" => 'description',
                                "value" => $request->description_en,
                                "locale" => 'en'
                            ],
                            [
                                "field" => 'description',
                                "value" => $request->description_ar,
                                "locale" => 'ar'
                            ],
                            [
                                "field" => 'about',
                                "value" => $request->about_en,
                                "locale" => 'en'
                            ],
                            [
                                "field" => 'about',
                                "value" => $request->about_ar,
                                "locale" => 'ar'
                            ]
                        ];

                    storeMultiValue($event, $data);

                    //Date Filter
                    if($request->has('date')){
                        $date = $request->date;
                        if(strlen($date) > 10){
                            $start_date = substr($date,0,10);
                            $end_date = substr($date,14,24);
                            $event->start_date = $start_date;
                            $event->end_date = $end_date;
                        }
                        else{
                            $event->start_date = $date;
                            $event->end_date = $date;
                        }
                        $event->save();
                    }

                    //Filters
                    $filter_values = $request->filtersvalues;
                    // dd($filter_values);
                    if($filter_values){
                        (new EventFilter())->where('event_id', $event->id)->delete();
                        foreach ($filter_values as $key => $value) {
                            $filter_value = (new FilterValue())->find($value);
                            if($filter_value){
                                //Zeeshan Code Start Here

                                $event_filter = (new EventFilter());
                                $event_filter-> event_id = $event->id;
                                $event_filter->filter_id = $filter_value->filter_id;
                                $event_filter->filter_value_id = $filter_value->id;
                                $event_filter->save();
                                //Zeeshan Code Ends here
                                
                                // (new EventFilter())->create([
                                //     'event_id' => $event->id,
                                //     'filter_id' => $filter_value->filter_id,
                                //     'filter_value_id' => $filter_value->id
                                // ]);
                            }
                        }
                    }

                    //Numbers
                    if ($request->has('number')) {
                        foreach ($request->number as $key => $value) {
                            $number = (new EventNumber())->create([
                                'event_id' => $event->id,
                                'number' => $value
                            ]);
                            if ($number) {
                                $data =
                                    [
                                        [
                                            "field" => 'label',
                                            "value" => $request->label_en[$key],
                                            "locale" => 'en'
                                        ],
                                        [
                                            "field" => 'label',
                                            "value" => $request->label_ar[$key],
                                            "locale" => 'ar'
                                        ],
                                    ];

                                storeMultiValue($number, $data);
                            }
                        }
                    }

                    //Gallery
                    $files = $request->file('gallery') ?? '';
                    if($files)
                    {
                        foreach ($files as $key => $file) {
                            $name = $file->getClientOriginalName();
                            $new_name = time() . '.' . $name;
                            $destinationPath = public_path('app-assets/images/services/events/gallery');
                            $file->move($destinationPath, $new_name);

                            (new EventImage())->create([
                                'event_id' => $event->id,
                                'image' => $new_name
                            ]);
                        }
                    }

                    //Filters
                    // $service = (new Service())->find($id);
                    // $filters = $service->filters;
                    // $filters = $request->filters;
                    // if ($filters) {
                    //     foreach ($filters as $key => $filter) {
                    //         $filter_value = $filter->filterValues()->get()->first();
                    //         (new EventFilter())->create([
                    //             'event_id' => $event->id,
                    //             'filter_id' => $filter->id,
                    //             'filter_value_id' => $filter_value->id,
                    //         ]);
                    //     }
                    // }

                    //Image Maps

                    //OLD
                    // $maps = $request->scripts;
                    // if ($maps) {
                    //     foreach ($maps as $key => $value) {
                    //         (new ImageMap())->create([
                    //             'event_id' => $event->id,
                    //             'script' => $value
                    //         ]);
                    //     }
                    // }

                    //NEW
                    // $event->maps()->detach();
                    $map_loads = $request->map_loads;
                    if($map_loads){
                        $event->maps()->sync($map_loads);
                    }

                    //Partnerships
                if ($request->has('partnership_title_en')) {
                    foreach ($request->partnership_title_en as $key => $value) {
                        $partnership = (new EventPartnership())->create([
                            'event_id' => $event->id
                        ]);
                        if ($partnership) {
                            $data =
                                [
                                    [
                                        "field" => 'title',
                                        "value" => $value ?? '',
                                        "locale" => 'en'
                                    ],
                                    [
                                        "field" => 'title',
                                        "value" => $request->partnership_title_ar[$key] ?? '',
                                        "locale" => 'ar'
                                    ],
                                    [
                                        "field" => 'description',
                                        "value" => $request->partnership_description_en[$key] ?? '',
                                        "locale" => 'en'
                                    ],
                                    [
                                        "field" => 'description',
                                        "value" => $request->partnership_description_ar[$key] ?? '',
                                        "locale" => 'ar'
                                    ],
                                    [
                                        "field" => 'popup_description',
                                        "value" => $request->popup_description_en[$key] ?? '',
                                        "locale" => 'en'
                                    ],
                                    [
                                        "field" => 'popup_description',
                                        "value" => $request->popup_description_ar[$key] ?? '',
                                        "locale" => 'ar'
                                    ],
                                ];
                            storeMultiValue($partnership, $data);

                            if ($request['item_title_en_' . $key]) {
                                $items_data = $request['item_title_en_' . $key];
                                if($items_data){
                                    foreach ($items_data as $key2 => $value2) {
                                        $item = (new PartnershipItem())->create([
                                            'event_partnership_id' => $partnership->id
                                        ]);
                                        if ($item) {
                                            $data =
                                                [
                                                    [
                                                        "field" => 'title',
                                                        "value" => $request['item_title_en_' . $key][$key2],
                                                        "locale" => 'en'
                                                    ],
                                                    [
                                                        "field" => 'title',
                                                        "value" => $request['item_title_ar_' . $key][$key2],
                                                        "locale" => 'ar'
                                                    ],
                                                    [
                                                        "field" => 'description',
                                                        "value" => $request['item_description_en_' . $key][$key2],
                                                        "locale" => 'en'
                                                    ],
                                                    [
                                                        "field" => 'description',
                                                        "value" => $request['item_description_ar_' . $key][$key2],
                                                        "locale" => 'ar'
                                                    ],
                                                ];

                                            storeMultiValue($item, $data);
                                        }
                                    }
                                }

                            }
                        }
                    }
                }

                }
            });

            return redirect()->route('services.events.index', ['id' => encryptParams($id)])->withSuccess('New Event Created!');
        } catch (Exception $ex) {
            return redirect()->route('services.events.index', ['id' => encryptParams($id)])->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function getCheckboxItems(Request $request, $filter_id, $service_id)
    {
        $items_array = [];
        $filter_id = (int)$filter_id;
        $service_id = (int)$service_id;
        $service = (new Service())->find($service_id);
        foreach($service->filters as $filter)
        {
            foreach($filter->filterValues as $filterValue)
            {
                $filter_value_items = FilterValue::where('filter_id',$filter_id)->get();
                foreach($filter_value_items as $filter_value_item)
                {
                    array_push($items_array,[$filter_value_item->id,$filter_value_item->fieldSingleValue('label', 'en')->value]);
                }
                break;
            }
            break;
        }
        return response()->json([
            'status'    => true,
            'items' => $items_array
        ]);
    }

}