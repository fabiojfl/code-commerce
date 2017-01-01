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
                        <div class="login-do">
                            <div id="msgmCep"></div>
                            <div class="login-mail col-md-9">
                                <input type="text" placeholder="CEP" name="cep" id="cep" maxlength="8">
                            </div>
                            &nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn hvr-skew-backward" onclick="getCalcFrete()">
                                Buscar
                            </button>
                        </div>

                        <div class="login-mail">
                            <input type="text" placeholder="Endereço" name="codigo" id="codigo" readonly="readonly">
                            <input type="text" placeholder="valor" name="valor" id="valor" readonly="readonly">
                            <input type="text" placeholder="prazo" name="prazo" id="prazo" readonly="readonly">
                        </div>



                        <!--"erro":{"codigo":0,"mensagem":""}}-->


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
