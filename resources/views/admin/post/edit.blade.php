@extends('admin.layouts.main')
@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6"><h3 class="mb-0">Редактирование поста</h3></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.post.index')}}">Посты</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Редактирование поста</li>
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
                    <div class="col-12">
                        <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group" class="w-25">
                                <input type="text" class="form-control" name="title" placeholder="Название поста"
                                       value={{ $post->title  }}
                                >
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea id="summernote" name="content">
                                    {{ $post->content }}
                                </textarea>
                                @error('content')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class=" mb-4 w-50 mt-3">
                                <div class="card-title mb-0"><h5>Добавить превью</h5> </div>
                                <div class="w-50 mb-2">
                                    <img src="{{ Storage::url($post->preview_image) }}" alt="preview_image" class="w-50">
                                </div>
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" name="preview_image">
                                        <label class="input-group-text" for="inputGroupFile02">Выберите изображение</label>
                                    </div>
                                </div>
                                @error('preview_image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4 w-50">
                                <div class="card-title mb-0"><h5>Добавить главное изображение</h5></div>
                                <div class="w-50 mb-3">
                                    <img src="{{ Storage::url($post->main_image) }}" alt="main_image" class="w-50">

                                </div>
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" name="main_image">
                                        <label class="input-group-text" for="inputGroupFile02">Выберите изображение</label>
                                    </div>
                                </div>
                                @error('main_image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4 w-50">
                                <label for="selectOption card-title mb-0"><h5>Выберите категорию</h5></label>
                                <select id="selectOption" class="form-control" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}"
                                                {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                            {{$category->title}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4 w-50">
                                <label>Тэги</label>
                                <select class="js-example-basic-multiple" name="tag_ids[]" multiple="multiple" data-popper-placement="Выберите тэги" style="width: 100%;">
                                    @foreach ($tags as $tag)
                                        <option {{is_array( $post->tags->pluck('id')->toArray() ) && in_array($tag->id, $post->tags->pluck('id')->toArray() ) ?  'selected' : ''}} value="{{$tag->id}}">
                                            {{$tag->title}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tag_ids')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Обновить">
                            </div>

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

