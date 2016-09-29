new Vue({

    el: "#metros",
    ready: function(){
       this.getMetros();
    },

    data: {
        metros: [],
        next: null,
        prev: null,
        perPage: null,
        token: null,
        metro: {},
        city: 0
    },

    methods: {
        index: function (event) {
            event.preventDefault();
            var href = event.target.getAttribute("href");
            if(href) this.getMetros(href);
        },

        getMetros:function(href){
            var vue = this;
            $.get(!!href ? href : "/dashboard/metros", {"_token": this.token}).done(function(metros){
                vue.metros = metros.data;
                vue.next = metros.next_page_url;
                vue.perPage = metros.per_page;
                vue.prev = metros.prev_page_url;
            })
        },
        save: function () {
            if(this.metro.name){
                if(this.metro.id) this.updateMetro()
                else this.addMetro();
            }
        },

        addMetro: function(){
            var vue = this;
            $.post("/dashboard/metros",
                {
                    "_token": this.token,
                    "name": this.metro.name,
                    "city_id": this.city
                })
                .done(function(createdMetro){
                vue.metros.push(createdMetro);
                vue.metro = {};
                vue.city = 0;
            });
        },
        updateMetro: function(){
            var vue = this;
            $.post("/dashboard/metros/" + this.metro.id,
                {
                    "_token": this.token,
                    "_method": "PUT",
                    "name": this.metro.name,
                    "city_id": this.city
                })
                .done(function(updatedMetro){
                vue.metros.push(updatedMetro);
                vue.metro = {};
                vue.cuty = 0;
            });
        },
        deleteMetro: function (metro, event) {
            event.preventDefault();
            if(confirm("Вы действительно хотите удалить эту станцию метро?")){
                var vue = this;
                $.post("/dashboard/metros/" + metro.id, {"_token": this.token, "_method": "delete"}).done(function(){
                    vue.removeMetroFromData(metro)
                })
            }

        },
        editMetro: function(metro, event){
            event.preventDefault();
            this.removeMetroFromData(metro)
            if(this.metro.id) this.metros.push(this.metro);
            this.metro = metro;
            this.city = metro.city_id;
            this.$$.input.focus();
        },

        removeMetroFromData: function(metro){
            this.metros.splice(this.metros.indexOf(metro), 1);
        }
    }

})