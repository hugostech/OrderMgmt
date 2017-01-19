@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard <a class="btn btn-primary" href="importExOrder">Import Ex Order</a> </div>

                    <div class="panel-body">
                        {!! Form::open(['url'=>'findProduct']) !!}
                        <div class="form-group">
                            <div class="input-group">
                                {!! Form::text('code',null,['class'=>'form-control']) !!}
                                <span class="input-group-btn">
                                    {!! Form::submit('Find',['class'=>'btn btn-default']) !!}
                                </span>
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
