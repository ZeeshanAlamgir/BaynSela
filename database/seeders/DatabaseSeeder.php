<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\OurClient;
use App\Models\OurNumber;
use App\Models\ProjectDuration;
use App\Models\StoryImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(AboutSectionSeeder::class);
        $this->call(BannerSectionTableSeeder::class);
        $this->call(VideoSectionTableSeeder::class);
        $this->call(GoalSectionTableSeeder::class);
        $this->call(ReviewSectionSeeder::class);
        $this->call(StorySectionSeeder::class);
        $this->call(StoryImageSeeder::class);
        $this->call(ContactSectionsSeeder::class);
        $this->call(ContactUsSeeder::class);
        $this->call(ProjectSectionTableSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(PrivacyTableSeeder::class);
        $this->call(TermTableSeeder::class);
        $this->call(OurClientSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(OurNumberSeeder::class);
        $this->call(PartnerSeeder::class);
        $this->call(ProjectTypeSeeder::class);
        $this->call(ProjectDurationSeeder::class);
        $this->call(RegisterProjectTypeSeeder::class);
        $this->call(RegisterProjectDurationSeeder::class);
    }
}
