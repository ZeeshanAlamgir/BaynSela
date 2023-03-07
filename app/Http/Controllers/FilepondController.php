<?php

namespace App\Http\Controllers;

use App\Models\OurClientImage;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FilepondController extends Controller
{

    public function saveFile(Request $request){

        $files = $request->file('image');
        $name = $files[0]->getClientOriginalName();
        $new_name = cleanString($name);
        $folder = uniqid('filepond',true);
        $destinationPath = public_path('app-assets/images/temporaryfiles/' . $folder);
        $files[0]->move($destinationPath, $new_name);
        (new TemporaryFile())->create([
            'folder' => $folder,
            'file' => $new_name
        ]);
        return $folder;
    }

    public function revertFile(Request $request){
        $folder = $request->getContent();
        $temporary_file = (new TemporaryFile())->where('folder', $folder)->first();
        if($temporary_file){
            $our_client_image = (new OurClientImage())->where('image', $temporary_file->file)->first();
            if($our_client_image){
                $our_client_image_path = public_path('app-assets/images/numbers/clients/' . $our_client_image->image);
                if (File::exists($our_client_image_path)) {
                    $deleted = File::delete($our_client_image_path);
                }
                $our_client_image->delete();
            }
            File::deleteDirectory(public_path('app-assets/images/temporaryfiles/' . $folder));
            $temporary_file->delete();
        }
    }

    public function settingView()
    {
        return view('app.admin-panel.setting.setting');
    }

    public function deleteTemporaryFiles()
    {
        $files = public_path('app-assets/images/temporaryfiles');
        // dd(file_exists($files));
        if(file_exists($files))
        {
            File::deleteDirectory($files); //deleteDirectory used to delete folder and File::delete used to delete single file
            return redirect()->back()->withSuccess('Temporary Files Deleted...');
        }
        else
        {
            return redirect()->back();
        }

    }
}
