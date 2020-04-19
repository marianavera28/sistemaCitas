@extends('adminlte::master')

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body', 'login-page')

@php( $Tablero_url = View::getSection('Tablero_url') ?? config('adminlte.Tablero_url', 'home') )

@if (config('adminlte.use_route_url', false))
    @php( $Tablero_url = $Tablero_url ? route($Tablero_url) : '' )
@else
    @php( $Tablero_url = $Tablero_url ? url($Tablero_url) : '' )
@endif

@section('body')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ $Tablero_url }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">{{ __('adminlte::adminlte.verify_message') }}</p>
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('adminlte::adminlte.verify_email_sent') }}
                    </div>
                @endif

                {{ __('adminlte::adminlte.verify_check_your_email') }}
                {{ __('adminlte::adminlte.verify_if_not_recieved') }},

                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('adminlte::adminlte.verify_request_another') }}</button>.
                </form>
            </div>
        </div>
    </div>
@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @stack('js')
    @yield('js')
@stop
