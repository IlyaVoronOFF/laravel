@extends('layouts.main')
@section('content')
<div class="container px-4 px-lg-5">
   <div class="row gx-4 gx-lg-5 justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-7">
         <!-- Post preview-->
         @forelse ($newsList as $news)
         <div class="post-preview">
            <a href="{{ route('news.show', ['news' => $news->id]) }}">
               <h2 class="post-title">{!! $news->title !!}</h2>
               <h3 class="post-subtitle">{{ $news->description }}</h3>
            </a>
            @if($news->image)
            <img src="{{Storage::disk('public')->url($news->image)}}" style="width: 590px;" alt="{{$news->image}}">
            <br>
            <br>
            @endif
            <p class="post-meta">

               <strong>Категория: {{optional($news->category)->title}}</strong>&nbsp;
               Опубликовал
               <a href="#!">{{$news->author}}</a>
               от {{$news->created_at}}
            </p>
         </div>
         <!-- Divider-->
         <hr class="my-4" />
         @empty
         <h2>Записей нет</h2>
         @endforelse
         <!-- Pager-->
         <div class="d-flex justify-content-end mb-4">{{$newsList->links()}}</div>
      </div>
   </div>
</div>
@endsection