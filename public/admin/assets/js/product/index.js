/**
 * Created by Evgenii on 16.01.2017.
 */
Vue.config.debug = true;
Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementById('token').getAttribute('value');

var productsVue = new Vue({

    el: '#productsVue',

    data: {
        selectedProductsIds: [],
        params: {
            sortBy: null,
            sortByPor: null,
            categoryId: null,
            brandID: null,
            cenagrupID: null,
            discount: null,
            paginate: null,
            search: null,
            page: null,
            _token: null
        },
        products: {
            pagination: {
                currentPage: {},
                lastPage: {},
                pageToGet: 1,
                total: null
            },
            productList: {}
        },
        loader: null,
        filtersList: null,
        isActive: true,
        selectedAction: null,
        filtersList: null
    },

    created: function () {
        this.filterProducts();
    },

    methods: {

        filterProducts: function () {
            var vue = this;
            var options = {
                progress: this.loaderShow(event),
                before: this.addPage(),
                params: vue.params
            };
            this.$http.get('/dashboard/products?' + $(".filter").serialize(), options).then(function (response) {
                vue.loader = false;
                vue.filtersList = response.data.filters;
                vue.params = response.data.params;
                vue.products.productList = response.data.products.data;
                vue.products.pagination.total = response.data.products.total;
                vue.products.pagination.currentPage = response.data.products.current_page;
                vue.products.pagination.lastPage = response.data.products.last_page;
                if (vue.products.pagination.lastPage < vue.products.pagination.pageToGet) {
                    vue.products.pagination.pageToGet = vue.products.pagination.lastPage;
                    vue.filterProducts()
                }
            }, function (error) {
                vue.loader = false;
                $("#errors").html(error);
            });
        },

        fireAction: function () {
            var vue = this;
            var options = {
                progress: vue.loaderShow(event)
            };
            var body = {
                ids: vue.selectedProductsIds,
                _token: vue.params._token
            };
            this.$http.post('/dashboard/product-actions/' + vue.selectedAction, body, options).then(function (response) {
                vue.filterProducts();
                vue.selectedProductsIds = [];
                var checks = $(".productSel");
                for (var i = 0, len = checks.length; i < len; i++) {
                    $(checks[i]).prop('checked', false);
                }
            }, function (error) {
                vue.loader = false;
                $("#errors").html(error);
            });

        },

        deleteProduct: function (product) {
            var vue = this;
            var options = {
                progress: vue.loaderShow(event)
            };
            var body = {
                _token: vue.params._token,
                _method: 'DELETE'
            };
            this.$http.post('/dashboard/products/' + product.id, body, options).then(function (response) {
                vue.filterProducts();
                vue.selectedProductsIds = [];
                var checks = $(".productSel");
                for (var i = 0, len = checks.length; i < len; i++) {
                    $(checks[i]).prop('checked', false);
                }
            }, function (error) {
                vue.loader = false;
                $("#errors").html(error);
            });
        },

        loaderShow: function () {
            this.loader = true;
        },

        addPage: function () {
            this.params.page = this.products.pagination.pageToGet;
        },

        delFilters: function () {
            this.params.sortBy = 'id';
            this.params.sortByPor = 'ASC';
            this.params.categoryId = 0;
            this.params.brandID = 0;
            this.params.cenagrupID = 0;
            this.params.discount = 0;
            this.params.paginate = 20;
            this.params.search = '';
        },

        delSearch: function () {
            this.params.search = '';
        },

        markProducts: function () {
            var checks = $(".productSel"),
                isChecked = document.getElementById("mainCheckbox").checked;
            this.selectedProductsIds = [];
            for (var i = 0, len = checks.length; i < len; i++) {
                $(checks[i]).prop('checked', isChecked);
                if (isChecked) {
                    this.selectedProductsIds.push(checks[i].value)
                } else {
                    this.selectedProductsIds.splice(this.selectedProductsIds.indexOf(checks[i].value), 1);
                }
            }
        },

        selectProduct: function (event) {
            var checkbox = event.target;
            if (checkbox.checked == true) {
                this.selectedProductsIds.push(checkbox.value)
            } else {
                this.selectedProductsIds.splice(this.selectedProductsIds.indexOf(checkbox.value), 1);
            }
        },

        nextPage: function () {
            if (this.products.pagination.currentPage != this.products.pagination.lastPage) {
                this.products.pagination.pageToGet = this.products.pagination.currentPage + 1;
                this.filterProducts();
            }
        },

        prevPage: function () {
            if (this.products.pagination.currentPage != 1) {
                this.products.pagination.pageToGet = this.products.pagination.currentPage - 1;
                this.filterProducts();
            }
        },

        showPanel: function () {
            $("#panel").slideToggle('slow');
        }
    }
})