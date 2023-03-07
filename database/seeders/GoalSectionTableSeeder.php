<?php

namespace Database\Seeders;

use App\Models\GoalSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoalSectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $goal_section = (new GoalSection())->create([
            'image_en'             => 'goalsection-en.jpg',
            'slug'                  => 'goal-section',
            'page_id'           => 1,
            'order'             => 1
        ]);

        $data = [
            [
                "field" => "heading",
                "value" => "Goal Section",
                "locale" => "en",
            ],
            [
                "field" => "heading",
                "value" => "تعرفوا علينا لتكونوا بيننا",
                "locale" => "ar",
            ],
            [
                "field" => "description",
                "value" => "Bayn is a comprehensive digital platform developed by Sela in Saudi Arabia. It is a front end that attracts various types of fruitful partnerships that create inspiring experiences and rare opportunities in business and communities.Our mission is to bring the brand to the highest peaks of success, by following advanced and interactive methods which integrate our various experiences and capabilities.Enabling our partners to visualize the value of their contribution and form a clear vision of consumer behavior that distinguishes them from competitors and aids them in reaching greater achievements.",
                "locale" => "en",
            ],
            [
                "field" => "description",
                "value" => "منصة رقمية شاملة مقدمة من صلة، تعتبر الواجهة الأمامية التي تجذب مختلف أنواع الشراكات المثمرة لتخلق تجارب ملهمة و فرص نادرة في المجتمعات و عالم الأعمال.مهمتنا هي أن نصل بالهوية التجارية إلى أعلى قمم النجاح مهما كان طبيعة نشاطها وذلك باتباع أساليب تفاعلية متطورة وجذابة تدمج العديد من الخبرات والإمكانات التي تمكن شركائنا من تصور القيمة المضافة مقابل مساهمتهم وتشكل لديهم رؤية واضحة عن سلوك المستهلكين، مما يميزهم عن جميع منافسيهم ويقودهم لتحقيق إنجازات أكبر دليلها الإتقان والاحترافية.",
                "locale" => "ar",
            ],
        ];

        storeMultiValue($goal_section, $data);
    }
}
