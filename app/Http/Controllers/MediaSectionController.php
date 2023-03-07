<?php

namespace App\Http\Controllers;

use App\DataTables\MediaImageDataTable;
use App\Models\MediaImage;
use Exception;
use Illuminate\Http\Request;

class MediaSectionController extends Controller
{
    public function index(MediaImageDataTable $mediaImageDataTable)
    {
        return $mediaImageDataTable->render('app.admin-panel.media.index');
    }

    public function destroySelected(Request $request)
    {
        try {
            if ($request->has('chkData')) {

                $media_images = (new MediaImage())->whereIn('id', $request->chkData)->get();
                foreach ($media_images as $key => $media_image) {
                    $media_image->clearMediaCollection('image');
                    $media_image->delete();
                }
                // (new MediaImage())->whereIn('id', $request->chkData)->delete();

                return redirect()->route('mediasection.index')->withSuccess('Data deleted!');
            } else {
                return redirect()->route('mediasection.index')->withWarning('Please select at least one item!');
            }
        } catch (Exception $ex) {
            return redirect()->route('mediasection.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function create(Request $request)
    {
        return view('app.admin-panel.media.create');
    }

    public function store(Request $request)
    {
        try {

            if($request->hasFile('images')){
                $images = $request->file('images');
                if($images){
                    foreach ($images as $key => $image) {
                        $media_image = (new MediaImage())->create();
                        if($media_image){
                            $media_image->addMedia($image)->preservingOriginal()->toMediaCollection('image');
                        }
                    }
                }
            }

            return redirect()->route('mediasection.index')->withSuccess('Data Saved!');
        } catch (Exception $ex) {
            return redirect()->route('mediasection.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

}
