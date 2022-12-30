<!-- Наследование -->
@extends('layouts.admin_layout')
<!-- Название стр-->
@section('title', 'Редактирование статьи')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактирование статьи:{{$post['title']}}</h1>
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
              <form action="{{route('post.update', $post['id'])}}" method="POST">
                <!-- защита -->
              @csrf
              @method('PUT ')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Название</label>
                    <input type="text" value="{{$post['title']}}" name="title" class="form-control" id="exampleInputEmail1" placeholder="Введите название статьи" required>
                    <!-- req позваляет не отправлять пустую форму -->
                  </div>
                  <div class="form-group">                
                        <!-- select -->
                        <div class="form-group">
                            <label>Выберите категорию</label>
                            <select name="cat_id" class="form-control" required>
                            @foreach ($categories as $category)
                            <!-- та категория которую перебираем  -->
                                <option value="{{ $category['id'] }}" @if ($category['id'] == $post['cat_id']) selected @endif>{{ $category['title'] }}</option>
                            @endforeach
                            </select>
                        </div>                               
                  </div>


                  <div class="form-group">
                    <textarea name="text" class="editor">{{$post['text']}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="feature_image">Изображение статьи</label>
                    <img src="{{$post['img']}}" alt="" class="img-uploaded" style="display: block; width:300px;">
                    <!-- red позвляет не менять пользователю -->
                    <input type="text" value="{{$post['img']}}" name="img" class="form-control" id="feature_image" name="feature_image" value="" readonly>
                    <!-- подтягивает фото  -->
                    <a href="" class="popup_selector" data-inputid="feature_image">Выбрать изображение</a>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
              </form>
            </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script>tinymce.init({
    selector: '.editor',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ]
  });</script>
@endsection 