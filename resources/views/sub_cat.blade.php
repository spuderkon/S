@php
    $i++;
    @endphp
    @foreach($subcategories as $subcategory)
    
    <div class="category__item category__depth_{{$i}}"><a class="link" href="/scoped/{{$subcategory->Category_id}}/{{$subcategory->Name}}">{{$subcategory->Name}}</a></div>
    @if(count($subcategory->subcategory))
    @include('sub_cat',['subcategories' => $subcategory->subcategory])
    
    @endif

    @endforeach