@extends('layouts.main')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Siswa</h2>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Email Verified</th>
            <th>Password</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $users)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $users->nis }}</td>
            <td>{{ $users->nama }}</td>
            <td>{{ $users->email }}</td>
            <td>{{ $users->email_verified_at }}</td>
            <td>{{ $student->password }}</td>
            <td>
                <form action="{{ route('users.destroy',$users->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $users->links() !!}
        
@endsection