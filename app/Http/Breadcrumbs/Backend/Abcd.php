<?php

Breadcrumbs::register('admin.abcds.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.abcds.management'), route('admin.abcds.index'));
});

Breadcrumbs::register('admin.abcds.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.abcds.index');
    $breadcrumbs->push(trans('menus.backend.abcds.create'), route('admin.abcds.create'));
});

Breadcrumbs::register('admin.abcds.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.abcds.index');
    $breadcrumbs->push(trans('menus.backend.abcds.edit'), route('admin.abcds.edit', $id));
});
