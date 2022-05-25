<div>
    <input wire:model="search" type="text" name="search" id="" list="mylist" placeholder="Aramak ">
    @if($query)
        <datalist id="mylist" >
            @foreach($datalist as$rs)
                <option value="{{ $rs->title }}">{{ $rs->category->title }}</option>
            @endforeach
        </datalist>
    @endif


</div>