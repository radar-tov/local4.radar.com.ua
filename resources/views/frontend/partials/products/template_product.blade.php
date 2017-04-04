@inject('cartProvider', '\App\ViewDataProviders\CartDataProvider')
<div class="col s12 m4 l4 item-inner" style="margin-top: 7px">
    <div class="card item itemAnim{{ $pivet_product->id }}">
        <div class="item-image">
            @if($pivet_product->is_bestseller)
                <img src="/frontend/images/hit.png" class="hit-img">
            @endif
            @if($pivet_product->is_new)
                <img src="/frontend/images/new.png" class="new-img">
            @endif
            @if($pivet_product->hasDiscount())
                <img src="/frontend/images/sale.png" class="sale-img">
            @endif
            @if(count($pivet_product->thumbnail) && file_exists(public_path($pivet_product->thumbnail->first()->path)))
                <span class="outlook">
                @if($pivet_product->category)
                        <a href="/{{ $pivet_product->category->parent->slug }}/{{ $pivet_product->category->slug }}/{{ $pivet_product->slug}}">
                        <img class="activator" src="{{ $pivet_product->thumbnail->first()->path or null }}">
                    </a>
                    @endif
            </span>
            @else
                <img class="activator" src="/frontend/images/default.png">
            @endif


            {{--<!--@if($pivet_product->video)--}}
            {{--<span class="feature">--}}
            {{--<img src="/frontend/images/feature.png" />--}}
            {{--<span class="text-feature">видео</span>--}}
            {{--</span>--}}
            {{--@endif--}}
            {{--@if($pivet_product->flash_view)--}}
            {{--<span class="feature {{ $pivet_product->video ? 'offset-feature' : ''}}">--}}
            {{--<img src="/frontend/images/button-3d-little.png" />--}}
            {{--<span class="text-feature">товар в 3d</span>--}}
            {{--</span>--}}
            {{--@endif-->--}}

            {{--<!--@if(getAppointment($product))--}}
            {{--<div class="appointment"><img src="/frontend/images/{{ getAppointment($product) }}" /></div>--}}
            {{--@endif-->--}}
            {{--</div>--}}{{--end--}}
            <div class="item-info">
                <p class="item-title">{!! $pivet_product->title !!}</p>
                {{--<div class="col s8 no-padding">
                    <p class="sku">Код: <span>{{ $pivet_product->article }}</span></p>
                </div>--}}
                <div class="col s4 no-padding">
                    <div class="rating_1">
                        <input type="hidden" name="vote-id" value="5"/>
                        <input type="hidden" name="val" value="{{ array_sum($pivet_product->rates->pluck('rate')->all()) / ($pivet_product->rates->count() ?: 1) }}">
                    </div>
                </div>
                <div class="item-content">

                    @if($pivet_product->hasDiscount())
                        <span class="old-price">{{ $pivet_product->getPrice() }}грн</span>
                        <span> - {{ $pivet_product->getDiscount() }}% </span>
                        <span class="new-price">{{ $pivet_product->getNewPrice() }}грн</span>
                    @else
                        <span class="price">{{ $pivet_product->getPrice() }}грн</span>
                    @endif

                    {{--<span class="price">{{ $pivet_product->getOutPrice() }}грн</span>--}}

                </div>

                {{--<!--<div class="desc"><p>{!! $pivet_product->excerpt !!}</p></div>-->--}}
                <div class="addtocart-button center-align">
                    <input
                            type="submit"
                            name="addtocart"
                            data-productId="{{ $pivet_product->id }}"
                            class="addtocart-button-hover buy"
                            value="{{ $cartProvider->search($pivet_product->id) ? 'В корзине' : 'Купить' }}"
                            title="Купить">
                </div>
            </div>
            <div class="card-reveal cardAnim{{ $pivet_product->id }} ">
                @if($pivet_product->category)
                    <a href="/{{ $pivet_product->category->parent->slug }}/{{ $pivet_product->category->slug }}/{{ $pivet_product->slug}}">
                        <div class="linkProduct">
                            {{--onclick="return location.href = '/{{ $pivet_product->category->parent->slug }}/{{ $pivet_product->category->slug }}/{{ $pivet_product->slug}}'">--}}

                            <div class="stable">
                                @if(count($pivet_product->thumbnail) && file_exists(public_path($pivet_product->thumbnail->first()->path)))
                                    <img class="hover-item" src="{{ $pivet_product->thumbnail->first()->path or null }}">
                                @else
                                    <img class="hover-item" src="/frontend/images/default.png">
                                @endif
                            </div>

                            <input type="hidden" value="{{ $pivet_product->id }}" class="_id"/>
                            <div class="rating_2">
                                <input type="hidden" name="vote-id" value="5"/>
                                <input type="hidden" name="val" value="{{ array_sum($pivet_product->rates->pluck('rate')->all()) / ($pivet_product->rates->count() ?: 1) }}">
                            </div>


                            {{--<span class="outlook">
                                <a href="/{{ $pivet_product->category->parent->slug }}/{{ $pivet_product->category->slug }}/{{ $pivet_product->slug}}">
                                    Посмотреть товар
                                </a>
                            </span>--}}

                            <span class="hover-item-title">{{ $pivet_product->title }}</span>
                            @if($pivet_product->article != '-')
                                <p class="hover-sku">Код: <span>{{ $pivet_product->article }}</span></p>
                            @else
                                <p class="hover-sku">Код: <span>{{ $pivet_product->id }}</span></p>
                            @endif

                            @if($pivet_product->video)
                                <span class="video-review uppercase">видеообзор</span>
                                {{--<a href="#video" class="modal-trigger video-review uppercase">видеообзор</a>--}}
                                {{--<span class="_video" style="display:none;">{!!  $pivet_product->video !!}</span>--}}
                            @endif

                            <div class="clearing"></div>

                            @if($pivet_product->hasDiscount())
                                <div class="item-content">
                                    <span class="hover-old-price">{{ $pivet_product->getPrice() }} грн</span>
                                    <span class="hover-new-price">{{ $pivet_product->getNewPrice() }} грн</span>
                                </div>
                            @else
                                <div class="item-content"><span class="hover-price">{{ $pivet_product->getPrice() }} грн</span>
                                </div>

                            @endif
                            <div class="clearing"></div>

                            <div class="characteristics col s12 no-padding">
                                @foreach($pivet_product->sortedValuesCharacters($pivet_product->category_id) as $characteristics)
                                    @if($characteristics->characteristic->isVisibleForCategory($pivet_product->category_id))
                                        <div class="col s12 characteristic">
                                            <div class="col s12 m6 boldy no-padding">{{ $characteristics->characteristic->title }}:</div>
                                            <div class="col s12 m6 no-padding">{{ $characteristics->value }}</div>
                                        </div>
                                    @endif
                                @endforeach
                                {{--TODO-evgenii Удалить блок после заполнения всех товаров --}}
                                @foreach($pivet_product->sortedValues($pivet_product->category_id) as $field)
                                    @if($field->filter->isVisibleForCategory($pivet_product->category_id))
                                        <div class="col s12 characteristic">
                                            <div class="col s12 m6 boldy no-padding">{{ $field->filter->title }}:</div>
                                            <div class="col s12 m6 no-padding">{{ $field->value }}</div>
                                        </div>
                                    @endif
                                @endforeach
                                {{--TODO-evgenii END Удалить блок после заполнения всех товаров --}}
                            </div>


                            <div class="clearing"></div>
                            {{--<div class="collapsible-header open-info">...</div>--}}
                            {{--<ul class="col s12 collapsible no-padding" data-collapsible="accordion">--}}
                            {{--<li>--}}
                            {{--<div class="collapsible-header open-info">...</div>--}}
                            {{--<div class="collapsible-body"><p>Дополнительная информация о товаре. Дополнительная информация о товаре. Дополнительная информация о товаре. Дополнительная информация о товаре. Дополнительная информация о товаре. Дополнительная информация о товаре. Дополнительная информация о товаре.</p></div>--}}
                            {{--</li>--}}
                            {{--</ul>--}}

                        </div>
                    </a>
                @endif
                <div class="compare-box-hover">
                    <input
                            type="submit"
                            name="compare"
                            data-productId="{{ $pivet_product->id }}"
                            class="compare-button-hover compare anim"
                            value="{{ $cartProvider->searchCompare($pivet_product->id) ? 'В сравнении' : 'Сравнить' }}"
                            {{--value="{{ Cart::instance('compare')->search(['id' => $pivet_product->id]) ? 'В сравнении' : 'Сравнить' }}"--}}
                            title="Сравнить">
                </div>
                <div class="addtocart-box-hover">
                    <input
                            type="submit"
                            name="addtocart"
                            onclick="yaCounter39848700.reachGoal('addCart'); ga('send', 'event', 'Knopka', 'addCart'); return true;"
                            data-productId="{{ $pivet_product->id }}"
                            class="addtocart-button-hover buy anim"
                            value="{{ $cartProvider->search($pivet_product->id) ? 'В корзине' : 'Добавить в корзину' }}"
                            title="добавить в корзину">
                </div>
            </div>
        </div>
        <input type="hidden" id="token" value="{{ csrf_token() }}"/>
    </div>
</div>