{{-- panggil komponen head --}}
@include('partials.head')
    
    {{-- panggil komponen sidebar --}}
    @include('partials.sidebar')

    <div class="main-panel">

    {{-- panggil komponen sidebar --}}
    @include('partials.navbar')


        <div class="content">
            <div class="container-fluid">
                {{-- panggil komponen container --}}
                @yield('container')
            </div>
        </div>


    {{-- panggil komponen footer --}}
    @include('partials.footer')
