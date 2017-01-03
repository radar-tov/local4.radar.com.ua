{{--{{ dump($cenagrups) }}--}}
<table class="table table-bordered table-hover">
    <thead>
    <td>Название</td>
    <td>Валюта</td>
    <td>Курс</td>
    <td>Скидка</td>
    <td>Наценка</td>
    <td>Товаров в группе</td>
    <td>Дата обновления</td>
    <td></td>
    <td></td>
    </thead>
    <tbody>
    @foreach($cenagrups as $cenagrup)
        <tr>
            <td>
                <a class="cena_edit fancybox.ajax"
                   href="{{ url('dashboard/cena/'.$cenagrup->id.'/edit') }}"
                   title="Редактировать название параметра">
                    {{ $cenagrup->name }}
                </a>
            </td>
            <td>
                @if($cenagrup->valuta == 1) Гривна
                @elseif($cenagrup->valuta == 2) Доллар
                @elseif($cenagrup->valuta == 3) Евро
                @else Не выбрана
                @endif
            </td>
            <td>{{ $cenagrup->curs }}</td>
            <td>{{ $cenagrup->skidka }}</td>
            <td>{{ $cenagrup->nacenka }}</td>
            <td>{{ count($cenagrup->getCountProducts) }}</td>
            <td>{{ $cenagrup->updated_at }}</td>
            <td>
                <a href="{{ url('dashboard/cena/'.$cenagrup->id.'/refresh') }}" class="cena_refresh fancybox.ajax" title="Пересчитать цены в группе">
                    <i class="fa fa-calculator"></i>
                </a>
            </td>
            <td><a href="#"><i class="ace-icon fa fa-trash-o bigger-120" title="удалить" onclick="deleteCenaGrup( {{ $cenagrup->id }}, '{{ csrf_token() }}' )"></i></a></td>
        </tr>
    @endforeach
    </tbody>
</table>