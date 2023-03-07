<?php

namespace App\Http\Controllers;

use App\Models\ImageMap;
use App\Models\ImageMapLoad;
use Exception;
use Illuminate\Http\Request;

class ImageMapController extends Controller
{
    public function imagemap()
    {
        return view('app.admin-panel.imagemaptool.editor');
    }

    public function imagemapSaveLoads(Request $request)
    {
        if ($request->ajax()) {
            try {

                $e = $request->get('e');

                $e = json_decode($e);

                // $updated_scripts = [];

                // $image_map_load = (new ImageMapLoad())->first();

                // if (!$image_map_load) {
                //     $image_map_load = (new ImageMapLoad());
                // }

                // $scripts = $image_map_load->scripts;
                // $scripts = is_null($scripts) ? [] : $scripts;

                // foreach ($scripts as $key => $script) {
                //     if ($script['id'] != $e->id) {
                //         array_push($updated_scripts, $script);
                //     }
                // }

                // array_push($updated_scripts, $e);

                // $image_map_load->scripts = $updated_scripts;
                // $image_map_load->save();

                $flag = false;

                $image_map_loads = (new ImageMapLoad())->all();

                foreach ($image_map_loads as $key => $image_map_load) {
                    $image_map = json_decode($image_map_load->script);
                    if($image_map->id == $e->id){
                        $image_map_load->script = json_encode($e);
                        $image_map_load->save();
                        $flag = true;
                    }
                }

                if(!$flag){
                    (new ImageMapLoad())->create([
                        'script' => json_encode($e),
                        'map_id' => $e->id,
                        'map_name' => $e->general->name,
                    ]);
                }

                return response()->json([
                    'status' => true,
                ]);
            } catch (Exception $e) {
                return response()->json([
                    'status' => false,
                    'message' => 'Failed'
                ]);
            }
        }
    }


    public function imagemapGetLoad(Request $request)
    {
        if ($request->ajax()) {
            try {

                $e = $request->get('e');    //id

                // $image_map_load = (new ImageMapLoad())->first();

                // if ($image_map_load) {
                //     $scripts = $image_map_load->scripts;
                //     foreach ($scripts as $key => $script) {
                //         if($script['id'] == $e){
                //             return response()->json([
                //                 'status' => true,
                //                 'data' => $script
                //             ]);
                //         }
                //     }
                // }


                $image_map_loads = (new ImageMapLoad())->all();

                foreach ($image_map_loads as $key => $image_map_load) {
                    $image_map = json_decode($image_map_load->script);
                    if($image_map->id == $e){
                        return response()->json([
                                'status' => true,
                                'data' => $image_map
                            ]);
                    }
                }

                return response()->json([
                    'status' => false,
                    'message' => 'Failed'
                ]);
            } catch (Exception $e) {
                return response()->json([
                    'status' => false,
                    'message' => 'Failed'
                ]);
            }
        }
    }


    public function imagemapDeleteLoad(Request $request)
    {
        if ($request->ajax()) {
            try {

                $e = $request->get('e');    //id

                // $updated_scripts = [];

                // $image_map_load = (new ImageMapLoad())->first();

                // if ($image_map_load) {
                //     $scripts = $image_map_load->scripts;
                //     foreach ($scripts as $key => $script) {
                //         if($script['id'] != $e){
                //             array_push($updated_scripts, $script);
                //         }
                //     }
                //     // $image_map_load->scripts = $updated_scripts;
                //     $image_map_load->scripts = count($updated_scripts) == 0 ? null : $updated_scripts;

                //     $image_map_load->save();
                // }

                $image_map_load = (new ImageMapLoad())->where('map_id', $e)->first();
                if($image_map_load){
                    $in_image_map = (new ImageMap())->where('image_map_load_id', $image_map_load->id)->where('deleted_at', null)->count();
                    if($in_image_map == 0){
                        $image_map_load->delete();
                    }

                }

                return response()->json([
                    'status' => true
                ]);

            } catch (Exception $e) {
                return response()->json([
                    'status' => false,
                    'message' => 'Failed'
                ]);
            }
        }
    }


    public function imagemapGetLoads(Request $request)
    {
        if ($request->ajax()) {
            try {

                // $image_map_load = (new ImageMapLoad())->first();

                // if ($image_map_load) {
                //     $scripts = $image_map_load->scripts;
                //     return response()->json([
                //         'status' => true,
                //         'data' => $scripts
                //     ]);
                // }

                $scripts = [];

                $image_map_loads = (new ImageMapLoad())->all();

                foreach ($image_map_loads as $key => $image_map_load) {
                    $image_map = json_decode($image_map_load->script);
                    array_push($scripts, $image_map);
                }

                return response()->json([
                    'status' => true,
                    'data' => $scripts
                ]);

            } catch (Exception $e) {
                return response()->json([
                    'status' => false,
                    'message' => 'Failed'
                ]);
            }
        }
    }
}
