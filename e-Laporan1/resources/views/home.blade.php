@extends('layouts.app')
{!! Charts::assets() !!}
@section('content')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>{{Auth::user()->name}} Dashboard</strong>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="collapsible" data-collapsible="accordion" style="">
                        @foreach($user as $datauser)
                            <li>
                            
                            <div class="collapsible-header"><i class="material-icons">insert_chart</i>@foreach(DB::table('profils')->where('id',$datauser->id)->get() as $data) {{ $data->nama_lembaga }} @endforeach</div>
                            <div class="collapsible-body"><span>{!! $datauser->nama_lembaga->render() !!}</span></div>
                            <div class="collapsible-body">
                                    <table class="table">
                                        <tr>
                                            <td>Belum Direncanakan</td>
                                            <td>{{ DB::table('renlakgiats')->where('users_id',$datauser->users_id)->where('status',(NULL))->count() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Belum Berjalan</td>
                                            <td>{{ DB::table('renlakgiats')->where('users_id',$datauser->id)->where('status','Belum Berjalan')->count() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Sedang Berjalan</td>
                                            <td>{{ DB::table('renlakgiats')->where('users_id',$datauser->id)->where('status','Sedang Berjalan')->count() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Sudah Selesai</td>
                                            <td>{{ DB::table('renlakgiats')->where('users_id',$datauser->id)->where('status','Sudah Selesai')->count() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Renlakgiat</td>
                                            <td>{{ DB::table('renlakgiats')->where('users_id',$datauser->id)->count() }}</td>
                                        </tr>
                                    </table>
                                </div>
                            
                            </li>
                        @endforeach
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
