@extends('store.store')
@section('content')
   <section id="cart_items">
      <div class="container">
         <div class="table-condensed cart_info">
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
               @forelse($cart->all() as $k=>$item)
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

                        {!! Form::text('name', $item['qtd'], ['class'=>'form-control']) !!}
                     </td>

                     <td class="cart_total">
                       <p class="cart_total_price">R$ {{$item['price'] * $item['qtd']}}</p>
                     </td>
                     <td class="cart_delete">
                        <a href="{{route('store.cart.destroy', ['id'=>$k ])}}" class="cart_quantity_delete">DELETE</a>
                     </td>
                     <td class="cart_edit">
                        <a class="btn btn-fefault cart" href="{{route('store.cart.edit',['id'=>$k, 'qtd'=> 3 ])}}">EDIT</a>

                     </td>
                  </tr>
                  @empty
                  <tr>
                     <td class="text-center" colspan="7">
                       Carrinho de compras vazio.
                     </td>
                  </tr>
                  @endforelse
                  <tr>
                     <td class="text-center" colspan="7">
                        <div class="pull-right">
                           <span>
                              TOTAL: R$ {{$cart->getTotal()}}
                           </span>
                           <a href="#" class="btn btn-success">fechar a conta</a>
                        </div>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </section>
@stop