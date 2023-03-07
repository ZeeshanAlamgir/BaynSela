<?php

namespace App\Http\Controllers\HomePage;

use App\Models\Review;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAboutRequest;
use App\Models\Translations;
use App\Services\UpdateAboutSectionService;
use App\Traits\Image;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AboutSectionController extends Controller
{

    public $aboutService = null;
    public $path  = 'app-assets/images/about/';
    use Image;
    public function __construct(UpdateAboutSectionService $aboutService)
    {

        $this->aboutService = $aboutService;
    }

    public function aboutSection()
    {
        $about = (new AboutSection())::find(1);
        // dd($about->fieldSingleValue('about_heading','en'));
        $aboutData['about_heading_en'] = $about ? $about->fieldSingleValue('about_heading', 'en')->value : '';
        $aboutData['about_heading_ar'] = $about ? $about->fieldSingleValue('about_heading', 'ar')->value : '';
        $aboutData['about_description_en'] = $about ? $about->fieldSingleValue('about_description', 'en')->value : '';
        $aboutData['about_description_ar'] = $about ? $about->fieldSingleValue('about_description', 'ar')->value : '';
        $reviews = (new Review())->get();
        // dd($reviews);
        // dd($reviews->multiValues);
        // dd($reviews);
        // dd($reviews->fieldSingleValue('review_heading','en'));
        return view('app.admin-panel.home-page.about-section.about-section', compact('aboutData','reviews'));
    }

    public function updateAboutSection(Request $request)
    {
        $request->validate([
            'about_heading_en' => 'required',
            'about_heading_ar' => 'required',
            // 'about_description_en' => 'required',
            // 'about_description_ar' => 'required',
        ]);
        return response()->json([$this->aboutService->updateAboutSection($request->all()), 'status'=>200]);
    }

    public function updateReview(Request $request , $id){
        $this->validate($request, [
            'review_heading_en' => 'required',
            'review_heading_ar' => 'required',
            'review_description_en' => 'required',
            'review_description_ar' => 'required',
            'profile_name_en' => 'required',
            'profile_name_ar' => 'required',
            'profile_designation_en' => 'required',
            'profile_designation_ar' => 'required',
        ]);

        try {

            $review = (new Review())->find($id);

            if ($review) {

                $file = $request->file('image');
                $name = $file->getClientOriginalName();

                if($review->image != $name){
                    $image_path = public_path('app-assets/images/reviews/' . $review->image);
                        if (File::exists($image_path)) {
                            $deleted = File::delete($image_path);
                        }
                        $new_name = time() . '.' . $name;

                                $destinationPath = public_path('app-assets/images/reviews');
                                $file->move($destinationPath, $new_name);
                                $review->image = $new_name;
                                $review->save();
                }
                $review->fieldSingleValue('review_heading', 'en')->update([
                    'value' => $request->review_heading_en
                ]);
                 $review->fieldSingleValue('review_heading', 'ar')->update([
                    'value' => $request->review_heading_ar
                ]);
                 $review->fieldSingleValue('review_description', 'en')->update([
                    'value' => $request->review_description_en
                ]);
                 $review->fieldSingleValue('review_description', 'ar')->update([
                    'value' => $request->review_description_ar
                ]);

                $review->fieldSingleValue('profile_name', 'en')->update([
                    'value' => $request->profile_name_en
                ]);

                $review->fieldSingleValue('profile_name', 'ar')->update([
                    'value' => $request->profile_name_ar
                ]);

                $review->fieldSingleValue('profile_designation', 'en')->update([
                    'value' => $request->profile_designation_en
                ]);

                $review->fieldSingleValue('profile_designation', 'ar')->update([
                    'value' => $request->profile_designation_ar
                ]);
            }

            return redirect()->route('homepage.aboutsection')->withSuccess('Updated!');
        } catch (Exception $ex) {
            return redirect()->route('homepage.aboutsection')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function storereview(Request $request){

        $this->validate($request, [
            'review_heading_en' => 'required',
            'review_heading_ar' => 'required',
            'review_description_en' => 'required',
            'review_description_ar' => 'required',
            'profile_name_en' => 'required',
            'profile_name_ar' => 'required',
            'profile_designation_en' => 'required',
            'profile_designation_ar' => 'required',
        ]);

        try {

            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $new_name = time() . '.' . $name;
            $destinationPath = public_path('app-assets/images/reviews');
            $file->move($destinationPath, $new_name);

            $review = (new Review())->create([
                'image' => $new_name
            ]);

            if ($review) {

                $data =
                    [
                        [
                            "field" => 'review_heading',
                            "value" => $request->review_heading_en,
                            "locale" => 'en'
                        ],
                        [
                            "field" => 'review_heading',
                            "value" => $request->review_heading_ar,
                            "locale" => 'ar'
                        ],
                        [
                            "field" => 'review_description',
                            "value" => $request->review_description_en,
                            "locale" => 'en'
                        ],
                        [
                            "field" => 'review_description',
                            "value" => $request->review_description_ar,
                            "locale" => 'ar'
                        ],
                        [
                            "field" => 'profile_name',
                            "value" => $request->profile_name_en,
                            "locale" => 'en'
                        ],
                        [
                            "field" => 'profile_name',
                            "value" => $request->profile_name_ar,
                            "locale" => 'ar'
                        ],
                        [
                            "field" => 'profile_designation',
                            "value" => $request->profile_designation_en,
                            "locale" => 'en'
                        ],
                        [
                            "field" => 'profile_designation',
                            "value" => $request->profile_designation_ar,
                            "locale" => 'ar'
                        ]
                    ];
                    storeMultiValue($review, $data);
            }

            return redirect()->route('homepage.aboutsection')->withSuccess('Updated!');
        } catch (Exception $ex) {
            return redirect()->route('homepage.aboutsection')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function deleteReview(Request $request)
    {
        if($request->ajax()){
            try {
                $id = $request->get('id');
                $review = (new Review())->find($id);
                if($review){
                    $review->multiValues()->delete();
                    $image = $review->image;
                    $image_path = public_path('app-assets/images/reviews/' . $image);
                    if (File::exists($image_path)) {
                        $deleted = File::delete($image_path);
                    }
                    $review->delete();
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

}
