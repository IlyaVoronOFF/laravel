@extends('layouts.feedback')
@section('title') Форма обратной связи - @parent @stop
@section('content')
<main>
   <!-- Main dashboard content-->
   <div class="container-xl p-5">
      <div class="row justify-content-between align-items-center mb-5">
         <div class="col flex-shrink-0 mb-5 mb-md-0">
            <h1 class="display-4 mb-0">Форма обратной связи</h1>
            <div class="text-muted">Заполните форму</div>
            <br>
         </div>
         <br>
         @if($errors->any())
         @foreach($errors->all() as $error)
         <div class="alert alert-danger">{{$error}}</div>
         @endforeach
         @endif
         <div>
            <form action="{{route('feedback.store')}}" method="post">
               @csrf
               <div class="form-group">
                  <label for="first_name">Ваше имя</label>
                  <input type="text" class="form-control" name="first_name" id="first_name"
                     value="{{old('first_name')}}" placeholder="Имя">
               </div>
               <br>
               <div class="form-group">
                  <label for="email">Ваш E-mail</label>
                  <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}"
                     placeholder="test@test.ru">
               </div>
               <br>
               <div class="form-group">
                  <label for="phone">Ваш телефон</label>
                  <input type="phone" class="form-control" name="phone" id="phone" value="{{old('phone')}}"
                     placeholder="7999887766">
               </div>
               <br>
               <div class="form-group">
                  <label for="description">Ваше сообщение</label>
                  <textarea class="form-control" name="description" id="" cols="30" rows="10"
                     placeholder="Введите текст">{{old('description')}}</textarea>
               </div>
               <br>
               <button class="btn btn-primary" type="submit">Отправить</button>
            </form>
         </div>
      </div>
   </div>
</main>
@endsection