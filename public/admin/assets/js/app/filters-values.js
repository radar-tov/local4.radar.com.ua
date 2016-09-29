Vue.config.debug = true;
Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementById('token').getAttribute('value');

var Parameter = new Vue({
    el:"#filter",

    data:{
        title:'',
        slug:'',
        translate: ''
    },

    ready:function(){
        var vue = this;
        jQuery.get('/dashboard/helpers/translate').done(function(data){
            vue.translate = data;
        });
    },
    computed: {


    },

    methods:{
        makeSlug:function(event){
            event.preventDefault();
            this.slug = this._prepareSlug();
        },

        // protected
        _prepareSlug: function () {
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


if(document.getElementById('values')) {
    var Values = new Vue({
        el:"#values",
        data: {
            filterId:0,
            values:[],
            newValue:null,
            fieldsForUpdate : {}
        },

        ready:function(){
            this.updateList();
        },

        methods: {
            submit: function (msg, e) {
                alert(msg);
                e.stopPropagation()
            },
            updateList:function(){
                var vue = this,
                    uri = '/dashboard/values/'+ vue.filterId +'/filter';
                this.$http.post(uri,function(data,status,request) {
                    vue.values = data;
                    //alert("OK!")
                    vue.reloadListeners();
                });
            },

            saveValue: function(){
                window.event.preventDefault();
                window.event.stopPropagation();
                var vue = this,
                    state = Object.keys(this.fieldsForUpdate).length,
                    uri = '/dashboard/values',
                    data;

                if(this.newValue.length && ! state){
                    data = {
                        filter_id: vue.filterId,
                        value: vue.newValue
                    };
                    this.$http.post(uri, data,function(data,status,request) {
                        vue.values.unshift(data);
                    });
                } else if(this.newValue.length && state) {
                    uri = '/dashboard/values/' + vue.fieldsForUpdate.id + '';
                    data = {
                        value:vue.newValue
                    };

                    this.$http.put(uri, data,function(data,status,request) {
                        if(data['success']) {
                            vue.updateList();
                        }
                    });

                    vue.fieldsForUpdate = {}
                }
                vue.reloadListeners();
                return vue.newValue = '';
            },

            removeValue: function(event,value){
                event.preventDefault();
                var vue = this,
                    uri = '/dashboard/values/' + value.id +'',
                    data = {};
                this.$http.delete(uri,data,function(data,status,request) {
                   if(data['success']) {
                       vue.values.$remove(value);
                   }
                });
            },

            editValue: function(event, value){
                event.preventDefault();
                this.fieldsForUpdate = value;
                this.newValue = value.value;
                this.values.$remove(value);
                this.$$.newValue.focus();
            },


            reloadListeners: function(){
                setTimeout(function(){
                    $('.dd-handle a, .dd-handle .control').on('mousedown', function(e){
                        e.stopPropagation();
                    });
                }, 200);
            }
        }
    });
}


