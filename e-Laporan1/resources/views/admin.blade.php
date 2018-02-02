@extends('layouts.app')
{!! Charts::assets() !!}
@section('content')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($user as $datauser)
                    <div class="progress">
                        <div class="determinate" style="width: 100%">
                        </div>
                    </div>
                     {!! $datauser->nama_lembaga->render() !!}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
