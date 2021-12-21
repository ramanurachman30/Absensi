@extends('layouts.main')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Tidak Hadir</h2>
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
            <th>Nama</th>
            <th>Rombel</th>
            <th>Keterangan</th>
            <th>Foto</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($notabsens as $notabsen)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $notabsen->nis }}</td>
            <td>{{ $notabsen->nama }}</td>
            <td>{{ $notabsen->rombel }}</td>
            <td>{{ $notabsen->keterangan }}</td>
            <td>{{ $notabsen->foto }}</td>
            <td>
                <form action="{{ route('notabsens.destroy',$notabsen->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('notabsens.edit',$notabsen->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $notabsens->links() !!}
        
@endsection