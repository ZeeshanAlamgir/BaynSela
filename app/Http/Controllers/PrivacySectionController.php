<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Http\Requests\StorePrivacyRequest;
use App\Services\UpdatePrivacySectionService;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
class PrivacySectionController extends Controller
{


    public $privacyService = null;
    public function __construct(UpdatePrivacySectionService $privacyService)
    {
        $this->privacyService = $privacyService;
    }


    public function privacySection()
    {
        $privacy = (new PrivacyPolicy())::find(1);
        $privacyData['privacy_heading_en'] = $privacy->fieldSingleValue('privacy_heading', 'en')->value;
        $privacyData['privacy_heading_ar'] = $privacy->fieldSingleValue('privacy_heading', 'ar')->value;
        $privacyData['privacy_description_en'] = $privacy->fieldSingleValue('privacy_description', 'en')->value;
        $privacyData['privacy_description_ar'] = $privacy->fieldSingleValue('privacy_description', 'ar')->value;
        $privacyData['slug'] = $privacy->slug;

        return view('app.admin-panel.privacy-policy.index',compact('privacyData'));
    }


    public function updatePrivacySection(Request $request)
    {

        $request->validate([
            'privacy_heading_en' => 'required',
            'privacy_heading_ar' => 'required',
            'privacy_description_en' => 'required',
            'privacy_description_ar' => 'required',

        ]);
        $privacy = (new PrivacyPolicy())::find(1);


        $privacy->page_id = 1;

        $privacy_heading_en = $privacy->fieldSingleValue('privacy_heading', 'en');
        $privacy_heading_ar = $privacy->fieldSingleValue('privacy_heading', 'ar');
        $privacy_description_en = $privacy->fieldSingleValue('privacy_description', 'en');
        $privacy_description_ar = $privacy->fieldSingleValue('privacy_description', 'ar');

        $privacy_heading_en->update([
            'value' => $request['privacy_heading_en']
        ]);
        $privacy_heading_ar->update([
            'value' => $request['privacy_heading_ar']
        ]);
        $privacy_description_en->update([
            'value' => $request['privacy_description_en']
        ]);
        $privacy_description_ar->update([
            'value' => $request['privacy_description_ar']
        ]);

        $privacy->slug = Str::slug($request['privacy_heading_en']);
        $privacy->save();

         return redirect()->to('admin/privacy/privacy-section')->with('success', 'Data Updated');
    }
}
