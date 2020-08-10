<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<table style="border: 1px solid #ddd; border-collapse: collapse; width: 100%;">
    <thead>
    <tr style="background: #f9f9f9;">
        <th style="padding: 8px; border: 1px solid #ddd;">Наименование</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Кол-во</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Цена</th>
    </tr>
    </thead>
    <tbody>
    @foreach(\Session::get("cart") as $id => $items)
    <tr>
        <td style="padding: 8px; border: 1px solid #ddd;">{!! $items['title'] !!}</td>
        <td style="padding: 8px; border: 1px solid #ddd;">{{ $items['qty'] }} </td>
        <td style="padding: 8px; border: 1px solid #ddd;">{{ $items['price'] }} </td>
    </tr>
    @endforeach
    <tr>
        <td colspan="2" style="padding: 8px; border: 1px solid #ddd;">Всего товаров:</td>
        <td style="padding: 8px; border: 1px solid #ddd;">{{ \Session::get("cart-qty") }}</td>
    </tr>
    <tr>
        <td colspan="2" style="padding: 8px; border: 1px solid #ddd;">На сумму:</td>
        <td style="padding: 8px; border: 1px solid #ddd;">₽ {{ \Session::get("cart-sum") }}</td>
    </tr>
    </tbody>
</table>
<h2>Информация о Клиенте:</h2>
<table style="border: 1px solid #ddd; border-collapse: collapse; width: 100%;">
    <thead>
    <tr style="background: #f9f9f9;">
        <th style="padding: 8px; border: 1px solid #ddd;">Имя заказчика</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Телефон</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Примечание к заказу</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style="padding: 8px; border: 1px solid #ddd;"> {{ $name }} </td>
        <td style="padding: 8px; border: 1px solid #ddd;">{{ $phone }}</td>
        <td style="padding: 8px; border: 1px solid #ddd; height: 160px; ">{{ $text }}</td>
    </tr>
    </tbody>
</table>
</body>
</html>
