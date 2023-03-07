<?php

namespace App\Services;

use App\Models\OurClient;
use App\Models\OurClientImage;
use App\Models\OurNumber;
use App\Models\Partner;
use App\Models\PartnerImage;
use App\Models\Project;
use App\Models\TemporaryFile;
use App\Traits\Image;
use Illuminate\Support\Facades\File;

class OurNumberService
{
    use Image;
    public $projectImg=null,$path = 'app-assets/images/numbers/banner/',$partners_image_path = 'app-assets/images/numbers/partners/',$project_image_path = 'app-assets/images/numbers/projects/',$client_image_path= 'app-assets/images/numbers/clients/',$bannerImage=null,$image_path,$client_image=null;
    public function updateOurNumberBannerSection($data)
    {
        $number_banner_section = (new OurNumber())->find(1);
        $number_heading_en = $number_banner_section->fieldSingleValue('number_heading','en');
        $number_heading_ar = $number_banner_section->fieldSingleValue('number_heading','ar');
        $number_description_en = $number_banner_section->fieldSingleValue('number_description','en');
        $number_description_ar = $number_banner_section->fieldSingleValue('number_description','ar');
        $number_wwr_heading_en = $number_banner_section->fieldSingleValue('number_wwr_heading','en');
        $number_wwr_heading_ar = $number_banner_section->fieldSingleValue('number_wwr_heading','ar');
        $number_wwr_description_en = $number_banner_section->fieldSingleValue('number_wwr_description','en');
        $number_wwr_description_ar = $number_banner_section->fieldSingleValue('number_wwr_description','ar');
        $number_wwd_heading_en = $number_banner_section->fieldSingleValue('number_wwd_heading','en');
        $number_wwd_heading_ar = $number_banner_section->fieldSingleValue('number_wwd_heading','ar');
        $number_wwd_description_en = $number_banner_section->fieldSingleValue('number_wwd_description','en');
        $number_wwd_description_ar = $number_banner_section->fieldSingleValue('number_wwd_description','ar');
        $number_ovp_heading_en = $number_banner_section->fieldSingleValue('number_ovp_heading','en');
        $number_ovp_heading_ar = $number_banner_section->fieldSingleValue('number_ovp_heading','ar');
        $number_ovp_description_en = $number_banner_section->fieldSingleValue('number_ovp_description','en');
        $number_ovp_description_ar = $number_banner_section->fieldSingleValue('number_ovp_description','ar');
        $number_mo_heading_en = $number_banner_section->fieldSingleValue('number_mo_heading','en');
        $number_mo_heading_ar = $number_banner_section->fieldSingleValue('number_mo_heading','ar');
        $number_mo_description_en = $number_banner_section->fieldSingleValue('number_mo_description','en');
        $number_mo_description_ar = $number_banner_section->fieldSingleValue('number_mo_description','ar');
        try {
            if($data['banner_image'] != null)
            {
                File::delete($this->path.$number_banner_section->number_banner_section_image);
                $this->bannerImage = $this->imageStore($this->path,$data['banner_image']);
            }
            else
                $this->bannerImage = $number_banner_section->number_banner_section_image;
        } catch (\Exception $ex) {
            $this->bannerImage = $number_banner_section->number_banner_section_image;
        }
        $number_heading_en->update([
            'value' => $data['number_heading_en']
        ]);
        $number_heading_ar->update([
            'value' => $data['number_heading_ar']
        ]);
        $number_description_en->update([
            'value' => $data['number_description_en']
        ]);
        $number_description_ar->update([
            'value' => $data['number_description_ar']
        ]);
        $number_wwr_heading_en->update([
            'value' => $data['number_wwr_heading_en']
        ]);
        $number_wwr_heading_ar->update([
            'value' => $data['number_wwr_heading_ar']
        ]);
        $number_wwr_description_en->update([
            'value' => $data['number_wwr_description_en']
        ]);
        $number_wwr_description_ar->update([
            'value' => $data['number_wwr_description_ar']
        ]);
        $number_wwd_heading_en->update([
            'value' => $data['number_wwd_heading_en']
        ]);
        $number_wwd_heading_ar->update([
            'value' => $data['number_wwd_heading_ar']
        ]);
        $number_wwd_description_en->update([
            'value' => $data['number_wwd_description_en']
        ]);
        $number_wwd_description_ar->update([
            'value' => $data['number_wwd_description_ar']
        ]);
        $number_ovp_heading_en->update([
            'value' => $data['number_ovp_heading_en']
        ]);
        $number_ovp_heading_ar->update([
            'value' => $data['number_ovp_heading_ar']
        ]);
        $number_ovp_description_en->update([
            'value' => $data['number_ovp_description_en']
        ]);
        $number_ovp_description_ar->update([
            'value' => $data['number_ovp_description_ar']
        ]);
        $number_mo_heading_en->update([
            'value' => $data['number_mo_heading_en']
        ]);
        $number_mo_heading_ar->update([
            'value' => $data['number_mo_heading_ar']
        ]);
        $number_mo_description_en->update([
            'value' => $data['number_mo_description_en']
        ]);
        $number_mo_description_ar->update([
            'value' => $data['number_mo_description_ar']
        ]);
        $number_banner_section->number_banner_section_image = $this->bannerImage;
        $number_banner_section->save();
    }

