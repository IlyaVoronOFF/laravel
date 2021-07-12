<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <meta name="author" content="" />
   <title>@section('title') Мой сайт @show</title>
   <!-- Font Awesome icons (free version)-->
   <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
   <!-- Google fonts-->
   <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
      type="text/css" />
   <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
      rel="stylesheet" type="text/css" />
   <!-- Core theme CSS (includes Bootstrap)-->
   <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
</head>

<body>
   <a href="{{route('news')}}" class="btn btn-primary" style="float:right;">
      << НАЗАД</a>
         <!-- Main Content-->
         @yield('content')
         <!-- Footer-->
         <x-footer></x-footer>
         <!-- Bootstrap core JS-->
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
         <!-- Core theme JS-->
         <script src="{{asset('assets/js/scripts.js')}}"></script>
</body>

</html>