@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Profil UPTD</div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{url('admin/renlakgiat/simpan/')}}" method="POST"  enctype="multipart/form-data">
                    	{{ csrf_field() }}
                               
                                <div class="form-group{{ $errors->has('users_id') ? 'has-error': ''}}">
                                    
                                        <div class="col-md-6">
                                        @foreach($user as $data)
                                            <input type="hidden" name="users_id" id="users_id" class="form-control" value="{{ $data->users_id }}" readonly required>
                                        @endforeach
                                        </div>
                                   
                                         @if ($errors->has('users_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('users_id') }}</strong>
                                            </span>
                                        @endif
                                </div>

                    		    <div class="form-group{{ $errors->has('kejuruan') ? 'has-error': ''}}">
                                    <label for="kejuruan" class="col-md-4 control-label">Kejuruan</label>
                                        <div class="col-md-6">
                                            <input type="text" name="kejuruan" id="kejuruan" class="form-control" required>
                                        </div>

                                         @if ($errors->has('kejuruan'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('kejuruan') }}</strong>
                                            </span>
                                        @endif
                                </div>
                    			<div class="form-group{{ $errors->has('program_pelatihan') ? 'has-error': ''}}">
                                    <label for="program_pelatihan" class="col-md-4 control-label">Program Pelatihan</label>
                                        <div class="col-md-6">
                                            <input type="text" name="program_pelatihan" id="program_pelatihan" class="form-control" required>
                                        </div>

                                         @if ($errors->has('program_pelatihan'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('program_pelatihan') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="form-group{{ $errors->has('sumber_dana') ? 'has-error': ''}}">
                                    <label for="sumber_dana" class="col-md-4 control-label">Sumber Dana</label>
                                        <div class="col-md-6">
                                            <input type="text" name="sumber_dana" id="sumber_dana" class="form-control" required>
                                        </div>

                                         @if ($errors->has('sumber_dana'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('sumber_dana') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="form-group{{ $errors->has('paket') ? 'has-error': ''}}">
                                    <label for="paket" class="col-md-4 control-label">Paket</label>
                                        <div class="col-md-6">
                                            <input type="text" name="paket" id="paket" class="form-control" required>
                                        </div>

                                         @if ($errors->has('paket'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('paket') }}</strong>
                                            </span>
                                        @endif
                                </div>   
                    	<div class="form-group">
                    		<div class="col-md-8 col-md-offset-4">
                    			<button class="btn btn-success">Simpan</button>
                    		</div>
                    	</div>
                   		
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
