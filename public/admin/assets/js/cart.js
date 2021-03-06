Vue.config.debug = true;
Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementById('token').getAttribute('value');

var cartVue = new Vue({
    el: "#cartVue",

    data: {
        cart: {},
        token: document.getElementById('token').getAttribute('value'),
        len: 0,
        total: 0,
        stockProducts: null,
        product: null
    },

    created: function () {
        this.getContent();
        $("#cartContent").show();
    },

    methods: {
        getContent: function () {
            var vue = this;
            $("#cartContent").css("opacity", ".4");
            $.post("/cart/get_content", {_token: this.token}).done(function (cart) {
                vue.stockProducts = cart.stockProducts;
                vue.cart = cart.content;
                vue.len = cart.len;
                vue.total = cart.total;
                var cart = $("#_cart");
                cart.find(".qty").html(vue.len);
                cart.find(".qty-items").html(vue.len);
                cart.find("._sum").html(vue.total);
                $("#cartContent").css("opacity", "1");
            });
        },

        deleteItem: function (id) {
            var vue = this;
            $.post("/cart/delete_item", {_token: this.token, rowid: id}).done(function () {
                vue.getContent();
            });
        },

        updateItem: function (product, _qty) {
            var vue = this, qty = $("#" + _qty);
            qty.css("border-color", "#7cb342");
            if (qty.val().match(/^[0-9]{1,3}$/) && qty.val() > 0) {
                $.post("/cart/update_item", {
                    _token: this.token,
                    product: product,
                    qty: qty.val(),
                    instance: product.options.instance
                }).done(function () {
                    vue.getContent();
                });
            } else {
                if (qty.val().match(/^\d{0}$/)) {
                    qty.css("border-color", "red");
                } else {
                    qty.val(product.qty);
                }
            }
        }
    }
});