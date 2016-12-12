@inject('productsProvider', '\App\ViewDataProviders\ProductsDataProvider')
<script>
    var maxPrice = {{ $productsProvider->getMaxPrice(isset($subcategory) ? $subcategory->id : null) }}
    @if(Session::get('price.'.$subcategory->id) != null)
        arr = '{{ Session::get('price.'.$subcategory->id) }}'.split(';')
        var filtrPrice = arr[1]
    @else
        var filtrPrice = null
    @endif
</script>

    {{--$("#range").ionRangeSlider({--}}
        {{--type: "double",--}}
        {{--min: 0,--}}
        {{--max: maxPrice,--}}
        {{--from: 0,--}}
        {{--to: filtrPrice,--}}
        {{--prefix: "",--}}
        {{--step: 100,--}}
        {{--onFinish: function (data) {--}}
            {{--$("#filter").change();--}}
        {{--},--}}
        {{--prettify: function (num) {--}}
            {{--var endSign = '';--}}
{{--//                if(this.max == num) endSign = ' +';--}}
            {{--return (num ) + ' грн.' + endSign;--}}
        {{--}--}}
    {{--});--}}



    {{--var getParameterByName = function(name, href) {--}}
        {{--name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");--}}
        {{--var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),--}}
                {{--results = regex.exec(!!href ? href : location.search);--}}
        {{--return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));--}}
    {{--};--}}



    {{--$("#filter").on('change', filterProducts);--}}
    {{--setTimeout(function(){--}}
        {{--filterProducts(false);--}}
    {{--},100);--}}


    {{--$(".orderBy").change(function(){--}}
        {{--var $this = this;--}}
        {{--$('select.orderBy').each(function(i, sel){--}}
            {{--sel.selectedIndex = $this.selectedIndex;--}}
            {{--$('.select-dropdown').val(sel.options[sel.selectedIndex].innerHTML);--}}
        {{--});--}}
        {{--filterProducts(true);--}}
    {{--});--}}


    {{--function filterProducts(filcl, page){--}}
        {{--$("#isDirty").val(1);--}}
        {{--if(isNaN(page)) page = 1;--}}

        {{--var data = $('.orderBy').serialize(),--}}
            {{--filters = $("#filter");--}}

        {{--if(filters.length > 0){--}}
            {{--data = filters.serialize();--}}
        {{--}--}}

        {{--if(!!getParameterByName('search')) data += '&search=' + getParameterByName('search');--}}

        {{--if(filcl) data = data + '&click=true';--}}

        {{--$.ajax({--}}
            {{--url: location.href,--}}
            {{--method: 'GET',--}}
            {{--cache: false,--}}
            {{--data: data + '&page=' + page--}}
        {{--}).done(function(response){--}}
            {{--$("#products").html(response.products);--}}
            {{--$("._pagination").html(response.pagination)--}}

            {{--initRating();--}}
        {{--});--}}
    {{--}--}}

    {{--$("body").on('click', '._pagination a', function(event){--}}
        {{--event.preventDefault();--}}
{{--//        $('html', 'body').scrollTop(0);--}}
        {{--$("html, body").animate({ scrollTop: 0 }, 0);--}}
        {{--var href = $(this).attr('href'),--}}
                {{--page = parseInt(getParameterByName('page', href));--}}
        {{--filterProducts(true, page);--}}
    {{--});--}}


    {{--$("#range").change(function(){--}}
        {{--return false;--}}
    {{--})--}}

{{--</script>--}}