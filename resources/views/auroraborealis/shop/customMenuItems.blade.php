@foreach($menu as $item)
        <li>
            <a href="/{{ $item->path }}">
                <img src="{{ asset(env('THEME')) }}/img/nav-menu/{{ $item->img }}" style="height:56px;width:56px;" class="img-responsive"
                     alt="{{ $item->title }}"/> {{ $item->title }}
            </a>
        </li>
@endforeach
