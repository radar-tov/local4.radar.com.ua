@inject('cartProvider', '\App\ViewDataProviders\CartDataProvider')

@extends('frontend.layout')

@section('seo')
    <title xmlns="http://www.w3.org/1999/html">{{ $product->meta_title ?: $product->title }}</title>
    <meta name="description" content="{{ $product->meta_description ?: $product->excerpt }}"/>
    <meta name="keywords" content="{{ $product->meta_keywords ?: $product->title }}"/>
@endsection

@section('top-scripts')

@endsection

@section('content')
    {{--{{ dump(session()->all()) }}--}}
    <section class="breadcrumbs">
        <div class="container">
            <div class="row">
                <ol class="breadcrumb">
                    {{--{{dd($product)}}--}}
                    <li><a href="/">Главная</a></li>
                    <li><a href="/{{ $product->category->parent->slug }}">{{ $product->category->parent->title }}</a></li>
                    <li><a href="/{{ $product->category->parent->slug }}/{{ $product->category->slug }}">{{ $product->category->title }}</a></li>
                    <li class="active">{{ $product->title }}</li>
                </ol>
            </div>
        </div>
    </section>
    <?php $pid = $product->id ?>

    <section class="content">
        <div class="container">
            <div class="row">
                <h3 class="categories">{{ $product->category->title }}</h3>

                <div class="left linksBlock">
                    @if($product->prevProductSlug())
                        <a class="link left" href="/{{ $product->category->parent->slug }}/{{ $product->category->slug.'/'.$product->prevProductSlug() }}">&#5176
                            Предыдущий товар</a>
                    @endif

                    @if($product->nextProductSlug())
                        <a class="link right" href="/{{ $product->category->parent->slug }}/{{ $product->category->slug.'/'.$product->nextProductSlug() }}">Следующий
                            товар &#5171</a>
                    @endif
                </div>

                {{--{{ $product->id }}--}}
                <div class="col s12 m6 l4 divLightBox no-padding">
                    @if($product->is_bestseller)
                        <img src="/frontend/images/hit.png" class="hit-img">
                    @endif
                    @if($product->is_new)
                        <img src="/frontend/images/new.png" class="new-img">
                    @endif
                    @if($product->hasDiscount())
                        <img src="/frontend/images/sale.png" class="sale-img">
                    @endif
                    <div class="listLightbox">
                        @if(count($product->thumbnail) && file_exists(public_path($product->thumbnail->first()->path)))
                            <a class="fancybox" rel="gallery" href="{{ $product->images->first()->path }}">
                                <img class="example-image index_image" src="{{ $product->thumbnail->first()->path }}"
                                     style="min-height: 350px; min-width: 350px"
                                     alt="{{ $product->title }}"/>
                            </a>
                        @else
                            <img class="example-image index_image" src="/frontend/images/default.png" alt="{{ $product->title }}"/>
                        @endif

                        @if(hasGift($product))
                            <div class="appointment"><img src="/frontend/images/present.png"/></div>
                        @endif
                        {{--@if(count($product->thumbnail) && file_exists(public_path($product->images->first()->path)))--}}
                            {{--@foreach($product->images as $key => $image)--}}
                                {{--<li>--}}
                                    {{--<a class="example-image-link fancybox"--}}
                                       {{--rel="group"--}}
                                       {{--href="{{ $image->path }}"--}}
                                       {{--data-lightbox="example-set"--}}
                                       {{--data-title="{{ $product->title }}">--}}
                                            {{--<img class="example-image" src="{{ $image->path }}" alt="{{ $product->title }}"/>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            {{--@endforeach--}}
                        {{--@endif--}}

                    </div>
                </div>
                <div class="col s12 m6 l5 single-item-info">
                    <h3>{{ $product->title }}</h3>
                    @if($product->article != '-')
                        <p class="single-item-sku">Код: <span class="violet-text">{{ $product->article }}</span></p>
                    @else
                        <p class="single-item-sku">Код: <span class="violet-text">{{ $product->id }}</span></p>
                    @endif
                    @if(isset($product->brand->title))
                        <p class="brand no-margin">Производитель: <span>{{ $product->brand->title }}</span></p>
                    @endif



                    <div id="rating_3" class="item-rating left">
                        {{--индификатор рейтинга--}}
                        {{--<input type="hidden" name="vote-id" value="5" id=""/>--}}
                        {{--кол-во проголосовавших--}}
                        <input type="hidden" name="votes" value="{{ $product->rates->count() }}"/>
                        {{--кол-во закрашеных звёзд--}}
                        <input type="hidden" name="val" value="{{ array_sum($product->rates->pluck('rate')->all()) / ($product->rates->count() ?: 1) }}">
                        {{--голосовал ли за этот товар--}}
                        <input type="hidden" value="{{ in_array($pid, null !== Session('rated') ? Session('rated') : []) }}" id="check"/>
                    </div>
                    {{--{{ dump(session()->all()) }}--}}

                    {{--@if(Auth::check())
                        <input type="hidden" value="{{ in_array($pid, null !== Session('rated') ? Session('rated') : []) }}" id="check"/>
                    @else
                        <input type="hidden" value="1" id="check"/>
                    @endif--}}



                    <div class="col s12 clearleft wrap-price">
                        <div class="pricesBlock" style="width:100%;float:left">
                            <div class="col s12 item-prices">
                                @if($product->hasDiscount())
                                    <span class="item-old-price no-margin">{{ $product->getPrice() }} грн</span>
                                    <span> - {{ $product->getDiscount() }}% Ваша цена:</span>
                                    <span class="item-new-price no-margin"> {{ $product->getNewPrice() }} грн</span>
                                @else
                                    <p class="item-new-price no-margin">{{ $product->getPrice() }} грн</p>
                                @endif
                                {{--<p class="item-new-price no-margin">{{ $product->getOutPrice() }} грн</p>--}}
                            </div>
                            <div class="col s12">
                                <div class="center-left kol col">
                                    <p>Кол-во:</p>
                                </div>
                                <div class="addcol-item center-left mod col">
                                    <input type="number"
                                           debounce="10"
                                           name="colichestvo"
                                           id="colichestvo"
                                           class="item-quantity colichestvo"
                                           data-productId="{{ $product->id }}"
                                           value="1">
                                </div>

                                <div class="addtocart-button-item center-align col">
                                    @if($product->available > 0)
                                    <input type="submit"
                                           name="addtocart"
                                           class="@if($product->available == 1) addtocart-button-hover @endif buyKol"
                                           onclick="yaCounter39848700.reachGoal('addCart'); ga('send', 'event', 'Knopka', 'addCart'); return true;"
                                           data-productId="{{ $product->id }}"
                                           data-productPrice="{{ $product->getPrice() }}"
                                           value="@if($product->available==1) {{ productInCart($product) ? 'В корзине' : 'Купить' }} @elseif($product->available==2) Под заказ @endif"
                                           title="@if($product->available==1) Купить @elseif($product->available==2) Под заказ @endif"
                                           @if($product->available != 1) disabled @endif>
                                    @endif
                                </div>
                            </div>
                            <div class="col s12 wrapper-buttons">

                                <div class="col clearleft short-desc s4 no-margin">
                                    @if ($product->available==1)
                                        <p class="availability green-text no-margin"><img src="/frontend/images/available.png" alt=""/>Есть в наличии</p>
                                    @endif
                                    @if ($product->available==0)
                                        <p class="availability bold red-text no-margin"><i class="red-text fa fa-remove"></i>Нет в наличии</p>
                                    @endif
                                    @if ($product->available==2)
                                        <p class="availability bold red-text no-margin"><i class="red-text fa fa-car"></i>Под заказ</p>
                                    @endif
                                </div>

                                <div class="addtocart-button-item center-align col s4">
                                    <input type="submit"
                                           name="compare"
                                           class="addtocart-button compare"
                                           data-productId="{{ $product->id }}"
                                           class="compare-button-hover compare anim"
                                           value="{{ $cartProvider->searchCompare($product->id) ? 'В сравнении' : 'Сравнить' }}"
                                           title="Сравнить">

                                </div>
                                @if ($product->available==1)
                                    <div class="col short-desc s4 no-margin">
                                        <a href="{{ route('frontend.oneclick', $product->id) }}" class="oneClick fancybox.ajax">
                                            <p class="availability green-text no-margin" id="one-click">Купить в 1 клик</p>
                                        </a>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col s12 m12 l3 no-padding">
                    <div class="tech_docs">
                        <div class="tech_doc col s6 m6 l12">
                            <h5>Техническая документация</h5>
                            @if($product->files)
                                @foreach($product->files as $file)
                                    @if($file->show == 1)
                                    <a class="instruction {{ $file->path ? '' : '_disabled' }} "
                                       href="{{ url('/pdf/download', $file->id ) }}"
                                       onclick="yaCounter39848700.file('{{ $file->path }}',{params: '{{ $file->name }}'});
                                               ga('send', 'event', 'PDF', '{{ $file->name }}');
                                               return true;"
                                       target="_blank">
                                        <span>&#8811 {{ $file->name }}</span></br>
                                    </a>
                                    <a class="instruction _disabled"><span>скачан {{ $file->downloads }} раз</span></a></br>
                                    @endif
                                @endforeach
                            @endif
                        </div>

                       {{--<!-- <div class="tech_doc col s6 m6 l12">--}}
                            {{--<h5>Сертификаты</h5>--}}


                            {{--@foreach($product->images->where('is_certificate', 1) as $image)--}}

                                {{--<li><a class="example-image-link" href="{{ $image->path }}" data-lightbox="example-set1"--}}
                                       {{--data-title="{{ $product->title }}">сертификат</a></li>--}}

                            {{--@endforeach--}}


                        {{--</div>-->--}}


                    </div>
                </div>

                @include('frontend.partials.products.stock')

                <div class="row">
                    <div class="col s12 m12 l9 no-padding product-card">
                        <div class="cart-authentication">
                            <ul class="tabs">
                                <li class="tab col s3 m3 l3"><a class=" @if (!empty($product->body)) active @endif waves-effect waves-light" href="#description">Описание</a></li>
                                <li class="tab col s3 m3 l3"><a class=" @if (empty($product->body)) active @endif waves-effect waves-light" href="#options">Характеристики</a></li>
                                <li class="tab col s3 m3 l3"><a class="waves-effect waves-light" href="#foto">Фото</a></li>
                                @if(!empty($product->video))
                                    <li class="tab col s3 m3 l3"><a class="waves-effect waves-light" href="#video1">Видео</a></li>
                                @endif
                                <li class="tab col s3 m3 l3"><a class="waves-effect waves-light" href="#ones">Отзывы</a></li>
                            </ul>
                            <div id="description" class="col s12 no-padding">
                                <div class="full-desc">
                                    <div class="bordered">
                                        {!! $product->body !!}
                                    </div>
                                </div>
                            </div>
                            <div id="options" class="col s12 no-padding">
                                <div class="full-desc bordered mod">
                                    <div class="col mod col s12 l6">
                                        <div class="col col s12 l6">
                                            {{--<h5 class="teg mod">Характеристики</h5>--}}
                                            @foreach($product->sortedValuesCharacters($product->category_id) as $characteristics)
                                                @if($characteristics->characteristic->isVisibleForCategory($product->category_id))
                                                    <div class="col aspect s12 texxar">
                                                        <p class="col s12 m9">{{ $characteristics->characteristic->title }}</p>
                                                        <p class="col s12 m3">{{ $characteristics->value }}</p>
                                                    </div>
                                                @endif
                                            @endforeach
                                            <p class="col s12 m9"></p>
                                            {{--<h5 class="teg mod">Параметры</h5>--}}
                                            {{--{{ dump($product->getParameters($product->category_id)) }}--}}
                                            {{--@foreach($product->getParameters as $rapameter)--}}
                                            @foreach($product->sortedValuesParam() as $rapameter)
                                                @if($rapameter->parameter->show)
                                                    {{--{{ dump($rapameter->parameter) }}--}}
                                                    <div class="col aspect s12 texxar">
                                                        <p class="col s12 m9">{{ $rapameter->parameter->title }}</p>
                                                        <p class="col s12 m3">{{ $rapameter->value }}</p>
                                                    </div>
                                                @endif
                                            @endforeach
                                            <p class="col s12 m9"></p>
                                            {{--TODO-evgenii Удалить блок после заполнения всех товаров --}}
                                            @foreach($product->sortedValues($product->category_id) as $field)
                                                @if($field->filter->isVisibleForCategory($product->category_id))
                                                    <div class="col aspect s12 texxar">
                                                        <p class="col s12 m9">{{ $field->filter->title }}</p>
                                                        <p class="col s12 m3">{{ $field->value }}</p>
                                                    </div>
                                                @endif
                                            @endforeach
                                            {{--TODO-evgenii END Удалить блок после заполнения всех товаров --}}

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="foto" class="col s12 no-padding">
                                <div class="full-desc">
                                    <div class="bordered">
                                        @if(count($product->thumbnail) && file_exists(public_path($product->images->first()->path)))
                                            @foreach($product->images->where('is_certificate', '=', 0) as $key => $image)
                                                @if(getimagesize(public_path($image->path))[0] > 260 && file_exists(public_path($image->path)))
                                                    <a class="fancybox"
                                                       rel="gallery"
                                                       href="{{ $image->path }}"
                                                       title="{{ $product->title }}">
                                                       <img style="max-height: 150px;" src="{{ $image->path }}" alt="{{ $product->title }}"/>
                                                    </a>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div id="video1" class="col s12 no-padding">
                                <div class="full-desc">
                                    <div class="bordered">
                                        {!! $product->video !!}
                                    </div>
                                </div>
                            </div>

                            <div id="ones" class="col s12 no-padding bordered">
                                <div class="reviews">
                                    @if(count($product->reviews))
                                        <h3>Отзывы</h3>
                                    @endif
                                    @forelse($product->reviews as $review)
                                        <div class="col s12 review">
                                            <div class="review-img col s1">
                                                @if($review->user->thumbnail && is_file(public_path($review->user->thumbnail)))
                                                    <img class="responsive-img circle"
                                                         src="{{ url($review->user->thumbnail) }}"
                                                         alt="{{ $review->user->name }}"/>
                                                @else
                                                    <img class="responsive-img circle" src="/frontend/images/user.png"
                                                         alt="{{ $review->user->name }}"/>
                                                @endif
                                            </div>
                                            <div class="col s12 text-review">
                                                <span class="author">{{ $review->user->name }}</span><span> | </span><span
                                                        class="review-date">{{  $review->created_at->format('d.m.Y') }}</span>
                                                <p class="no-margin">{{ $review->body }}</p>
                                            </div>
                                        </div>
                                    @empty
                                    <!-- When reviews is empty, fill it if you want, and remove check for reviews count -->
                                    @endforelse
                                </div>
                                <div class="right clearleft">
                                    <div class="review-button center-align">
                                        <a class="various fancybox.ajax" href="{{ url('comment', $product->id) }}" title="Оставить отзыв" rel="nofollow">
                                            <input type="submit" name="add_review" class="review-button white-text uppercase" value="оставить отзыв" title="оставить отзыв">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col s12 m12 l3">
                        <section class="similar">
                            <div class="col s12 product no-padding">
                                {{--{{ dump($product) }}--}}
                                @if(count($product->similarProducts))
                                    <h3>Похожие товары</h3>
                                    <div class="similar-products">

                                        @foreach($product->similarProducts as $pivet_product)

                                            @include('frontend.partials.products.template_product')

                                        @endforeach

                                    </div>
                                @endif
                            </div>
                        </section>
                    </div>
                    <div class="col s12 m12 l3">
                        <section class="related">
                            <div class="col s12 product no-padding">
                                {{--{{ dump($product->relatedProducts) }}--}}
                                @if(count($product->relatedProducts))
                                    <h3>Подходящие аксессуары</h3>
                                    <div class="related-products">

                                        @foreach($product->relatedProducts as $pivet_product)

                                            @include('frontend.partials.products.template_product')

                                        @endforeach

                                    </div>
                                @endif
                            </div>
                        </section>
                    </div>
                    <input type="hidden" value="{{ csrf_token() }}" id="token"/>
                </div>
            </div>
        </div>
    </section>

    {{--<div id="video" class="modal">--}}
        {{--<div class="modal-content">--}}
            {{--<a href="#!" class="modal-action modal-close waves-effect btn-flat "><i class="fa fa-close"></i></a>--}}
            {{--<div class="video-container">--}}
                {{--{!! $product->video !!}--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div id="application" class="modal">--}}
        {{--<div class="modal-content">--}}
            {{--<a href="#!" class="modal-action modal-close waves-effect btn-flat "><i class="fa fa-close"></i></a>--}}
            {{--<div class="input-field col s12 center-align">--}}
                {{--<input placeholder="введите ваше имя" id="name" type="text" class="validate">--}}
                {{--<input placeholder="номер телефона" id="phone" type="text" class="validate">--}}
                {{--<input placeholder="email" id="email" type="text" class="validate">--}}
                {{--<input placeholder="примечание" id="message" type="text" class="validate">--}}
                {{--<button class="btn waves-effect waves-light" type="submit" name="action">Отправить <i--}}
                            {{--class="fa fa-envelope"></i></button>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div id="object-3d" class="modalTest">--}}
        {{--<div class="modal-content center-align">--}}
            {{--<a href="#!" class="objClose modal-close waves-effect btn-flat"><i class="fa fa-close"></i></a>--}}

            {{--<object class="flashObject" width="550" height="400">--}}
                {{--<param name="movie" value="/{{ $product->flash_view }}">--}}
                {{--<embed src="/{{ $product->flash_view }}" width="550" height="400" type="application/x-shockwave-flash"--}}
                       {{--pluginspage="http://www.macromedia.com/go/getflashplayer">--}}
            {{--</object>--}}
        {{--</div>--}}
        {{--<div class="object-hover"></div>--}}
    {{--</div>--}}

    <!--  Scripts-->

@endsection

@section('bottom-scripts')

@endsection


@section('rate')

@endsection