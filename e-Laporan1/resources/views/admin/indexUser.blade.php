@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Profile UPTD
                    <a href="{{route('admin.user.add')}}" class="pull-right"><span class="medium material-icons">person_add</span></a>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                        <?php $x=1; ?>
                        @foreach($user as $data)
                            <tr>
                                <td>{{ $x++ }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>
                                    <a href="{{url('admin/user/edit/'.$data->id)}}"><button class="btn btn-primary" title="Edit"><i class="large material-icons">edit</i></button></a>
                                    <a href="{{url('admin/user/hapus/'.$data->id)}}"><button class="btn btn-danger" title="Hapus"><i class="large material-icons">delete</i></button></a>
                                </td> 
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        
    </div>
</div>
@endsection