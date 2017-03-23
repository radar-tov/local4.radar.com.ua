<div class="row xaract_sel">
    @if(count($xaracts))
        @foreach($xaracts as $xaract)
            <div class="col-xs-5" style="padding-right: 100px">

                <div class="form-group">
                    <label for="">
                        {{ $xaract->title }}
                    </label>
                    <a href="{{ route('characteristics.edit', $xaract->id) }}" class="pull-right" target="_blank">
                        <small>Редактировать характеристику</small>
                    </a>

                    <input type="hidden" name="xaracts[{{ $xaract->id }}][characteristic_id]" value = "{{ $xaract->id }}"/>

                    @if(count($product))
                        <input type="hidden" name="xaracts[{{ $xaract->id }}][product_id]" value = "{{ $product->id }}"/>

                        <select name="xaracts[{{ $xaract->id }}][value]" id="" class="form-control selectize_x">
                            @foreach($xaract->values as $v)
                                <option value="{{ $v->value }}"
                                @foreach($product->xaracts as $selected)
                                    {{ (int)$selected->pivot->characteristic_value_id === (int)$v->id ? 'selected' : null }}
                                @endforeach
                                >{{ $v->value }}</option>
                            @endforeach
                        </select>
                    @else
                        <select name="xaracts[{{ $xaract->id }}][value]" id="" class="form-control selectize_x">
                            @foreach($xaract->values as $v)
                                <option value="{{ $v->value }}">{{ $v->value }}</option>
                            @endforeach
                        </select>
                    @endif

                </div>
            </div>
        @endforeach
    @else
        <h3 align="center">Характеристики не выбраны.</h3>
        <hr>
        <div align="center"><a href="{{ url('/dashboard/categories') }}">Добавить</a></div>

    @endif

</div>
