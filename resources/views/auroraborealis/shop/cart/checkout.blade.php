<!-- Inner Content -->
<div class="inner-page padd">

    <!-- Checkout Start -->

    <div class="checkout">
        <div class="container">
        @include(env('THEME') . '.shop.contacts.includes.result_messages')

        @if(\Session::has("cart"))
            <!-- Heading -->
            <h4>Оформление заказа</h4>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <!-- Checkout Form -->
                    <form class="form-horizontal" action="{{ route('cart.store') }}" method="POST" role="form">
                        @csrf
                        <div class="form-group">
                            <label for="inputName" class="col-md-2 control-label">Имя</label>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control" id="inputName" placeholder="Ваше Имя">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPhone" class="col-md-2 control-label">Телефон</label>
                            <div class="col-md-8">
                                <input type="text" name="phone" class="form-control" id="inputPhone" placeholder="Телефон">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputText" class="col-md-2 control-label">Примечание</label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="text" id="inputText" rows="3" placeholder="Дополнительная информация"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-8">
                                <button type="submit" class="btn btn-danger btn-sm">Отправить</button>&nbsp;
                                <button type="reset" class="btn btn-default btn-sm">Очистить</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 col-sm-6" id="checkout">
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
                </div>
            </div>
            @else
                <h3>Корзина пуста</h3>
            @endif
        </div>
    </div>

    <!-- Checkout End -->

</div><!-- / Inner Page Content End -->
