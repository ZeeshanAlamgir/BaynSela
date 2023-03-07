<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Spatie\Permission\Models\Role;

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push(__('Dashboard'), route('dashboard'));
});

// Roles Breadcrumbs
Breadcrumbs::for('roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(__('lang.roles.role_plural'), route('roles.index'));
});

Breadcrumbs::for('roles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('roles.index');
    $trail->push(__('lang.commons.create') . ' ' . __('lang.roles.role_singular'), route('roles.create'));
});

Breadcrumbs::for('roles.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('roles.index');
    $trail->push(__('lang.commons.edit') . ' ' . __('lang.roles.role_singular'));
});

// Permisisons Breadcrumbs
Breadcrumbs::for('permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(__('lang.permissions.permission_plural'), route('permissions.index'));
});

Breadcrumbs::for('permissions.create', function (BreadcrumbTrail $trail) {
    $trail->parent('permissions.index');
    $trail->push(__('lang.permissions.create_permission'), route('permissions.create'));
});

Breadcrumbs::for('permissions.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('permissions.index');
    $trail->push(__('lang.permissions.edit_permission'));
});

// Banner Section Breadcrumb
Breadcrumbs::for('homepage.bannersection', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Banner Section', route('homepage.bannersection'));
});

// Goal Section Breadcrumb
Breadcrumbs::for('homepage.goalsection', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Goal Section', route('homepage.goalsection'));
});

Breadcrumbs::for('homepage.creategoal', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage.goalsection');
    $trail->push('Add Goal', route('homepage.goal.view'));
});

Breadcrumbs::for('homepage.project-section', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Add Project', route('homepage.projectsection'));
});

// Video Section Breadcrumb
Breadcrumbs::for('homepage.videosection', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Video Section', route('homepage.videosection'));
});

// About Section Breadcrumb
Breadcrumbs::for('homepage.aboutsection', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('About Section', route('homepage.aboutsection'));
});

// Story Section Breadcrumb
Breadcrumbs::for('homepage.storysection', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Story Section', route('homepage.storysection'));
});


Breadcrumbs::for('services.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Services', route('services.index'));
});

Breadcrumbs::for('services.index.new', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Services', route('services.index.new'));
});

Breadcrumbs::for('services.create', function (BreadcrumbTrail $trail) {
    $trail->parent('services.index.new');
    $trail->push('Create Service', route('services.create'));
});

Breadcrumbs::for('services.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('services.index.new');
    $trail->push('Edit Service', route('services.edit', ['id' => encryptParams($id)]));
});

Breadcrumbs::for('services.events.index', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('services.index.new');
    $trail->push('Events', route('services.events.index', ['id' => encryptParams($id)]));
});

Breadcrumbs::for('services.events.create', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('services.events.index', $id);
    $trail->push('Create Event', route('services.events.create', encryptParams($id)));
});

Breadcrumbs::for('services.events.edit', function (BreadcrumbTrail $trail, $serviceId, $id) {
    $trail->parent('services.events.index', $serviceId);
    $trail->push('Edit Event', route('services.events.edit', ['id' => encryptParams($id), 'serviceId' => encryptParams($serviceId)]));
});

// Contact Section Breadcrumb
Breadcrumbs::for('homepage.contactsection', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Contact Section', route('homepage.contactsection'));
});

// Privacy Section Breadcrumb
Breadcrumbs::for('privacy.privacysection', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Privacy & Policy', route('privacy.privacysection'));
});


// Terms & Condition Section Breadcrumb
Breadcrumbs::for('terms.termsection', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Terms & Condition', route('terms.termsection'));
});

Breadcrumbs::for('our-number.ourClientsView', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Our Client Section', route('our-numbers.ourClientsView'));
});

Breadcrumbs::for('our-number.projectView', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Our Project Section', route('our-numbers.projectView'));
});

Breadcrumbs::for('contacts.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Contact Us', route('contacts.index'));
});
// Our Number Section Breadcrumb
Breadcrumbs::for('our-number.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Our Number Section', route('our-numbers.index'));
});

Breadcrumbs::for('our-number-banner.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Banner Section');
});

Breadcrumbs::for('our-number.partners', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Our Partner Section');
});

Breadcrumbs::for('mailing-list', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Mailing List Section', route('mailing-list'));
});

Breadcrumbs::for('project-type.update.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Project Type', route('project-type.update.project-type'));
});

Breadcrumbs::for('project-duration.update.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Project Duration', route('project-duration.update.project-duration'));
});

//Users
Breadcrumbs::for('user-list.users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Users', route('user-list.users.index'));
});

Breadcrumbs::for('user-list.users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('user-list.users.index');
    $trail->push('Create New User', route('user-list.users.create'));
});

Breadcrumbs::for('event.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Join Events', route('event.index'));
});

//Media Breadcrumbs
Breadcrumbs::for('mediasection.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Image Section', route('mediasection.index'));
});

Breadcrumbs::for('mediasection.create', function (BreadcrumbTrail $trail) {
    $trail->parent('mediasection.index');
    $trail->push('Create Media', route('mediasection.create'));
});

Breadcrumbs::for('mediasection.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('mediasection.index');
    $trail->push('Edit Media');
});
