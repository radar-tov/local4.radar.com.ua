new Vue({

    el: "#cart",
    data: {
        cart: {},
        token: null,
        len: 0,
        total: 0,
        stockProducts: null
    },

    ready: function () {
        var vue = this;
        vue.getContent();
//                setInterval(function(){
//                    vue.getContent();
//                }, 2000);

        $(this.$$.cartContent).show();
    },

    methods: {
        getContent: function () {
            var vue = this;
            $(this.$$.cartContent).css('opacity', '.4');
            $.post("/cart/get_to_compare", {_token: this.token}).done(function (cart) {
                vue.cart = cart.content;
                vue.len = cart.len;
                vue.total = cart.total;

                var cart = $("#_cart");
                cart.find('.qty').html(vue.len);
                cart.find('.qty-items').html(vue.len);
                cart.find('._sum').html(vue.total);

                $(vue.$$.cartContent).css('opacity', '1');
            });
        },
        deleteItem: function (id) {
            var vue = this;
            $.post('/cart/delete_from_compare', {_token: this.token, product_id: id})
                .done(function () {
                    window.location.reload();
                })
        },

        updateItem: function (product, _qty) {

            var vue = this,
                qty = $(_qty.$el).find('.item-quantity');

//                    console.log(product.options.instance);

            qty.css('border-color', '#7cb342');
            if (qty.val().match(/^[0-9]{1,3}$/) && qty.val() > 0) {
                $.post('/cart/update_item', {
                    _token: this.token,
                    product: product,
                    qty: qty.val(),
                    instance: product.options.instance
                }).done(function () {
                    vue.getContent();
                })
            } else if (qty.val().match(/^\d{0}$/)) {
                qty.css('border-color', 'red');
            } else {
                $(_qty.$el).find('.item-quantity').val(product.qty);
            }
        }
    }
})