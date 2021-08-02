@extends('layouts.admin')
@section('title') Редактировать ресурс - @parent @stop
@section('content')
<main>
   <!-- Main dashboard content-->
   <div class="container-xl p-5">
      <div class="row justify-content-between align-items-center mb-5">
         <div class="col flex-shrink-0 mb-5 mb-md-0">
            <h1 class="display-4 mb-0">Редактировать ресурс</h1>
            <div class="text-muted">Изменение Api-ресурса</div>
            <br>
         </div>
         <br>
         @include('inc.error')
         <div>
            <form action="{{route('admin.rss.update', ['rss' => $rss])}}" method="post" enctype="multipart/form-data">
               @csrf
               @method('put')
               <div class="form-group">
                  <label for="name">Заголовок</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{$rss->name}}">
               </div>
               @if($errors->has('name'))
               <div class="alert alert-danger">
                  @foreach($errors->get('name') as $error)
                  <p style="margin-bottom: 0;">{{ $error }}</p>
                  @endforeach
               </div>
               @endif
               <br>
               <div class="form-group">
                  <label for="url">URL ресурса</label>
                  <input type="text" class="form-control" name="url" id="url" value="{{$rss->url}}">
               </div>
               @if($errors->has('url'))
               <div class="alert alert-danger">
                  @foreach($errors->get('url') as $error)
                  <p style="margin-bottom: 0;">{{ $error }}</p>
                  @endforeach
               </div>
               @endif
               <br>
               <button class="btn btn-primary" type="submit">Сохранить</button>
            </form>
         </div>
      </div>
   </div>
</main>
@endsection