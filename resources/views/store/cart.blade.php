@extends('store.store')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-condensed cart_info">

                    @forelse($cart->all() as $k=>$item)
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Valor</td>
                            <td class="price">Quantidade</td>
                            <td class="price">Total</td>
                            <td class="price" colspan="2"></td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="cart_product">
                                <a href="{{route('store.product',['id' => $k])}}">
                                    imagem
                                </a>
                            </td>
                            <td class="cart_description">
                                <h4>
                                    <a href="#">{{$item['name']}}</a>
                                    <p>Codigo {{ $k }}</p>
                                </h4>
                            </td>
                            <td class="cart_price">
                                R$ {{$item['price']}}
                            </td>

                            <td class="cart_quantity text-center">
                                {!! Form::open(['route'=>['store.cart.update', $k], 'method'=>'put']) !!}
                                <div class="input-group" style="width: 120px">
                                    {!! Form::text('qtd', $item['qtd'], ['class'=>'form-control']) !!}
                                    <span class="input-group-btn">
                                        {!! Form::submit('Alterar', ['class'=>'btn btn-default']) !!}
                                      </span>
                                </div><!-- /input-group -->
                                {!! Form::close() !!}
                            </td>

                            <td class="cart_total">
                                <p class="cart_total_price">R$ {{$item['price'] * $item['qtd']}}</p>
                            </td>
                            <td class="cart_delete">
                                <a href="{{route('store.cart.destroy', ['id'=>$k ])}}" class="cart_quantity_delete">DELETE</a>
                            </td>
                            <td class="cart_edit">

                            </td>
                        </tr>
                        <!-- trabalhando com CEP -->
                        {!! Form::open(['route'=>['store.cart.addfrete', $k], 'method'=>'post']) !!}
                        <tr class="cart_menu">
                            <td colspan="6" class="text-right" style="width: 120px">
                                {!! Form::text('cep',null ,['class'=>'form-control']) !!}
                            </td>
                            <td colspan="7" class="text-right">
                                {!! Form::submit('Pesquisar', ['class'=>'btn btn-default']) !!}
                            </td>
                        </tr>
                        {!! Form::close() !!}

                        <!-- resultado -->
                        <tr class="cart_menu">
                            <td colspan="7" class="text-right" style="width: 120px">
                                resultado
                            </td>
                        </tr>

                        <!-- end com CEP -->
                        <tr class="cart_menu">
                            <td colspan="7">
                                <div class="pull-right">
                                <span style="margin-right: 40px">
                                    TOTAL: R$ {{ $cart->getTotal() }}
                                </span>

                                    <a href="{{ route('store.checkout.place') }}" class="btn btn-success">Fechar a conta</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    @empty
                                <div class="text-center alert">
                                    <h4>CARRINHO DE COMPRAS VAZIO</h4>
                                </div>


                    @endforelse
            </div>
        </div>
    </section>
@stop
