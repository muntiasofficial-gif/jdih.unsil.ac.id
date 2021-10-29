<div>
    @if($type == "parent")
        @if(@$item->judul)
            <a href="{{route('guest.peraturan.view',['peraturan_id' => $item->id])}}">
                <x-card-view
                    readonly="true"
                    class="col-span-2" :value="$item->status" :title="$item->judul"/>
            </a>
        @endif
        @if(@$item->allParent)
            <x-nested-card-view :item="$item->allParent" type="parent"/>
        @endif
    @endif
    @if($type == "child")
        @foreach($item as $i)
            @if(@$i->judul)
                <a href="{{route('guest.peraturan.view',['peraturan_id' => $i->id])}}">
                    <x-card-view
                        readonly="true"
                        class="col-span-2" :value="$i->status" :title="$i->judul"/>
                </a>
            @endif
            @if(@$i->allParent)
                <x-nested-card-view :item="$i->allChild" type="child"/>
            @endif
        @endforeach
    @endif
</div>
