/**
 * Created by Evgenii on 16.01.2017.
 */
Vue.config.debug = true;
Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementById('token').getAttribute('value');

var productVue = new Vue({

    el: "#productVue",

    data: {
        token: document.getElementById('token').getAttribute('value'),
        translate:  {},
        filterEvent: true,
        xapactEvent: true,
        paramEvent: true,
        fileEvent: true,
        product:{
            id: document.getElementById("form-data").id.value,
            images: [],
            meta_description: '',
            meta_title: '',
            title: '',
            slug: ''
        },
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
            search: '',
            selected: []
        },
        relatedProducts: null,
        selectedProductsIds: [],
        countryList: null
    },

    created: function () {
        if(this.product.id){
            this.$http.get('/dashboard/products/' + this.product.id + '/edit').then(function (response) {
                this.product = response.body;});
        }

        this.$http.get('/dashboard/helpers/translate').then(function (response) {
            this.translate = response.body;});
        this.getRelatedProducts();
    },

    computed: {
        stringImagesIds: function(){
            var images = [];
            for(var i = 0, len = this.product.images.length; i < len; i++ ){
                images[i] = this.product.images[i].id;
            }
            return images.join(',');
        },

        coountTitle: function () {
            if(this.product.id){
                return this.product.meta_title.length
            }else{
                return 0;
            }
        },

        coountDescription: function () {
            if(this.product.id){
                return this.product.meta_description.length
            }else{
                return 0;
            }
        },
    },

    methods: {

        makeSlug: function () {
            this.product.slug = this.prepareSlug()
        },

        prepareSlug: function () {
            var answer = '',
                title = this.product.title,
                translate = this.translate;

            for (var i in title) {
                if (translate.hasOwnProperty(title[i])) {
                    if (translate[title[i]] !== undefined) {
                        answer += translate[title[i]];
                    }
                } else {
                    answer += title[i];
                }
            }

            return answer.toLocaleLowerCase()
                .replace(/[^a-z0-9-]/, '-')
                .replace(/-{2,}/g, '-')
                .replace(/^[\s\uFEFF\xA0-]+|[\s\uFEFF\xA0-]+$/g, '')
                .replace(/\s/ig, '-');
        },

        getFields: function(){
            var vue = this;
            if(vue.filterEvent){
                vue.filterEvent = false;
                $("#filters").addClass('loading');
                this.$http.get('/dashboard/filters/'+ vue.product.id + '?category_id=' + vue.product.category_id )
                    .then(function (response) {
                        $("#filters .inner").html(response.body);
                        $("#filters").removeClass('loading');
                        $('.selectize').selectize({
                            create: true,
                            createOnBlur: true,
                            sortField: 'text'
                        });
                    }, function (error) {
                        $("#filters .inner").html(error.body);
                        $("#filters").removeClass('loading');
                });
            }
        },

        getFieldsClik: function(){
            var vue = this;
            $("#filters").addClass('loading');
            this.$http.get('/dashboard/filters/'+ vue.product.id + '?category_id=' + vue.product.category_id )
                .then(function (response) {
                    $("#filters .inner").html(response.body);
                    $("#filters").removeClass('loading');
                    $('.selectize').selectize({
                        create: true,
                        createOnBlur: true,
                        sortField: 'text'
                    });
                }, function (error) {
                    $("#filters .inner").html(error.body);
                    $("#filters").removeClass('loading');
                });
        },

        getXapacts: function () {
            var vue = this;
            if(vue.xapactEvent){
                vue.xapactEvent = false;
                $("#characters").addClass('loading');
                this.$http.get('/dashboard/characteristics/'+ vue.product.id + '?category_id=' + vue.product.category_id )
                    .then(function (response) {
                        $("#characters .inner").html(response.body);
                        $("#characters").removeClass('loading');
                        $('.selectize_x').selectize({
                            create: true,
                            createOnBlur: true,
                            sortField: 'text'
                        });
                    }, function (error) {
                        $("#characters .inner").html(error.body);
                        $("#characters").removeClass('loading');
                    });
             }
        },

        getXapactsClik: function(){
            var vue = this;
            $("#characters").addClass('loading');
            this.$http.get('/dashboard/characteristics/'+ vue.product.id + '?category_id=' + vue.product.category_id )
                .then(function (response) {
                    $("#characters .inner").html(response.body);
                    $("#characters").removeClass('loading');
                    $('.selectize_x').selectize({
                        create: true,
                        createOnBlur: true,
                        sortField: 'text'
                    });
                }, function (error) {
                    $("#characters .inner").html(error.body);
                    $("#characters").removeClass('loading');
                });
        },

        getParam: function () {
            var vue = this;
            if (vue.paramEvent) {
                vue.paramEvent = false;
                $("#params").addClass('loading');
                this.$http.get('/dashboard/parameters/list?id='+ vue.product.id )
                    .then(function (response) {
                        $("#params .inner").html(response.body);
                        $("#params").removeClass('loading');
                    }, function (error) {
                        $("#params .inner").html(error.body);
                        $("#params").removeClass('loading');
                    });

            }
        },

        getParamClik: function () {
            var vue = this;
            $("#params").addClass('loading');
            this.$http.get('/dashboard/parameters/list?id='+ vue.product.id )
                .then(function (response) {
                    $("#params .inner").html(response.body);
                    $("#params").removeClass('loading');
                }, function (error) {
                    $("#params .inner").html(error.body);
                    $("#params").removeClass('loading');
                });
        },

        setAsThumbnail: function(image) {
            var vue = this;
            for(var img in vue.product.images){
                vue.product.images[img].is_thumb = false;
            }
            vue.product.images[vue.product.images.indexOf(image)].is_thumb = true;

            this.$http.post('/dashboard/set-thumbnail/' + image.id, {_token: vue.token, productId : vue.product.id} )
                .then(function (response) {});
        },

        removeImage: function (image) {
            var vue = this;
            this.$http.post('/dashboard/remove-image/' + image.id, {_token: vue.token} )
                .then(function (response) {
                    var index = vue.product.images.indexOf(image);
                    if (index > -1)
                        vue.product.images.splice(index, 1);
                });
        },

        loadImage: function (event) {
            var vue = this;
            var uploadInput = event.target;
            for(var property in uploadInput.files) {
                if(!isNaN(property)){
                    var data = new FormData();
                    //console.log(uploadInput[0].files[property]);
                    data.append('file', uploadInput.files[property]);
                    data.append('product_id', this.product.id);
                    data.append('is_certificate', event.target.id == 'cerf' ? 1 : 0);
                    this.$http.post('/dashboard/upload-image', data )
                        .then(function (image) {
                            vue.product.images.push(image.body);
                            if(vue.product.images.length == 1){
                                vue.setAsThumbnail(image);
                            }
                        });
                }
            }
            uploadInput.value = null;
        },

        loadVideo: function(){
            var vue = this;
            bootbox.prompt("Введите HTML код видео", function(result) {
                if (result ) {
                    vue.product.video = result;
                }
            });

        },

        removeVideo: function(){
            this.product.video = null;
        },

        getPdfList: function(){
            var vue = this;
            if(vue.fileEvent){
                vue.fileEvent = false;
                this.$http.get('/dashboard/pdf?id=' + vue.product.id )
                    .then(function (response) {
                        $("#filesup").html(response.body);
                    });
            }
        },

        updatePdfList: function(){
            var vue = this;
            this.$http.get('/dashboard/pdf?id=' + vue.product.id )
                .then(function (response) {
                    $("#filesup").html(response.body);
                });
        },

        loadPDF: function(event){
            var vue = this;
            var uploadInput = event.target;
            for(var property in uploadInput.files) {
                if(!isNaN(property)){
                    var data = new FormData();
                    data.append('file', uploadInput.files[property]);
                    data.append('productID', vue.product.id);
                    data.append('categoryID', vue.product.category_id);
                    data.append('brandID', vue.product.brand_id);

                    this.$http.post('/dashboard/upload-pdf', data )
                        .then(function () {
                            vue.updatePdfList();
                        });
                }
            }
        },

        getProducts: function () {
            var vue = this;
            var options = {
                params: {
                    categoryId: vue.relOptions.category,
                    paginate: vue.relOptions.search,
                    search: vue.relOptions.search,
                    selected: vue.getSelectedProductsIds(),
                    page: vue.productsList.pagination.pageToGet,
                    _: Date.now()
                }
            };
            this.$http.get('/dashboard/product-actions/getProducts', options)
                .then(function (response) {
                    vue.productsList.products = response.body.data;
                    vue.productsList.pagination.currentPage = response.body.current_page;
                    vue.productsList.pagination.lastPage = response.body.last_page;
                    if(vue.productsList.pagination.lastPage < vue.productsList.pagination.pageToGet) {
                        vue.productsList.pagination.pageToGet = vue.productsList.pagination.lastPage;
                        vue.getProducts()
                    }
                });
        },

        getRelatedProducts: function(){
            var vue = this;
            this.$http.post('/dashboard/product-actions/getRelatedProducts', {productId: this.product.id})
                .then(function (response) {
                    vue.relOptions.selected = response.body;
                    vue.selectedProductsIds = this.getSelectedProductsIds();
                });
        },

        syncProducts: function(){
            this.selectedProductsIds = this.getSelectedProductsIds();
            var body = {
                ids: this.getSelectedProductsIds(),
                productId: this.product.id
            };
            this.$http.post('/dashboard/product-actions/syncRelated', body)
        },

        getSelectedProductsIds: function(){
            var productsIds = [];
            this.relOptions.selected.forEach(function(product){
                productsIds.push(product.id);
            });
            return productsIds;
        },

        addProduct: function(relProduct, index){
            this.productsList.products.splice(index, 1);
            this.relOptions.selected.push(relProduct);
            this.syncProducts();
            this.getProducts();
        },

        removeProduct: function(relProduct, index){
            this.relOptions.selected.splice(index, 1);
            this.productsList.products.push(relProduct);
            this.syncProducts();
            this.getProducts();
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

        updateCountry: function () {
            this.$http.post('/dashboard/country/get')
                .then(function (response) {
                    this.countryList = response.body;
                });
        }

    }

});