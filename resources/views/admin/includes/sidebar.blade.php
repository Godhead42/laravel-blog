<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <ul class="pt-3 nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{route('admin.main.index')}}" class="nav-link">
                <i class="nav-icon fa-solid fa-house"></i>
                <p>
                    Главная
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.user.index')}}" class="nav-link">
                <i class="nav-icon fa-solid fa-users"></i>
                <p>
                    Пользователи
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.post.index')}}" class="nav-link">
                <i class="nav-icon fa-solid fa-clipboard"></i>
                <p>
                    Посты
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.category.index')}}" class="nav-link">
                <i class="nav-icon fa-solid fa-list"></i>
                <p>
                    Категории
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.tag.index')}}" class="nav-link">
                <i class="nav-icon fa-solid fa-tags"></i>
                <p>
                    Тэги
                </p>
            </a>
        </li>

    </ul>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
