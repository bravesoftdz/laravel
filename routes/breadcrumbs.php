<?php

// Index
Breadcrumbs::register('index', function ($breadcrumbs) {
    $breadcrumbs->push(__('admin/main.index'), route('adminka.index'));
});

// Index > Admins
Breadcrumbs::register('admins', function ($breadcrumbs) {
    $breadcrumbs->parent('index');
    $breadcrumbs->push(__('admin/main.admins'), route('admin.index'));
});

// Index > Admins
Breadcrumbs::register('admin.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admins');
    $breadcrumbs->push(__('admin/main.create'), route('admin.create'));
});

Breadcrumbs::register('admin.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admins');
    $breadcrumbs->push(__('admin/main.edit'));
    $breadcrumbs->push($id);
});

// Index > Pages
Breadcrumbs::register('pages.slider', function ($breadcrumbs) {
    $breadcrumbs->parent('index');
    $breadcrumbs->push(__('admin/main.slider'), route('adminka.index'));
});

// Index > Users
Breadcrumbs::register('users', function ($breadcrumbs) {
    $breadcrumbs->parent('index');
    $breadcrumbs->push(__('admin/main.users'), route('user.index'));
});

Breadcrumbs::register('user.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('users');
    $breadcrumbs->push(__('admin/main.edit'));
    $breadcrumbs->push($id);
});