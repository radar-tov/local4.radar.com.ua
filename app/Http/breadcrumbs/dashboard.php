<?php
// Dashboard
Breadcrumbs::register('index', function($breadcrumbs)
{
	$breadcrumbs->push('Админпанель', route('index'));
});




// Dashboard > Product
Breadcrumbs::register('products.index', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Товары', route('products.index'));
});
// Dashboard > Product > Create
Breadcrumbs::register('products.create', function($breadcrumbs)
{
    $breadcrumbs->parent('products.index');
    $breadcrumbs->push('Добавить товар', route('products.create'));
});
// Dashboard > Product > Edit
Breadcrumbs::register('products.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('products.index');
    $breadcrumbs->push('Редактирование товара', route('products.edit',  '#'));
});
// Dashboard > Product > Edit
Breadcrumbs::register('products.trash', function($breadcrumbs)
{
    $breadcrumbs->parent('products.index');
    $breadcrumbs->push('Корзина', route('products.trash'));
});



// Dashboard > Users
Breadcrumbs::register('users.indexGet', function($breadcrumbs)
{
	$breadcrumbs->parent('index');
	$breadcrumbs->push('Пользователи', route('users.indexGet'));
});
// Dashboard > Users > Create
Breadcrumbs::register('users.create', function($breadcrumbs)
{
	$breadcrumbs->parent('users.indexGet');
	$breadcrumbs->push('Добавить пользователя', route('users.create'));
});

// Dashboard > Users > Edit
Breadcrumbs::register('users.edit', function($breadcrumbs)
{
	$breadcrumbs->parent('users.indexGet');
	$breadcrumbs->push('Редактировать пользователя', route('users.edit',  '#'));
});



// Dashboard > Sliders
Breadcrumbs::register('sliders.index', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Слайдер 1', route('sliders.index'));
});
// Dashboard > Sliders > Create
Breadcrumbs::register('sliders.create', function($breadcrumbs)
{
    $breadcrumbs->parent('sliders.index');
    $breadcrumbs->push('Добавить картинку', route('sliders.create'));
});

// Dashboard > Sliders > Edit
Breadcrumbs::register('sliders.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('sliders.index');
    $breadcrumbs->push('Редактировать картинку', route('sliders.edit',  '#'));
});



// Dashboard > Sliders
Breadcrumbs::register('slider2.index', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Слайдер 2', route('slider2.index'));
});
// Dashboard > Sliders > Create
Breadcrumbs::register('slider2.create', function($breadcrumbs)
{
    $breadcrumbs->parent('slider2.index');
    $breadcrumbs->push('Добавить картинку', route('slider2.create'));
});

// Dashboard > Sliders > Edit
Breadcrumbs::register('slider2.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('slider2.index');
    $breadcrumbs->push('Редактировать картинку', route('slider2.edit',  '#'));
});




// Dashboard > Baners
Breadcrumbs::register('banners.index', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Баннеры', route('banners.index'));
});
// Dashboard > Baners > Edit
Breadcrumbs::register('banners.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('banners.index');
    $breadcrumbs->push('Редактировать баннер', route('banners.edit',  '#'));
});
// Dashboard > Sliders > Create
Breadcrumbs::register('banners.create', function($breadcrumbs)
{
    $breadcrumbs->parent('banners.index');
    $breadcrumbs->push('Добавить баннер', route('banners.create'));
});






// Dashboard > Categories
Breadcrumbs::register('categories.index', function($breadcrumbs)
{
	$breadcrumbs->parent('index');
	$breadcrumbs->push('Категории', route('categories.index'));
});

// Dashboard > Categories > Create
Breadcrumbs::register('categories.create', function($breadcrumbs)
{
	$breadcrumbs->parent('categories.index');
	$breadcrumbs->push('Добавить категорию', route('categories.create'));
});

// Dashboard > Categories > Edit
Breadcrumbs::register('categories.edit', function($breadcrumbs)
{
	$breadcrumbs->parent('categories.index');
	$breadcrumbs->push('Редактировать категорию', route('categories.edit',  '#'));
});





// Dashboard > Filters
Breadcrumbs::register('filters.index', function($breadcrumbs)
{
	$breadcrumbs->parent('index');
	$breadcrumbs->push('Фильтры', route('filters.index'));
});
// Dashboard > Filters > Edit
Breadcrumbs::register('filters.edit', function($breadcrumbs)
{
	$breadcrumbs->parent('filters.index');
	$breadcrumbs->push('Редактировать фильтр', route('filters.edit', '#'));
});




// Dashboard > Cena
Breadcrumbs::register('cena.index', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Группы цен', route('cena.index'));
});







// Dashboard > Characteristics
Breadcrumbs::register('characteristics.index', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Характеристики', route('characteristics.index'));
});
// Dashboard > Characteristics > Edit
Breadcrumbs::register('characteristics.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('characteristics.index');
    $breadcrumbs->push('Редактировать характеристику', route('characteristics.edit', '#'));
});



