@extends('layouts.admin')
@section('title') Список rss-лент - @parent @stop
@section('content')
<main>
   <!-- Main dashboard content-->
   <div class="container-xl p-5">
      <div class="row justify-content-between align-items-center mb-5">
         <div class="col flex-shrink-0 mb-5 mb-md-0">
            <h1 class="display-4 mb-0">Ресурсы</h1>
            <a href="{{route('admin.parse')}}" class="btn btn-primary" style="float:right;">Парсинг ресурсов</a>
            <a href="{{route('admin.rss.create')}}" class="btn btn-primary" style="float:right;">Добавить ресурс</a>
            <div class="text-muted">Список ресурсов</div>
         </div>
      </div>
      <div class="card card-raised">
         <div class="card-header bg-primary text-white px-4">
            <div class="d-flex justify-content-between align-items-center">
               <div class="me-4">
                  <h2 class="card-title text-white mb-0">Таблица управления Api-ресурсами</h2>
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
            @include('inc.success')
            <table id="datatablesSimple">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Заголовок</th>
                     <th>Ссылка на Api</th>
                     <th data-type="date" data-format="YYYY/MM/DD">Дата добавления</th>
                     <th>Управление</th>
                  </tr>
               </thead>
               <tbody>
                  @forelse ($rssList as $rss)

                  <tr>
                     <td>{{$rss->id}}</td>
                     <td>{!!$rss->name!!}</td>
                     <td>{{$rss->url}}</td>
                     <td>{{$rss->created_at}}</td>
                     <td><a href=" {{route('admin.rss.edit', ['rss' => $rss->id])}}"
                           style="text-decoration:none;">🖍</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:;"
                           class="delete" rel="{{ $rss->id }}" style="text-decoration:none;">❌</a></td>
                  </tr>
                  @empty
                  <tr>
                     <td colspan="5">
                        <h2>Список пуст</h2>
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
@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
$(function() {
   $("#datatablesSimple").on('click', 'a.delete', function() {
      if (confirm("Подтверждаете удаление ?")) {
         $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "DELETE",
            url: "/admin/rss/" + $(this).attr('rel'),
            complete: function() {
               alert("Запись удалена");
               location.reload();
            }
         })
      }
   });
});
</script>
@endpush