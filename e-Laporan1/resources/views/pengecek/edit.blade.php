@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Laporan Bidang {{Auth::user()->name}}</div>
                <div class="panel-body">
                    @foreach($laporan as $data)
                    <form class="form-horizontal" action="{{url('admin/update/'.$data->id)}}" method="POST"  enctype="multipart/form-data">
                    	{{ csrf_field() }}
                    	
                    		    <div class="form-group{{ $errors->has('namafile') ? 'has-error': ''}}">
                                    <label for="namafile" class="col-md-4 control-label">Nama Laporan</label>
                                        <div class="col-md-6">
                                            <input type="text" name="namafile" id="namafile" class="form-control" value="{{ $data->namafile }}" readonly>
                                        </div>

                                         @if ($errors->has('namafile'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('namafile') }}</strong>
                                            </span>
                                        @endif
                                </div>
                    			<div class="form-group">
	                				<label class="col-md-4 control-label">Status Sebelumnya</label>
		                				<div class="col-md-6">
		                					<input type="text" class="form-control" value="{{ $data->status }}" readonly>
		                				</div>
	                    		</div>
                                <div class="form-group">
                                    <label for="status" class="col-md-4 control-label">Status yang akan diberikan</label>
                                        <div class="col-md-6">
                                            <select name="status" id="status" required class="form-control">
                                                <option value="Fix">Fix (Tidak Ada Revisi)</option>
                                                <option value="Revisi">Revisi Laporan</option>
                                            </select>
                                        </div>
                                </div>
	                    		<div class="form-group{{ $errors->has('catatan')}}">
	                    			<label for="catatan" class="col-md-4 control-label" id="catatan">Catatan Revisi</label>
		                    			<div class="col-md-6">
		                    				<textarea name="catatan" id="catatan" class="form-control" >{{$data->catatan}}</textarea>
		                    			</div>
		                    			@if ($errors->has('catatan'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('catatan') }}</strong>
		                                    </span>
		                                @endif
                    			</div>
                    		
                  
                    	<div class="form-group">
                    		<div class="col-md-8 col-md-offset-4">
                    			<button class="btn btn-success">Simpan</button>
                    		</div>
                    	</div>
                   		
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
