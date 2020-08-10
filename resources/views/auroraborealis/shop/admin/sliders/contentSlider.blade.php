<div class="col-md-12">
    <a class="btn btn-primary" href="{{route('shop.admin.sliders.create')}}">Добавить</a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Изображение</th>
                <th>Заголовок</th>
                <th>Краткое описание</th>
                <th style="text-align: right">Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($slider as $item)
                @php /** @var \App\Models\ShopSlider $item  */ @endphp
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><img src="/{{env('THEME') .'/img/' . $item->img }}" style="width: 100px;height: 56px;" alt=""></td>
                    <td><a href="{{route('shop.admin.sliders.edit', $item->id)}}">{{$item->title}}</a></td>
                    <td><a href="{{route('shop.admin.sliders.edit', $item->id)}}">{{ $item->description }}</a></td>
                    <td style="text-align: right"><a href=" {{ route('shop.admin.sliders.deleteSlider', $item->id) }} " class="btn btn-danger delete"><i class="fas fa-trash"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
