<div class="col-md-12">
    <a class="btn btn-primary" href="{{route('shop.admin.products.create')}}">Добавить</a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Товар</th>
                <th>Категория</th>
                <th>Выдержка</th>
                <th>Цена</th>
                <th style="text-align: right">Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($paginator as $item)
                @php /** @var \App\Models\ShopProduct $item  */ @endphp
                <tr>
                    <td>{{$item->id}}</td>
                    <td><a href="{{route('shop.admin.products.edit', $item->id)}}">{{$item->title}}</a></td>
                    <td>{{ $item->category->title }}</td>
                    <td>{{ $item->excerpt }}</td>
                    <td>{{ $item->price }} ₽</td>
                    <td style="text-align: right"><a
                            href=" {{ route('shop.admin.products.deleteProduct', $item->id) }} "
                            class="btn btn-danger delete"><i class="fas fa-trash"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
{{--Пагинация--}}
@if($paginator->total() > $paginator->count())
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                {{ $paginator->links() }}
            </div>
        </div>
    </div>
@endif
{{--Конец пагинации--}}
