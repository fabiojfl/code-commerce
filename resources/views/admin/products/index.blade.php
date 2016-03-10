<ul>
        @foreach($products as $product)
                <li>{{$product->name}}</li>
                <li>{{$product->description}}</li>
                <li>{{$product->price}}</li>
        @endforeach
</ul>