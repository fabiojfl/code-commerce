@extends('app')
@section('content')
    <div class="container">
        <h1>Product image list:&nbsp <b>{{$product->name}}</b></h1>
        <hr>
        <div class="form-group">
            <a href="{{route('admin.products.create_image', ['id'=>$product->id])}}" class="btn btn-primary">New image</a><!-- /.box-header -->
        </div>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Extension</th>
                <th>Action</th>
            </tr>
            @foreach($product->images as $image)
                <tr>
                    <td>{{$image->id}}</td>
                    <td>
                        <img src="{{ url('uploads/'.$image->id.'.'.$image->extension) }}" width="80">
                    </td>
                    <td>{{$image->extension}}</td>
                    <td>
                        <a href="{{route('admin.products.images.destroy', ['id'=>$image->id])}}">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        <a href="{{ route('admin.products.index') }}" class="btn btn-default">Voltar</a>
    </div>

@endsection