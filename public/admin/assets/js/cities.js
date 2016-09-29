new Vue({

    el: "#cities",
    ready: function(){
       this.getCities();
    },

    data: {
        cities: [],
        next: null,
        prev: null,
        perPage: null,
        token: null,
        city: {}
    },

    methods: {
        index: function (event) {
            event.preventDefault();
            var href = event.target.getAttribute("href");
            if(href) this.getCities(href);
        },

        getCities:function(href){
            var vue = this;
            $.get(!!href ? href : "/dashboard/cities", {"_token": this.token}).done(function(cities){
                vue.cities = cities.data;
                vue.next = cities.next_page_url;
                vue.perPage = cities.per_page;
                vue.prev = cities.prev_page_url;
            })
        },
        save: function () {
            if(this.city.name){
                if(this.city.id) this.updateCity()
                else this.addCity();
            }
        },

        addCity: function(){
            var vue = this;
            $.post("/dashboard/cities", {"_token": this.token, "name": this.city.name }).done(function(createdCity){
                vue.cities.push(createdCity);
                vue.city = {};
            });
        },
        updateCity: function(){
            var vue = this;
            $.post("/dashboard/cities/" + this.city.id, {"_token": this.token,"_method": "PUT", "name": this.city.name}).done(function(updatedCity){
                vue.cities.push(updatedCity);
                vue.city = {};
            });
        },
        deleteCity: function (city, event) {
            event.preventDefault();
            if(confirm("Вы действительно хотите удалить этот город?")){
                var vue = this;
                $.post("/dashboard/cities/" + city.id, {"_token": this.token, "_method": "delete"}).done(function(){
                    vue.removeCityFromData(city)
                })
            }
        },
        editCity: function(city, event){
            event.preventDefault();
            this.removeCityFromData(city)
            if(this.city.id) this.cities.push(this.city);
            this.city = city;
            this.$$.input.focus();
        },

        removeCityFromData: function(city){
            this.cities.splice(this.cities.indexOf(city), 1);
        }
    }

})