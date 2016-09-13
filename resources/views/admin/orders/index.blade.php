@extends('app')
@section('content')
    <div class="container">
            <h1> Lista dos últimos Pedidos</h1>
            <table class="table">
                <tr>
                	<th>Data e Horário</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach($orders as $order)
                    <tr>
                    	<td>{{$order->updated_at}}</td>
                    	<td>{{$order->id}}</td>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->status}}</td>
                        <td>
                        <a href="{{ route('admin.orders.edit_status',['id'=> $order->id]) }}">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        {!! $orders->render() !!}
    </div>
@endsection()
