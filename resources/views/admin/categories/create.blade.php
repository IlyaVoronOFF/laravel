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
         @if($errors->any())
         @foreach($errors->all() as $error)
         <div class="alert alert-danger">{{$error}}</div>
         @endforeach
         @endif
         <div>
            <form action="{{route('admin.categories.store')}}" method="post">
               @csrf
               <div class="form-group">
                  <label for="title">Заголовок</label>
                  <input type="text" name="title" id="title" value="{{old('title')}}">
               </div>
               <br>
               <div class="form-group">
                  <label for="status">Статус</label>
                  <select name="status" id="status">
                     <option @if(old('status')=='DRAFT' ) selected @endif>DRAFT</option>
                     <option @if(old('status')=='PUBLISHED' ) selected @endif>PUBLISHED</option>
                     <option @if(old('status')=='BLOCKED' ) selected @endif>BLOCKED</option>
                  </select>
               </div>
               <br>
               <div class="form-group">
                  <label for="description">Текст</label>
                  <textarea class="form-control" name="description" id="" cols="30"
                     rows="10">{{old('description')}}</textarea>
               </div>
               <br>
               <button class="btn btn-primary" type="submit">Создать</button>
            </form>
         </div>
      </div>
   </div>
</main>
@endsection