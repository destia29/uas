@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin</div>
                <h1>
                    SELAMAT DATANG ADMIN
                </h1>
                <table border="1">
                  <tr>
                    <th>nomor</th>
                    <th>nama user</th>
                    <th>email user</th>
                    <th>Admin</th>
                    <th>Aksi</th>
                  </tr>
                  @foreach($user as $users)
                  <tr>
                    <td>{{ $users -> id}}</td>
                    <td>{{ $users -> name}}</td>
                    <td>{{ $users -> email}}</td>
                    <td>{{ $users -> admin}}</td>
                    <td>
                        <form action="{{route('dashboard.hapus',[$users->id])}}" method="post">
                          {{csrf_field()}}
                          {{method_field('DELETE')}}
                          <button type="submit" name="button">Hapus</button>
                          </form>
                      <!-- <a href="{{route('dashboard.hapus',[$users->id])}}">Hapus</a></td> -->
                  </tr>
                  @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
