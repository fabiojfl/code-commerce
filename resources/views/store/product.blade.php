@extends('store.store')
@section('categories')
    @include('store.partial.categories')
@stop
@section('content')

    <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    @if(count($product->images))
                        <img src="{{url('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension)}}" alt="" />
                    @else
                        <img src="{{url('images/no-img.jpg')}}" alt="" />
                    @endif
                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <!--
                            <a href="#"><img src="http://commerce.dev:10088/uploads/10.jpg" alt="" width="80"></a>
                            <a href="#"><img src="http://commerce.dev:10088/uploads/11.jpg" alt="" width="80"></a>
                            <a href="#"><img src="http://commerce.dev:10088/uploads/12.jpg" alt="" width="80"></a>
                            -->
                            @foreach($product->images as $images)
                                <a href="#"><img src="{{ url('uploads/'.$images->id.'.'.$images->extension) }}" alt="" width="80"></a>
                            @endforeach
                        </div>

                    </div>

                </div>

            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->

                    <h2>{{$product->category->name}} :: {{$product->name}}</h2>

                    <p>{{$product->description}}</p>
                                <span>
                                    <span>R$ {{number_format($product->price,2 , "," , ".")}}</span>

                                    <a class="btn btn-fefault cart" href="{{route('store.cart.add',['id' => $product->id])}}">
                                    <i class="fa fa-shopping-cart"></i>
                                            Adicionar no Carrinho
                                        </a>
                                </span>
                </div>
                <!--/product-information-->
            </div>

        </div>
        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li><a href="#tag" data-toggle="tab">Tag</a></li>
                </ul>
            </div>
            <!--
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery1.jpg" alt="" />
                                <h2>$56</h2>
                                <p></p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
               -->
            {{$product->tagList}}
            </div>

        <!--/product-details-->
    </div>



@stop