    public function updateOurNumberPartnerSection($data)
    {
        $partner = (new Partner())->find(1);
        $partner_heading_en = $partner->fieldSingleValue('partner_heading','en');
        $partner_heading_ar = $partner->fieldSingleValue('partner_heading','ar');
        $partner_description_en = $partner->fieldSingleValue('partner_description','en');
        $partner_description_ar = $partner->fieldSingleValue('partner_description','ar');

        $images = $data['image'];
        $new_images = [];
        foreach($images as $image)
        {
            array_push($new_images,$image->getClientOriginalName());
        }
        $partner_images = (new PartnerImage())->where('partner_id', $partner->id)->select('image','id')->get();
        foreach($partner_images as $partner_image)
        {
            if(array_search($partner_image->image,$new_images)===false)
            {
                $this->image_path = public_path('app-assets/images/numbers/partners/'. $partner_image->image);
                if(File::exists(($this->image_path)))
                {
                    $deleted = File::delete($this->image_path);
                    if ($deleted)
                        $partner_image->delete();
                }
            }
        }
        foreach ($data['image'] as $key => $partner_images)
        {
            try
            {
                $partner_image = (new PartnerImage())->where('image', $partner_images->getClientOriginalName())->get()->first();
                if((empty($partner_image)))
                {
                    $this->partner_image = $this->imageStore($this->partners_image_path,$partner_images);
                    (new PartnerImage())->create([
                        'image'         =>  $this->partner_image,
                        'partner_id'    => $partner->id
                    ]);
                }

            }
            catch (\Exception $ex)
            {
                $this->partner_image = $partner->image;
            }

        }
        $partner_heading_en->update([
            'value' => $data['partner_heading_en']
        ]);
        $partner_heading_ar->update([
            'value' => $data['partner_heading_ar']
        ]);
        $partner_description_en->update([
            'value' => $data['partner_description_en']
        ]);
        $partner_description_ar->update([
            'value' => $data['partner_description_ar']
        ]);
    }

    public function updateOurNumberClientSection($data)
    {
        $image_folders = $data['image'];

        foreach ($image_folders as $key => $folder) {
            $temporary_file = (new TemporaryFile())->where('folder', $folder)->first();
            if($temporary_file){

                $prev_client_image = (new OurClientImage())->where('image', $temporary_file->file)->first();
                if($prev_client_image){
                    $pre_client_image_path = public_path('app-assets/images/numbers/clients/' . $prev_client_image->image);
                    if (File::exists($pre_client_image_path)) {
                        $deleted = File::delete($pre_client_image_path);
                    }
                    $prev_client_image->delete();
                }

                $path = public_path('app-assets/images/temporaryfiles/' . $folder . '/' . $temporary_file->file);
                $target = public_path('app-assets/images/numbers/clients');
                File::copy($path , $target . '/' .$temporary_file->file);
                File::deleteDirectory(public_path('app-assets/images/temporaryfiles/' . $folder));

                (new OurClientImage())->create([
                    'image' => $temporary_file->file,
                    'our_client_id' => 1
                ]);
                $temporary_file->delete();
            }
        }

        // $new_client_image = [];

        // foreach($images as $image)
        // {
        //     array_push($new_client_image,$image->getClientOriginalName());
        // }
        // $our_client_images = (new OurClientImage())->select('image','id')->get();

        // foreach($our_client_images as $client_image)
        // {
        //     if(array_search($client_image->image,$new_client_image)===false)
        //     {
        //         $this->image_path = public_path('app-assets/images/numbers/clients/'. $client_image->image);
        //         if(File::exists(($this->image_path)))
        //         {
        //             $deleted = File::delete($this->image_path);
        //             if ($deleted)
        //                 $client_image->delete();
        //         }
        //     }
        // }

        $client = (new OurClient())->find(1);
        $client_heading_en = $client->fieldSingleValue('client_heading','en');
        $client_heading_ar = $client->fieldSingleValue('client_heading','ar');

        $client_heading_en->update([
            'value' => $data['client_heading_en']
        ]);

        $client_heading_ar->update([
            'value' => $data['client_heading_ar']
        ]);

        // foreach ($data['image'] as $client_image)
        // {
        //     try
        //     {
        //         $clientImage = (new OurClientImage())->where('image', $client_image->getClientOriginalName())->get()->first();
        //         if((empty($clientImage)) || is_null($clientImage))
        //         {
        //             $this->clientImage = $this->imageStore($this->client_image_path,$client_image);
        //             (new OurClientImage())->create([
        //                 'image'         =>  $this->clientImage,
        //                 'our_client_id'    => $client->id
        //             ]);
        //         }

        //     }
        //     catch (\Exception $ex)
        //     {
        //         $this->client_image = $clientImage->image;
        //     }

        // }
    }

    public function updateProjectSection($data)
    {
        $project = (new Project())->find(1);
        $project_heading_en = $project->fieldSingleValue('project_heading','en');
        $project_heading_ar = $project->fieldSingleValue('project_heading','ar');
        $project_description_en = $project->fieldSingleValue('project_description','en');
        $project_description_ar = $project->fieldSingleValue('project_description','ar');

        $project_heading_en->update([
            'value' => $data['project_heading_en']
        ]);

        $project_heading_ar->update([
            'value' => $data['project_heading_ar']
        ]);

        $project_description_en->update([
            'value' => $data['project_description_en']
        ]);

        $project_description_ar->update([
            'value' => $data['project_description_ar']
        ]);

        try {
            if($data['image'] != null)
            {
                File::delete($this->project_image_path.$project->image);
                $this->projectImg = $this->imageStore($this->project_image_path,$data['image']);
            }
            else
                $this->projectImg = $project->image;
        } catch (\Exception $ex) {
            $this->projectImg = $project->image;
        }
        $project->image = $this->projectImg;
        $project->save();
    }
}
