@extends('app')
@section('content')
    <div class="container">
        <h1>Editing Category: {{$category->name}}</h1>

        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    <strong>Error:</strong>{{$error}}
                </div>
            @endforeach
        @endif
        {!! Form::open(['route'=> ['admin.categories.update',$category->id], 'method'=>'put']) !!}
        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name', $category->name, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description','Description:') !!}
            {!! Form::textarea('description', $category->description, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Category',['class'=>'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection