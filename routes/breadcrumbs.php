<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('/', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('/'));
});

// Home > Katalog 
Breadcrumbs::for('katalog', function (BreadcrumbTrail $trail) {
    $trail->parent('/');
    $trail->push('Katalog', route('katalog.show'));
});

// Home > Pakej 
Breadcrumbs::for('pakej', function (BreadcrumbTrail $trail) {
    $trail->parent('/');
    $trail->push('Pakej', route('pakej.show'));
});

// Home > Tutorial 
Breadcrumbs::for('tutorial', function (BreadcrumbTrail $trail) {
    $trail->parent('/');
    $trail->push('Tutorial', route('tutorial.show'));
});

// Home > Senarai Kad 
Breadcrumbs::for('senarai-kad', function (BreadcrumbTrail $trail) {
    $trail->parent('/');
    $trail->push('Senarai Kad', route('senarai-kad.show'));
});

// Home > Profile 
Breadcrumbs::for('profile', function (BreadcrumbTrail $trail) {
    $trail->parent('/');
    $trail->push('Profile', route('profile'));
});

// Home > Senarai Kad > Guestbook
Breadcrumbs::for('kad-guestbook', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('senarai-kad');
    $trail->push('Guestbook', route('kad-guestbook.show', $id));
});

// Home > Senarai Kad > RSVP
Breadcrumbs::for('kad-rsvp', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('senarai-kad');
    $trail->push('RSVP', route('kad-rsvp.show', $id));
});

// Home > Senarai Kad > Edit Kad
Breadcrumbs::for('kad-edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('senarai-kad');
    $trail->push('Edit Kad', route('kad-edit.show', $id));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category));
});