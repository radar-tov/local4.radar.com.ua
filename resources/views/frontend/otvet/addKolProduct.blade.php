<div class="center mod col">
    <h3>Товар в корзину добавлен</h3>
    <div class="addtocart-button center-align col">
        <input type="submit"
               class="otvet-button-hover"
               onclick="$.fancybox.close()"
               value="Продолжить покупки"
               title="Продолжить покупки">

        <input type="submit"
               class="otvet-button-hover"
               onclick="return location.href = '{{ url('cart') }}'"
               value="Оформить заказ"
               title="Оформить заказ">
    </div>
</div>
{{ Session::forget('from_otvet') }}
{{ Session::forget('otvet') }}