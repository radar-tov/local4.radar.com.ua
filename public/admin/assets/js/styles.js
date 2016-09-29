new Vue({

    el: "#styles",
    ready: function(){
       this.getCities();
    },

    data: {
        styles: [],
        next: null,
        prev: null,
        perPage: null,
        token: null,
        style: {}
    },

    methods: {
        index: function (event) {
            event.preventDefault();
            var href = event.target.getAttribute("href");
            if(href) this.getCities(href);
        },

        getCities:function(href){
            var vue = this;
            $.get(!!href ? href : "/dashboard/styles", {"_token": this.token}).done(function(styles){
                vue.styles = styles.data;
                vue.next = styles.next_page_url;
                vue.perPage = styles.per_page;
                vue.prev = styles.prev_page_url;
            })
        },
        save: function () {
            if(this.style.name){
                if(this.style.id) this.updateStyle();
                else this.addStyle();
            }
        },

        addStyle: function(){
            var vue = this;
            $.post("/dashboard/styles", {"_token": this.token, "name": this.style.name }).done(function(createdStyle){
                vue.styles.push(createdStyle);
                vue.style = {};
            });
        },
        updateStyle: function(){
            var vue = this;
            $.post("/dashboard/styles/" + this.style.id, {"_token": this.token,"_method": "PUT", "name": this.style.name}).done(function(updatedStyle){
                vue.styles.push(updatedStyle);
                vue.style = {};
            });
        },
        deleteStyle: function (style, event) {
            event.preventDefault();
            if(confirm("Вы действительно хотите удалить этот стиль?")){
                var vue = this;
                $.post("/dashboard/styles/" + style.id, {"_token": this.token, "_method": "delete"}).done(function(){
                    vue.removeStyleFromData(style)
                })
            }

        },
        editStyle: function(style, event){
            event.preventDefault();
            this.removeStyleFromData(style)
            if(this.style.id) this.styles.push(this.style);
            this.style = style;
            this.$$.input.focus();
        },

        removeStyleFromData: function(style){
            this.styles.splice(this.styles.indexOf(style), 1);
        }
    }

})