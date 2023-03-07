<?php

namespace App\Http\Controllers\HomePage;

use App\Models\VideoSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\StoreVideoRequest;
use App\Services\UpdateVideoSectionService;

class VideoSectionController extends Controller
{
    public $videoService = null;
    public function __construct(UpdateVideoSectionService $videoService)
    {

        $this->videoService = $videoService;
    }


    public function videoSection()
    {
        $video = (new VideoSection())::find(1);
        $videoData['heading_en'] = $video ? ($video->fieldSingleValue('heading', 'en') ? $video->fieldSingleValue('heading', 'en')->value : '') : '';
        $videoData['heading_ar'] = $video ? ($video->fieldSingleValue('heading', 'ar') ? $video->fieldSingleValue('heading', 'ar')->value : ''): '';
        $videoData['description_en'] = $video ? ($video->fieldSingleValue('description', 'en') ? $video->fieldSingleValue('description', 'en')->value : '') : '';
        $videoData['description_ar'] = $video ? ($video->fieldSingleValue('description', 'ar') ? $video->fieldSingleValue('description', 'ar')->value : '') : '';
        $videoData['slug'] = $video ? $video->slug : '';
        $videoData['image'] = $video ? $video->image : '';
        $videoData['video_url'] = $video ? $video->video_url : '';

        return view('app.admin-panel.home-page.video-section.video-section',compact('videoData'));
    }

    public function updateVideoSection(StoreVideoRequest $request)
    {
        $this->validate($request,[
            'heading_en' => 'required',
            'heading_ar' => 'required',
            // 'description_en' => 'required',
            // 'description_ar' => 'required',
            'image' => 'required',
            'video_url' => 'required',
        ]);
        return $this->videoService->updateVideoSection($request->all());
    //    return response()->json([$this->videoService->updateVideoSection($request->all()),200]);
    }
}
