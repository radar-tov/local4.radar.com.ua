/**
 * Created by Evgenii on 01.02.2017.
 */
var productsVue = new Vue({

    el: '#novaposhtaVue',

    data: {
        response: null
    },

    created: function () {

    },

    methods: {
        areaUpdate: function () {
            var vue = this;
            var options = {};
            this.$http.post('/server/np/tracking', options).then(function (response) {
               vue.response = response;
            }, function (error) {
                vue.errors = error;
            });
        }
    }
})