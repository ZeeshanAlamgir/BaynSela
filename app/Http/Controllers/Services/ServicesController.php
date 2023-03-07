<?php

namespace App\Http\Controllers\Services;

use App\DataTables\ServicesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Filter;
use App\Models\FilterValue;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ServicesController extends Controller
{
    public function index()
    {
        $services = (new Service())->orderBy('id', 'asc')->get();
        return view('app.admin-panel.services.index', compact(['services']));
    }

    public function indexNew(ServicesDataTable $servicesDataTable)
    {
        return $servicesDataTable->render('app.admin-panel.new-services.index');
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'id' => 'required|exists:services,id',
            'service_heading_en' => 'required',
            'service_heading_ar' => 'required',
            'service_description_en' => 'required',
            'service_description_ar' => 'required',
            'image' => 'required'
        ]);

        try {

            DB::transaction(function() use ($request, $id){

                $service = (new Service())->find($id);

                if ($service) {

                    $file = $request->file('image');
                    $name = $file->getClientOriginalName();

                    if ($service->image != $name) {
                        $image_path = public_path('app-assets/images/services/' . $service->image);
                        if (File::exists($image_path)) {
                            $deleted = File::delete($image_path);
                        }
                        $new_name = time() . '.' . $name;

                        $destinationPath = public_path('app-assets/images/services');
                        $file->move($destinationPath, $new_name);
                        $service->image = $new_name;
                        $service->save();
                    }
                    $service->fieldSingleValue('service_heading', 'en')->update([
                        'value' => $request->service_heading_en
                    ]);
                    $service->fieldSingleValue('service_heading', 'ar')->update([
                        'value' => $request->service_heading_ar
                    ]);
                    $service->fieldSingleValue('service_description', 'en')->update([
                        'value' => $request->service_description_en
                    ]);
                    $service->fieldSingleValue('service_description', 'ar')->update([
                        'value' => $request->service_description_ar
                    ]);

                    //Filters

                    if($request->has('date_filter')){
                        $service->date_filter = true;
                        $service->save();
                    }
                    else{
                        $service->date_filter = false;
                        $service->save();
                    }

                    $filter_ids = $request->filter_ids;

                    $filter_labels_en = $request->label_en;
                    $filter_labels_ar = $request->label_ar;

                    if($filter_ids){
                        foreach ($filter_ids as $key => $value) {
                            $filter = (new Filter())->find($value);
                            if($filter){
                                $filter->fieldSingleValue('label', 'en')->update([
                                    'value' => $filter_labels_en[$key]
                                ]);
                                $filter->fieldSingleValue('label', 'ar')->update([
                                    'value' => $filter_labels_ar[$key]
                                ]);

                                $filter_value_ids = $request["filter_value_ids_" . $value];

                                foreach ($filter_value_ids as $key2 => $value2) {
                                    $filter_value = (new FilterValue())->find($value2);
                                    if($filter_value){
                                        $filter_value->fieldSingleValue('label', 'en')->update([
                                            'value' => $request["value_label_en_" . $value2]
                                        ]);
                                        $filter_value->fieldSingleValue('label', 'ar')->update([
                                            'value' => $request["value_label_ar_" . $value2]
                                        ]);
                                    }
                                }
                            }
                        }
                    }

                    //Filters New Values
                    $filter_ids_new_values = $request->filter_ids_new_values;
                    if(!is_null($filter_ids_new_values)){
                        foreach ($filter_ids_new_values as $key => $value) {
                            $filter = (new Filter())->find($value);
                            if($filter){
                                $filter_value = (new FilterValue())->create([
                                    'filter_id' => $value
                                ]);

                                if ($filter_value) {
                                    $data =
                                        [
                                            [
                                                "field" => 'label',
                                                "value" => $request->new_value_label_en[$key],
                                                "locale" => 'en'
                                            ],
                                            [
                                                "field" => 'label',
                                                "value" => $request->new_value_label_ar[$key],
                                                "locale" => 'ar'
                                            ],
                                        ];

                                    storeMultiValue($filter_value, $data);
                                }
                            }
                        }
                    }

                }
            });

            return redirect()->route('services.index')->withSuccess('Updated!');
        } catch (Exception $ex) {
            return redirect()->route('services.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'service_heading_en' => 'required',
            'service_heading_ar' => 'required',
            'service_description_en' => 'required',
            'service_description_ar' => 'required',
            'image' => 'required'
        ]);

        try {

            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $new_name = time() . '.' . $name;
            $destinationPath = public_path('app-assets/images/services');
            $file->move($destinationPath, $new_name);

            $service = (new Service())->create([
                'image' => $new_name
            ]);

            if ($service) {
                $data =
                    [
                        [
                            "field" => 'service_heading',
                            "value" => $request->service_heading_en,
                            "locale" => 'en'
                        ],
                        [
                            "field" => 'service_heading',
                            "value" => $request->service_heading_ar,
                            "locale" => 'ar'
                        ],
                        [
                            "field" => 'service_description',
                            "value" => $request->service_description_en,
                            "locale" => 'en'
                        ],
                        [
                            "field" => 'service_description',
                            "value" => $request->service_description_ar,
                            "locale" => 'ar'
                        ]
                    ];

                storeMultiValue($service, $data);
            }

            return redirect()->route('services.index')->withSuccess('New Service Added!');
        } catch (Exception $ex) {
            return redirect()->route('services.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function storeFilter(Request $request)
    {

        $this->validate($request, [
            'id' => 'required|exists:services,id',
            'label_en' => 'required',
            'label_ar' => 'required',
            'value_label_en' => 'required|array|sometimes',
            'value_label_ar' => 'required|array|sometimes',
        ]);

        try {

            $filter = (new Filter())->create([
                'service_id' => $request->id,
            ]);

            if ($filter) {
                $data =
                    [
                        [
                            "field" => 'label',
                            "value" => $request->label_en,
                            "locale" => 'en'
                        ],
                        [
                            "field" => 'label',
                            "value" => $request->label_ar,
                            "locale" => 'ar'
                        ],
                    ];

                storeMultiValue($filter, $data);

                $ar_values = $request->value_label_ar;

                foreach ($request->value_label_en as $key => $value) {
                    $filter_value = (new FilterValue())->create([
                        'filter_id' => $filter->id,
                    ]);

                    if ($filter_value) {
                        $data =
                            [
                                [
                                    "field" => 'label',
                                    "value" => $value,
                                    "locale" => 'en'
                                ],
                                [
                                    "field" => 'label',
                                    "value" => $ar_values[$key],
                                    "locale" => 'ar'
                                ],
                            ];

                        storeMultiValue($filter_value, $data);
                    }
                }
            }

            return redirect()->route('services.index')->withSuccess('New Service Filter Added!');
        } catch (Exception $ex) {
            return redirect()->route('services.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function delete(Request $request)
    {
        if ($request->ajax()) {
            try {
                $id = $request->get('id');
                $service = (new Service())->find($id);
                if ($service) {
                    $service->multiValues()->delete();
                    $image = $service->image;
                    $image_path = public_path('app-assets/images/services/' . $image);
                    if (File::exists($image_path)) {
                        $deleted = File::delete($image_path);
                    }
                    $service->delete();
                    return response()->json([
                        'status' => true
                    ]);
                }
                return response()->json([
                    'status' => false
                ]);
            } catch (Exception $th) {
                return response()->json([
                    'status' => false
                ]);
            }
        }
    }

    public function destroySelected(Request $request){
        try {
            if ($request->has('chkData')) {

                $services = (new Service())->whereIn('id', $request->chkData)->get();

                foreach ($services as $key => $service) {
                    $service->multiValues()->delete();
                    $image = $service->image;
                    $image_path = public_path('app-assets/images/services/' . $image);
                    if (File::exists($image_path)) {
                        $deleted = File::delete($image_path);
                    }

                    $filters = $service->filters;
                    foreach ($filters as $key => $filter) {
                        $filter->multiValues()->delete();
                        $filterValues = $filter->filterValues;
                        foreach ($filterValues as $key => $filterValue) {
                            $filterValue->multiValues()->delete();
                            $filterValue->delete();
                        }
                        $filter->delete();
                    }

                    $service->delete();
                }

                return redirect()->route('services.index.new')->withSuccess('Data deleted!');
            } else {
                return redirect()->route('services.index.new')->withWarning('Please select at least one item!');
            }
        } catch (Exception $ex) {
            return redirect()->route('services.index.new')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function deleteFilter(Request $request){
        if ($request->ajax()) {
            try {
                $id = $request->get('id');
                $filter = (new Filter())->find($id);
                if ($filter) {
                    $filter->multiValues()->delete();
                    $filter_values = $filter->filterValues;
                    foreach ($filter_values as $key => $value) {
                        $value->multiValues()->delete();
                        $value->delete();
                    }
                    $filter->delete();
                    return response()->json([
                        'status' => true
                    ]);
                }
                return response()->json([
                    'status' => false
                ]);
            } catch (Exception $th) {
                return response()->json([
                    'status' => false
                ]);
            }
        }
    }


    public function create(){
        return view('app.admin-panel.new-services.create');
    }

    public function edit($id){

        $id = decryptParams($id);
        $service = (new Service())->find($id);
        $data = [
            'service' => $service
        ];
        return view('app.admin-panel.new-services.edit',['id' => $id, 'data' => $data]);
    }

    public function updateService(Request $request, $id)
    {

        $id = decryptParams($id);

        $this->validate($request, [
            'service_heading_en' => 'required',
            'service_heading_ar' => 'required',
            // 'service_description_en' => 'required',
            // 'service_description_ar' => 'required',
            'image' => 'required'
        ]);

        try {

            DB::transaction(function() use ($request, $id){

                $service = (new Service())->find($id);

                if ($service) {

                    $file = $request->file('image');
                    $name = $file->getClientOriginalName();

                    if ($service->image != $name) {
                        $image_path = public_path('app-assets/images/services/' . $service->image);
                        if (File::exists($image_path)) {
                            $deleted = File::delete($image_path);
                        }
                        $new_name = time() . '.' . $name;

                        $destinationPath = public_path('app-assets/images/services');
                        $file->move($destinationPath, $new_name);
                        $service->image = $new_name;
                        $service->save();
                    }
                    $service->fieldSingleValue('service_heading', 'en')->update([
                        'value' => $request->service_heading_en
                    ]);
                    $service->fieldSingleValue('service_heading', 'ar')->update([
                        'value' => $request->service_heading_ar
                    ]);
                    $service->fieldSingleValue('service_description', 'en')->update([
                        'value' => $request->service_description_en
                    ]);
                    $service->fieldSingleValue('service_description', 'ar')->update([
                        'value' => $request->service_description_ar
                    ]);

                    //Filters

                    if($request->has('date_filter')){
                        $service->date_filter = true;
                        $service->save();
                    }
                    else{
                        $service->date_filter = false;
                        $service->save();
                    }

                    //Old Filters

                    $old_filters = $request->old_filters;


                    $prev_filters = $service->filters;

                    foreach ($prev_filters as $key => $prev_filter) {

                        if(is_null($old_filters)){
                            (new Filter())->where('service_id', $service->id)->delete();
                        }
                        else{
                            if (array_search($prev_filter->id, $old_filters) === false) {
                                $filter = (new Filter())->find($prev_filter->id);
                                if($filter){
                                    $filter->multiValues()->delete();
                                    $filterValues = $filter->filterValues;
                                    foreach ($filterValues as $key => $filterValue) {
                                        $filterValue->multiValues()->delete();
                                        $filterValue->delete();
                                    }
                                    $filter->delete();
                                }
                            }
                        }
                    }

                    if(!is_null($old_filters)){
                        foreach ($old_filters as $key => $old_filter) {
                            $filter = (new Filter())->find($old_filter);
                            if($filter){
                                $filter->fieldSingleValue('label', 'en')->update([
                                    'value' => $request->old_label_en[$key]
                                ]);
                                $filter->fieldSingleValue('label', 'ar')->update([
                                    'value' => $request->old_label_ar[$key]
                                ]);

                                $old_filter_values = $request['old_filter_values_' . $old_filter];
                                $pre_filter_values = $filter->filterValues;

                                foreach ($pre_filter_values as $key2 => $pre_filter_value) {

                                    if(is_null($old_filter_values)){
                                        (new FilterValue())->where('filter_id', $filter->id)->delete();
                                    }
                                    else{
                                        if (array_search($pre_filter_value->id, $old_filter_values) === false) {
                                            $filterValue = (new FilterValue())->find($pre_filter_value->id);
                                            if($filterValue){
                                                $filterValue->multiValues()->delete();
                                                $filterValue->delete();
                                            }
                                        }
                                    }
                                }

                                if(!is_null($old_filter_values)){
                                    foreach ($old_filter_values as $key3 => $old_filter_value) {
                                        $filter_value = (new FilterValue())->find($old_filter_value);
                                        if($filter_value){
                                            $filter_value->fieldSingleValue('label', 'en')->update([
                                                'value' => $request["old_value_label_en_" . $old_filter_value]
                                            ]);
                                            $filter_value->fieldSingleValue('label', 'ar')->update([
                                                'value' => $request["old_value_label_ar_" . $old_filter_value]
                                            ]);
                                        }
                                    }
                                }

                                $old_value_new_label_en = $request['old_value_new_label_en_' . $filter->id];
                                if(!is_null($old_value_new_label_en)){
                                    foreach ($old_value_new_label_en as $key4 => $value3) {
                                        $new_filter_value = (new FilterValue())->create([
                                            'filter_id' => $filter->id
                                        ]);
                                        if($new_filter_value){
                                            $data =
                                                [
                                                    [
                                                        "field" => 'label',
                                                        "value" => $value3,
                                                        "locale" => 'en'
                                                    ],
                                                    [
                                                        "field" => 'label',
                                                        "value" => $request['old_value_new_label_en_' . $filter->id][$key4],
                                                        "locale" => 'ar'
                                                    ],
                                                ];

                                            storeMultiValue($new_filter_value, $data);
                                        }
                                    }
                                }

                            }
                        }
                    }

                    //New Filters

                    $values = $request->label_en;

                    if(!is_null($values)){

                        foreach ($values as $key => $value) {

                            $filter = (new Filter())->create([
                                'service_id' => $service->id,
                            ]);

                            if($filter){
                                $data =
                                    [
                                        [
                                            "field" => 'label',
                                            "value" => $value,
                                            "locale" => 'en'
                                        ],
                                        [
                                            "field" => 'label',
                                            "value" => $request->label_ar[$key] != null ?  $request->label_ar[$key] : 'NA',
                                            "locale" => 'ar'
                                        ],
                                    ];

                                storeMultiValue($filter, $data);

                                $value_label_en = $request['value_label_en_' . $key];
                                $value_label_ar = $request['value_label_ar_' . $key];
                                if(!is_null($value_label_en) && !is_null($value_label_ar)){
                                    foreach ($value_label_en as $key2 => $value2) {
                                        $filter_value = (new FilterValue())->create([
                                            'filter_id' => $filter->id,
                                        ]);
                                        if ($filter_value) {
                                            $data =
                                                [
                                                    [
                                                        "field" => 'label',
                                                        "value" => $value2,
                                                        "locale" => 'en'
                                                    ],
                                                    [
                                                        "field" => 'label',
                                                        "value" => $value_label_ar[$key2] != null ? $value_label_ar[$key2] : 'NA',
                                                        "locale" => 'ar'
                                                    ],
                                                ];

                                            storeMultiValue($filter_value, $data);
                                        }
                                    }
                                }

                            }


                        }
                    }

                }
            });

            return redirect()->route('services.index.new')->withSuccess('Service Updated!');
        } catch (Exception $ex) {
            return redirect()->route('services.index.new')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function storeService(Request $request)
    {

        $this->validate($request, [
            'service_heading_en' => 'required',
            'service_heading_ar' => 'required',
            // 'service_description_en' => 'required',
            // 'service_description_ar' => 'required',
            'image' => 'required'
        ]);

        try {

            DB::transaction(function() use ($request){
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $new_name = time() . '.' . $name;
                $destinationPath = public_path('app-assets/images/services');
                $file->move($destinationPath, $new_name);

                $service = (new Service())->create([
                    'image' => $new_name
                ]);

                if ($service) {

                    if($request->has('date_filter')){
                        $service->date_filter = true;
                        $service->save();
                    }
                    else{
                        $service->date_filter = false;
                        $service->save();
                    }

                    $data =
                        [
                            [
                                "field" => 'service_heading',
                                "value" => $request->service_heading_en,
                                "locale" => 'en'
                            ],
                            [
                                "field" => 'service_heading',
                                "value" => $request->service_heading_ar,
                                "locale" => 'ar'
                            ],
                            [
                                "field" => 'service_description',
                                "value" => $request->service_description_en,
                                "locale" => 'en'
                            ],
                            [
                                "field" => 'service_description',
                                "value" => $request->service_description_ar,
                                "locale" => 'ar'
                            ]
                        ];

                    storeMultiValue($service, $data);

                    //Custom Filters

                    $values = $request->label_en;

                    if(!is_null($values)){

                        foreach ($values as $key => $value) {

                            $filter = (new Filter())->create([
                                'service_id' => $service->id,
                            ]);

                            if($filter){
                                $data =
                                    [
                                        [
                                            "field" => 'label',
                                            "value" => $value,
                                            "locale" => 'en'
                                        ],
                                        [
                                            "field" => 'label',
                                            "value" => $request->label_ar[$key] != null ?  $request->label_ar[$key] : 'NA',
                                            "locale" => 'ar'
                                        ],
                                    ];

                                storeMultiValue($filter, $data);

                                $value_label_en = $request['value_label_en_' . $key];
                                $value_label_ar = $request['value_label_ar_' . $key];
                                if(!is_null($value_label_en) && !is_null($value_label_ar)){
                                    foreach ($value_label_en as $key2 => $value2) {
                                        $filter_value = (new FilterValue())->create([
                                            'filter_id' => $filter->id,
                                        ]);
                                        if ($filter_value) {
                                            $data =
                                                [
                                                    [
                                                        "field" => 'label',
                                                        "value" => $value2,
                                                        "locale" => 'en'
                                                    ],
                                                    [
                                                        "field" => 'label',
                                                        "value" => $value_label_ar[$key2] != null ? $value_label_ar[$key2] : 'NA',
                                                        "locale" => 'ar'
                                                    ],
                                                ];

                                            storeMultiValue($filter_value, $data);
                                        }
                                    }
                                }

                            }


                        }
                    }
                }
            });
            return redirect()->route('services.index.new')->withSuccess('New Service Created!');
        } catch (Exception $ex) {
            return redirect()->route('services.index.new')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

}
