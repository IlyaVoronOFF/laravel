@extends('layouts.admin')
@section('title') Редактировать категорию - @parent @stop
@section('content')
<main>
   <!-- Main dashboard content-->
   <div class="container-xl p-5">
      <div class="row justify-content-between align-items-center mb-5">
         <div class="col flex-shrink-0 mb-5 mb-md-0">
            <h1 class="display-4 mb-0">Редактировать категорию</h1>
            <div class="text-muted">Изменение категории</div>
            <br>
         </div>
         <br>
         @include('inc.error')
         <div>
            <form action="{{route('admin.categories.update', ['category' => $category])}}" method="post">
               @csrf
               @method('put')
               <div class="form-group">
                  <label for="title">Заголовок</label>
                  <input type="text" class="form-control" name="title" id="title" value="{{$category->title}}">
               </div>
               @if($errors->has('title'))
               <div class="alert alert-danger">
                  @foreach($errors->get('title') as $error)
                  <p style="margin-bottom: 0;">{{ $error }}</p>
                  @endforeach
               </div>
               @endif
               <br>
               <div class="form-group">
                  <label for="color">Цвет</label>
                  <input type="text" class="form-control" name="color" id="color" value="{{$category->color}}">
               </div>
               <br>
               <div class="form-group">
                  <label for="description">Текст</label>
                  <textarea class="form-control" name="description" id="" cols="30"
                     rows="10">{{$category->description}}</textarea>
               </div>
               <br>
               <button class="btn btn-primary" type="submit">Сохранить</button>
            </form>
         </div>
      </div>
   </div>
</main>
@endsection