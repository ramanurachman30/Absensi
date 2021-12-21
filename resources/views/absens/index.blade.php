@extends('layouts.main')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Absen</h2>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered mr-3" style="width: 70rem">
        <tr>
            <th>No</th>
            <th>Nis</th>
            <th>Jam Kedatangan</th>
            <th>Jam Kepulangan</th>
            <th>Keterangan</th>
            <th>Foto</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($absens as $absen)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $absen->nis }}</td>
            <td>{{ $absen->jam_kepulangan }}</td>
            <td>{{ $absen->jam_kepulangan }}</td>
            <td>{{ $absen->keterangan }}</td>
            <td>{{ $absen->foto }}</td>
            <td>
                <form action="{{ route('absens.destroy',$absen->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('absens.edit',$absen->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $absens->links() !!}
        
@endsection