<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TermCondition;
use App\Http\Requests\StoreTermRequest;
use App\Services\UpdateTermSectionService;
use Illuminate\Support\Str;
class TermsConditionController extends Controller
{
    public $termService = null;
    public function __construct(UpdateTermSectionService $termService)
    {
        $this->termService = $termService;
    }


    public function termSection()
    {
        $term = (new TermCondition())::find(1);
        $termData['term_heading_en'] = $term->fieldSingleValue('term_heading', 'en')->value;
        $termData['term_heading_ar'] = $term->fieldSingleValue('term_heading', 'ar')->value;
        $termData['term_description_en'] = $term->fieldSingleValue('term_description', 'en')->value;
        $termData['term_description_ar'] = $term->fieldSingleValue('term_description', 'ar')->value;
        $termData['slug'] = $term->slug;

        return view('app.admin-panel.term-condition.index',compact('termData'));
    }

    public function updateTermSection(Request $request)
    {
        $request->validate([
            'term_heading_en' => 'required',
            'term_heading_ar' => 'required',
            'term_description_en' => 'required',
            'term_description_ar' => 'required',

        ]);
        $term = (new TermCondition())::find(1);

        $term->page_id = 1;

        $heading_en = $term->fieldSingleValue('term_heading','en');
        $heading_ar = $term->fieldSingleValue('term_heading','ar');
        $description_en = $term->fieldSingleValue('term_description','en');
        $description_ar = $term->fieldSingleValue('term_description','ar');

        $heading_en->update([
            'value'=>$request['term_heading_en']
        ]);
        $heading_ar->update([
            'value'=>$request['term_heading_ar']
        ]);
        $description_en->update([
            'value'=>$request['term_description_en']
        ]);
        $description_ar->update([
            'value'=>$request['term_description_ar']
        ]);

        $term->slug = Str::slug($request['term_heading_en']);
        $term->save();

        return redirect()->to('admin/terms/terms-section')->with('success', 'Data Updated');
    }
}
