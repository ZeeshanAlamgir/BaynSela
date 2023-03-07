<?php

namespace Database\Seeders;

use App\Models\PrivacyPolicy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrivacyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $privacy_policy = (new PrivacyPolicy())->create([

                'slug'              => 'privacy-section',
                'page_id'           => 1,
            ]);

            $data = [
                [
                    "field" => "privacy_heading",
                    "value" => "Privacy & Policy",
                    "locale" => "en",
                ],
                [
                    "field" => "privacy_heading",
                    "value" => "سياسة الخصوصية",
                    "locale" => "ar",
                ],
                [
                    "field" => "privacy_description",
                    "value" => "This Privacy Policy covers all personal information collected and used by Sela Company (company/us).",
                    "locale" => "en",
                ],
                [
                    "field" => "privacy_description",
                    "value" => "تتضمن سياسية الخصوصية هذه كل المعلومات الشخصية المجمعة والمستعملة من طرف شركة صلة (ويشار إليها فيما بعد إما بنحن أو الشركة)",
                    "locale" => "ar",
                ],

            ];

            storeMultiValue($privacy_policy, $data);
        }
    }
}
