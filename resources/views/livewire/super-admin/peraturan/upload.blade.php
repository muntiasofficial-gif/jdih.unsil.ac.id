<div class="float-right text-left ml-1">
    <x-jet-button wire:click="$toggle('modal')">import excel</x-jet-button>
    {{-- In work, do what you enjoy. --}}
    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
        </x-slot>
        <x-slot name="content">
            @if($errorMessage)
                <x-jet-banner style="danger" :message="$errorMessage"/>
            @endif
            <div class="grid grid-cols-3">
                <x-default-input class="col-span-2"
                                 nama="excel" title="File"
                                 :accept="'.xlsx'"
                                 type="file"
                                 change="getData"/>
                <div class="py-6">
                    <x-jet-button wire:click="getData">preview</x-jet-button>
                    <x-jet-button class="bg-blue-500" wire:click="download">Format Upload Excel</x-jet-button>
                </div>
            </div>
            <div class="w-full overflow-x-scroll">
            @if($data)
                <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex flex-col">
                        <div class="-my-2 sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            @foreach($headerPreview as $item)
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    {{$item}}
                                                </th>
                                            @endforeach

                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">

                                        @foreach($data[0] as $item)
                                            <tr>
                                                @foreach($item as $i)
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        {!! $i !!}
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                        <tr>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modal',false)">close</x-jet-secondary-button>
            @if($excel)
                <x-jet-button wire:click="save">simpan</x-jet-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>
</div>
