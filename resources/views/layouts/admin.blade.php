<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title') | Daraz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">

  <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/mdb.css')}}">
  <link rel="stylesheet" href="{{asset('assets/fonts/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="{{asset('assets/css/summernote.min.css')}}"> -->

<script src="{{asset('assets/js/jquery.js')}}"></script>

<script src="{{asset('assets/js/bootstrap4.js')}}"></script>
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap4.js')}}"></script>
<!-- <script src="{{asset('assets/js/summernote.min.js')}}"></script> -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>


<script src="{{asset('assets/js/select2.min.js')}}"></script>

<style>
    .sidebar-fixed{height:100vh;
    width:270px;
    -webkit-box-shadow:0 2px 5px 0
     rgba(0,0,0,.16),0 2px 10px 0

     rgba(0,0,0,.12);box-shadow:0 2px 5px 0
     rgba(0,0,0,.16),0 2px 10px 0
     rgba(0,0,0,.12);z-index:1050;background-color:#fff;
     padding:0 1.5rem 1.5rem}
     .sidebar-fixed .list-group .active{-webkit-box-shadow:0 2px 5px 0
    rgba(0,0,0,.16),0 2px 10px 0
    rgba(0,0,0,.12);box-shadow:0 2px 5px 0
    rgba(0,0,0,.16),0 2px 10px 0
    rgba(0,0,0,.12);
    -webkit-border-radius:5px;
    border-radius:5px}
    .sidebar-fixed .logo-wrapper{padding:2.5rem}
    .sidebar-fixed .logo-wrapper img{max-height:50px}
    @media (min-width:1200px)
    {.navbar,.page-footer,main{padding-left:270px}}
    @media (max-width:1199.98px){.sidebar-fixed{display:none}}

.container-for-admin{
  background-color: #eee!important;


}

.select2-container{
width: 100% !important;
}
</style>
<body>
    <div class="container-for-admin">
<header>
@include('layouts.adminnavbar')
@include('layouts.adminsidebar')
</header>
<main class="pt-5 mx-lg-5">
  @yield('content')
</main>
</div>
  @include('layouts.admin-footer')
  <script>
    $(document).ready(function() {
    $(".seclect2-products").select2();
});
</script>
@yield('script')
</body>


</html>
