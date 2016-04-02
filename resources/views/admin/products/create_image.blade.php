@extends('app')
@section('content')
    <div class="container">
    <h1>Upload Image</h1>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    <strong>Error:</strong>{{$error}}
                </div>
            @endforeach
        @endif
        {!! Form::open(['route'=>['admin.products.images.store', $product->id],'method'=>'post','enctype'=>"multipart/form-data"]) !!}

        <div class="form-group">
            {!! Form::label('image','Image:') !!}
            {!! Form::file('image', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Upload Image',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection