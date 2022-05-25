
<ul>
    @foreach($children as $subcategory)
        @if(count($subcategory->children))
        <li><a class="drop" href="#" onclick="return false;">{{ $subcategory->title }}</a>
            @include("home.categoryTree",[
                                'children'=>$subcategory->children
                            ])
        </li>

        @else
    <li><a href="{{ route("category",['id'=>$subcategory->id,'slug'=>$subcategory->slug]) }}">{{ $subcategory->title }}</a></li>
        @endif
    @endforeach
</ul>
