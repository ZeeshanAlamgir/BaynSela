<?php



namespace App\Http\Controllers\HomePage;

use App\Models\StoryImage;
use App\Models\StorySection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStoryRequest;
use App\Services\UpdateStorySectionService;

class StorySectionController extends Controller
{
    public $storyService = null;
    public function __construct(UpdateStorySectionService $storyService)
    {

        $this->storyService = $storyService;
    }

    public function storySection()
    {
        $story = (new StorySection())::find(1);
        $storyData['story_heading_en'] = $story->fieldSingleValue('story_heading', 'en')->value;
        $storyData['story_heading_ar'] = $story->fieldSingleValue('story_heading', 'ar')->value;
        $storyData['story_description_en'] = $story ? $story->fieldSingleValue('story_description', 'en')->value : '';
        $storyData['story_description_ar'] = $story ? $story->fieldSingleValue('story_description', 'ar')->value : '';
        $storyData['slug'] = $story ? $story->slug : '';
        $storyData['happy_partner']= $story ? $story->happy_partner : '';
        $storyData['successful_projects']= $story ? $story->successful_projects : '';
        $storyData['total_investments']=$story ? $story->total_investments : '';
        $storyData['year_of_exp']= $story ? $story->year_of_exp : '';
        return view('app.admin-panel.home-page.story-section.story-section', compact('storyData'));
    }

    public function updateStorySection(StoreStoryRequest $request)
    {
        $request->validate([
            'story_heading_en' => 'required',
            'story_heading_ar' => 'required',
            // 'story_description_en' => 'required',
            // 'story_description_ar' => 'required',
            'happy_partner'=>'required',
            'successful_projects'=>'required',
            'total_investments'=>'required',
            'year_of_exp'=>'required',

        ]);
       return response()->json([$this->storyService->updateStorySection($request->all()),200]);
    }


}
