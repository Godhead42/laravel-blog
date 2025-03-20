@extends('admin.layouts.main')
@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6"><h3 class="mb-0">Тэги</h3></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Тэги</li>
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
                    <div class="col-1 mb-3">
                        <a href="{{ route('admin.tag.create') }}" class="btn btn-primary">Добавить</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card ">
                            <!-- /.card-header -->
                            <div class="card-table table-responsive pv-0 ">
                                <table class="table table-hover text-nowrap ">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Название</th>
                                        <th colspan="3" class="text-center">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tags as $tag)
                                    <tr>
                                        <td>{{$tag->id}}</td>
                                        <td>{{$tag->title}}</td>
                                        <td class="text-center"><a href="{{route('admin.tag.show', $tag->id) }}"><i class="fa-sharp fa-solid fa-eye"></i></a></td>
                                        <td class="text-center"><a href="{{route('admin.tag.edit', $tag->id) }}" class="text-success"><i class="fa-solid fa-pencil "></i></a></td>
                                        <td class="text-center">
                                            <form action="{{route('admin.tag.delete', $tag->id)}}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <i class="fa-solid fa-trash text-danger" role="button"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            <!-- /.card-body -->
                            </div>
                        </div>
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

