@extends('app')
@section('content')
    <div class="container">
    <h1>Edit Product: {{$product->name}}</h1>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    <strong>Error:</strong>{{$error}}
                </div>
            @endforeach
        @endif
        {!! Form::model($product, ['route'=>['admin.products.update',$product->id], 'method'=>'put']) !!}

        @include('admin.products._form')

        <div class="form-group">
            {!! Form::label('tags','Tags:') !!}
            {!! Form::textarea('tags', $product->tagList , ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Edit Product',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection