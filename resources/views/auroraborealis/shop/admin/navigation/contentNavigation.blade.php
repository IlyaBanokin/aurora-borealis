<div class="col-md-12">
    <a class="btn btn-primary" href="{{route('shop.admin.navigation.create')}}">Добавить</a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Наименование</th>
                <th>Путь</th>
                <th style="text-align: right">Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($menu as $item)
                @php /** @var \App\Models\ShopMenu $item  */ @endphp
                <tr>
                    <td>{{$item->id}}</td>
                    <td><a href="{{route('shop.admin.navigation.edit', $item->id)}}">{{$item->title}}</a></td>
                    <td><a href="{{route('shop.admin.navigation.edit', $item->id)}}">{{$item->path}}</a></td>
                    <td style="text-align: right"><a
                            href=" {{ route('shop.admin.navigation.deleteNavigation', $item->id) }} "
                            class="btn btn-danger delete"><i class="fas fa-trash"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
