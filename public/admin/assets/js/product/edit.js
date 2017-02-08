/**
 * Created by Evgenii on 16.01.2017.
 */
var productVue = new Vue({

    el: "#productVue",

    data: {
        translate:  {},
        title: document.getElementById("form-data").title.value,
        slug: document.getElementById("form-data").slug.value
    },

    created: function () {
        this.$http.get('/dashboard/helpers/translate').then(function (response) {
            this.translate = response;
        }, function (error) {
            $("#errors").html(error);
        });
    },

    methods: {
        makeSlug: function () {

        }
    }

});