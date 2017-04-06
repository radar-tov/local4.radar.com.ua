<img src="/frontend/images/no_product.png"/>
<div>
    <p>Товаров: <span class='qty'>{{ cartItemsCount() }}</span> шт</p>
    <p>На сумму: <span class='_sum'>{{ cartTotalPrice() }}</span> грн</p>
    <div>
        <div class='cart-content'>
            <div class='col s12 cart_filled' style='display:@if(cartItemsCount() > 0) block @else none @endif'>
                <strong>В корзине <span class='qty-items'>{{ cartItemsCount() }}</span>товар/ов</strong>
                <strong>На сумму
                    <span class='sum-payment'>
                        <span class='_sum'>{{ cartTotalPrice() }}</span>
                        <span class='currency'> грн</span>
                    </span>
                </strong>
                <a href='/cart' class='waves-effect waves-light btn'>Перейти в корзину</a>
            </div>
            <div class='col s8 cart_empty' style='display:@if(cartItemsCount() > 0) none @else block @endif'>
                <strong><span class='left'>В корзине ещё нет товаров</span></strong>
            </div>
        </div>
    </div>
</div>