@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Renlakgiat

                </div>

                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Kejuruan</th>
                            <th>Program Pelatihan</th>

                            <th>Aksi</th>
                            
                        </tr>
                        <?php $x=1; ?>
                        @foreach($renlakgiat as $data)
                            <tr>
                                <td>{{ $x++ }}</td>
                                <td>{{ $data->kejuruan }}</td>
                                <td>{{ $data->program_pelatihan }}</td>
                                
                                <td>
                                    <a href="{{url('uptd/renlakgiat/edit/'.$data->id)}}"><button class="btn btn-warning">Edit</button></a>
                                    <a href="{{url('uptd/pktp/'.$data->id)}}"><button class="btn btn-primary">Data PKTP</button></a>
                                    <a href="{{url('uptd/pktp/tambah/'.$data->id)}}"><button class="btn btn-primary">Tambah PKTP</button></a>
                                    <a href="{{url('uptd/laporan/detail/'.$data->id)}}"><button class="btn btn-info">Detail</button></a>
                                </td>
                                
                        @endforeach
                    </table>
                </div>
            </div>
        
    </div>
</div>
@endsection
