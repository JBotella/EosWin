@extends('layouts.app')
@section('content')
<div class="container p-0">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card contenedorLogin">
                <div class="card-header cabeceraLogin">
					<img src="{!! asset('theme/img/logoEosWin_nv_pq.png') !!}">
					<span class="mt-2">{{ __('Verify Your Email Address') }}</span>
				</div>

                <div class="card-body cuerpoLogin">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
