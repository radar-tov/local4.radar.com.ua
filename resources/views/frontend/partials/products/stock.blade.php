{{--{{ dd($product->getStocksForProduct()->count()) }}--}}
@if($product->getStocksForProduct()->count())
{{--{{ dd($product->getStocksForProduct()->count()) }}--}}
<div class="clearfix _stock">
  <div class="clearfix block">
    <h3>Акционное предложение</h3>
    <div class="slider2">
        <ul class="slides">
            @foreach($product->getStocksForProduct() as $stock)
                <li class="slide">
                    <div class="product-box">
                        @foreach($stock->uniqueProducts as $stockProduct)
                            <div class="box" style="width: {{100/(count($stock->uniqueProducts)+1)}}%">
                                <div class="_half">
                                    @if(count($stockProduct->thumbnail) && file_exists(public_path($stockProduct->thumbnail->first()->path)))
                                        <img class="" src="{{ $stockProduct->thumbnail->first()->path }}" alt="{{ $stockProduct->title }}"/>
                                    @else
                                        <img class="" src="/frontend/images/no-photo.png" alt="{{ $stockProduct->title }}"/>
                                    @endif
                                </div>

                                <div class="_half">
                                    @if($stockProduct->id == $product->id || $stockProduct->id == $product->clone_of)
                                        <b>Ваш товар:</b>
                                        <p>{{ $stockProduct->title }}</p>
                                    @else
                                        <p>
                                            <a href="/{{ $stockProduct->category->slug .'/'. $stockProduct->slug }}">
                                                {{ $stockProduct->title }}
                                            </a>    
                                        </p>
                                    @endif
                                    
                                        @if($stockProduct->getStockPrice() == '0')
                                            <p class="_crossed">{{ $stockProduct->getNewPrice() }} грн</p>
                                            <p class="_price item-new-price">0грн. <br> <br> В подарок!</p>
                                        @elseif($stockProduct->stockPriceLessThenDiscountPrice())
                                            <p class="_crossed">{{ $stockProduct->getNewPrice() }} грн</p>
                                            <p class="_price item-new-price">{{ $stockProduct->getStockPrice() }} грн</p>
                                        @else
                                            <p class="_price">{{ $stockProduct->getNewPrice() }} грн</p>
                                        @endif
                                </div>

                            </div>
                        @endforeach
                        <div class="buy-set" style="width: {{100/(count($stock->uniqueProducts)+1)}}%">
							<div class="col s12 yellow item-prices">

								<p class="_price item-new-price">{{ $stock->totalPrice() }} грн</p>
								<div class="clearfix"></div>
								<div class="addtocart-button-item center-align waves-effect waves-light">
									<input type="submit"
										   name="addtocart"
										   class="addtocart-button buySet animProduct"
										   data-stockid="{{ $stock->id }}"
										   value="{{ session()->has('stocks.'.$stock->id) ? 'В корзине' : 'Купить' }}"
										   title="купить">
								</div>
							</div>
                        </div>
                    </div>

                </li>
            @endforeach
        </ul>
    </div>
  </div>
</div>

@endif
