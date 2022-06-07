<aside class="main-sidebar sidebar-dark-primary elevation-4">
    {{-- <a href="{{ url('/home') }}" class="brand-link">
        <img src="{{ asset('img/logo_dash.png') }}"
             alt="{{ config('app.name') }} Logo"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a> --}}
    <div class="text-center" style="background-color: rgb(255, 255, 255)">
        <a href="{{ url('/home') }}">
            <img src="{{ asset('img/edu1.jpg') }}" 
            class="pb-2 pt-2" alt="User Image" width="150px">    
        </a>
    </div>
    <div class="sidebar" style="background-color: rgb(255, 255, 255)">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>
</aside>
