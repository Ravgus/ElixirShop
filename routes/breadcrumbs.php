<?php

// Main
Breadcrumbs::register('main', function ($breadcrumbs) {
    $breadcrumbs->push('Главная', route('main'));
});

/// Main > Categories > Category
Breadcrumbs::register('category', function ($breadcrumbs, $current_category) {
    $breadcrumbs->parent('main');
    $breadcrumbs->push($current_category['name']);
});

/// Main > Categories > Category > Product
Breadcrumbs::register('product', function ($breadcrumbs, $current_category, $product) {
    $breadcrumbs->parent('main');
    $breadcrumbs->push($current_category['name'], route('category', ['alias' => $current_category['alias']]));
    $breadcrumbs->push($product->name, route('category', ['alias' => $product->alias]));
});
