new Vue({
    el: "#product",

    ready:function(){
        var vue = this;

        this.getImages();
        setTimeout(function(){
            //vue.getFields();
            //vue.getXapacts();
        }, 100);

        this.getRelatedProducts();

        $.get('/dashboard/helpers/translate').done(function(data){
            vue.translate = data;
        });

        setTimeout(function(){
            $("button").prop('disabled', false);
        }, 1000);

        this.getFilterValues();
        this.getXapactValues();
        //this.initSelectize();

    },

    data: {
        images: [],
        disabled: false,
        productId: null,
        category: null,
        token: document.getElementById("form-data")._token.value,
        title: null,
        slug:null,
        pdf: [],
        fileId: [],
        fields: {},
        flashObject:{},
        video: {},
        filterEvent: true,
        xapactEvent: true,
        filterValues: [],
        xapactsValues: [],
        pdfList: [],
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
        test: null,
        relatedProducts: null,
        translate: {},
        selectedProductsIds: [],
        meta_description: '',
        meta_title: ''
    },

    computed: {

        coountTitle: function () {
          return this.meta_title.length
        },

        coountDescription: function () {
            return this.meta_description.length
        },

        stringImagesIds: function(){
            var images = [];
            for(var i = 0, len = this.images.length; i < len; i++ ){
                images[i] = this.images[i].id;
            }
            return images.join(',');
        },


       /* stringPdfIds: function(){
            var pdf = [];
            for(var i = 0, len = this.pdf.length; i < len; i++ ){
                pdf[i] = this.pdf[i].id;
            }
            return images.join(',');
        },*/

        isDisabled: function () {
            if(this.images.length >= 15) {
                return true;

                return false;
            }
        },

        sellPriceRub: function(){
            var price = Math.ceil(this.sellPrice * this.currency / 1000) * 1000;
            if(price > 0) return price;
        },
        rentPriceRub: function(){
            var price = Math.ceil(this.rentPrice * this.currency / 1000) * 1000;
            if(price > 0) return price;
        },
        rentPriceM2Rub: function(){
            var price = Math.ceil(this.rentPriceM2 * this.currency / 10) * 10;
            if(price > 0) return price;
        },

        certificateImages:function(){
            return this.images.filter(function(image){
                console.log(image);
                return image.is_certificate == true;
            });
        },

        commonImages:function(){
            return this.images.filter(function(image){
                return image.is_certificate == false;

            });
            console.log(log);
        }


    },

    methods : {


        getFilterValues: function(){
            var vue = this;
            $.ajax({
                url: '/dashboard/values',
                method: 'GET'
            }).done(function(values){
                //console.log(values)
                vue.filterValues = values;
            })
        },



        getXapactValues: function(){
            var vue = this;
            $.ajax({
                url: '/dashboard/characteristics_value',
                method: 'GET'
            }).done(function(xapacts){
               // console.log(values)
                vue.xapactsValues = xapacts;
            })
        },



        getImages: function () {
            var that = this;
            $.ajax({
                type: "POST",
                url: "/dashboard/get-images/" + that.productId,
                data: {_token : that.token}
            }).done(function(images){
                if(images){
                    that.images = images;

                }
            });
        },

      
        getRelatedProducts: function(){
            var vue = this;
            //$(this.$$.cover).show();
            $.post('/dashboard/product-actions/getRelatedProducts', {_token: this.token, productId: this.productId})
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
                    //console.log(response);
                    vue.productsList.products = response.data;
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
        loadImage: function (event) {
            var that = this;
            var uploadInput = event.target; // Инпут с файлом

            //slug = document.getElementById("form-data")._token.value;
            //console.dir(uploadInput[0].files);
            for(var property in uploadInput.files) {
                if(!isNaN(property)){
                    var data = new FormData();
                    //console.log(uploadInput[0].files[property]);
                    data.append('file', uploadInput.files[property]);
                    data.append('_token', this.token);
                    data.append('product_id', this.productId);
                    data.append('is_certificate', event.target.id == 'cerf' ? 1 : 0);
                    $.ajax({
                        url: '/dashboard/upload-image',
                        type: 'POST',
                        data: data,
                        processData: false,
                        contentType: false,
                        dataType: 'json'
                    }).done(function(image){
                        that.images.push(image);
                        if(that.images.length == 1){
                            that.setAsThumbnail(image);
                        }
                    }).fail(function(jqXHR, textStatus, errorThrown){ //replaces .error
                        console.log("error");
                        console.dir(arguments);
                    });
                }
            }
            uploadInput.value = null;
        },

        removeImage: function(image){
            var that = this,
                token = document.getElementById("form-data")._token.value;

            $.ajax({
                type: "POST",
                url: "/dashboard/remove-image/" + image.id,
                data: {_token : token}
            }).done(function(){
                var index = that.images.indexOf(image);
                if(index > -1)
                    that.images.splice(index, 1);
            });
        },
        setAsThumbnail: function(image) {
            var vue = this;
            for(var img in vue.images){
                vue.images[img].is_thumb = false;
            }
            vue.images[vue.images.indexOf(image)].is_thumb = true;
            $.post("/dashboard/set-thumbnail/" + image.id, {_token: vue.token, productId : vue.productId} );
        },

        loadPDF: function(){

            var that = this;
            var uploadInput = $('#pdf'); // Инпут с файлом

            //slug = document.getElementById("form-data")._token.value;
            
            for(var property in uploadInput[0].files) {
                if(!isNaN(property)){
                    var data = new FormData();
                   
                    data.append('file', uploadInput[0].files[property]);
                    data.append('_token', this.token);
                    data.append('productID',this.productId);
                    data.append('categoryID', this.category);
                    data.append('brandID',this.brand);
                    $.ajax({
                        url: '/dashboard/upload-pdf',
                        type: 'POST',
                        data: data,
                        processData: false,
                        contentType: false,
                        dataType: 'json'
                    }).done(function(){
                        that.getPdfList();
                        //that.PDF_list.push(pdf);
                        //that.pdf.push(pdf);
                        //console.log('asdfasdf');
                       
                    }).fail(function(jqXHR, textStatus, errorThrown){ //replaces .error
                        console.log("error");
                        console.dir(arguments);
                    });
                }
            }
            uploadInput.val(null);
            //this.PDF = $(this.$$.pdfInput).val().split('\\').pop();



        },

        removePDF: function(event, fileID){
            event.preventDefault();
            var vue = this;
            $(this.$$.pdfInput).val(null);
            $.ajax({
                type: "POST",
                url: "/dashboard/remove-pdf",
                data: {
                    _token : vue.token,
                    productId : vue.productId,
                    fileId : fileID
                }
            }).done(function(){
                vue.getPdfList();
            });
        },


        getFields: function(){
            var vue = this;
            if(vue.filterEvent){
                vue.filterEvent = false;
                $("#filters").addClass('loading');
                $.get('/dashboard/filters/'+ vue.productId, {category_id: vue.category })
                .done(function(response){
                    $("#filters .inner").html(response);
                    $("#filters").removeClass('loading');
                    $('.selectize').selectize({
                        create: true,
                        createOnBlur: true,
                        sortField: 'text'
                    });
                })
            }
        },

        getFieldsClik: function(){
            var vue = this;
            $("#filters").addClass('loading');
            $.get('/dashboard/filters/'+ vue.productId, {category_id: vue.category })
            .done(function(response){
                $("#filters .inner").html(response);
                $("#filters").removeClass('loading');
                $('.selectize').selectize({
                    create: true,
                    createOnBlur: true,
                    sortField: 'text'
                });
            })
        },


        getXapacts: function(){
            var vue = this;
            if(vue.xapactEvent){
                vue.xapactEvent = false;
                $("#characters").addClass('loading');
                $.get('/dashboard/characteristics/'+ vue.productId, {category_id: vue.category })
                .done(function(response){
                        $("#characters .inner").html(response);
                        $("#characters").removeClass('loading');
                        $('.selectize_x').selectize({
                            create: true,
                            createOnBlur: true,
                            sortField: 'text'
                        });
                    }
                )
            }
        },

        getXapactsClik: function(){
            var vue = this;
            $("#characters").addClass('loading');
            $.get('/dashboard/characteristics/'+ vue.productId, {category_id: vue.category })
            .done(function(response){
                    $("#characters .inner").html(response);
                    $("#characters").removeClass('loading');
                    $('.selectize_x').selectize({
                        create: true,
                        createOnBlur: true,
                        sortField: 'text'
                    });
                }
            )
        },


        load3D: function(event){
            this.flashObject = $(this.$$.flashInput).val().split('\\').pop();
        },



        loadVideo: function(event){
            event.preventDefault();
            var vue = this;
            bootbox.prompt("Введите HTML код видео", function(result) {
                if (result ) {
                    vue.video = result;
                }
            });

        },

        removeVideo: function(event){
            event.preventDefault();
            this.video = null;
        },

        removeFlash: function(event){
            event.preventDefault();
            var vue = this;
            $(this.$$.flashInput).val(null);
            $.ajax({
                type: "POST",
                url: "/dashboard/remove-flash/" + vue.productId,
                data: {_token : vue.token}
            }).done(function(){
                vue.flashObject = null;
            });
        },

        getSelectedProductsIds: function(){
            var productsIds = [];
            this.relOptions.selected.forEach(function(product){
                productsIds.push(product.id);
            });
            return productsIds;
        },

        makeSlug: function(event){
            event.preventDefault();
            this.slug = this.prepareSlug()
        },

        prepareSlug: function () {
            var answer = '',
                title = this.title,
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
                .replace(/^[\s\uFEFF\xA0-]+|[\s\uFEFF\xA0-]+$/g, '');
        },

        initSelectize: function(){

            $('.selectize').selectize({
                create: true,
                createOnBlur: true,
                sortField: 'text'
            });
        },

        getPdfList: function(){
            var vue = this;
            $.ajax({
                type: "GET",
                url: "/dashboard/pdf",
                data: {_token : vue.token, id: vue.productId}
            }).done(function(response){
                $("#filesup").html(response);
            });
        }
    }
});