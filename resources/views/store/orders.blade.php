@extends('store.store')

@section('content')


    <div class="col-sm-9 padding-right">

            <h3>Meus Pedidos</h3>
			<table class="table table-striped">
				<thead>
					<th>ID</th>
					<th>Items</th>
					<th>Valor</th>
					<th>Status</th>
				</thead>
				<tbody>
				@foreach($orders as $order)
					<tr>
						<td>{{$order->id}}</td>
						@foreach($order->items as $item)
							<td>{{$item->product->name}}</td>
						@endforeach
						<td>{{$order->total}}</td>
						<td>{{$order->status}}</td>
					</tr>
				@endforeach	
				</tbody>
			</table>        
    </div>
@stop
