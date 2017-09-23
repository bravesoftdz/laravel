<?php

// Index
Breadcrumbs::register('index', function ($breadcrumbs) {
    $breadcrumbs->push(__('admin/main.index'), route('admin.index'));
});

// Index > Admins
Breadcrumbs::register('admins', function ($breadcrumbs) {
    $breadcrumbs->parent('index');
    $breadcrumbs->push(__('admin/main.admins'), route('admins.index'));
});

// Index > Admins
Breadcrumbs::register('admins.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admins');
    $breadcrumbs->push(__('admin/main.create'), route('admins.create'));
});

// Index > Admins > Edit
Breadcrumbs::register('admins.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admins');
    $breadcrumbs->push(__('admin/main.edit'));
    $breadcrumbs->push($id);
});

// Index > Pages
Breadcrumbs::register('pages.slider', function ($breadcrumbs) {
    $breadcrumbs->parent('index');
    $breadcrumbs->push(__('admin/main.slider'), route('admin.index'));
});