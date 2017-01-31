/**
 * Created by Evgenii on 31.01.2017.
 */
var productVue = new Vue({

    el: "#userVue",

    data: {
        params: {
            search: null,
            _token: $("#_token").val(),
            sortBy: null,
            sortByPor: null,
            paginate: null
        },
        users: {},
        loader: null,
        pagination: {
            currentPage: {},
            lastPage: {},
            pageToGet: 1,
            total: null
        },
    },

    created: function () {
        this.getUsers();
    },

    methods: {
        getUsers: function(){
            var vue = this;
            var options = {
                progress: this.loaderShow(),
                params: vue.params
            };
            this.$http.get('/dashboard/users', options).then(function (response) {
                vue.loader = false;
                vue.users = response.data.users.data;
                vue.params = response.data.params;

                vue.pagination.total = response.data.users.total;
                vue.pagination.currentPage = response.data.users.current_page;
                vue.pagination.lastPage = response.data.users.last_page;
                if (vue.pagination.lastPage < vue.pagination.pageToGet) {
                    vue.pagination.pageToGet = vue.pagination.lastPage;
                    vue.getUsers()
                }

            }, function (error) {
                vue.loader = false;
                $("#errors").html(error);
            });
        },

        loaderShow: function () {
            this.loader = true;
        },

        deleteUsers: function (id) {
            if(confirm("Вы уверены?")){
                var vue = this;
                var options = {
                    progress: this.loaderShow(),
                    params:{
                        _token: vue.params._token
                    }
                };
                this.$http.get('/dashboard/users/' + id + '/delete', options).then(function (response) {
                    vue.getUsers();
                }, function (error) {
                    vue.loader = false;
                    $("#errors").html(error);
                });
            }
        }
    }

});