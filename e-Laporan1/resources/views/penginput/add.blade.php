@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Laporan Bidang {{Auth::user()->name}}</div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{route('penginput.upload')}}" method="POST"  enctype="multipart/form-data">
                    	{{ csrf_field() }}
                    	
                    		
                    			<div class="form-group{{ $errors->has('namafile') ? 'has-error': ''}}">
	                				<label for="namafile" class="col-md-4 control-label">Nama Laporan</label>
		                				<div class="col-md-6">
		                					<input type="text" name="namafile" id="namafile" class="form-control" value="{{ old('namafile') }}">
		                				</div>

		                				 @if ($errors->has('namafile'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('namafile') }}</strong>
		                                    </span>
		                                @endif
	                    		</div>
	                    		<div class="form-group{{ $errors->has('file')}}">
	                    			<label for="file" class="col-md-4 control-label" id="file">File</label>
		                    			<div class="col-md-6">
		                    				<input type="file" name="file" id="file">
		                    			</div>
		                    			@if ($errors->has('file'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('file') }}</strong>
		                                    </span>
		                                @endif
                    			</div>
                    		
                  
                    	<div class="form-group">
                    		<div class="col-md-8 col-md-offset-4">
                    			<button class="btn btn-success">Upload</button>
                    		</div>
                    	</div>
                   		
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
