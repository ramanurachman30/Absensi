@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary">
                {{-- <div class="text-center card-header">{{ __('Selamat Datang') }}  {{ Auth::user()->name }}</div> --}}
                <div class="text-center card-header mb-2 border-primary bg-primary text-light" style="height: 5rem">
                    <p>{{ __('SELAMAT DATANG') }}  {{ Auth::user()->name }}</p>
                    <p>{{ __('SILAHKAN ISI KEHADIRAN TERLEBIH DAHULU !') }}</p>
                </div>

                <div class="card-body mb-5" style="height: 3rem">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3 class="text-center"></h3>
                    <center>
                        <a class="btn btn-primary" href="{{ route('absens.create') }}">Datang</a>
                        <a class="btn btn-danger" href="{{ route('notabsens.create') }}">Tidak</a>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

