@extends('layouts.admin')
@section('title') Добавить новость - @parent @stop
@section('content')
<main>
   <!-- Main dashboard content-->
   <div class="container-xl p-5">
      <div class="row justify-content-between align-items-center mb-5">
         <div class="col flex-shrink-0 mb-5 mb-md-0">
            <h1 class="display-4 mb-0">Добавить новость</h1>
            <div class="text-muted">Создание новой публикации</div>
            <br>
         </div>
         <br>
         @include('inc.error')
         <div>
            <form action="{{route('admin.news.store')}}" method="post">
               @csrf
               <div class="form-group">
                  <label for="category">Категория</label>
                  <select class="form-control" name="category_id" id="category">
                     @foreach($categories as $category)
                     <option value="{{$category->id}}" @if(old('category_id')===$category->id)
                        selected
                        @endif>
                        {{$category->title}}
                     </option>
                     @endforeach
                  </select>
               </div>
               <br>
               <div class="form-group">
                  <label for="title">Заголовок</label>
                  <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
               </div>
               <br>
               <div class="form-group">
                  <label for="image">Картинка</label>
                  <input type="file" class="form-control" name="image" id="image">
               </div>
               <br>
               <div class="form-group">
                  <label for="status">Статус</label>
                  <select class="form-control" name="status" id="status">
                     <option @if(old('status')=='DRAFT' ) selected @endif>DRAFT</option>
                     <option @if(old('status')=='PUBLISHED' ) selected @endif>PUBLISHED</option>
                     <option @if(old('status')=='BLOCKED' ) selected @endif>BLOCKED</option>
                  </select>
               </div>
               <br>
               <div class="form-group">
                  <label for="author">Автор</label>
                  <input type="text" class="form-control" name="author" id="author" value="{{old('author')}}">
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