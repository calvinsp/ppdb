@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h6>Welcome Back {{ Auth::user()->name }}</h6>
                    <br>
                    <div class="row">
                        <span>Profile User</span>
                        <div class="col">
                            <ul class="data-diri" style="list-style-type:none;">
                                <li>Nama : <b>{{ Auth::user()->name }}</b></li>
                                <li>Email : <b>{{ Auth::user()->email }}</b></li>
                                <li>Tanggal Join : <b>{{ Auth::user()->created_at }}</b></li>
                                <li>Status : <b>{{ Auth::user()->status_seleksi }}</b></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
