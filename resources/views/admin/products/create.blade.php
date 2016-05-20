@extends('app')
@section('content')
    <div class="container">
    <h1>Create new Product</h1>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    <strong>Error:</strong>{{$error}}
                </div>
            @endforeach
        @endif
        {!! Form::open(['route'=>'admin.products.store','method'=>'post']) !!}

        @include('admin.products._form')

        <div class="form-group">
            {!! Form::label('tags','Tags:') !!}
            {!! Form::textarea('tags', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Product',['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection