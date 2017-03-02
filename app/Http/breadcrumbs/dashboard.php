<?php
// Dashboard
Breadcrumbs::register('dashboard.index', function($breadcrumbs)
{
	$breadcrumbs->push('Админпанель', route('dashboard.index'));
});




// Dashboard > Product
Breadcrumbs::register('dashboard.products.index', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.index');
    $breadcrumbs->push('Товары', route('dashboard.products.index'));
});
// Dashboard > Product > Create
Breadcrumbs::register('dashboard.products.create', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.products.index');
    $breadcrumbs->push('Добавить товар', route('dashboard.products.create'));
});
// Dashboard > Product > Edit
Breadcrumbs::register('dashboard.products.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.products.index');
    $breadcrumbs->push('Редактирование товара', route('dashboard.products.edit',  '#'));
});
// Dashboard > Product > Edit
Breadcrumbs::register('dashboard.products.trash', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.products.index');
    $breadcrumbs->push('Корзина', route('dashboard.products.trash'));
});



// Dashboard > Users
Breadcrumbs::register('dashboard.users.indexGet', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.index');
	$breadcrumbs->push('Пользователи', route('dashboard.users.indexGet'));
});
// Dashboard > Users > Create
Breadcrumbs::register('dashboard.users.create', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.users.indexGet');
	$breadcrumbs->push('Добавить пользователя', route('dashboard.users.create'));
});

// Dashboard > Users > Edit
Breadcrumbs::register('dashboard.users.edit', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.users.indexGet');
	$breadcrumbs->push('Редактировать пользователя', route('dashboard.users.edit',  '#'));
});



// Dashboard > Sliders
Breadcrumbs::register('dashboard.sliders.index', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.index');
    $breadcrumbs->push('Слайдер 1', route('dashboard.sliders.index'));
});
// Dashboard > Sliders > Create
Breadcrumbs::register('dashboard.sliders.create', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.sliders.index');
    $breadcrumbs->push('Добавить картинку', route('dashboard.sliders.create'));
});

// Dashboard > Sliders > Edit
Breadcrumbs::register('dashboard.sliders.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.sliders.index');
    $breadcrumbs->push('Редактировать картинку', route('dashboard.sliders.edit',  '#'));
});



// Dashboard > Sliders
Breadcrumbs::register('dashboard.slider2.index', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.index');
    $breadcrumbs->push('Слайдер 2', route('dashboard.slider2.index'));
});
// Dashboard > Sliders > Create
Breadcrumbs::register('dashboard.slider2.create', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.slider2.index');
    $breadcrumbs->push('Добавить картинку', route('dashboard.slider2.create'));
});

// Dashboard > Sliders > Edit
Breadcrumbs::register('dashboard.slider2.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.slider2.index');
    $breadcrumbs->push('Редактировать картинку', route('dashboard.slider2.edit',  '#'));
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
	$breadcrumbs->push('Редактировать категорию', route('dashboard.categories.edit',  '#'));
});





// Dashboard > Filters
Breadcrumbs::register('dashboard.filters.index', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.index');
	$breadcrumbs->push('Фильтры', route('dashboard.filters.index'));
});
// Dashboard > Filters > Edit
Breadcrumbs::register('dashboard.filters.edit', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.filters.index');
	$breadcrumbs->push('Редактировать фильтр', route('dashboard.filters.edit', '#'));
});




// Dashboard > Cena
Breadcrumbs::register('dashboard.cena.index', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.index');
    $breadcrumbs->push('Группы цен', route('dashboard.cena.index'));
});







// Dashboard > Characteristics
Breadcrumbs::register('dashboard.characteristics.index', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.index');
    $breadcrumbs->push('Характеристики', route('dashboard.characteristics.index'));
});
// Dashboard > Characteristics > Edit
Breadcrumbs::register('dashboard.characteristics.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.characteristics.index');
    $breadcrumbs->push('Редактировать характеристику', route('dashboard.characteristics.edit', '#'));
});



// Dashboard > Sales
Breadcrumbs::register('dashboard.sales.index', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.index');
    $breadcrumbs->push('Акции', route('dashboard.sales.index'));
});
// Dashboard > Categories > Create
Breadcrumbs::register('dashboard.sales.create', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.sales.index');
    $breadcrumbs->push('Добавить акцию', route('dashboard.sales.create'));
});
// Dashboard > Characteristics > Edit
Breadcrumbs::register('dashboard.sales.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.sales.index');
    $breadcrumbs->push('Редактировать акцию', route('dashboard.sales.edit', '#'));
});




