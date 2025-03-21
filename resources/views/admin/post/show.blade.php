@extends('admin.layouts.main')
@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.post.index')}}">Посты</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
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
                    <div class="col-md-8">
                        <h3 class="mb-3">{{ $post->title }}</h3>
                        <p><strong>ID:</strong> {{ $post->id }}</p>
                        <p><strong>Категория:</strong> {{ $post->category->title }}</p>

                        <p><strong>Теги:</strong>
                            @foreach($post->tags as $tag)
                                <span class="badge bg-primary">{{ $tag->title }}</span>
                            @endforeach
                        </p>

                        <h5 class="mt-4">Превью изображение:</h5>
                        <img src="{{ asset('storage/' . $post->preview_image) }}" alt="preview" class="img-thumbnail mb-3">

                        <h5>Основное изображение:</h5>
                        <img src="{{ asset('storage/' . $post->main_image) }}" alt="main" class="img-thumbnail mb-3">

                        <h5 class="mt-4">Содержимое:</h5>
                        <div class="border p-3">
                            {!! $post->content !!}
                        </div>
                    </div>

                    <div class="col-md-4 d-flex align-items-start flex-column">
                        <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-success mb-2">
                            <i class="fa-solid fa-pencil"></i> Редактировать
                        </a>

                        <form action="{{ route('admin.post.delete', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa-solid fa-trash"></i> Удалить
                            </button>
                        </form>
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

