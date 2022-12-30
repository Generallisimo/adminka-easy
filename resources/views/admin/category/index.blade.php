<!-- Наследование -->
@extends('layouts.admin_layout')
<!-- Название стр-->
@section('title', 'Все категории')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Все категории</h1>
          </div>
        </div><!-- /.row -->
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
      <div class="card">
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 5%">
                          ID
                      </th>
                      <th>
                          Название
                      </th>
                      <th style="width: 30%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                <!-- выводим категории -->
                @foreach ($categories as $category)
                <tr>
                      <td>
                        <!-- что именно выводим -->
                          {{$category['id']}}
                      </td>
                      <td>
                      {{$category['title']}}
                      </td>                      
                      <td class="project-actions text-right"> 
                        <!-- передаем также id с которым работаем -->
                          <a class="btn btn-info btn-sm" href="{{route('category.edit', $category['id'])}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Редоктировать
                          </a>
                          <form action="{{route('category.destroy', $category['id'])}}" method="POST" style="display: inline-block;">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>
                                Удалить
                            </button>
                          </form>
                      </td>
                  </tr> 
                @endforeach
                                    
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection