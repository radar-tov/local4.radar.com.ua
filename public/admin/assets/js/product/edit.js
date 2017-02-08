/**
 * Created by Evgenii on 16.01.2017.
 */
Vue.config.debug = true;
Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementById('token').getAttribute('value');

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
        }
    }

});