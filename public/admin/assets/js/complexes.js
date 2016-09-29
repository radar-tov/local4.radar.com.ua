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
        complex: {}
    },

    methods: {
        index: function (event) {
            event.preventDefault();
            var href = event.target.getAttribute("href");
            if(href) this.getComplexes(href);
        },

        getComplexes:function(href){
            var vue = this;
            $.get(!!href ? href : "/dashboard/complexes", {"_token": this.token}).done(function(complexes){
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
            $.post("/dashboard/complexes", {"_token": this.token, "name": this.complex.name }).done(function(createdComplex){
                vue.complexes.push(createdComplex);
                vue.complex = {};
            });
        },
        updateComplex: function(){
            var vue = this;
            $.post("/dashboard/complexes/" + this.complex.id, {"_token": this.token,"_method": "PUT", "name": this.complex.name}).done(function(updatedComplex){
                vue.complexes.push(updatedComplex);
                vue.complex = {};
            });
        },
        deleteComplex: function (complex, event) {
            event.preventDefault();
            if(confirm("Вы действительно хотите удалить этот комплекс?")){
                var vue = this;
                $.post("/dashboard/complexes/" + complex.id, {"_token": this.token, "_method": "delete"}).done(function(){
                    vue.removeComplexFromData(complex)
                })
            }
        },
        editComplex: function(complex, event){
            event.preventDefault();
            this.removeComplexFromData(complex)
            if(this.complex.id) this.complexes.push(this.complex);
            this.complex = complex;
            this.$$.input.focus();
        },

        removeComplexFromData: function(complex){
            this.complexes.splice(this.complexes.indexOf(complex), 1);
        }
    }

})