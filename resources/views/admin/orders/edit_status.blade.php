@extends('app')
@section('content')
    <div class="container">
        <h1>Editing Status: {{$order->status}}</h1>
        {!! Form::open(['route'=> ['admin.orders.update_status',$order->id], 'method'=>'put']) !!}
            <div class="form-group">
    			{!! Form::label('status','Altere o Status:') !!}
    			<?php 
					  
					$liststatus = [
					"Pagamento Aprovado" 			=> "Pagamento Aprovado",
					"Pagamento não Aprovado" 		=> "Pagamento não Aprovado",
					"Processo de entrega" 			=> "Processo de entrega",
					"Pedido finalizado" 			=> "Pedido realizado com sucesso",
					];
    				?>
    			{!! Form::select('status', $liststatus, ['class'=>'form-control']) !!}
			</div>        
        <div class="form-group">
            {!! Form::submit('Atualizar Status',['class'=>'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection
