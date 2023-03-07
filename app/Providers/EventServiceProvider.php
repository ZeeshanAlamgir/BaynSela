<?php

namespace App\Providers;

use App\Interface\ProjectDurationInterface;
use App\Interface\ProjectTypeInterface;
use App\Interface\StoreUserInterface;
use App\Models\BannerSection;
use App\Models\GoalSection;
use App\Models\ServiceSection;
use App\Observers\BannerSectionSlugObserver;
use App\Observers\GoalSectionSlugObserver;
use App\Observers\ServiceSectionSlugObserver;
use App\Services\ProjectDurationService;
use App\Services\ProjectTypeService;
use App\Services\StoreUserService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        BannerSection::observe(BannerSectionSlugObserver::class);
        GoalSection::observe(GoalSectionSlugObserver::class);

        $this->app->bind(ProjectTypeInterface::class,ProjectTypeService::class);
        $this->app->bind(ProjectDurationInterface::class,ProjectDurationService::class);
        $this->app->bind(StoreUserInterface::class,StoreUserService::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
