@extends('layouts.app')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add new</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="http://localhost:8000/user-page"> Back</a>
            </div>
        </div>
    </div>
    <br>  
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <form action="{{ route('absens.store') }}" method="POST" style="width: 60rem" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nis</strong>
                        <input type="number" name="nis" id="nis" class="form-control" placeholder="Nis">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jam Kedatangan</strong>
                        <input type="time" name="jam_kedatangan" id="jam_kedatangan" class="form-control" placeholder="Jam Kedatangan">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jam Kepulangan</strong>
                        <input type="time" name="jam_kepulangan" id="jam_kepulangan" class="form-control" placeholder="Jam Kepulangan">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Keterangan</strong>
                        <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Foto</strong>
                        <input type="file" name="foto" id="foto" class="form-control" placeholder="Foto">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            
        </form>
@endsection