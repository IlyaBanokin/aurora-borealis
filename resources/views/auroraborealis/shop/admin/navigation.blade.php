<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        {{--Главная--}}
        <li class="nav-item">
            <a href="{{ url('admin') }}" class="nav-link">
                <i class="nav-icon fas fas fa-box-open"></i>
                <p>Главная</p>
            </a>
        </li>
        {{--Категории--}}
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fab fa-buffer"></i>
                <p>
                    Категории
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('shop.admin.categories.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Список категорий</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('shop.admin.categories.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Добавить категорию</p>
                    </a>
                </li>
            </ul>
        </li>
        {{--Товары--}}
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-shopping-bag"></i>
                <p>
                    Товары
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('shop.admin.products.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Список товаров</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('shop.admin.products.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Добавить товар</p>
                    </a>
                </li>
            </ul>
        </li>
        {{--Навигация--}}
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-cog"></i>
                <p>
                    Навигация
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('shop.admin.navigation.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Список меню</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('shop.admin.navigation.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Добавить меню</p>
                    </a>
                </li>
            </ul>
        </li>
        {{--Слайдер--}}
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-plus-square"></i>
                <p>
                    Слайдер
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('shop.admin.sliders.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Все слайдеры</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('shop.admin.sliders.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Добавить слайд</p>
                    </a>
                </li>
            </ul>
        </li>
        {{--Блог--}}
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-paper-plane"></i>
                <p>
                    Блог
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('shop.admin.blog.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Все статьи</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('shop.admin.blog.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Добавить статью</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>

