@if(count($errors->all()))
<div class="col-xs-12 no-padding">
    <div class="col-lg-6">
        @foreach($errors->all() as $error)
            <div class=" alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {!! $error !!}
            </div>
        @endforeach
    </div>
</div>
@endif