// Dashboard > Stock
Breadcrumbs::register('dashboard.stock.index', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.index');
    $breadcrumbs->push('Акц.комплекты', route('dashboard.stock.index'));
});
// Dashboard > Stock > Create
Breadcrumbs::register('dashboard.stock.create', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.stock.index');
    $breadcrumbs->push('Добавить комплект', route('dashboard.stock.create'));
});
// Dashboard > Stock > Edit
Breadcrumbs::register('dashboard.stock.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.stock.index');
    $breadcrumbs->push('Редактировать комплект', route('dashboard.stock.edit', '#'));
});



// Dashboard > Groups
Breadcrumbs::register('dashboard.groups.index', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.index');
    $breadcrumbs->push('Группа покупателей', route('dashboard.groups.index'));
});
// Dashboard > Groups > Create
Breadcrumbs::register('dashboard.groups.create', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.groups.index');
    $breadcrumbs->push('Добавить группу', route('dashboard.groups.create'));
});
// Dashboard > Groups > Edit
Breadcrumbs::register('dashboard.groups.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.groups.index');
    $breadcrumbs->push('Редактировать группу', route('dashboard.groups.edit', '#'));
});





// Dashboard > Brands
Breadcrumbs::register('dashboard.brands.index', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.index');
    $breadcrumbs->push('Бренды', route('dashboard.brands.index'));
});
// Dashboard > Groups > Create
Breadcrumbs::register('dashboard.brands.create', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.brands.index');
    $breadcrumbs->push('Добавить бренд', route('dashboard.brands.create'));
});
// Dashboard > Groups > Edit
Breadcrumbs::register('dashboard.brands.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.brands.index');
    $breadcrumbs->push('Редактировать бренд', route('dashboard.brands.edit', '#'));
});





// Dashboard > Shipments
Breadcrumbs::register('dashboard.shipments.index', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.index');
    $breadcrumbs->push('Способы доставки', route('dashboard.shipments.index'));
});
// Dashboard > Shipments > Create
Breadcrumbs::register('dashboard.shipments.create', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.shipments.index');
    $breadcrumbs->push('Добавить способ', route('dashboard.shipments.create'));
});
// Dashboard > Shipments > Edit
Breadcrumbs::register('dashboard.shipments.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.shipments.index');
    $breadcrumbs->push('Редактировать способ', route('dashboard.shipments.edit', '#'));
});
// Dashboard > Shipments > novaposhta
Breadcrumbs::register('dashboard.novaposhta.index', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.shipments.index');
    $breadcrumbs->push('Новая почта', route('dashboard.novaposhta.index'));
});





// Dashboard > Payments
Breadcrumbs::register('dashboard.payments.index', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.index');
    $breadcrumbs->push('Оплаты', route('dashboard.payments.index'));
});
// Dashboard > Payments > Create
Breadcrumbs::register('dashboard.payments.create', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.payments.index');
    $breadcrumbs->push('Добавить способ', route('dashboard.payments.create'));
});
// Dashboard > Payments > Edit
Breadcrumbs::register('dashboard.payments.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.payments.index');
    $breadcrumbs->push('Редактировать способ', route('dashboard.payments.edit', '#'));
});



// Dashboard > Orders
Breadcrumbs::register('dashboard.orders.index', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.index');
    $breadcrumbs->push('Заказы', route('dashboard.orders.index'));
});
// Dashboard > Orders > Show
Breadcrumbs::register('dashboard.orders.show', function($breadcrumbs, $n)
{
    $breadcrumbs->parent('dashboard.orders.index');
    $breadcrumbs->push('Заказ № '.$n, route('dashboard.orders.show', '#'));
});





// Dashboard > Static_pages
Breadcrumbs::register('dashboard.static_pages.index', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.index');
	$breadcrumbs->push('Страницы', route('dashboard.static_pages.index'));
});
// Dashboard > Static_pages > Edit
Breadcrumbs::register('dashboard.static_pages.edit', function($breadcrumbs)
{
	$breadcrumbs->parent('dashboard.static_pages.index');
	$breadcrumbs->push('Редактировать страницу', route('dashboard.static_pages.edit',  '#'));
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
    $breadcrumbs->push('Редактировать статью', route('dashboard.articles.edit',  '#'));
});



// Dashboard > reviews
Breadcrumbs::register('dashboard.reviews.index', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.index');
    $breadcrumbs->push('Отзывы', route('dashboard.reviews.index'));
});
// Dashboard > reviews > Edit
Breadcrumbs::register('dashboard.reviews.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.reviews.index');
    $breadcrumbs->push('Редактировать отзыв', route('dashboard.reviews.edit',  '#'));
});
