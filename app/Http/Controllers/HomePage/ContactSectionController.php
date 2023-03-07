<?php

namespace App\Http\Controllers\HomePage;

use Illuminate\Http\Request;
use App\Models\ContactSection;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Services\UpdateContactSectionService;

class ContactSectionController extends Controller
{

    public $contactService = null;
    public function __construct(UpdateContactSectionService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function contactSection()
    {
            $contact = (new ContactSection())::find(1);

            $contactData['contact_heading_en'] = $contact ? $contact->fieldSingleValue('contact_heading', 'en')->value : '';
            $contactData['contact_heading_ar'] = $contact ? $contact->fieldSingleValue('contact_heading', 'ar')->value : '';
            $contactData['contact_description_en'] = $contact ? $contact->fieldSingleValue('contact_description', 'en')->value : '';
            $contactData['contact_description_ar'] = $contact ? $contact->fieldSingleValue('contact_description', 'ar')->value : '';

            return view('app.admin-panel.home-page.contact-section.contact-section',compact('contactData'));
    }

    public function updateContactSection(StoreContactRequest $request)
    {
        $request->validate([
            'contact_heading_en' => 'required',
            'contact_heading_ar' => 'required',
            'contact_description_en' => 'required',
            'contact_description_ar' => 'required',
        ]);
       return response()->json([$this->contactService->updateContactSection($request->all()),200]);
    }
}
