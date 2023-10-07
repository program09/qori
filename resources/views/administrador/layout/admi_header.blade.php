@include('layouts.head')
@include('administrador.layout.admi_aside')


<div class="conten_main">

    @include('layouts.nav')

    <main class="main">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa-solid fa-house"></i></a></li>
            <li class="breadcrumb-item active">@yield('title')</li>
        </ul>

        @yield('content')

    </main>

</div>


@include('layouts.footer')
