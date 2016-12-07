@extends('app')
@section('content')
    <div class="container">
    <h1>CEP DE ORIGEM DO PRODUTO </h1>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    <strong>Error:</strong>{{$error}}
                </div>
            @endforeach
        @endif
        {!! Form::open(['route'=>['admin.products.fretes.store', $frete->id],'method'=>'post','enctype'=>"multipart/form-data"]) !!}

		<div class="form-group">
		<!-- opções: `sedex`, `sedex_a_cobrar`, `sedex_10`, `sedex_hoje`, `pac`, 'pac_contrato', 'sedex_contrato' , 'esedex' -->
            {!! Form::label('tipo','Tipo:') !!}
			{!!  Form::select('tipo', $tipo) !!}
        </div>
		<div class="form-group">
            {!! Form::label('Formato','formato:') !!}
			{!!  Form::select('formato', $formato) !!}
        </div>
        <div class="form-group">
            {!! Form::label('cep_origem','CEP:') !!}
            {!! Form::text('cep_origem', null, ['class'=>'form-control']) !!}
        </div>
		<div class="form-group">
            {!! Form::label('peso','Peso:') !!}
            {!! Form::text('peso', null, ['class'=>'form-control']) !!}
        </div>
		<div class="form-group">
            {!! Form::label('comprimento','Comprimento:') !!}
            {!! Form::text('comprimento', null, ['class'=>'form-control']) !!}
        </div>
		<div class="form-group">
            {!! Form::label('altura','Altura:') !!}
            {!! Form::text('altura', null, ['class'=>'form-control']) !!}
        </div>
		<div class="form-group">
            {!! Form::label('largura','Largura:') !!}
            {!! Form::text('largura', null, ['class'=>'form-control']) !!}
        </div>
		<div class="form-group">
            {!! Form::label('diametro','Diametro:') !!}
            {!! Form::text('diametro', null, ['class'=>'form-control']) !!}
        </div>		
        <div class="form-group">
            {!! Form::submit('Frete do produto',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection