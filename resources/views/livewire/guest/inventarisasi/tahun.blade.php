<x-default-card>
    <x-slot name="title">
        {{__('INVENTARISASI PRODUK HUKUM')}}
    </x-slot>
    <x-slot name="icon">
        <x-heroicon-o-bookmark class="flex-none w-16 h-7 w-7"/>
    </x-slot>
    <x-slot name="content">
        <div class="p-2">
            <table
                class="w-full sm:bg-white rounded-lg overflow-scroll sm:shadow-lg my-5">
                <thead class="">
                <tr class="bg-gray-700 wrap sm:table-row text-xs rounded-l-lg sm:rounded-none mb-2 sm:mb-0 text-white">
                    @foreach($header as $key => $item)

                        <th class="p-3 text-left  h-15 ">{{$item}}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $item)
                    <tr class="wrap sm:table-row text-xs mb-2 sm:mb-0 bg-white">
                        @foreach($item as $i)
                            <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3 truncate">{{$i }}</td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </x-slot>
</x-default-card>
