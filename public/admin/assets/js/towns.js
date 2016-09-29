new Vue({

    el: "#towns",
    ready: function(){
       this.getTowns();
    },

    data: {
        towns: [],
        next: null,
        prev: null,
        perPage: null,
        token: null,
        town: {}
    },

    methods: {
        index: function (event) {
            event.preventDefault();
            var href = event.target.getAttribute("href");
            if(href) this.getTowns(href);
        },

        getTowns:function(href){
            var vue = this;
            $.get(!!href ? href : "/dashboard/towns", {"_token": this.token}).done(function(towns){
                vue.towns = towns.data;
                vue.next = towns.next_page_url;
                vue.perPage = towns.per_page;
                vue.prev = towns.prev_page_url;
            })
        },
        save: function () {
            if(this.town.name){
                if(this.town.id) this.updateTown()
                else this.addTown();
            }
        },

        addTown: function(){
            var vue = this;
            $.post("/dashboard/towns", {"_token": this.token, "name": this.town.name }).done(function(createdTown){
                vue.towns.push(createdTown);
                vue.town = {};
            });
        },
        updateTown: function(){
            var vue = this;
            $.post("/dashboard/towns/" + this.town.id, {"_token": this.token,"_method": "PUT", "name": this.town.name}).done(function(updatedTown){
                vue.towns.push(updatedTown);
                vue.town = {};
            });
        },
        deleteTown: function (town, event) {
            event.preventDefault();
            if(confirm("Вы действительно хотите удалить этот поселок?")){
                var vue = this;
                $.post("/dashboard/towns/" + town.id, {"_token": this.token, "_method": "delete"}).done(function(){
                    vue.removeTownFromData(town)
                })
            }
        },
        editTown: function(town, event){
            event.preventDefault();
            this.removeTownFromData(town)
            if(this.town.id) this.towns.push(this.town);
            this.town = town;
            this.$$.input.focus();
        },

        removeTownFromData: function(town){
            this.towns.splice(this.towns.indexOf(town), 1);
        }
    }

})