<ul>
@foreach($categories as $category)
    <li>{{$category->name}}</li>
    <li>{{$category->description}}</li>
@endforeach
</ul>