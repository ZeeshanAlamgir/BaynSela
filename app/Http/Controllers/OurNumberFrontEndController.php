<?php

namespace App\Http\Controllers;

use App\Models\OurClient;
use App\Models\OurNumber;
use App\Models\Partner;
use App\Models\Project;
use App\Models\StorySection;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class OurNumberFrontEndController extends Controller
{
    public function ourNumber()
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $our_number_banner_section = OurNumber::first();
        $our_partner = (new Partner)->with('partnerImages')->get();
        $our_client = (new OurClient)->with('clientImages')->get();
        $our_project = (new Project())->select('image','id')->first();
        $data = [
            'banner_section'    => [
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
            'story_section'    =>[
                'numbers' => (new StorySection())->select(['happy_partner','successful_projects','total_investments','year_of_exp'])->first(),
            ],
            'our_partners'  =>[
                'partner_heading'   => $our_partner[0]->fieldSingleValue('partner_heading',$locale)->value, 
                'partner_description'   => $our_partner[0]->fieldSingleValue('partner_description',$locale)->value, 
                'images'    => $our_partner[0]->partnerImages
            ],
            'our_client'   =>[
                'client_heading'    => $our_client[0]->fieldSingleValue('client_heading',$locale)->value,
                'client_images'     => $our_client[0]->clientImages
            ],
            'our_project'   => [
                'project_heading'   => $our_project->fieldSingleValue('project_heading',$locale),
                'project_description'   => $our_project->fieldSingleValue('project_description',$locale),
                'image'     => $our_project->image
            ]
        ];
        // dd($data);
        return view('app.front-end.our-numbers.our-numbers',compact($data));
    }
}
