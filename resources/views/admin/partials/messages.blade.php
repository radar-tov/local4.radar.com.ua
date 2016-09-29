<div id="gritter-notice-wrapper"></div>
{{--{{ dd(session()->all()) }}--}}
{{--@section('gritter')--}}
@if(count(session('message')))
    <script>
        $.gritter.add({
            text: '{!! session('message') !!}',
            class_name: 'gritter-success'
        });
    </script>
@endif
{{--@endsection--}}
