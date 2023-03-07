<?php

namespace Database\Seeders;

use App\Models\ContactSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contactsection = (new ContactSection())->create([
            'slug' => 'contact-section',
            'page_id' => '1'


        ]);

        $data = [
            [
                "field" => "contact_heading",
                "value" => "We are delighted to hear from you and answer your inquiries",
                "locale" => "en",
            ],
            [
                "field" => "contact_heading",
                "value" => "نسعد بمشاركتك وتلقي استفساراتكم",
                "locale" => "ar",
            ],

            [
                "field" => "contact_description",
                "value" => "Our platform connects you with what you seek to achieve, we embrace your ideas, encourage your vision and reach your expectations. Join us now to create ample opportunities, experiences and many achievements.",
                "locale" => "en",
            ],
            [
                "field" => "contact_description",
                "value" => "  شاركنا الآن لنخلق متسع من الفرص والتجارب والكثير من الانجازات. منصتنا  بي ما تسعى لتحقيقه، نحتوي أفكارك، نشجع رؤيتك ونصل لتوقعاتك  ",
                "locale" => "ar",
            ],
        ];

        storeMultiValue($contactsection, $data);
    }
}
