@extends('app')
@section('content')
    <div class="container">
        <h1>Lista dos produtos com frete  :&nbsp <b>{{$frete->name}}</b></h1>
        <hr>
        <div class="form-group">
            <a href="{{route('admin.products.create_frete', ['id'=>$frete->id])}}" class="btn btn-primary">Novo Frete</a><!-- /.box-header -->
        </div>
        <table class="table">
            <tr>
                <th>Nome do Produto</th>
                <th>CEP ORIGEM</th>
                <th>Action</th>
            </tr>
            @foreach($frete->fretes as $frete)
                <tr>
                    <td>{{$frete->product->name}}</td>
                    <td>
                        {{$frete->cep_origem}}
                    </td>
                    <td>
                        <a href="{{route('admin.products.fretes.destroy', ['id'=> $frete->id])}}">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        <a href="{{ route('admin.products.fretes') }}" class="btn btn-default">Voltar</a>
    </div>

@endsection