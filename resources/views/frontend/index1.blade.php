@extends('frontend.layout')

@section('seo')
    <title>{{ 'HouseFit' }}</title>
    <meta name="description" content=""/>
    <meta name="keyword" content=""/>
@endsection

@section('content')

@include('frontend.partials.home_page_slider')
<!--<section class="breadcrumbs">-->
    <!--<div class="container">-->
        <!--<div class="row">-->
            <!--<nav>-->
                <!--<ul>-->
                    <!--<li>Главная</li>-->
                    <!--<li>Родитель</li>-->
                    <!--<li>Дочерняя страница</li>-->
                <!--</ul>-->
            <!--</nav>-->
        <!--</div>-->
    <!--</div>-->
<!--</section>-->
<section class="content">
    <div class="container">
        <div class="row">

           @include('frontend.partials.sidebar')

            <div class="col s12 m12 l9 catalog no-padding">

                @include('frontend.partials.products.sale_products_slider')
                @include('frontend.partials.products.new_products_slider')
                @include('frontend.partials.products.bestseller_products_slider')

            </div>
        </div>
    </div>
</section>
<section class="advantages">
    <div class="container">
        <div class="row">
            <div class="col s12 part-one no-padding">
                <h3>Наши преимущества</h3>
                <div class="col s12 m6 l4">
                    <div class="card advantage-simple-block no-padding wow animated fadeInDown" data-wow-delay="0.5s">
                        <div class="card-image">
                            <img src="/frontend/images/advantages-1.png">
                            <p class="title-company">Housefit</p>
                            <h2 class="card-title uppercase bold">Бесплатная сборка</h2>
                            <h6>Бесплатная сборка</h6>
                            <p class="text">Непосредственно высококвалифицированными специалистами компании «HouseFit» в городах
                                Одесса и Киев.</p>
                        </div>
                    </div>

                    <div class="card wow animated fadeInLeft" data-wow-delay="0.7s">
                        <div class="card-image">
                            <img src="/frontend/images/advantages-2.png">
                            <p class="black-text bold">гарантия &</p>
                            <p class="shadow bold">сервис</p>
                            <a class="readmore uppercase bold double" href="#">фирменная гарантия <strong>2</strong> года</a>
                            <span class="note black-text right-align">непосредственно от производителя</span>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l4">
                    <div class="card wow animated fadeInDown" data-wow-delay="0.9s">
                        <div class="card-image">
                            <img src="/frontend/images/advantages-3.png">
                            <p class="black-text bold">2015</p>
                            <p class="shadow bold">best selling</p>
                            <a class="readmore uppercase bold" href="{{ route('sale') }}">акции&скидки</a>
                        </div>
                    </div>

                    <div class="card wow animated fadeIn" data-wow-delay="1s">
                        <div class="card-image">
                            <img src="/frontend/images/advantages-4.png">
                            <p class="title-company">доставка в других</p>
                            <h2 class="card-title uppercase bold">регионах</h2>
                            <h6>Бесплатная доставка</h6>
                            <p class="text">Для других регионов бесплатная доставка на региональный склад.</p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m12 l4 pad-on-mobile">
                    <div class="card col s12 m6 l12 no-padding wow animated fadeInRight"data-wow-delay="1.3s">
                        <div class="card-image">
                            <img src="/frontend/images/advantages-5.png">
                            <p class="title-company">доставка в городах</p>
                            <h2 class="card-title uppercase bold">Одесса и Киев</h2>
                            <h6>Совершенно бесплатно!</h6>
                            <p class="text">Теперь не нужно думать о доставке! Мы товар доставим сами и самое главное - совершенно бесплатно.</p>
                        </div>
                    </div>

                    <div class="card col s12 m6 l12 no-padding wow animated fadeInUp pad-left-at-mobile" data-wow-delay="1.4s">
                        <div class="card-image">
                            <img src="/frontend/images/advantages-6.png" class="hide-on-med-only">
                            <img src="/frontend/images/advantages-6-mobile.png" class="show-on-medium">
                            <p class="black-text bold">последние</p>
                            <p class="shadow bold">новости</p>
                            <a class="readmore uppercase bold" href="{{ route('frontend.page') }}">подробнее...</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 part-two no-padding">
                <div class="col s12 m6 l8">
                    <div class="card wow animated fadeInLeft"data-wow-delay="1.4s">
                        <div class="card-image">
                            <img src="/frontend/images/advantages-7.png" class="hide-on-med-and-down">
                            <img src="/frontend/images/advantages-7-mobile.png" class="show-on-medium-and-down">
                            <p class="black-text bold">Полный комплект.</p>
                            <p class="shadow bold">документы</p>
                            <a class="readmore uppercase bold" href="#">паспорт, гарантйиный талон, товарный чек</a>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l4">
                    <div class="card wow animated fadeInRight" data-wow-delay="1.5s">
                        <div class="card-image">
                            <img src="/frontend/images/advantages-8.png">
                            <p class="title-company">Housefit</p>
                            <h2 class="card-title uppercase bold">Отгрузка товара</h2>
                            <p class="text">Отгрузка товара на транспортную фирму производится в течении одного рабочего дня с момента оформления заказа.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="description">
    <div class="container">

        <!--   Icon Section   -->
        <div class="row">
            <h1>Спортивный интернет-магазин</h1>
            <div class="col s12 m6 shop-info">
                    <h4>Десятки лет опыта в продвижении здорового образа жизни</h4>
                    <h5>Интернет магазин спортивных товаров Housefit открывает свои двери для всех, кто понимает важность заботы о своем физическом здоровье.</h5>
                    <p>Интернет магазин спортивных товаров Housefit открывает свои двери для всех, кто понимает важность заботы о своем физическом здоровье. Существуя на мировом рынке более 40 лет, торговая марка HouseFit динамично развивалась и совершенствовалась вместе с мировыми тенденциями в сфере фитнеса, аэробики и силовых тренировок. А с растущей популярностью здорового образа жизни в HouseFit с воодушевлением приняли и новое направление для развития - товары для активного отдыха.</p>
                    <p>Каталог нашего спортивного интернет магазина включает традиционное силовое оборудование и инвентарь, популярные группы кардиотренажеров (беговые дорожки, орбитреки, велотренажеры), инвентарь для активного туризма, а также оборудование для расслабления после активных физических нагрузок. твуя на мировом рынке более 40 лет, торговая марка HouseFit динамично развивалась и совершенствовалась вместе с мировыми тенденциями в сфере фитнеса, аэробики и силовых тренировок. А с растущей популярностью здорового образа жизни в HouseFit с воодушевлением приняли и новое направление для развития - товары для активного отдыха.
                    <br>Каталог нашего спортивного интернет магазина включает традиционное силовое</p>
            </div>

            <div class="col s12 m6 shop-info">
                    <h4>HouseFit - тренажеры для дома и профессиональное оборудование для фитнес-клубов</h4>
                    <h5>Традиционно компания HouseFit специализировалась на тренажерах для домашнего использования, которые благодаря своей инновационной конструкции, легкости, малым габаритам и доступной цене в свое время заняли прочные позиции на рынке и заслужили любовь населения во многих странах мира.</h5>
                    <p>Однако перемены в жизни общества вернули былую популярность
                        спортивным залам и фитнес-клубам. Руководствуясь растущим
                        спросом, в HouseFit разработали и начали выпускать также линейку профессионального оборудования, которая теперь представлена
                        и в нашем каталоге. Кроме того, наш магазин спорттоваров в Одессе
                        является частью обширной сети фирменных магазинов и официальных представительств торговой марки HouseFit по всей Украине, включая Киев,
                        Львов, Ужгород, Донецк и многие другие крупные города.</p>
                    <p>Помимо украинского рынка, продукция HouseFit на протяжении десятилетий
                        успешно продается по всему миру: официальными
                        представительствами могут похвастаться Япония, США, Чехия, Италия,
                        Германия, Словения, ЮАР, Молдова, Россия, Латвия
                        и многие другие страны.</p>
            </div>
        </div>
    </div>
</section>


@endsection
@section('bottom-scripts')
    @include('frontend.partials.scripts.add_to_cart')
@endsection