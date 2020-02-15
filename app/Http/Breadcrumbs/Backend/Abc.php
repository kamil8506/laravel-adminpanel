<?php

Breadcrumbs::register('admin.abcs.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.abcs.management'), route('admin.abcs.index'));
});

Breadcrumbs::register('admin.abcs.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.abcs.index');
    $breadcrumbs->push(trans('menus.backend.abcs.create'), route('admin.abcs.create'));
});

Breadcrumbs::register('admin.abcs.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.abcs.index');
    $breadcrumbs->push(trans('menus.backend.abcs.edit'), route('admin.abcs.edit', $id));
});
