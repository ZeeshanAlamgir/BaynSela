<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\FilepondController;
use App\Http\Controllers\PrivacySectionController;
use App\Http\Controllers\TermsConditionController;
use App\Http\Controllers\Services\ServicesController;
use App\Http\Controllers\HomePage\GoalSectionController;
use App\Http\Controllers\HomePage\AboutSectionController;
use App\Http\Controllers\HomePage\StorySectionController;
use App\Http\Controllers\HomePage\VideoSectionController;
use App\Http\Controllers\HomePage\BannerSectionController;
use App\Http\Controllers\HomePage\ContactSectionController;
use App\Http\Controllers\HomePage\ProjectSectionController;
use App\Http\Controllers\ImageMapController;
use App\Http\Controllers\JoinEventController;
use App\Http\Controllers\MailListController;
use App\Http\Controllers\MediaSectionController;
use App\Http\Controllers\ServicesController as FrontEndServicesController;
use App\Http\Controllers\OurNumber\OurNumberController;
use App\Http\Controllers\OurNumberFrontEndController;
use App\Http\Controllers\ProjectDuration\RegisterProjectDurationController;
use App\Http\Controllers\ProjectType\RegisterProjectTypeController;
use App\Http\Controllers\RegisterUserController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\UserLists\AllUserController;
use App\Http\Controllers\UsersController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


require __DIR__ . DIRECTORY_SEPARATOR . 'auth.php';

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    $enableViews = config('fortify.views', true);

    // Authentication...
    if ($enableViews) {
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])
            ->middleware(['guest:' . config('fortify.guard')])
            ->name('login.view');
    }

    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('our-numbers-page',[OurNumberFrontEndController::class,'ourNumber'])->name('ourNumber.index');
    // Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
    Route::get('/our-services', [FrontEndServicesController::class, 'ourServices'])->name('services');
    Route::get('/our-services-events', [FrontEndServicesController::class, 'ourServicesEvents'])->name('services.events');
    Route::get('/our-services-filters', [FrontEndServicesController::class, 'ourServicesFilters'])->name('services.filters');
    Route::get('/our-services-filters-data', [FrontEndServicesController::class, 'ourServicesFiltersData'])->name('services.filters.data');
    Route::get('/our-services/events/{id}', [FrontEndServicesController::class, 'ourServicesEventDetail'])->name('services.detail');
    Route::get('/our-numbers', [FrontEndServicesController::class, 'ourNumbers'])->name('numbers');
    Route::get('/privacy', [FrontEndServicesController::class, 'privacyPolicy'])->name('privacy-policy');
    Route::get('/terms', [FrontEndServicesController::class, 'termsAndConditions'])->name('terms-condition');
    Route::post('/add-mail', [MailListController::class, 'addMail'])->name('add-mail');
    Route::post('/contact', [ContactUsController::class, 'saveContact'])->name('contact.save');
    Route::post('/login-user-join-event',[FrontEndServicesController::class,'loginUserJoinEvent'])->name('user-login-join-event');
    Route::post('/join-event',[FrontEndServicesController::class,'joinEvent'])->name('join-event');
    Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgotpassword');
    Route::post('/password-reset-mail', [AuthController::class, 'passwordResetMail'])->name('password-reset-mail');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('reset-password');
    Route::get('/password-reset-link/{key}', [AuthController::class, 'passwordResetLink'])->name('password-reset-link');


});

