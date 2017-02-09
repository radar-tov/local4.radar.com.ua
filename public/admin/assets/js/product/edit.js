/**
 * Created by Evgenii on 16.01.2017.
 */
Vue.config.debug = true;
Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementById('token').getAttribute('value');

var productVue = new Vue({

    el: "#productVue",

    data: {
        translate:  {},
        filterEvent: true,
        xapactEvent: true,
        product:{
            id: document.getElementById("form-data").id.value
        },
    },

    created: function () {
        this.$http.get('/dashboard/products/' + this.product.id + '/edit').then(function (response) {
            this.product = response.body;
        }, function (error) {
            $("#errors").html(error);
        });
        this.$http.get('/dashboard/helpers/translate').then(function (response) {
            this.translate = response;
        }, function (error) {
            $("#errors").html(error);
        });
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
                $.get('/dashboard/filters/'+ vue.product.id, {category_id: vue.product.category_id })
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
            $.get('/dashboard/filters/'+ vue.product.id, {category_id: vue.product.category_id })
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

        getXapacts: function () {
            var vue = this;
            if(vue.xapactEvent){
                vue.xapactEvent = false;
                $("#characters").addClass('loading');
                $.get('/dashboard/characteristics/'+ vue.product.id, {category_id: vue.product.category_id })
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
            $.get('/dashboard/characteristics/'+ vue.product.id, {category_id: vue.product.category_id })
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

        getProducts: function () {

        }
    }

});