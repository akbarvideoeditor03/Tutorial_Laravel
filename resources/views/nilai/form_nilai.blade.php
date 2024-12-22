@extends('layouts.app');
@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ $title_form }}
                    </div>
                    <div class="card-body">
                        {!! Form::model($nilai, ['route' => $route, 'method' => $method]) !!}
                        @csrf
                        <div class="form-group">
                            <label for="my-input">Nama</label>
                            {!! Form::text('nama', null, ['class'=>'form-control']) !!}
                            <span class="text-helper">{{ $errors->first('nama') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Nilai UTS</label>
                            {!! Form::number('nilai_uts', null, ['class'=>'form-control']) !!}
                            <span class="text-helper">{{ $errors->first('nilai_uts') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Nilai UAS</label>
                            {!! Form::number('nilai_uas', null, ['class'=>'form-control']) !!}
                            <span class="text-helper">{{ $errors->first('nilai_uas') }}</span>
                        </div>
                        <div class="form-group">
                            {!! Form::submit($submit_button, ['class'=>'btn btn-primary']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

