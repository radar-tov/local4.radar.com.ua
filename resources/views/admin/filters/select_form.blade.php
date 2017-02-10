
<div class="row filter_sel">
    {{--@if(isset($category->strain))--}}
    @foreach($filters as $filter)
        <div class="col-xs-5" style="padding-right: 100px">

            <div class="form-group">
                <label for="">
                    {{ $filter->title }}
                </label>
                <a href="{{ route('dashboard.filters.edit', $filter->id) }}" class="pull-right" target="_blank">
                    <small>Редактировать характеристику</small>
                </a>
{{--                @if(count($filter->values))--}}
                    <input type="hidden" name="filters[{{ $filter->id }}][filter_id]" value = "{{ $filter->id }}"/>

                    @if(count($product))
                        <input type="hidden" name="filters[{{ $filter->id }}][product_id]" value = "{{ $product->id }}"/>

                        <select name="filters[{{ $filter->id }}][value]" id="" class="form-control selectize">
                            @foreach($filter->values as $v)
                                <option value="{{ $v->value }}"
                                    @foreach($product->filters as $selected)
                                        {{ (int)$selected->pivot->filter_value_id === (int)$v->id ? 'selected' : null }}
                                    @endforeach
                                >{{ $v->value }}</option>
                            @endforeach
                        </select>

                    @else

                         <select name="filters[{{ $filter->id }}][value]" id="" class="form-control selectize">
                            @foreach($filter->values as $v)
                                <option value="{{ $v->value }}">{{ $v->value }}</option>
                            @endforeach
                        </select>
                    @endif

                {{--@else--}}

                {{--@endif--}}
            </div>
        </div>
    @endforeach
    {{--@endif--}}

</div>
