@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Fotocopy Sertifikasi Peserta</div>
                <div class="panel-body">
                    {!! Form::model($renlakgiat,['files'=>true,'url'=>'admin/renlakgiat/laporan/fsp/simpan/'.$renlakgiat->id,'class'=>'form-horizontal','enctype' => 'multipart/form-data']) !!}
                                <div>
                                    {!! Form::hidden('id',null) !!}
                                </div>
                                
                                <div class="form-group{{ $errors->has('status_fotocopy_sertifikasi_peserta') ? 'has-error': ''}}">
                                    <label for="status_fotocopy_sertifikasi_peserta" class="col-md-4 control-label">Status Fotocopy Sertifikasi Peserta</label>
                                        <div class="col-md-6">
                                           {!! Form::select('status_fotocopy_sertifikasi_peserta',array('Belum Terverifikasi' => 'Belum Terverifikasi','Revisi' => 'Revisi','Terverifikasi' => 'Terverifikasi') ,null,['class'=>'form-control','placeholder'=>'Status surat_keputusan']) !!}
                                        </div>

                                         @if ($errors->has('status_fotocopy_sertifikasi_peserta'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('status_fotocopy_sertifikasi_peserta') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="form-group{{ $errors->has('catatan_fotocopy_sertifikasi_peserta') ? 'has-error': ''}}">
                                    <label for="catatan_fotocopy_sertifikasi_peserta" class="col-md-4 control-label">catatan Fotocopy Sertifikasi Peserta</label>
                                        <div class="col-md-6">
                                            {!! Form::textarea('catatan_fotocopy_sertifikasi_peserta',null,['class'=>'form-control']) !!}
                                        </div>
                                         @if ($errors->has('catatan_fotocopy_sertifikasi_peserta'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('catatan_fotocopy_sertifikasi_peserta') }}</strong>
                                            </span>
                                        @endif
                                </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button class="btn btn-success">Update</button>
                            </div>
                        </div>
                        
                    {!! Form::close() !!}
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
