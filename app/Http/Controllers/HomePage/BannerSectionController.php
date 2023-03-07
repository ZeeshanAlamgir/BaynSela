<?php

namespace App\Http\Controllers\HomePage;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Models\BannerSection;
use App\Services\UpdateBannerSectionService;
use App\Traits\Image;

class BannerSectionController extends Controller
{
    public $bannerService = null;
    public function __construct(UpdateBannerSectionService $bannerService)
    {
        $this->bannerService = $bannerService;
    }

    public function bannerSection()
    {
        $banner = (new BannerSection())::find(1);
        $bannerData['heading_en'] = $banner ? ($banner->fieldSingleValue('heading', 'en') ? $banner->fieldSingleValue('heading', 'en')->value : '' ): '';
        $bannerData['heading_ar'] = $banner ? ($banner->fieldSingleValue('heading', 'ar') ? $banner->fieldSingleValue('heading', 'ar')->value : '') : '';
        $bannerData['description_en'] = $banner ? ($banner->fieldSingleValue('description', 'en') ? $banner->fieldSingleValue('description', 'en')->value : '') : '';
        $bannerData['description_en_2'] = $banner ? ($banner->fieldSingleValue('description2', 'en') ? $banner->fieldSingleValue('description2', 'en')->value : '') : '';
        $bannerData['description_ar'] = $banner ? ($banner->fieldSingleValue('description', 'ar') ? $banner->fieldSingleValue('description', 'ar')->value : '') : '';
        $bannerData['description_ar_2'] = $banner  ? ($banner->fieldSingleValue('description2', 'ar') ? $banner->fieldSingleValue('description2', 'ar')->value : '') : '';
        $bannerData['meta_description_en'] = $banner ? ($banner->fieldSingleValue('meta_description', 'en') ? $banner->fieldSingleValue('meta_description', 'en')->value : '') : '';
        $bannerData['meta_description_ar'] = $banner ? ($banner->fieldSingleValue('meta_description', 'ar') ? $banner->fieldSingleValue('meta_description', 'ar')->value : '') : '';
        $bannerData['slug'] = $banner ? $banner->slug : '';
        $bannerData['image'] = $banner ? $banner->image : '';
        return view('app.admin-panel.home-page.banner-section.index',compact('bannerData'));
    }

    public function updateBannerSection(StoreBannerRequest $request)
    {
        $this->validate($request,[
            'heading_en'    => 'required',
            'heading_ar'    => 'required',
            'description_en'    => 'required',
            'description_ar'    => 'required',
            'meta_description_en'    => 'required',
            'meta_description_ar'    => 'required',
            'image'    => 'required',
        ]);
        return $this->bannerService->updateBannerSection($request->all());
    //    return response()->json([$this->bannerService->updateBannerSection($request->all()),200]);
    }
}
