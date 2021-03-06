@extends('app')
@section('content')
        <div class="container">
                <h1>Product list</h1>
                <hr>
                <div class="form-group">
                        <a href="{{route('admin.products.create')}}" class="btn btn-primary">Create new Product</a><!-- /.box-header -->
                </div>
                <table class="table">
                        <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Action</th>
                        </tr>
                        @foreach($products as $product)
                        <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->name}}</td>
                                <td><b>R$</b>&nbsp;{{ number_format($product->price, 2) }}</td>
                                <td>
                                        <a href="{{ route('admin.products.edit',['id'=> $product->id]) }}">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('admin.products.images',['id'=> $product->id]) }}">
                                                <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('admin.products.destroy',['id'=> $product->id]) }}">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </a>
										<a href="{{ route('admin.products.fretes',['id'=> $product->id]) }}">
                                                <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                        </a>
                                </td>
                        </tr>
                        @endforeach
                </table>
                {!! $products->render() !!}
        </div>

@endsection
