@extends('app')
@section('content')
    <div class="container">

            <h1> Categories</h1>
        <hr>
        <div class="form-group">
            <a href="{{route('admin.categories.create')}}" class="btn btn-primary">Create new Category</a><!-- /.box-header -->
        </div>
        <br>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td>
                        <a href="{{ route('admin.categories.destroy',['id'=> $category->id]) }}">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                        <a href="{{ route('admin.categories.edit',['id'=> $category->id]) }}">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                        </td>
                    </tr>
                @endforeach
            </table>

    </div>
@endsection()