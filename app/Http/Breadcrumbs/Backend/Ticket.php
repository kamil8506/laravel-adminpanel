<?php

Breadcrumbs::register('admin.tickets.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.tickets.management'), route('admin.tickets.index'));
});

Breadcrumbs::register('admin.tickets.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.tickets.index');
    $breadcrumbs->push(trans('menus.backend.tickets.create'), route('admin.tickets.create'));
});

Breadcrumbs::register('admin.tickets.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.tickets.index');
    $breadcrumbs->push(trans('menus.backend.tickets.edit'), route('admin.tickets.edit', $id));
});
