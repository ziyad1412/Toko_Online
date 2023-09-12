@include('frontend.layout.top')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>
</div>
@include('frontend.layout.bottom')
