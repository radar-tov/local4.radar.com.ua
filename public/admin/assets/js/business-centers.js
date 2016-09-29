new Vue({

    el: "#complexes",
    ready: function(){
        this.getComplexes();
    },

    data: {
        complexes: [],
        next: null,
        prev: null,
        perPage: null,
        token: null,
        complex: {},
        city: 0
    },

    methods: {
        index: function (event) {
            event.preventDefault();
            var href = event.target.getAttribute("href");
            if(href) this.getComplexes(href);
        },

        getComplexes:function(href){
            var vue = this;
            $.get(!!href ? href : "/dashboard/business-centers", {"_token": this.token}).done(function(complexes){
                vue.complexes = complexes.data;
                vue.next = complexes.next_page_url;
                vue.perPage = complexes.per_page;
                vue.prev = complexes.prev_page_url;
            })
        },
        save: function () {
            if(this.complex.name){
                if(this.complex.id) this.updateComplex()
                else this.addComplex();
            }
        },

        addComplex: function(){
            var vue = this;
            $.post("/dashboard/business-centers",
                {
                    "_token": this.token,
                    "name": this.complex.name,
                    "city_id": this.city
                })
                .done(function(createdComplex){
                    vue.complexes.push(createdComplex);
                    vue.complex = {};
                    vue.city = 0;
                });
        },
        updateComplex: function(){
            var vue = this;
            $.post("/dashboard/business-centers/" + this.complex.id,
                {
                    "_token": this.token,
                    "_method": "PUT",
                    "name": this.complex.name,
                    "city_id": this.city
                })
                .done(function(updatedComplex){
                    vue.complexes.push(updatedComplex);
                    vue.complex = {};
                    vue.city = 0;
                });
        },
        deleteComplex: function (complex, event) {
            event.preventDefault();
            if(confirm("Вы действительно хотите удалить этот бизнес центр?")){
                var vue = this;
                $.post("/dashboard/business-centers/" + complex.id, {"_token": this.token, "_method": "delete"}).done(function(){
                    vue.removeComplexFromData(complex)
                })
            }
        },
        editComplex: function(complex, event){
            event.preventDefault();
            this.removeComplexFromData(complex)
            if(this.complex.id) this.complexes.push(this.complex);
            this.complex = complex;
            this.city = complex.city_id;
            this.$$.input.focus();
        },

        removeComplexFromData: function(complex){
            this.complexes.splice(this.complexes.indexOf(complex), 1);
        }
    }

})