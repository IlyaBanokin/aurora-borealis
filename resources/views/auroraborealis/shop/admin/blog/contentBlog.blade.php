<div class="col-md-12">
    <a class="btn btn-primary" href="{{route('shop.admin.blog.create')}}">Добавить</a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Название статьи</th>
                <th>Создана</th>
                <th>Опубликована</th>
                <th style="text-align: right">Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($paginator as $item)
                @php /** @var \App\Models\ShopBlog $item  */ @endphp
                <tr>
                    <td>{{$item->id}}</td>
                    <td><a href="{{route('shop.admin.blog.edit', $item->id)}}">{{$item->title}}</a></td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->published_at }}</td>
                    <td style="text-align: right"><a
                            href=" {{ route('shop.admin.blog.deleteArticle', $item->id) }} "
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
