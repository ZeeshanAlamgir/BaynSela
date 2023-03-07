<?php

namespace Database\Seeders;

use App\Models\OurNumber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $number_banner_section = (new OurNumber())->create([
            'number_banner_section_image'   => 'number-banner-image.jpg'
        ]);

        $data = 
        [
            [
                "field" => "number_heading",
                "value" => "Number Heading",
                "locale" => "en",
            ],
            [
                "field" => "number_heading",
                "value" => "تعرفوا علينا لتكونوا بيننا",
                "locale" => "ar",
            ],
            [
                "field" => "number_description",
                "value" => "Bayn is a comprehensive digital platform developed by Sela in Saudi Arabia. It is a front end that attracts various types of fruitful partnerships that create inspiring experiences and rare opportunities in business and communities.Our mission is to bring the brand to the highest peaks of success, by following advanced and interactive methods which integrate our various experiences and capabilities.Enabling our partners to visualize the value of their contribution and form a clear vision of consumer behavior that distinguishes them from competitors and aids them in reaching greater achievements.",
                "locale" => "en",
            ],
            [
                "field" => "number_description",
                "value" => "منصة رقمية شاملة مقدمة من صلة، تعتبر الواجهة الأمامية التي تجذب مختلف أنواع الشراكات المثمرة لتخلق تجارب ملهمة و فرص نادرة في المجتمعات و عالم الأعمال.مهمتنا هي أن نصل بالهوية التجارية إلى أعلى قمم النجاح مهما كان طبيعة نشاطها وذلك باتباع أساليب تفاعلية متطورة وجذابة تدمج العديد من الخبرات والإمكانات التي تمكن شركائنا من تصور القيمة المضافة مقابل مساهمتهم وتشكل لديهم رؤية واضحة عن سلوك المستهلكين، مما يميزهم عن جميع منافسيهم ويقودهم لتحقيق إنجازات أكبر دليلها الإتقان والاحترافية.",
                "locale" => "ar",
            ],
            [
                "field" => "number_wwr_heading",
                "value" => "WWE Heading",
                "locale" => "en",
            ],
            [
                "field" => "number_wwr_heading",
                "value" => "تعرفوا علينا لتكونوا بيننا",
                "locale" => "ar",
            ],
            [
                "field" => "number_wwr_description",
                "value" => "Bayn is a comprehensive digital platform developed by Sela in Saudi Arabia. It is a front end that attracts various types of fruitful partnerships that create inspiring experiences and rare opportunities in business and communities.Our mission is to bring the brand to the highest peaks of success, by following advanced and interactive methods which integrate our various experiences and capabilities.Enabling our partners to visualize the value of their contribution and form a clear vision of consumer behavior that distinguishes them from competitors and aids them in reaching greater achievements.",
                "locale" => "en",
            ],
            [
                "field" => "number_wwr_description",
                "value" => "منصة رقمية شاملة مقدمة من صلة، تعتبر الواجهة الأمامية التي تجذب مختلف أنواع الشراكات المثمرة لتخلق تجارب ملهمة و فرص نادرة في المجتمعات و عالم الأعمال.مهمتنا هي أن نصل بالهوية التجارية إلى أعلى قمم النجاح مهما كان طبيعة نشاطها وذلك باتباع أساليب تفاعلية متطورة وجذابة تدمج العديد من الخبرات والإمكانات التي تمكن شركائنا من تصور القيمة المضافة مقابل مساهمتهم وتشكل لديهم رؤية واضحة عن سلوك المستهلكين، مما يميزهم عن جميع منافسيهم ويقودهم لتحقيق إنجازات أكبر دليلها الإتقان والاحترافية.",
                "locale" => "ar",
            ],
            [
                "field" => "number_wwd_heading",
                "value" => "WWD Heading",
                "locale" => "en",
            ],
            [
                "field" => "number_wwd_heading",
                "value" => "تعرفوا علينا لتكونوا بيننا",
                "locale" => "ar",
            ],
            [
                "field" => "number_wwd_description",
                "value" => "Bayn is a comprehensive digital platform developed by Sela in Saudi Arabia. It is a front end that attracts various types of fruitful partnerships that create inspiring experiences and rare opportunities in business and communities.Our mission is to bring the brand to the highest peaks of success, by following advanced and interactive methods which integrate our various experiences and capabilities.Enabling our partners to visualize the value of their contribution and form a clear vision of consumer behavior that distinguishes them from competitors and aids them in reaching greater achievements.",
                "locale" => "en",
            ],
            [
                "field" => "number_wwd_description",
                "value" => "منصة رقمية شاملة مقدمة من صلة، تعتبر الواجهة الأمامية التي تجذب مختلف أنواع الشراكات المثمرة لتخلق تجارب ملهمة و فرص نادرة في المجتمعات و عالم الأعمال.مهمتنا هي أن نصل بالهوية التجارية إلى أعلى قمم النجاح مهما كان طبيعة نشاطها وذلك باتباع أساليب تفاعلية متطورة وجذابة تدمج العديد من الخبرات والإمكانات التي تمكن شركائنا من تصور القيمة المضافة مقابل مساهمتهم وتشكل لديهم رؤية واضحة عن سلوك المستهلكين، مما يميزهم عن جميع منافسيهم ويقودهم لتحقيق إنجازات أكبر دليلها الإتقان والاحترافية.",
                "locale" => "ar",
            ],
            [
                "field" => "number_ovp_heading",
                "value" => "Our Valuable Partnership Heading",
                "locale" => "en",
            ],
            [
                "field" => "number_ovp_heading",
                "value" => "تعرفوا علينا لتكونوا بيننا",
                "locale" => "ar",
            ],
            [
                "field" => "number_ovp_description",
                "value" => "Bayn is a comprehensive digital platform developed by Sela in Saudi Arabia. It is a front end that attracts various types of fruitful partnerships that create inspiring experiences and rare opportunities in business and communities.Our mission is to bring the brand to the highest peaks of success, by following advanced and interactive methods which integrate our various experiences and capabilities.Enabling our partners to visualize the value of their contribution and form a clear vision of consumer behavior that distinguishes them from competitors and aids them in reaching greater achievements.",
                "locale" => "en",
            ],
            [
                "field" => "number_ovp_description",
                "value" => "منصة رقمية شاملة مقدمة من صلة، تعتبر الواجهة الأمامية التي تجذب مختلف أنواع الشراكات المثمرة لتخلق تجارب ملهمة و فرص نادرة في المجتمعات و عالم الأعمال.مهمتنا هي أن نصل بالهوية التجارية إلى أعلى قمم النجاح مهما كان طبيعة نشاطها وذلك باتباع أساليب تفاعلية متطورة وجذابة تدمج العديد من الخبرات والإمكانات التي تمكن شركائنا من تصور القيمة المضافة مقابل مساهمتهم وتشكل لديهم رؤية واضحة عن سلوك المستهلكين، مما يميزهم عن جميع منافسيهم ويقودهم لتحقيق إنجازات أكبر دليلها الإتقان والاحترافية.",
                "locale" => "ar",
            ],
            [
                "field" => "number_mo_heading",
                "value" => "Our Massive Opportunity Heading",
                "locale" => "en",
            ],
            [
                "field" => "number_mo_heading",
                "value" => "تعرفوا علينا لتكونوا بيننا",
                "locale" => "ar",
            ],
            [
                "field" => "number_mo_description",
                "value" => "Bayn is a comprehensive digital platform developed by Sela in Saudi Arabia. It is a front end that attracts various types of fruitful partnerships that create inspiring experiences and rare opportunities in business and communities.Our mission is to bring the brand to the highest peaks of success, by following advanced and interactive methods which integrate our various experiences and capabilities.Enabling our partners to visualize the value of their contribution and form a clear vision of consumer behavior that distinguishes them from competitors and aids them in reaching greater achievements.",
                "locale" => "en",
            ],
            [
                "field" => "number_mo_description",
                "value" => "منصة رقمية شاملة مقدمة من صلة، تعتبر الواجهة الأمامية التي تجذب مختلف أنواع الشراكات المثمرة لتخلق تجارب ملهمة و فرص نادرة في المجتمعات و عالم الأعمال.مهمتنا هي أن نصل بالهوية التجارية إلى أعلى قمم النجاح مهما كان طبيعة نشاطها وذلك باتباع أساليب تفاعلية متطورة وجذابة تدمج العديد من الخبرات والإمكانات التي تمكن شركائنا من تصور القيمة المضافة مقابل مساهمتهم وتشكل لديهم رؤية واضحة عن سلوك المستهلكين، مما يميزهم عن جميع منافسيهم ويقودهم لتحقيق إنجازات أكبر دليلها الإتقان والاحترافية.",
                "locale" => "ar",
            ],
        ];

        storeMultiValue($number_banner_section, $data);
    }
}
