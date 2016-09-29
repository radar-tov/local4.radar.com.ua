new Vue({
    el: "#stock",

    ready:function(){
        this.getStockProducts();
        var that = this;
        setTimeout(function () {
            that.getProducts();
            $("button[name=button]").prop('disabled', false);
        }, 500);

    },

    data: {
        stockId: null,
        category: null,
        token: document.getElementById("form-data")._token.value,
        title: null,
        productsList:{
            products:{},
            pagination:{
                currentPage: {},
                lastPage: {},
                pageToGet: 1
            }
        },
        relOptions:{
            category:0,
            paginate: 20,
            search: null,
            selected: []
        },
        relatedProducts: null,
        selectedProductsIds: []
    },

    methods : {

        getStockProducts: function(){
            var vue = this;
            //$(this.$$.cover).show();
            $.post('/dashboard/product-actions/stock-products', {_token: this.token, stockId: this.stockId})
                .done(function(products){
                    vue.relOptions.selected = products;
                    //$(vue.$$.cover).hide();
                })
        },

        getProducts: function(){
            var vue = this;
            $(this.$$.cover).show();
            //console.log(this.getSelectedProductsIds());
            $.ajax({
                dataType: "json",
                method: "GET",
                url: '/dashboard/product-actions/getProducts',
                cache: false,
                data: {
                    categoryId: vue.relOptions.category,
                    paginate: vue.relOptions.paginate,
                    search: vue.relOptions.search,
                    selected: vue.getSelectedProductsIds(),
                    page: vue.productsList.pagination.pageToGet
                },
                success: function (response) {

                    var products = [];
                    response.data.forEach(function(product){
                        product.pivot = {};
                        product.pivot.stock_price = product.price;
                        products.push(product);
                    });


                    vue.productsList.products = products;
                    vue.productsList.pagination.currentPage = response.current_page;
                    vue.productsList.pagination.lastPage = response.last_page;

                    if(vue.productsList.pagination.lastPage < vue.productsList.pagination.pageToGet) {
                        vue.productsList.pagination.pageToGet = vue.productsList.pagination.lastPage;
                        vue.getProducts()
                    }

                    $(vue.$$.cover).hide();

                }
            });
        },

        nextPage: function(event){
            event.preventDefault();
            if(this.productsList.pagination.currentPage != this.productsList.pagination.lastPage){
                this.productsList.pagination.pageToGet = this.productsList.pagination.currentPage + 1;
                this.getProducts();
            }
        },

        prevPage: function(event){
            event.preventDefault();
            if(this.productsList.pagination.currentPage != 1) {
                this.productsList.pagination.pageToGet = this.productsList.pagination.currentPage - 1;
                this.getProducts();
            }
        },

        syncProducts: function(){
            this.selectedProductsIds = this.getSelectedProductsIds();
            $.post('/dashboard/product-actions/syncRelated',
                {
                    _token: this.token,
                    ids: this.getSelectedProductsIds(),
                    productId: this.productId
                })
        },

        addProduct: function(event, relProduct){
            event.preventDefault();
            this.productsList.products.$remove(relProduct);
            this.relOptions.selected.push(relProduct);
            this.getProducts();
            this.syncProducts();
        },

        removeProduct: function(event, relProduct){
            event.preventDefault();
            this.relOptions.selected.$remove(relProduct);
            this.getProducts();
            this.syncProducts();
        },

        setPrice: function(event, product){
            var prod = this.relOptions.selected[this.relOptions.selected.indexOf(product)];
            prod.stock_price = event.target.value;
        },

        getSelectedProductsIds: function(){
            var productsIds = [];
            this.relOptions.selected.forEach(function(product){
                productsIds.push(product.id);
            });
            return productsIds;
        },


        setMain: function(event){
            $('.rad').prop('checked', false);
            event.target.checked = true;
        },



    }
});