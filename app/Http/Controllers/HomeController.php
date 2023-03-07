<?php

namespace App\Http\Controllers;

use App\Models\AboutSection;
use App\Models\BannerSection;
use App\Models\ContactSection;
use App\Models\GoalSection;
use App\Models\GoalSubSection;
use App\Models\ProjectSection;
use App\Models\Review;
use App\Models\Service;
use App\Models\StorySection;
use App\Models\VideoSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HomeController extends Controller
{
    public function home()
    {

        $locale = LaravelLocalization::getCurrentLocale();

        $banner_section = (new BannerSection())->first();
        $video_section = (new VideoSection())->first();
        $project_section = (new ProjectSection())->first();
        $services = (new Service())->all();
        $goal_section = (new GoalSection())->first();
        $sub_goals = (new GoalSubSection())->all();
        $about_section = (new AboutSection())->first();
        $reviews = (new Review())->all();
        $story_section = (new StorySection())->first();
        $contact_section = (new ContactSection())->first();

        $services_data = [];

        foreach ($services as $key => $value) {
            array_push($services_data, [
                "heading" =>  $value->fieldSingleValue('service_heading', $locale)->value ?? '',
                "description" =>  $value->fieldSingleValue('service_description', $locale)->value ?? '',
                'image' => $value->image ?? '',
            ]);
        }

        $sub_goals_data = [];

        foreach ($sub_goals as $key => $value) {
            array_push($sub_goals_data, [
                "heading" =>  $value->fieldSingleValue('sub_goal_heading', $locale)->value ?? '',
                "description" =>  $value->fieldSingleValue('sub_goal_description', $locale)->value ?? '',
            ]);
        }

        $reviews_data = [];

        foreach ($reviews as $key => $value) {
            array_push($reviews_data, [
                "heading" =>  $value->fieldSingleValue('review_heading', $locale)->value ?? '',
                "description" =>  $value->fieldSingleValue('review_description', $locale)->value ?? '',
                "name" =>  $value->fieldSingleValue('profile_name', $locale)->value ?? '',
                "designation" =>  $value->fieldSingleValue('profile_designation', $locale)->value ?? '',
                'image' => $value->image ?? ''
            ]);
        }

        $data = [
            'banner_section' => [
                'heading' => $banner_section ? ($banner_section->fieldSingleValue('heading', $locale) ? $banner_section->fieldSingleValue('heading', $locale)->value : '') : '',
                'description' => $banner_section ? ($banner_section->fieldSingleValue('description', $locale) ? $banner_section->fieldSingleValue('description', $locale)->value : '') : '',
                'description2' => $banner_section ? ($banner_section->fieldSingleValue('description2', $locale) ? $banner_section->fieldSingleValue('description2', $locale)->value : '')  : '',
                'meta_description' => $banner_section ? ($banner_section->fieldSingleValue('meta_description', $locale) ? $banner_section->fieldSingleValue('meta_description', $locale)->value : ''): '',
                'image' => $banner_section->image
            ],

            'video_section' => [
                'heading' => $video_section->fieldSingleValue('heading', $locale)->value ?? '',
                'description' => $video_section->fieldSingleValue('description', $locale)->value ?? '',
                'image' => $video_section->image ?? '',
                'video' => $video_section->video_url ?? '',
            ],

            'project_section' => [
                'heading' => $project_section->fieldSingleValue('project_heading', $locale)->value ?? '',
                'description' => $project_section->fieldSingleValue('project_description', $locale)->value ?? '',
            ],

            'services' => $services_data,

            'goal_section' => [
                'heading' => $goal_section->fieldSingleValue('heading', $locale)->value ?? '',
                'description' => $goal_section->fieldSingleValue('description', $locale)->value ?? '',
                'image_en' => $goal_section->image_en ?? '',
                'image_ar' => $goal_section->image_ar ?? '',
            ],

            'sub_goals' => $sub_goals_data,

            'about_section' => [
                'heading' => $about_section->fieldSingleValue('about_heading', $locale)->value ?? '',
                'description' => $about_section->fieldSingleValue('about_description', $locale)->value ?? '',
            ],

            'reviews' => $reviews_data,

            'story_section' => [
                'heading' => $story_section->fieldSingleValue('story_heading', $locale)->value ?? '',
                'description' => $story_section->fieldSingleValue('story_description', $locale)->value ?? '',
                'happy_partner' => $story_section->happy_partner ?? '',
                'successful_projects' => $story_section->successful_projects ?? '',
                'total_investments' => $story_section->total_investments ?? '',
                'year_of_exp' => $story_section->year_of_exp ?? '',
            ],

            'contact_section' => [
                'heading' => $contact_section->fieldSingleValue('contact_heading', $locale)->value ?? '',
                'description' => $contact_section->fieldSingleValue('contact_description', $locale)->value ?? '',
            ],
        ];

        return view('app.front-end.home.home', compact('data'));
    }
}
