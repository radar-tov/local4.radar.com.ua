{{--{{ dump($product) }}--}}
<div class="col s12 m4 l4 item-inner">
    <div class="card item itemAnim{{ $product->id }}">
        <div class="item-image">

            @if(count($product->thumbnail) && file_exists(public_path($product->thumbnail->first()->path)))
                <span class="outlook">
                @if($product->category)
                        <a href="/{{ $product->category->parent->slug }}/{{ $product->category->slug }}/{{ $product->slug}}">
                            <img class="activator" src="{{ $product->thumbnail->first()->path or null }}">
                        </a>
                    @endif
            </span>
            @else
                <img class="activator" src="/frontend/images/default.png">
            @endif


            {{--<!--@if($product->video)--}}
            {{--<span class="feature">--}}
            {{--<img src="/frontend/images/feature.png" />--}}
            {{--<span class="text-feature">видео</span>--}}
            {{--</span>--}}
            {{--@endif--}}
            {{--@if($product->flash_view)--}}
            {{--<span class="feature {{ $product->video ? 'offset-feature' : ''}}">--}}
            {{--<img src="/frontend/images/button-3d-little.png" />--}}
            {{--<span class="text-feature">товар в 3d</span>--}}
            {{--</span>--}}
            {{--@endif-->--}}

            {{--<!--@if(getAppointment($product))--}}
            {{--<div class="appointment"><img src="/frontend/images/{{ getAppointment($product) }}" /></div>--}}
            {{--@endif-->--}}
            {{--</div>--}}{{--end--}}
            <div class="item-info">
                <p class="item-title">{!! $product->title !!}</p>
                {{--<div class="col s8 no-padding">--}}
                    {{--<p class="sku">Код: <span>{{ $product->article }}</span></p>--}}
                {{--</div>--}}
                {{--<div class="col s4 no-padding">--}}
                {{--<div class="rating_1">--}}
                {{--<input type="hidden" name="vote-id" value="5"/>--}}
                {{--<input type="hidden" name="val" value="{{ array_sum($product->rates->lists('rate')->all()) / ($product->rates->count() ?: 1) }}">--}}
                {{--</div>--}}
                {{--</div>--}}
                <div class="item-content">

                    @if($product->hasDiscount())
                        <span class="old-price">{{ $product->getPrice() }}грн</span>
                        <span> - {{ $product->getDiscount() }}% </span>
                        <span class="new-price">{{ $product->getNewPrice() }}грн</span>
                    @else
                        <span class="price">{{ $product->getPrice() }}грн</span>
                    @endif

                    {{--<span class="price">{{ $product->getOutPrice() }}грн</span>--}}

                </div>

                {{--<!--<div class="desc"><p>{!! $product->excerpt !!}</p></div>-->--}}
                <div class="addtocart-button center-align">
                    <input
                            type="submit"
                            name="addtocart"
                            data-productId="{{ $product->id }}"
                            class="addtocart-button-hover buy"
                            value="{{ Cart::search(['id' => $product->id]) ? 'В корзине' : 'Купить' }}"
                            title="Купить">
                </div>
            </div>
            <div class="card-reveal cardAnim{{ $product->id }} ">
                @if($product->category)
                    <a href="/{{ $product->category->parent->slug }}/{{ $product->category->slug }}/{{ $product->slug}}">
                        <div class="linkProduct">
                             {{--onclick="return location.href = '/{{ $product->category->parent->slug }}/{{ $product->category->slug }}/{{ $product->slug}}'">--}}

                            <div class="stable">
                                @if(count($product->thumbnail) && file_exists(public_path($product->thumbnail->first()->path)))
                                    <img class="hover-item" src="{{ $product->thumbnail->first()->path or null }}">
                                @else
                                    <img class="hover-item" src="/frontend/images/default.png">
                                @endif
                            </div>

                            <input type="hidden" value="{{ $product->id }}" class="_id"/>
                            {{--<!--<div class="rating_2">--}}
                            {{--<input type="hidden" name="vote-id" value="5"/>--}}
                            {{--<input type="hidden" name="val" value="{{ array_sum($product->rates->lists('rate')->all()) / ($product->rates->count() ?: 1) }}">--}}
                            {{--</div>-->--}}


                            {{--<span class="outlook">
                                <a href="/{{ $product->category->parent->slug }}/{{ $product->category->slug }}/{{ $product->slug}}">
                                    Посмотреть товар
                                </a>
                            </span>--}}

                            <span class="hover-item-title">{{ $product->title }}</span>
                            <p class="hover-sku">Код: <span>{{ $product->article }}</span></p>

                            @if($product->video)
                                <span class="video-review uppercase">видеообзор</span>
                                {{--<a href="#video" class="modal-trigger video-review uppercase">видеообзор</a>--}}
                                {{--<span class="_video" style="display:none;">{!!  $product->video !!}</span>--}}
                            @endif

                            <div class="clearing"></div>

                            @if($product->hasDiscount())
                                <div class="item-content">
                                    <span class="hover-old-price">{{ $product->getPrice() }} грн</span>
                                    <span class="hover-new-price">{{ $product->getNewPrice() }} грн</span>
                                </div>
                            @else
                                <div class="item-content"><span class="hover-price">{{ $product->getPrice() }} грн</span>
                                </div>

                            @endif
                            <div class="clearing"></div>

                                <div class="characteristics col s12 no-padding">
                                    @foreach($product->sortedValuesCharacters($product->category_id) as $characteristics)
                                        @if($characteristics->characteristic->isVisibleForCategory($product->category_id))
                                            <div class="col s12 characteristic">
                                                <div class="col s12 m6 boldy no-padding">{{ $characteristics->characteristic->title }}:</div>
                                                <div class="col s12 m6 no-padding">{{ $characteristics->value }}</div>
                                            </div>
                                        @endif
                                    @endforeach
                                    {{--TODO-evgenii Удалить блок после заполнения всех товаров --}}
                                    @foreach($product->sortedValues($product->category_id) as $field)
                                        @if($field->filter->isVisibleForCategory($product->category_id))
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
                            data-productId="{{ $product->id }}"
                            class="compare-button-hover compare anim"
                            value="{{ Cart::instance('compare')->search(['id' => $product->id]) ? 'В сравнении' : 'Сравнить' }}"
                            title="Сравнить">
                </div>
                <div class="addtocart-box-hover">
                    <input
                            type="submit"
                            name="addtocart"
                            onclick="yaCounter39848700.reachGoal('addCart'); ga('send', 'event', 'Knopka', 'addCart'); return true;"
                            data-productId="{{ $product->id }}"
                            class="addtocart-button-hover buy anim"
                            value="{{ Cart::search(['id' => $product->id]) ? 'В корзине' : 'Добавить в корзину' }}"
                            title="добавить в корзину">
                </div>
            </div>
        </div>
        <input type="hidden" id="token" value="{{ csrf_token() }}"/>
    </div>
</div>