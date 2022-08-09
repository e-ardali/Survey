@include('layouts.parts.header')

@auth
    <header>
        <div id="top-nav" class="fixed-top border-bottom container-fluid">
            @include('layouts.parts.top-nav')
        </div>
    </header>
@endauth

<div id="page-body" class="container-fluid  @guest pr-0 pb-0 @endguest">

    @auth
        @include('layouts.parts.side-nav')
    @endauth

    @yield('content')

</div>

@include('layouts.parts.footer')
