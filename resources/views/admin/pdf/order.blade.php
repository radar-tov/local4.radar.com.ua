<a href="#" id="saveOrder" class="btn btn-sm btn-primary">Сохрнить порядок категорий</a>
<div class="dd" id="nestable">
    <ol class="dd-list">
        @foreach($files as $file)
            <li class="dd-item" data-id="{!! $file->id !!}">
                <div class="dd-handle">
                    <i class="ace-icon fa fa-{{ $file->show ? 'eye green' : 'eye-slash red' }} bigger-130"></i>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    {{ $file->admin_name }}
                </div>
            </li>
        @endforeach
    </ol>
</div>
<script type="text/javascript">
    jQuery(function($){
        var nestable,
            serialized,
            settings = {maxDepth:3},
            saveOrder = $('#saveOrder'),
            edit = $('.edit');

        nestable = $('.dd').nestable(settings);

        saveOrder.on('click', function(e) {
            e.preventDefault();
            serialized = nestable.nestable('serialize');

            $.ajax({
                method:'POST',
                url : "{!! url('/dashboard/pdf/order') !!}",
                data: { _token: "{!! csrf_token() !!}", serialized: serialized }

            }).done(function (data) {
                alert("Сохранено!");
            })
        })

        $('.dd-handle a').on('mousedown', function(e){
            e.stopPropagation();
        });

        $('[data-rel="tooltip"]').tooltip();

    });
</script>