@extends('layouts.app')
@section('content')

</style>
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Laporan
                </div>

                <div class="panel-body" >
                    <table class="table" >
                        <tr>
                            <th>No</th>
                            <th>Nama Laporan</th>
                            <th>Nama File</th>
                            <th>Status</th>
                            <th>Catatan</th>
                            <th>Nama Bidang</th>
                            <td>Aksi</td>
                        </tr>
                        <?php $x=1; ?>
                        @foreach($laporan as $data)
                            <tr>
                                <td>{{ $x++ }}</td>
                                <td>{{ $data->namafile }}</td>
                                <td>{{ $data->file }}</td>
                                <td>{{ $data->status }}</td>
                                <td>{{ $data->catatan }}</td>
                                <td>{{ $data->User->name }}</td>
                                <td>
                                    <a href="{{asset('uploads/'.$data->file)}}"><button class="btn btn-success">View</button></a>
                                    <a href="{{asset('uploads/'.$data->file)}}" download="{{$data->file}}"><button class="btn btn-success">Download</button></a>
                                    <a href="{{url('admin/edit/'.$data->id)}}"><button class="btn btn-primary">Verifikasi</button></a>
                                    <a href="{{url('admin/hapus/'.$data->id)}}"><button class="btn btn-danger">Delete</button></a>
                                    <!-- <form action="{{ url('admin/hapus/'.$data->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit">delete</button>
                                    </form> -->
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
