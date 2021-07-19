@extends('layouts.admin')
@section('title') Редактировать новость - @parent @stop
@section('content')
<main>
   <!-- Main dashboard content-->
   <div class="container-xl p-5">
      <div class="row justify-content-between align-items-center mb-5">
         <div class="col flex-shrink-0 mb-5 mb-md-0">
            <h1 class="display-4 mb-0">Редактировать новость</h1>
            <div class="text-muted">Изменение публикации</div>
            <br>
         </div>
         <br>
         @include('inc.error')
         <div>
            <form action="{{route('admin.news.update', ['news' => $news])}}" method="post">
               @csrf
               @method('put')
               <div class="form-group">
                  <label for="category">Категория</label>
                  <select class="form-control" name="category_id" id="category">
                     @foreach($categories as $category)
                     <option value="{{$category->id}}" @if($news->category_id === $category->id)
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
                  <input type="text" class="form-control" name="title" id="title" value="{{$news->title}}">
               </div>
               <br>
               <div class="form-group">
                  <label for="image">Картинка</label>
                  <input type="file" class="form-control" name="image" id="image" value="{{$news->image}}">
               </div>
               <br>
               <div class="form-group">
                  <label for="status">Статус</label>
                  <select class="form-control" name="status" id="status">
                     <option @if($news->status=='DRAFT' ) selected @endif>DRAFT</option>
                     <option @if($news->status=='PUBLISHED' ) selected @endif>PUBLISHED</option>
                     <option @if($news->status=='BLOCKED' ) selected @endif>BLOCKED</option>
                  </select>
               </div>
               <br>
               <div class="form-group">
                  <label for="author">Автор</label>
                  <input type="text" class="form-control" name="author" id="author" value="{{$news->author}}">
               </div>
               <br>
               <div class="form-group">
                  <label for="description">Текст</label>
                  <textarea class="form-control" name="description" id="" cols="30"
                     rows="10">{{$news->description}}</textarea>
               </div>
               <br>
               <button class="btn btn-primary" type="submit">Сохранить</button>
            </form>
         </div>
      </div>
   </div>
</main>
@endsection