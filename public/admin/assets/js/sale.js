moment.lang('fr', {
    months : "январь_февраль_март_апрель_март_июнь_июль_август_сентябрь_октябрь_ноябрь_декабрь".split("_"),
    monthsShort : "янв._фев._март_апр._май_июнь._июль_авг._сент_окт._нояб._дек.".split("_"),
    weekdays : "dimanche_lundi_mardi_mercredi_jeudi_vendredi_samedi".split("_"),
    weekdaysShort : "пн._вт._ср._чт._пт._сб._вс.".split("_"),
    weekdaysMin : "Пн._Вт._Ср._Чт._Пт._Сб._Вс.".split("_"),
    longDateFormat : {
        LT : "HH:mm",
        L : "DD-MM-YYYY",
        LL : "DD-MM-YYYY",
        LLL : "DD-MM-YYYY",
        LLLL : "DD-MM-YYYY"
    },
    week : {
        dow : 1, // Monday is the first day of the week.
        doy : 4  // The week that contains Jan 4th is the first week of the year.
    }
});

//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
$('#date').daterangepicker({
    'applyClass' : 'btn-sm btn-success',
    'cancelClass' : 'btn-sm btn-default',
    'format': 'DD.MM.YYYY',
    'separator':' - ',
    locale: {
        applyLabel: 'ОК',
        cancelLabel: 'Отмена',
        fromLabel: 'От',
        toLabel: 'До',
        weekLabel: 'Неделя',
        customRangeLabel: 'тест',
        daysOfWeek: moment()._lang._weekdaysMin,
        monthNames: moment()._lang._monthsShort,
        firstDay: 0
    }
})
    .prev().on(ace.click_event, function(){
    $(this).next().focus();
});



//        if(!ace.vars['touch']) {
$('.chosen-select').chosen({allow_single_deselect:true});
//resize the chosen on window resize

$(window)
    .off('resize.chosen')
    .on('resize.chosen', function() {
        $('.chosen-select').each(function() {
            var $this = $(this);
            $this.next().css({'width': $this.parent().width()});
        })
    }).trigger('resize.chosen');
//resize chosen on sidebar collapse/expand
$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
    if(event_name != 'sidebar_collapsed') return;
    $('.chosen-select').each(function() {
        var $this = $(this);
        $this.next().css({'width': $this.parent().width()});
    })
});


$('#chosen-multiple-style .btn').on('click', function(e){
    var target = $(this).find('input[type=radio]');
    var which = parseInt(target.val());
    if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
    else $('#form-field-select-4').removeClass('tag-input-style');
});

Vue.config.debug = true;
Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementById('token').getAttribute('value');

var saleVue = new Vue({

    el: "#saleVue",

    data: {
        saleId: document.getElementById('saleId').getAttribute('value'),
        images: [],
        disabled: false,
        productId: null,
        category: null,
        token: document.getElementById('token').getAttribute('value'),
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
        options: {
            category:0,
            paginate: 20,
            search: null,
            selected: []
        },

        pagination:{
            currentPage: {},
            lastPage: {},
            pageToGet: 1,
            total: null
        },

        selectedProductsIds: []
    },


    created: function () {
        var vue = this;
        this.getRelatedProducts();
        setTimeout(function(){
            vue.getProducts();
            vue.getSelectedProductsIds();
        }, 1000)
    },



    methods: {

        getRelatedProducts: function(){
            var vue = this;
            this.$http.post('/dashboard/product-actions/getProductsBySale', {
                _token: vue.token,
                saleId: vue.saleId,
                categoryId: vue.options.category,
                paginate: vue.options.paginate,
                search: vue.options.search,
                selected: vue.selectedProductsIds,
                page: vue.pagination.pageToGet
            }).then(function (response) {
                vue.relOptions.selected = response.body.data;
                vue.selectedProductsIds = response.body.productsIds;
                vue.pagination.currentPage = response.body.current_page;
                vue.pagination.lastPage = response.body.last_page;
                if(vue.pagination.lastPage < vue.pagination.pageToGet) {
                    vue.pagination.pageToGet = vue.pagination.lastPage;
                    vue.getRelatedProducts()
                }
            });
        },


        getProducts: function(){
            var vue = this;
//          console.log(this.selectedProductsIds);

            this.$http.post('/dashboard/product-actions/getProductsForSale', {
                categoryId: vue.relOptions.category,
                paginate: vue.relOptions.paginate,
                search: vue.relOptions.search,
                selected: vue.selectedProductsIds,
                page: vue.productsList.pagination.pageToGet,
                saleId: vue.saleId,
                _token: vue.token
            }).then(function (response) {
                vue.productsList.products = response.body.data;
                vue.productsList.pagination.currentPage = response.body.current_page;
                vue.productsList.pagination.lastPage = response.body.last_page;
                vue.productsList.pagination.total = response.body.total;
                if(vue.productsList.pagination.lastPage < vue.productsList.pagination.pageToGet) {
                    vue.productsList.pagination.pageToGet = vue.productsList.pagination.lastPage;
                    vue.getProducts()
                }
            });
        },

        nextPage: function(){
            if(this.productsList.pagination.currentPage != this.productsList.pagination.lastPage){
                this.productsList.pagination.pageToGet = this.productsList.pagination.currentPage + 1;
                this.getProducts();
            }
        },

        prevPage: function(){
            if(this.productsList.pagination.currentPage != 1) {
                this.productsList.pagination.pageToGet = this.productsList.pagination.currentPage - 1;
                this.getProducts();
            }
        },

        _nextPage: function(){
            if(this.pagination.currentPage != this.pagination.lastPage){
                this.pagination.pageToGet = this.pagination.currentPage + 1;
                this.getRelatedProducts();
            }
        },

        _prevPage: function(){
            if(this.pagination.currentPage != 1) {
                this.pagination.pageToGet = this.pagination.currentPage - 1;
                this.getRelatedProducts();
            }
        },

        addProduct: function(relProduct, index){
            this.productsList.products.splice(index, 1);
            this.relOptions.selected.push(relProduct)
            this.selectedProductsIds = this.getSelectedProductsIds();
            this.syncProducts();
            this.getRelatedProducts();
            this.getProducts();
        },

        removeProduct: function(relProduct, index){
            this.relOptions.selected.splice(index, 1);
            this.productsList.products.push(relProduct)
            this.selectedProductsIds = this.getSelectedProductsIds();
            this.syncProducts();
            this.getRelatedProducts();
            this.getProducts();
        },

        getSelectedProductsIds: function(){
            var productsIds = [];
            this.relOptions.selected.forEach(function(product){
                productsIds.push(product.id);
            });
            return productsIds;
        },

        syncProducts: function(){
            this.selectedProductsIds = this.getSelectedProductsIds();
            var body = {
                ids: this.getSelectedProductsIds(),
                saleId: this.saleId
            };
            this.$http.post('/dashboard/product-actions/syncSaleProducts', body)
        }

    }

});