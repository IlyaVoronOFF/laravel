@extends('layouts.admin')
@section('title') Список новостей - @parent @stop
@section('content')
<main>
   <!-- Main dashboard content-->
   <div class="container-xl p-5">
      <div class="row justify-content-between align-items-center mb-5">
         <div class="col flex-shrink-0 mb-5 mb-md-0">
            <h1 class="display-4 mb-0">Новости</h1>
            <a href="{{route('admin.news.create')}}" class="btn btn-primary" style="float:right;">Добавить новость</a>
            <div class="text-muted">Список новостей</div>
         </div>
      </div>
      <div class="card card-raised">
         <div class="card-header bg-primary text-white px-4">
            <div class="d-flex justify-content-between align-items-center">
               <div class="me-4">
                  <h2 class="card-title text-white mb-0">Таблица управления публикациями</h2>
               </div>
               <div class="d-flex gap-2">
                  <button class="btn btn-lg btn-text-white btn-icon" type="button"><i
                        class="material-icons">download</i></button>
                  <button class="btn btn-lg btn-text-white btn-icon" type="button"><i
                        class="material-icons">print</i></button>
               </div>
            </div>
         </div>
         <div class="card-body p-4">
            <!-- Simple DataTables example-->
            <table id="datatablesSimple">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Заголовок</th>
                     <th>Описание</th>
                     <th>Автор</th>
                     <th data-type="date" data-format="YYYY/MM/DD">Дата добавления</th>
                     <th>Управление</th>
                  </tr>
               </thead>
               <tbody>
                  @forelse ($newsList as $news)

                  <tr>
                     <td>{{$news->id}}</td>
                     <td>{!!$news->title!!}</td>
                     <td>{{$news->description}}</td>
                     <td>{{$news->author}}</td>
                     <td>{{$news->created_at}}</td>
                     <td><a href=" {{route('admin.news.edit', ['news' => $news->id])}}"
                           style="text-decoration:none;">🖍</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=""
                           style="text-decoration:none;">❌</a></td>
                  </tr>
                  @empty
                  <tr>
                     <td colspan="6">
                        <h2>Записей нет</h2>
                     </td>
                  </tr>
                  @endforelse
               </tbody>
            </table>
         </div>
      </div>
   </div>
</main>
@endsection