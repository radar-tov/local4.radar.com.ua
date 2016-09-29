new Vue({
    el:"#categories",

    data: {
        title:null,
        slug: null,
        translate: {},
        category:{
            fields: [
                //{
                ////    is_checked: null,
                //    is_filter: 0
                //}
            ],
            icon: ''
        },
        fieldList: {},
        token: null,
        fieldToCreate: {
            title: '',
            is_filter: ''
        }
    },

    ready:function(){
        var vue = this;
        this.getFields();
        setTimeout(function(){
            vue.getFieldsList();
        },500);


        $.get('/dashboard/helpers/translate').done(function(data){
            vue.translate = data;
        });
    },

    computed: {
        characteristicsIds: function(){
            var idsString = '';
            for(var i = 0; i < this.category.fields.length; i++) {
                idsString += this.category.fields[i].id + ',';
            }
            return idsString;
        }
        //
        //isFilter: function(field){
        //    console.log(field);
        //    if(field.pivot.is_filter == 1) return true;
        //    return false;
        //}
    },

    methods: {

        getFieldsList: function(){
            var vue = this;
            $.ajax({
                method: "POST",
                url: '/dashboard/characteristics_list',
                data: {_token: vue.token, ids: vue.getRelatedFieldsIds() },
                success: function (fields) {
                    fields.forEach(function(field){
                        field.pivot = {};
                        field.pivot.is_filter = 0;
                    });
                    vue.fieldList = fields;
                }
            });
        },

        getFields: function(){
            var vue = this;
            if(location.href.indexOf('edit') != -1) {
                $.ajax({
                    method: "GET",
                    url: location.href,
                    cache: false,
                    success: function (category) {
                        vue.category = category;
                    }
                });
            }
        },

        checked: function(field){
            if(field.pivot.is_filter == true) return true;
            return false;
        },

        checkedIfShow: function(field){
            if(field.pivot.show == true) return true;
            return false;
        },

        makeSlug: function(event){
            event.preventDefault();
            this.slug = this.prepareSlug()
        },

        applyField: function(event, field){
            event.preventDefault();
            this.category.fields.push(field);
            this.getFieldsList();

            // Reset event handler for applied list item
            setTimeout(function(){
                $('.dd-handle a, .dd-handle .lbl').on('mousedown', function(e){
                    e.stopPropagation();
                });
            }, 500)

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
        },

        saveField: function(event){
            event.preventDefault();
            if(this.fieldToCreate.title) {
                if(this.fieldToCreate.id) {
                    this.updateField();
                } else {
                    this.createNewField();
                }
            }
        },
        createNewField: function(){
            var vue = this;
            $.ajax({
                method: "POST",
                url: '/dashboard/filters/',
                data:  {title: vue.fieldToCreate.title, _token: vue.token, is_filter: 0},
                success: function (field) {
                    vue.getFieldsList();
                    vue.fieldToCreate = {}
                }
            });
        },
        updateField: function(){
            var vue = this;
            $.ajax({
                method: "POST",
                url: '/dashboard/characteristics/'+ vue.fieldToCreate.id,
                data:  {title: vue.fieldToCreate.title, is_filter: vue.fieldToCreate.is_filter, _token: vue.token, _method: 'PUT'},
                success: function (field) {
                    vue.category.fields.push(field);
                    vue.fieldToCreate = {}
                }
            });
        },

        setAsFilter: function(field, event){
            var vue = this;
            console.log(field.pivot);
            if(field.pivot == undefined){
                console.log('qwe')
                field.pivot = {}
            }
            field.pivot.is_filter = event.target.checked ? 1 : 0;
            //console.log(event.target.checked);
            //$.ajax({
            //    method: "POST",
            //    url: '/dashboard/characteristics/'+ field.id,
            //    data:  {title: field.title, is_filter: field.is_filter, _token: vue.token, _method: 'PUT'},
            //    success: function (field) {
            //        //vue.category.fields.push(field);
            //        //vue.fieldToCreate = {}
            //    }
            //});
        },

        removeField : function(event, field){
            event.preventDefault();
            this.category.fields.$remove(field);
            this.getFieldsList();
            //var vue = this;
            //$.ajax({
            //    url: '/dashboard/characteristics/' + field.id,
            //    method: 'POST',
            //    data: {_token: vue.token, _method: 'DELETE'}
            //}).done(function(){
            //    vue.category.fields.splice(vue.category.fields.indexOf(field), 1);
            //    vue.getFields();
            //    vue.getFieldsList();
            //})
        },



        editField: function(event, field){
            event.preventDefault();
            if(this.fieldToCreate.id) this.category.fields.push(field);
            this.fieldToCreate = field;
            this.category.fields.splice(this.category.fields.indexOf(field), 1);

            this.$$.charField.focus();
        },

        applyIcon: function(icon, event){
            $('.icon').removeClass('active');
            $(event.target).parent().addClass('active');

            //$('#' + icon).addClass('active');
            this.category.icon = icon;
        },

        getRelatedFieldsIds: function(){
            var ids = [];
            this.category.fields.forEach(function(field){
                ids.push(field.id)
            });
            return ids;
        },

        getFieldsForSync: function() {
            var ids = [];

            this.category.fields.forEach(function(field){
                var is_filter = 0;
                if(undefined != field.pivot ) {
                    is_filter = field.pivot.is_filter;
                }
                ids.push(field.id + ':' + is_filter)
            });
            return ids;
        }

    }
});