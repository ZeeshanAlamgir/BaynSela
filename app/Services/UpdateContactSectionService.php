<?php

namespace App\Services;
use App\Traits\Image;
use App\Models\Review;
use App\Models\StoryImage;

use Illuminate\Support\Str;

use App\Models\StorySection;
use App\Models\ContactSection;
use Illuminate\Support\Facades\File;

class UpdateContactSectionService
{


    public function updateContactSection($data)
    {
        $contact = (new ContactSection())::find(1);
      //Contact Section
        $contact->page_id = 1;
        $contact_heading_en = $contact->fieldSingleValue('contact_heading','en');
        $contact_heading_ar = $contact->fieldSingleValue('contact_heading','ar');
        $contact_description_en = $contact->fieldSingleValue('contact_description','en');
        $contact_description_ar = $contact->fieldSingleValue('contact_description','ar');

        $contact_heading_en->update([
            'value'=>$data['contact_heading_en']
        ]);
        $contact_heading_ar->update([
            'value'=>$data['contact_heading_ar']
        ]);

        $contact_description_en->update([
            'value'=>$data['contact_description_en']
        ]);
        $contact_description_ar->update([
            'value'=>$data['contact_description_ar']
        ]);

        $contact->slug = Str::slug($data['contact_heading_en']);

        $contact->save();
    }

}
