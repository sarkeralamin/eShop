<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('includes.head')
</head>

<body class="page-header-fixed">

<!-- Header Panel -->
<div class="page-header navbar navbar-fixed-top">
    @include('includes.header')
</div>
<!-- Header Panel End -->
<div class="clearfix"></div>

<div class="page-container">

    <div class="page-sidebar-wrapper">  <!-- Page Sidebar Start -->
        @include('includes.sidebar')
    </div>  <!-- Page Sidebar End -->

    <div class="page-content-wrapper"> <!-- Page Wrapper -->

        <div class="page-content">  <!-- Page Content Start -->
            @if(isset($siteTitle))
                <h3 class="page-title">
                    {{ $siteTitle }}
                </h3>
            @endif

            <div class="row">
                <div class="col-md-12">

                    @if (Session::has('message'))
                        <div class="note note-info">
                            <p>{{ Session::get('message') }}</p>
                        </div>
                    @endif
                    @if ($errors->count() > 0)
                        <div class="note note-danger">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')

                </div>
            </div>

        </div>   <!-- Page Content End -->


    </div>   <!-- Page Wrapper End -->

    <div class="scroll-to-top"
         style="display: none;">
        <i class="fa fa-arrow-up"></i>
    </div>
</div>
<div class="page-footer">
    @include('includes.footer')
</div>
@include('includes.javascripts')
</body>
</html>