// Dashboard > Sales
Breadcrumbs::register('sales.index', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Акции', route('sales.index'));
});
// Dashboard > Sales > Create
Breadcrumbs::register('sales.create', function($breadcrumbs)
{
    $breadcrumbs->parent('sales.index');
    $breadcrumbs->push('Добавить акцию', route('sales.create'));
});
// Dashboard > Sales > Edit
Breadcrumbs::register('sales.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('sales.index');
    $breadcrumbs->push('Редактировать акцию', route('sales.edit', '#'));
});




// Dashboard > Stock
Breadcrumbs::register('stock.index', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Акц.комплекты', route('stock.index'));
});
// Dashboard > Stock > Create
Breadcrumbs::register('stock.create', function($breadcrumbs)
{
    $breadcrumbs->parent('stock.index');
    $breadcrumbs->push('Добавить комплект', route('stock.create'));
});
// Dashboard > Stock > Edit
Breadcrumbs::register('stock.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('stock.index');
    $breadcrumbs->push('Редактировать комплект', route('stock.edit', '#'));
});



// Dashboard > Groups
Breadcrumbs::register('groups.index', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Группа покупателей', route('groups.index'));
});
// Dashboard > Groups > Create
Breadcrumbs::register('groups.create', function($breadcrumbs)
{
    $breadcrumbs->parent('groups.index');
    $breadcrumbs->push('Добавить группу', route('groups.create'));
});
// Dashboard > Groups > Edit
Breadcrumbs::register('groups.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('groups.index');
    $breadcrumbs->push('Редактировать группу', route('groups.edit', '#'));
});





// Dashboard > Brands
Breadcrumbs::register('brands.index', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Бренды', route('brands.index'));
});
// Dashboard > Groups > Create
Breadcrumbs::register('brands.create', function($breadcrumbs)
{
    $breadcrumbs->parent('brands.index');
    $breadcrumbs->push('Добавить бренд', route('brands.create'));
});
// Dashboard > Groups > Edit
Breadcrumbs::register('brands.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('brands.index');
    $breadcrumbs->push('Редактировать бренд', route('brands.edit', '#'));
});





// Dashboard > Shipments
Breadcrumbs::register('shipments.index', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Способы доставки', route('shipments.index'));
});
// Dashboard > Shipments > Create
Breadcrumbs::register('shipments.create', function($breadcrumbs)
{
    $breadcrumbs->parent('shipments.index');
    $breadcrumbs->push('Добавить способ', route('shipments.create'));
});
// Dashboard > Shipments > Edit
Breadcrumbs::register('shipments.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('shipments.index');
    $breadcrumbs->push('Редактировать способ', route('shipments.edit', '#'));
});
// Dashboard > Shipments > novaposhta
Breadcrumbs::register('novaposhta.index', function($breadcrumbs)
{
    $breadcrumbs->parent('shipments.index');
    $breadcrumbs->push('Новая почта', route('novaposhta.index'));
});





// Dashboard > Payments
Breadcrumbs::register('payments.index', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Оплаты', route('payments.index'));
});
// Dashboard > Payments > Create
Breadcrumbs::register('payments.create', function($breadcrumbs)
{
    $breadcrumbs->parent('payments.index');
    $breadcrumbs->push('Добавить способ', route('payments.create'));
});
// Dashboard > Payments > Edit
Breadcrumbs::register('payments.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('payments.index');
    $breadcrumbs->push('Редактировать способ', route('payments.edit', '#'));
});



// Dashboard > Orders
Breadcrumbs::register('orders.index', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Заказы', route('orders.index'));
});
// Dashboard > Orders > Show
Breadcrumbs::register('orders.show', function($breadcrumbs, $n)
{
    $breadcrumbs->parent('orders.index');
    $breadcrumbs->push('Заказ № '.$n, route('orders.show', '#'));
});





// Dashboard > Static_pages
Breadcrumbs::register('static_pages.index', function($breadcrumbs)
{
	$breadcrumbs->parent('index');
	$breadcrumbs->push('Страницы', route('static_pages.index'));
});
// Dashboard > Static_pages > Edit
Breadcrumbs::register('static_pages.edit', function($breadcrumbs)
{
	$breadcrumbs->parent('static_pages.index');
	$breadcrumbs->push('Редактировать страницу', route('static_pages.edit',  '#'));
});





// Dashboard > Articles
Breadcrumbs::register('articles.index', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Статьи', route('articles.index'));
});

// Dashboard > articles > Create
Breadcrumbs::register('articles.create', function($breadcrumbs)
{
    $breadcrumbs->parent('articles.index');
    $breadcrumbs->push('Добавить Статью', route('articles.create'));
});

// Dashboard > articles > Edit
Breadcrumbs::register('articles.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('articles.index');
    $breadcrumbs->push('Редактировать статью', route('articles.edit',  '#'));
});



// Dashboard > reviews
Breadcrumbs::register('reviews.index', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Отзывы', route('reviews.index'));
});
// Dashboard > reviews > Edit
Breadcrumbs::register('reviews.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('reviews.index');
    $breadcrumbs->push('Редактировать отзыв', route('reviews.edit',  '#'));
});



// Dashboard > cart
Breadcrumbs::register('admincart.index', function($breadcrumbs)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push('Корзина', route('admincart.index'));
});