//User Auth Routes
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
],function () {
    Route::get('/dashboard', [UsersController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/profile', [UsersController::class, 'profile'])->name('user.profile');
    Route::get('/update-profile/{id}', [UsersController::class, 'updateProfile'])->name('profile.update');
    Route::post('/update-user-profile/{id}', [UsersController::class, 'updateUserProfile'])->name('user.profile.update');
});

//Admin Routes
Route::prefix('admin')->middleware(['admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/cache/flush', [DashboardController::class, 'cacheFlush'])->name('cache.flush');
    Route::get('/contacts', [ContactUsController::class, 'getContacts'])->name('contacts.index');
    Route::get('/delete-contact', [ContactUsController::class, 'deleteContact'])->name('contact.delete');
    Route::get('/contacts-file/{id}', [ContactUsController::class, 'downloadFile'])->name('contact.file.download');
    Route::get('/delete-mail', [MailListController::class, 'deleteMail'])->name('mail-delete');
    Route::get('/all-mails', [MailListController::class, 'allMails'])->name('mailing-list');

    Route::post('/save-file', [FilepondController::class, 'saveFile'])->name('filepond.savefile');
    Route::delete('/revert-file', [FilepondController::class, 'revertFile'])->name('filepond.revertfile');
    Route::get('settings',[FilepondController::class,'settingView'])->name('setting.view');
    Route::get('/delete-temporary-files', [FilepondController::class, 'deleteTemporaryFiles'])->name('filepond.deleteTemporaryFiles');

    Route::group(['prefix' => 'homepage', 'as' => 'homepage.'], function () {

        //Banner Section Controller
        Route::controller(BannerSectionController::class)->group(function () {
            Route::get('banner-section', 'bannerSection')->name('bannersection');
            Route::post('update-banner-data', 'updateBannerSection')->name('update.banner');
        });


        Route::controller(ContactSectionController::class)->group(function () {
            Route::get('contact-section', 'contactSection')->name('contactsection');
            Route::post('update-contact-data', 'updateContactSection')->name('update.contact');
        });

        //Video Section Controller
        Route::controller(VideoSectionController::class)->group(function () {
            Route::get('video-section', 'videoSection')->name('videosection');
            Route::post('update-video-data', 'updateVideoSection')->name('update.video');
        });

        //About Section Controller
        Route::controller(AboutSectionController::class)->group(function () {
            Route::get('about-section', 'aboutSection')->name('aboutsection');
            Route::post('update-about-data', 'updateAboutSection')->name('update.about');
            Route::post('update/review/{id}', 'updateReview')->name('review.update');
            Route::post('store/review', 'storeReview')->name('review.store');
            Route::get('delete-review', 'deleteReview')->name('review.delete');
        });

        Route::controller(ProjectSectionController::class)->group(function () {
            Route::get('project-section', 'projectView')->name('projectsection');
            Route::post('update-project-section', 'updateProject')->name('projectsection.update');
        });

        //Goal Section Controller
        Route::controller(GoalSectionController::class)->group(function () {
            Route::get('goal-section', 'goalSection')->name('goalsection');
            Route::delete('delete-sub-goal/{id}', 'deleteGoal')->name('goal.delete');
            Route::post('update-goal-section', 'updateGoalSection')->name('update.goalsection');
            Route::post('store-update-goals', 'storeUpdateGoals')->name('goals.store.update');
        });

        //Story Section Controller
        Route::controller(StorySectionController::class)->group(function () {
            Route::get('story-section', 'storySection')->name('storysection');
            Route::post('update-story-data', 'updateStorySection')->name('update.story');
        });

        Route::controller(GoalSectionController::class)->group(function () {
            Route::get('goal-section', 'goalSection')->name('goalsection');
            Route::get('create-goal', 'goalView')->name('goal-view');
            Route::post('update-goalsection', 'updateGoalSection')->name('update.goalsection');
        });
    });

    Route::group(['prefix' => 'services', 'as' => 'services.'], function () {
        //Services Controller
        Route::controller(ServicesController::class)->group(function () {
            // Route::get('/index', 'index')->name('index');
            // Route::post('/update/{id}', 'update')->name('update');
            // Route::post('/store', 'store')->name('store');
            Route::get('/delete', 'delete')->name('delete');
            Route::post('/store-filter', 'storeFilter')->name('filter.store');
            Route::get('/delete-filter', 'deleteFilter')->name('filter.delete');

            Route::get('/index-new', 'indexNew')->name('index.new');
            Route::get('/create', 'create')->name('create');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/store-new', 'storeService')->name('store.new');
            Route::post('/update-new/{id}', 'updateService')->name('update.new');

            Route::get('/delete-selected', 'destroySelected')->name('destroy.selected');

        });

        Route::group(['prefix' => 'events', 'as' => 'events.'], function () {
            Route::controller(EventsController::class)->group(function () {
                // Route::post('/store', 'store')->name('store');
                // Route::post('/update', 'update')->name('update');

                Route::get('/index/{id}', 'index')->name('index');
                Route::get('/delete-selected/{serviceId}', 'destroySelected')->name('destroy.selected');
                Route::get('/create/{serviceId}', 'create')->name('create');
                Route::get('/edit/{serviceId}/{id}', 'edit')->name('edit');
                Route::post('/store-new/{serviceId}', 'storeEvent')->name('store.new');
                Route::post('/update-new/{serviceId}/{id}', 'updateEvent')->name('update.new');
                Route::get('filter-checkbox-items/{id}/{service_id}', 'getCheckboxItems')->name('checkbox.items');

            });
        });
    });

    Route::group(['prefix' => 'our-numbers', 'as' => 'our-numbers.'], function () {
        //Our Number Controller
        Route::controller(OurNumberController::class)->group(function () {
            Route::get('/index', 'numberView')->name('index');
            Route::post('/update-number-banner-section', 'updateNumberBannerSection')->name('numberBannerSection.update');
            Route::get('/partners', 'ourPartners')->name('partners');
            Route::post('/update-number-partner-section', 'updateOurNumberPartnerSection')->name('numberPartnerSection.update');
            Route::get('/clients', 'ourClientsView')->name('ourClientsView');
            Route::post('/update-number-client-section', 'updateOurNumberClientSection')->name('updateOurNumberVlientSection.update');
            Route::get('/projects', 'projectView')->name('projectView');
            Route::post('/update-number-project-section', 'updateprojectSection')->name('updateProjectSection.update');
        });
    });

    Route::group(['prefix' => 'privacy', 'as' => 'privacy.'], function () {
        //Privacy & Policy Controller
        Route::controller(PrivacySectionController::class)->group(function () {
            Route::get('privacy-section', 'privacySection')->name('privacysection');
            Route::post('update-privacy-data', 'updatePrivacySection')->name('updateprivacysection.update');
        });
    });

    Route::group(['prefix' => 'terms', 'as' => 'terms.'], function () {
        //Terms & Condition Controller
        Route::controller(TermsConditionController::class)->group(function () {
            Route::get('terms-section', 'termSection')->name('termsection');
            Route::post('update-term-data', 'updateTermSection')->name('update');
        });
    });

    Route::group(['prefix' => 'project-type', 'as' => 'project-type.'], function () {
        Route::controller(RegisterProjectTypeController::class)->group(function () {
            Route::get('index', 'index')->name('index.project-type');
            Route::post('update-project-type', 'update')->name('update.project-type');
            Route::post('add-update-project-types', 'addOrUpdateProjectType')->name('addOrUpdateProjectType');
        });
    });

    Route::group(['prefix' => 'project-duration', 'as' => 'project-duration.'], function () {
        Route::controller(RegisterProjectDurationController::class)->group(function () {
            Route::get('index', 'index')->name('index.project-duration');
            Route::post('update-project-duration', 'update')->name('update.project-duration');
            Route::post('add-update-project-durations', 'addOrUpdateProjectDuration')->name('addOrUpdateProjectDuration');

        });
    });

    Route::get('/imagemap', [ImageMapController::class, 'imagemap'])->name('imagemap');
    Route::post('/imagemap-save-loads', [ImageMapController::class, 'imagemapSaveLoads'])->name('imagemap.save.loads');
    Route::get('/imagemap-get-load', [ImageMapController::class, 'imagemapGetLoad'])->name('imagemap.get.load');
    Route::get('/imagemap-get-loads', [ImageMapController::class, 'imagemapGetLoads'])->name('imagemap.get.loads');
    Route::get('/imagemap-delete-load', [ImageMapController::class, 'imagemapDeleteLoad'])->name('imagemap.delete.load');

    Route::group(['prefix' => 'user-list', 'as' => 'user-list.'], function () {
        Route::controller(AllUserController::class)->group(function(){
            Route::get('index','allUsers')->name('users.index');
            Route::post('store','store')->name('user.store');
            Route::post('update-user/{id}','updateUser')->name('user.update');
            // Route::post('edit/{id}','storeOrUpdate')->name('user.edit');
            Route::get('create','create')->name('users.create');
            Route::get('edit-user-details/{id}','getUserDetails')->name('users.edit');

        });
    });


    Route::controller(JoinEventController::class)->group(function(){
        Route::get('join-events','index')->name('event.index');

    });

    //Media Section
    Route::group(['prefix' => 'media-section', 'as' => 'mediasection.'], function () {
        Route::get('/', [MediaSectionController::class, 'index'])->name('index');
        Route::get('/delete-selected', [MediaSectionController::class, 'destroySelected'])->name('destroy.selected');
        Route::get('/create', [MediaSectionController::class, 'create'])->name('create');
        Route::post('/store', [MediaSectionController::class, 'store'])->name('store');
    });

});

Route::controller(RegisterUserController::class)->group(function(){
    Route::post('register','register')->name('user.register');
});
