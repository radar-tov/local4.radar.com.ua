<?php
// Dashboard
Breadcrumbs::register('dashboard.index', function($breadcrumbs)
{
	$breadcrumbs->push('Админпанель', route('dashboard.index'));
});

// Dashboard > Articles
Breadcrumbs::register('dashboard.articles.index', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.index');
	$breadcrumbs->push('Статьи', route('dashboard.articles.index'));
});
// Dashboard > Articles > Create Article
Breadcrumbs::register('dashboard.articles.create', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.articles.index');
	$breadcrumbs->push('Добавить статью', route('dashboard.articles.create'));
});

// Dashboard > Articles > Edit Article
Breadcrumbs::register('dashboard.articles.edit', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.articles.index');
	$breadcrumbs->push('Редактировать статью', route('dashboard.articles.edit'));
});

// Dashboard > Users
Breadcrumbs::register('dashboard.users.index', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.index');
	$breadcrumbs->push('Пользователи', route('dashboard.users.index'));
});
// Dashboard > Users > Create
Breadcrumbs::register('dashboard.users.create', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.users.index');
	$breadcrumbs->push('Добавить пользователя', route('dashboard.users.create'));
});

// Dashboard > Users > Edit
Breadcrumbs::register('dashboard.users.edit', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.users.index');
	$breadcrumbs->push('Редактировать пользователя', route('dashboard.users.edit'));
});

// Dashboard > Categories
Breadcrumbs::register('dashboard.categories.index', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.index');
	$breadcrumbs->push('Категории', route('dashboard.categories.index'));
});

// Dashboard > Categories > Create
Breadcrumbs::register('dashboard.categories.create', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.categories.index');
	$breadcrumbs->push('Добавить категорию', route('dashboard.categories.create'));
});

// Dashboard > Categories > Edit
Breadcrumbs::register('dashboard.categories.edit', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.categories.index');
	$breadcrumbs->push('Редактировать категорию', route('dashboard.categories.edit'));
});

// Dashboard > Filters
Breadcrumbs::register('dashboard.filters.index', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.index');
	$breadcrumbs->push('Характеристики', route('dashboard.filters.index'));
});

// Dashboard > Filters > Create
Breadcrumbs::register('dashboard.filters.create', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.filters.index');
	$breadcrumbs->push('Добавить фильтр', route('dashboard.filters.create'));
});

// Dashboard > Filters > Edit
//Breadcrumbs::register('dashboard.filters.edit', function($breadcrumbs)
//{
//	$breadcrumbs->parent('dashboard.filters.index');
//	$breadcrumbs->push('Редактировать фильтр', route('dashboard.accommodations.edit'));
//});


// Dashboard > Accommodations
Breadcrumbs::register('dashboard.accommodations.index', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.index');
	$breadcrumbs->push('Объекты', route('dashboard.accommodations.index'));
});

// Dashboard > Accommodations > Create
Breadcrumbs::register('dashboard.accommodations.create', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.accommodations.index');
	$breadcrumbs->push('Добавить объект', route('dashboard.accommodations.create'));
});

// Dashboard > Accommodations > Edit
Breadcrumbs::register('dashboard.accommodations.edit', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.accommodations.index');
	$breadcrumbs->push('Редактировать объект', route('dashboard.accommodations.edit'));
});

// Dashboard > Pages
Breadcrumbs::register('dashboard.pages.index', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.index');
	$breadcrumbs->push('Страницы', route('dashboard.pages.index'));
});

// Dashboard > Pages > Create
Breadcrumbs::register('dashboard.pages.create', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.pages.index');
	$breadcrumbs->push('Добавить страницу', route('dashboard.pages.create'));
});

// Dashboard > Pages > Edit
Breadcrumbs::register('dashboard.pages.edit', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.pages.index');
	$breadcrumbs->push('Редактировать страницу', route('dashboard.pages.edit'));
});

// Dashboard > Articles
Breadcrumbs::register('dashboard.articles.index', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.index');
	$breadcrumbs->push('Статьи', route('dashboard.articles.index'));
});

// Dashboard > articles > Create
Breadcrumbs::register('dashboard.articles.create', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.articles.index');
	$breadcrumbs->push('Добавить Статью', route('dashboard.articles.create'));
});

// Dashboard > articles > Edit
Breadcrumbs::register('dashboard.articles.edit', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.articles.index');
	$breadcrumbs->push('Редактировать статью', route('dashboard.articles.edit'));
});


//// Home > Blog > [Category]
//Breadcrumbs::register('category', function($breadcrumbs, $category)
//{
//	$breadcrumbs->parent('blog');
//	$breadcrumbs->push($category->title, route('category', $category->id));
//});
//
//// Home > Blog > [Category] > [Page]
//Breadcrumbs::register('page', function($breadcrumbs, $page)
//{
//	$breadcrumbs->parent('category', $page->category);
//	$breadcrumbs->push($page->title, route('page', $page->id));
//});