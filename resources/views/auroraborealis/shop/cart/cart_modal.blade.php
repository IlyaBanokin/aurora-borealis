@if(\Session::has("cart"))
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Наименование</th>
            <th>Кол-во</th>
            <th>Цена</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach(\Session::get("cart") as $id => $item)
            <tr>
                <td><a href="{{route('product.info', ['alias' => $item['alias']])  }}">{{ $item['title'] }}</a></td>
                <td>{{ $item['qty'] }}</td>
                <td>₽{{ $item['price'] }}</td>
                <td class="text-center"><i class="fa fa-times del-item" data-id="{{ $id }}" style="color: red"
                                           aria-hidden="true"></i></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <table class="table table-striped">
        <tbody>
        <tr>
            <td>
                <strong>Всего:</strong>
            </td>
            <td class="text-right cart-qty">{{ \Session::get("cart-qty") }} товар(а)</td>
            <td>
                <strong>Сумма:</strong>
            </td>
            <td class="text-right cart-sum">₽{{ \Session::get("cart-sum") }} </td>
        </tr>
        </tbody>
    </table>
@else
    <h3>Корзина пуста</h3>
@endif
