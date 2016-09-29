new Vue({

    el: "#areas",
    ready: function(){
       this.getAreas();
    },

    data: {
        areas: [],
        next: null,
        prev: null,
        perPage: null,
        token: null,
        area: {},
        city: 0
    },

    methods: {
        index: function (event) {
            event.preventDefault();
            var href = event.target.getAttribute("href");
            if(href) this.getAreas(href);
        },

        getAreas:function(href){
            var vue = this;
            $.get(!!href ? href : "/dashboard/areas", {"_token": this.token}).done(function(areas){
                vue.areas = areas.data;
                vue.next = areas.next_page_url;
                vue.perPage = areas.per_page;
                vue.prev = areas.prev_page_url;
            })
        },
        save: function () {
            if(this.area.name){
                if(this.area.id) this.updateArea()
                else this.addArea();
            }
        },

        addArea: function(){
            var vue = this;
            $.post("/dashboard/areas",
                {
                    "_token": this.token,
                    "name": this.area.name,
                    "city_id": this.city
                })
                .done(function(createdArea){
                vue.areas.push(createdArea);
                vue.area = {};
                vue.city = 0;
            });
        },
        updateArea: function(){
            var vue = this;
            $.post("/dashboard/areas/" + this.area.id,
                {
                    "_token": this.token,
                    "_method": "PUT",
                    "name": this.area.name,
                    "city_id": this.city
                })
                .done(function(updatedArea){
                vue.areas.push(updatedArea);
                vue.area = {};
                vue.city = 0;
            });
        },
        deleteArea: function (area, event) {
            event.preventDefault();
            if(confirm("Вы действительно хотите удалить этот район?")){
                var vue = this;
                $.post("/dashboard/areas/" + area.id, {"_token": this.token, "_method": "delete"}).done(function(){
                    vue.removeAreaFromData(area)
                })
            }

        },
        editArea: function(area, event){
            event.preventDefault();
            this.removeAreaFromData(area)
            if(this.area.id) this.areas.push(this.area);
            this.area = area;
            this.city = area.city_id;
            this.$$.input.focus();
        },

        removeAreaFromData: function(area){
            this.areas.splice(this.areas.indexOf(area), 1);
        }
    }

})