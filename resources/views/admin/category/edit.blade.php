<!-- Наследование -->
@extends('layouts.admin_layout')
<!-- Название стр-->
@section('title', 'Редактирование категории')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактирование категории: {{$category['title']}}</h1>
          </div>
        </div><!-- /.row -->
        <!-- если успешно отправлено -->
        @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <!-- с помщью контроллера -->
              <form action="{{route('category.update', $category['id'])}}" method="POST">
                <!-- защита -->
              @csrf
              <!-- использовается для роута -->
              @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Название</label>
                    <input type="text" value="{{$category['title']}}" name="title" class="form-control" id="exampleInputEmail1" placeholder="Введите название категории" required>
                    <!-- req позваляет не отправлять пустую форму -->
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Редоктировать</button>
                </div>
              </form>
            </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection