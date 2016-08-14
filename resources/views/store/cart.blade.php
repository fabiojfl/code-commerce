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
                        <td class="price">Price</td>
                        <td class="price">Qtd</td>
                        <td class="price">Total</td>
                        <td class="price"></td>
                  </tr>
               </thead>
               <tbody>
               @foreach($cart->all as $k=>$item)
                  <tr>
                     <td class="cart_product">
                        <a href="#">
                           imagem
                        </a>
                     </td>
                     <td class="cart_description">
                        <h4>
                           <a href="#">{{$item['name']}}</a>
                           <p>Codigo {{ $k }}</p>
                        </h4>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </section>
@stop