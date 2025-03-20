@extends('admin.layouts.main')
@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6"><h3 class="mb-0">Главная</h3></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item active" aria-current="page">Главная</li>
                        </ol>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <!--begin::Col-->
                    <div class="col-lg-3 col-6">
                        <!--begin::Small Box Widget 1-->
                        <div class="small-box text-bg-primary">
                            <div class="inner">
                                <h3>{{ $data['usersCount'] }}</h3>
                                <p>Пользователи</p>
                            </div>
                            <i class="nav-icon fa-solid fa-users small-box-icon"></i>
                            <a
                                href="{{ route('admin.user.index') }}"
                                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
                            >
                                Подробнее <i class="bi bi-link-45deg"></i>
                            </a>
                        </div>
                        <!--end::Small Box Widget 1-->
                    </div>
                    <!--end::Col-->
                    <div class="col-lg-3 col-6">
                        <!--begin::Small Box Widget 2-->
                        <div class="small-box text-bg-success">
                            <div class="inner">
                                <h3>{{ $data['postsCount'] }}</h3>
                                <p>Посты</p>
                            </div>
                            <i class="nav-icon fa-solid fa-clipboard small-box-icon" ></i>
                            <a
                                href="{{ route('admin.post.index') }}"
                                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
                            >
                                Подробнее <i class="bi bi-link-45deg"></i>
                            </a>
                        </div>
                        <!--end::Small Box Widget 2-->
                    </div>
                    <!--end::Col-->
                    <div class="col-lg-3 col-6">
                        <!--begin::Small Box Widget 3-->
                        <div class="small-box text-bg-warning">
                            <div class="inner">
                                <h3>{{ $data['categoriesCount'] }}</h3>
                                <p>Категории</p>
                            </div>
                            <i class="nav-icon fa-solid fa-list small-box-icon"></i>
                            <a
                                href="{{ route('admin.category.index') }}"
                                class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover"
                            >
                                Подробнее <i class="bi bi-link-45deg"></i>
                            </a>
                        </div>
                        <!--end::Small Box Widget 3-->
                    </div>
                    <!--end::Col-->
                    <div class="col-lg-3 col-6">
                        <!--begin::Small Box Widget 4-->
                        <div class="small-box text-bg-danger">
                            <div class="inner">
                                <h3>{{ $data['tagsCount'] }}</h3>
                                <p>Тэги</p>
                            </div>
                            <i class="nav-icon fa-solid fa-tags small-box-icon"></i>
                            <a
                                href="{{ route('admin.tag.index') }}"
                                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
                            >
                                Подробнее <i class="bi bi-link-45deg"></i>
                            </a>
                        </div>
                        <!--end::Small Box Widget 4-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row">
                    <!-- Start col -->
                    <div class="col-lg-7 connectedSortable">

                        <!-- /.card -->
                        <!-- DIRECT CHAT -->

                        <!-- /.direct-chat -->
                    </div>
                    <!-- /.Start col -->
                    <!-- Start col -->

                    <!-- /.Start col -->
                </div>
                <!-- /.row (main row) -->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
@endsection

