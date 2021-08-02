@extends('layouts.admin')
@section('title') Добавить Api - @parent @stop
@section('content')
<main>
   <!-- Main dashboard content-->
   <div class="container-xl p-5">
      <div class="row justify-content-between align-items-center mb-5">
         <div class="col flex-shrink-0 mb-5 mb-md-0">
            <h1 class="display-4 mb-0">Добавить ресурс</h1>
            <div class="text-muted">Создание нового ресурса</div>
            <br>
         </div>
         <br>
         @include('inc.error')
         <div>
            <form action="{{route('admin.rss.store')}}" method="post">
               @csrf
               <br>
               <div class="form-group">
                  <label for="name">Заголовок</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
               </div>
               <br>
               <div class="form-group">
                  <label for="url">Url ресурса</label>
                  <input type="text" class="form-control" name="url" id="url" value="{{old('url')}}">
               </div>
               <br>
               <button class="btn btn-primary" type="submit">Создать</button>
            </form>
         </div>
      </div>
   </div>
</main>
@endsection