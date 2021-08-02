<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>@section('title') GBAdmin @show</title>
   <!-- Load Material Icons from Google Fonts-->
   <link
      href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
      rel="stylesheet" />
   <!-- Load Simple DataTables Stylesheet-->
   <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
   <!-- Roboto and Roboto Mono fonts from Google Fonts-->
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet" />
   <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,500" rel="stylesheet" />
   <!-- Load main stylesheet-->
   <link href="{{asset('assets/admin/css/styles.css')}}" rel="stylesheet" />

</head>

<body class="nav-fixed bg-light">
   <!-- Top app bar navigation menu-->
   <x-admin.header></x-admin.header>
   <!-- Layout wrapper-->
   <div id="layoutDrawer">
      <!-- Layout navigation-->
      <x-admin.sidebar></x-admin.sidebar>
      <!-- Layout content-->
      <div id="layoutDrawer_content">
         <!-- Main page content-->
         @yield('content')

         <!-- Footer-->
         <!-- Min-height is set inline to match the height of the drawer footer-->
         <footer class="py-4 mt-auto border-top" style="min-height: 74px">
            <div class="container-xl px-5">
               <div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between small">
                  <div class="me-sm-2">Copyright © Your Website 2021</div>
                  <div class="d-flex ms-sm-2">
                     <a class="text-decoration-none" href="#!">Privacy Policy</a>
                     <div class="mx-1">·</div>
                     <a class="text-decoration-none" href="#!">Terms &amp; Conditions</a>
                  </div>
               </div>
            </div>
         </footer>
      </div>
   </div>
   <!-- Load Bootstrap JS bundle-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
   </script>
   <!-- Load global scripts-->
   <script type="module" src="{{asset('assets/admin/js/material.js')}}"></script>
   <script src="{{asset('assets/admin/js/scripts.js')}}"></script>
   <!--  Load Chart.js via CDN-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.0-beta.10/chart.min.js" crossorigin="anonymous">
   </script>
   <!-- Load Simple DataTables Scripts-->
   <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
   <script src="{{asset('assets/admin/js/datatables/datatables-simple-demo.js')}}"></script>

   <script src="https://assets.startbootstrap.com/js/sb-customizer.js"></script>
   <script defer src="https://static.cloudflareinsights.com/beacon.min.js"
      data-cf-beacon='{"rayId":"66a33b95d82c16a1","token":"6e2c2575ac8f44ed824cef7899ba8463","version":"2021.6.0","si":10}'>
   </script>
   <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
   <script>
   var options = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
   };
   </script>
   @stack('js')
</body>

</html>