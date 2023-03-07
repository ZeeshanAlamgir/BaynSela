<?php

namespace Database\Seeders;

use App\Models\TermCondition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $term_condition = (new TermCondition())->create([

            'slug'              => 'term-condition',
            'page_id'           => 1,
        ]);

        $data = [
            [
                "field" => "term_heading",
                "value" => "Terms & Condition",
                "locale" => "en",
            ],
            [
                "field" => "term_heading",
                "value" => "سياسة الخصوصية",
                "locale" => "ar",
            ],
            [
                "field" => "term_description",
                "value" => "This Privacy Policy covers all personal information collected and used by Sela Company (company/us).",
                "locale" => "en",
            ],
            [
                "field" => "term_description",
                "value" => "تتضمن سياسية الخصوصية هذه كل المعلومات الشخصية المجمعة والمستعملة من طرف شركة صلة (ويشار إليها فيما بعد إما بنحن أو الشركة)",
                "locale" => "ar",
            ],

        ];

        storeMultiValue($term_condition, $data);
    }
}
