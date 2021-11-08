@extends('shopify-app::layouts.default')
@section('styles')

<!--core-->
<link rel="stylesheet" type="text/css" href="{{asset("app-assets/css/bootstrap.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("app-assets/css/bootstrap-extended.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("app-assets/css/components.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("app-assets/css/core/menu/menu-types/vertical-menu.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("app-assets/css/colors.css")}}">


<!--toastr-->
<link rel="stylesheet" type="text/css" href="{{asset("app-assets/vendors/css/extensions/toastr.min.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("app-assets/css/plugins/extensions/ext-component-toastr.min.css")}}">
@endsection

@section('content')

  <!--Include tables -->
  @include('partials.table')
  @include('partials.modal_edit')

  <!--Include modal add -->
  @include('partials.modal')

@endsection
    
@section('scripts')
@parent
<!-- core -->

<script src="{{asset("app-assets/vendors/js/vendors.min.js")}}"></script>
<script src="{{asset("app-assets/js/core/app-menu.js")}}"></script>

<script>
    actions.TitleBar.create(app, { title: 'Home' });
</script>

<!-- custom -->

<script src="{{asset("js/main.js")}}"></script>

<!-- core -->
<script src="{{asset("app-assets/js/scripts/extensions/ext-component-toastr.min.js")}}"></script>
<script src="{{asset("app-assets/vendors/js/extensions/toastr.min.js")}}"></script>

<script src="{{asset("app-assets/js/core/app.js")}}"></script>
  
@endsection