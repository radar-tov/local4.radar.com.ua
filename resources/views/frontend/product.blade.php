@extends('frontend.layout')


@section('seo')
    <title>{{ $product->meta_title ?: $product->title }}</title>
    <meta name="description" content="{{ $product->meta_description ?: $product->excerpt }}"/>
    <meta name="keywords" content="{{ $product->meta_keywords ?: $product->title }}"/>
@endsection



@section('content')
    <section class="breadcrumbs">
        <div class="container">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/{{ $product->parentSlug()->slug }}">{{ $product->parentSlug()->title }}</a></li>
                    <li><a href="/{{ $product->parentSlug()->slug }}/{{ $product->category->slug }}">{{ $product->category->title }}</a></li>
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
                        <a class="link left" href="/{{ $product->parentSlug()->slug }}/{{ $product->category->slug.'/'.$product->prevProductSlug() }}">&#5176
                            Предыдущий товар</a>
                    @endif

                    @if($product->nextProductSlug())
                        <a class="link right" href="/{{ $product->parentSlug()->slug }}/{{ $product->category->slug.'/'.$product->nextProductSlug() }}">Следующий
                            товар &#5171</a>
                    @endif
                </div>

                {{--{{ $product->id }}--}}
                <div class="col s12 m6 l4 divLightBox no-padding">
                    <ul class="listLightbox">
                        <li>
                            @if(count($product->thumbnail) && file_exists(public_path($product->thumbnail->first()->path)))

                                <a class="example-image-link bigImage" href="{{ $product->thumbnail->first()->path }}"
                                   data-lightbox="example" data-title="{{ $product->title }}">
                                    <img class="example-image" src="{{ $product->thumbnail->first()->path }}"
                                         alt="{{ $product->title }}"/>
                                </a>
                            @else
                                <a class="example-image-link bigImage" href="#" data-title="{{ $product->title }}">
                                    <img class="example-image" src="/frontend/images/default.png"
                                         alt="{{ $product->title }}"/>
                                </a>
                            @endif
                            @if(hasGift($product))
                                <div class="appointment"><img src="/frontend/images/present.png"/></div>
                            @endif
                        </li>
                        @if(count($product->thumbnail) && file_exists(public_path($product->images->first()->path)))

                            @foreach($product->images->where('is_certificate', '=', 0) as $key => $image)

                                <li><a class="example-image-link" href="{{ $image->path }}" data-lightbox="example-set"
                                       data-title="{{ $product->title }}"><img class="example-image"
                                                                               src="{{ $image->path }}"
                                                                               alt=""/></a></li>
                            @endforeach

                        @else


                        @endif
                    </ul>
                </div>
                <div class="col s12 m6 l5 single-item-info">
                    <h3>{{ $product->title }}</h3>

                    <p class="single-item-sku">Код: <span class="violet-text">{{ $product->article }}</span></p>

                    @if(isset($product->brand->title))
                        <p class="brand no-margin">Производитель: <span>{{ $product->brand->title }}</span></p>
                    @endif
                    <div id="rating_3" class="item-rating left">
                        <input type="hidden" name="vote-id" value="5" id=""/>
                        <input type="hidden" name="val" value="{{ round($product->rates()->avg('rate'))}}">
                    </div>
                    <div class="col s12 clearleft wrap-price">
                        <div class="pricesBlock" style="width:100%;float:left">
                            <div class="col s12 item-prices">
                                @if($product->hasDiscount())
                                    <span class="item-old-price no-margin">{{ $product->getPrice() }} грн</span>
                                    <span class="item-new-price no-margin">{{ $product->getNewPrice() }} грн</span>
                                @else
                                    <p class="item-new-price no-margin">{{ $product->getPrice() }} грн</p>
                                @endif
                            </div>
                            <div class="col s12">
                                <div class="center-left kol col">
                                    <p>Кол-во:</p>
                                </div>
                                <div class="addcol-item center-left mod col">
                                    <input type="number"
                                           name="colichestvo"
                                           class="addcol-item-hover buy"
                                           value="1"
                                           title="1">
                                </div>

                                <div class="addtocart-button-item center-align col">
                                    <input type="submit"
                                           name="addtocart"
                                           class="@if($product->available == 1) addtocart-button-hover @endif buy"
                                           onclick="yaCounter39848700.reachGoal('addCart'); ga('send', 'event', 'Knopka', 'addCart'); return true;"
                                           data-productId="{{ $product->id }}"
                                           data-productPrice="{{ $product->getPrice() }}"
                                           value="@if($product->available==1) {{ productInCart($product) ? 'В корзине' : 'Купить' }} @elseif($product->available==2) Под заказ @endif"
                                           title="@if($product->available==1) Купить @elseif($product->available==2) Под заказ @elseif($product->available==0) Нет в наличии @endif"
                                           @if($product->available != 1) disabled @endif>
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

                                <div class="video-button-item center-align col s4 @if (!empty($product->video)) active @else non-active @endif">
                                    <a href="#video" class="review-button white-text uppercase modal-trigger" title="video">
                                        <input type="button"
                                               name="video"
                                               class="video-button"
                                               data-productId="{{ $product->id }}"
                                               class="video-button-hover compare anim"
                                               onclick="yaCounter39848700.reachGoal('playVideo'); ga('send', 'event', 'Knopka', 'playVideo'); return true;"
                                               value="ВИДЕО"
                                               title="Видео">
                                    </a>

                                </div>
                                <div class="addtocart-button-item center-align col s4">
                                    <input type="submit"
                                           name="compare"
                                           class="addtocart-button compare"
                                           data-productId="{{ $product->id }}"
                                           class="compare-button-hover compare anim"
                                           value="{{ Cart::instance('compare')->search(['id' => $product->id]) ? 'В сравнении' : 'Сравнить' }}"
                                           title="Сравнить">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col s12 m12 l3 no-padding">
                    <div class="tech_docs">
                        <div class="tech_doc col s6 m6 l12">
                            <h5>Техническая документация</h5>

                            <div class="">

                                <a class="instruction {{ $product->pdf ? '' : '_disabled' }} "
                                   href="/{{ $product->pdf }}"
                                   onclick="yaCounter39848700.file('{{ $product->pdf }}', {params: '{{ $product->title }}'}); ga('send', 'event', 'PDF', '{{ $product->title }}'); return true;"
                                   target="_blank">
                                    <span>&#8811 инструкция</span>
                                </a>

                            </div>
                        </div>

                       <!-- <div class="tech_doc col s6 m6 l12">
                            <h5>Сертификаты</h5>


                            @foreach($product->images->where('is_certificate', 1) as $image)

                                <li><a class="example-image-link" href="{{ $image->path }}" data-lightbox="example-set1"
                                       data-title="{{ $product->title }}">сертификат</a></li>

                            @endforeach


                        </div>-->


                    </div>
                </div>
                <!--<div class="col features">

                    <div class="col s6 no-padding">
                        <h6><span class="green-text">&gt;&gt;</span> Бесплатная сборка</h6>

                        <p>непосредственно <span class="green-text italic">высоко- квалифицирован­ными специалистами</span>
                            компании «HouseFit» в городах Одесса и Киев.</p>
                    </div>
                    <div class="col s6 no-padding">
                        <h6><span class="green-text">&gt;&gt;</span> Отгрузка товара</h6>

                        <p>Отгрузка товара на тран­спортную фирму произво­дится в течении одного рабочего дня с момента
                            оформления заказа.</p>
                    </div>
                    <div class="col s6 no-padding">
                        <h6><span class="green-text">&gt;&gt;</span> Доставка в городах Одесса и Киев</h6>

                        <p>Теперь не нужно думать о доставке! Мы товар доста­вим сами и самое главное - <span
                                    class="green-text italic">совершенно бесплатно</span>!</p>
                    </div>
                    <div class="col s6 no-padding">
                        <h6><span class="green-text">&gt;&gt;</span> Гарантия</h6>

                        <p>На все товары предостав­ляется фирменная гаран­тия и обслуживание <span
                                    class="green-text italic">непо­средственно от произво­дителя.</span></p>
                    </div>
                    <div class="col s6 no-padding">
                        <h6><span class="green-text">&gt;&gt;</span> Доставка в регионах</h6>

                        <p>Для других регионов <span class="green-text italic">бесплатная доставка</span> на региональный
                            склад.</p>
                    </div>
                    <div class="col s6 no-padding">
                        <h6><span class="green-text">&gt;&gt;</span> Документы</h6>

                        <p>Полный комплект докумен­тов: паспорт, гарантийный талон, товарный чек.</p>
                    </div>
                </div>-->

                @include('frontend.partials.products.stock')

                <div class="row">
                    <div class="col s12 m12 l9 no-padding product-card">
                        <div class="cart-authentication">
                            <ul class="tabs">
                                <li class="tab col s3 m3 l3"><a class=" @if (!empty($product->body)) active @endif waves-effect waves-light" href="#register">Описание</a></li>
                                <li class="tab col s3 m3 l3"><a class=" @if (empty($product->body)) active @endif waves-effect waves-light" href="#login">Характеристики</a></li>
                                <li class="tab col s3 m3 l3"><a class="waves-effect waves-light" href="#ones">Отзывы</a></li>
                            </ul>
                            <div id="register" class="col s12 no-padding">
                                <div class="full-desc">
                                    <div class="bordered">
                                        {!! $product->body !!}
                                    </div>
                                </div>
                            </div>
                            <div id="login" class="col s12 no-padding">
                                <div class="full-desc bordered mod">
                                 {{--<div class="col mod col s12 l6">--}}
                                        {{--<h5 class="teg mod">Основные характеристики</h5>--}}
                                        {{--{{ dd($product->filterValuesWithFilters->sortBy('filter.category.pivot.order')->toArray()) }}--}}
                                        {{--@foreach($product->sortedValues($product->category_id) as $field)--}}
                                            {{--{{ dd($field->toArray()) }}--}}
                                            {{-- @if($field->filter->isVisibleForCategory($product->category_id))--}}
                                            {{--<div class="col aspect s12">--}}
                                                {{--{{ dd($field->filter->toArray()) }}--}}
                                                {{--<p class="title bold uppercase">Основные</p>--}}
                                                {{--<p class="col s12 m4">{{ $field->filter->title }}</p>--}}
                                                {{--<p class="col s12 m8">{{ $field->value }}</p>--}}
                                            {{--</div>--}}
                                            {{--@endif--}}
                                        {{--@endforeach--}}
                                    {{--</div>--}}
                                    <div class="col col s12 l6">
                                        <h5 class="teg mod">Технические характеристики</h5>
                                        {{--{{ dd($product->filterValuesWithFilters->sortBy('filter.category.pivot.order')->toArray()) }}--}}
                                        @foreach($product->sortedValues($product->category_id) as $field)
                                            {{--{{ dd($field->toArray()) }}--}}
                                            {{-- @if($field->filter->isVisibleForCategory($product->category_id))--}}
                                            <div class="col aspect s12">
                                                {{--{{ dd($field->filter->toArray()) }}--}}
                                                {{--<p class="title bold uppercase">Основные</p>--}}
                                                <p class="col s12 m4">{{ $field->filter->title }}</p>
                                                <p class="col s12 m8">{{ $field->value }}</p>
                                            </div>
                                            {{--@endif--}}
                                        @endforeach
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
                                        {{--@if(Auth::check())--}}
                                        <a href="#review" class="review-button white-text uppercase modal-trigger"
                                           title="купить">
                                            <input type="submit" name="add_review"
                                                   class="review-button white-text uppercase" value="оставить отзыв"
                                                   title="купить">
                                        </a>
                                        @if (session('message'))
                                            <div>
                                                <b>{{ session('message') }}</b>
                                            </div>
                                        @endif
                                        {{--@endif--}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col s12 m12 l3">
                        <section class="related">
                            <div class="col s12 product no-padding">
                                @if(count($product->relatedProducts))
                                    <h3>Подходящие аксессуары</h3>
                                    <div class="related-products">

                                        @foreach($product->relatedProducts as $product)

                                            @include('frontend.partials.products.product_template')

                                        @endforeach

                                    </div>
                                @endif
                            </div>
                            <!--/Menu-->
                            <input type="hidden" value="{{ csrf_token() }}" id="token"/>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="video" class="modal">
        <div class="modal-content">
            <a href="#!" class="modal-action modal-close waves-effect btn-flat "><i class="fa fa-close"></i></a>
            <div class="video-container">
                {!! $product->video !!}
            </div>
        </div>
    </div>
    <div id="application" class="modal">
        <div class="modal-content">
            <a href="#!" class="modal-action modal-close waves-effect btn-flat "><i class="fa fa-close"></i></a>
            <div class="input-field col s12 center-align">
                <input placeholder="введите ваше имя" id="name" type="text" class="validate">
                <input placeholder="номер телефона" id="phone" type="text" class="validate">
                <input placeholder="email" id="email" type="text" class="validate">
                <input placeholder="примечание" id="message" type="text" class="validate">
                <button class="btn waves-effect waves-light" type="submit" name="action">Отправить <i
                            class="fa fa-envelope"></i></button>
            </div>
        </div>
    </div>
    <div id="object-3d" class="modalTest">
        <div class="modal-content center-align">
            <a href="#!" class="objClose modal-close waves-effect btn-flat"><i class="fa fa-close"></i></a>
            {{--<script src="/frontend/js/3dtour.js"></script>--}}
            {{--<div id="container">--}}
            {{--<div id="panoDIV" style="height:470px">--}}
            {{--<script>--}}
            {{--embedpano({target:"panoDIV",swf:"/{{ $product->flash_view }}",wmode:"direct"});--}}
            {{--</script>--}}

            {{--</div>--}}
            {{--</div>--}}
            <object class="flashObject" width="550" height="400">
                <param name="movie" value="/{{ $product->flash_view }}">
                <embed src="/{{ $product->flash_view }}" width="550" height="400" type="application/x-shockwave-flash"
                       pluginspage="http://www.macromedia.com/go/getflashplayer">
            </object>
        </div>
        <div class="object-hover"></div>
    </div>

    <!--  Scripts-->

    @if(Auth::check())
        <input type="hidden" value="{{ in_array($pid, null !== Session('rated') ? Session('rated') : []) }}"
               id="check"/>
    @else
        <input type="hidden" value="1" id="check"/>
    @endif

@endsection

@section('bottom-scripts')
    @include('frontend.partials.scripts.add_to_cart')
    @include('frontend.partials.scripts.add_to_compare')
@endsection


@section('rate')

    <script>
        //        $("input.addtocart-button-hover").click(function(){
        //            $('#sold').openModal();
        //        });

        console.log(!!$("#check").val());

        $('#rating_3').rating({
            fx: 'full',
            image: '/frontend/images/stars2.png',
            loader: '/frontend/images/ajax-loader.gif',
            url: location.href, /*обработка результатов голосования*/
            type: 'GET',
            readOnly: !!$("#check").val(),
            callback: function (responce) {
                this._data.val = Math.round(responce);
                this.set();
                this.vote_success.fadeOut(2000);
            }
        });


    </script>
@endsection