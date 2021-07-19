@extends('layouts.admin')
@section('title') Добавить категорию - @parent @stop
@section('content')
<main>
   <!-- Main dashboard content-->
   <div class="container-xl p-5">
      <div class="row justify-content-between align-items-center mb-5">
         <div class="col flex-shrink-0 mb-5 mb-md-0">
            <h1 class="display-4 mb-0">Добавить категорию</h1>
            <div class="text-muted">Создание новой категории</div>
            <br>
         </div>
         <br>
         @include('inc.error')
         <div>
            <form action="{{route('admin.categories.store')}}" method="post">
               @csrf
               <div class="form-group">
                  <label for="title">Заголовок</label>
                  <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
               </div>
               <br>
               <div class="form-group">
                  <label for="color">Цвет</label>
                  <input type="text" class="form-control" name="color" id="color" value="{{old('color')}}">
               </div>
               <br>
               <div class="form-group">
                  <label for="description">Текст</label>
                  <textarea class="form-control" name="description" id="" cols="30" rows="10">{{old('description')}}</textarea>
               </div>
               <br>
               <button class="btn btn-primary" type="submit">Создать</button>
            </form>
         </div>
      </div>
   </div>
</main>
@endsection