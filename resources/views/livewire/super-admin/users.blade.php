<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengguna') }}
        </h2>
    </x-slot>
    {{-- <div>
        <h3 class="mt-3 text-lg font-medium leading-6 text-gray-900 ml-4"> Jenis Pengguna</h3>
        <p class="mt-0 text-sm text-gray-600 ml-4 mb-0">Konfigurasi Jenis Pengguna</p>
    </div> --}}
        <div class="mx-auto sm:px-6 lg:px-8 ">
            <div class="hidden sm:block" aria-hidden="true">
                <div class="py-5">
                    <div class="border-t border-gray-200"></div>
                </div>
            </div>
            <div class="mt-5 sm:mt-0">
                <div class="md:grid md:grid-cols-4 md:gap-6">
                    <div class="md:col-span-1 min-w-0">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-3 bg-white border-b border-gray-200">
                                <div>
                                    <x-default-input type="text" nama="name" title="Pencarian Pengguna"/>
                                </div>
                                <div class="text-right mt-3">
                                    @livewire('super-admin.users.add', key('user-add'))
                                    @livewire('super-admin.users.edit', key('user-edit'))
                                   {{-- @livewire('super-admin.users.add', key('user-roles'))--}}
                                </div>
                                <div class="mt-14 rounded-lg border border-blue-200 bg-blue-50 p-4">
                                    <div class="flex items-start gap-3">
                                        <div class="text-blue-600 text-xl"></div>
                                        <div>
                                            <h3 class="font-semibold text-blue-800">Informasi Halaman</h3>
                                            <p class="mt-1 text-sm text-blue-700">
                                                Anda dapat mencari, menambahkan, mengubah, dan mengelola data pengguna serta hak aksesnya pada halaman ini
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <h3 class="text-lg font-medium leading-6 text-gray-900">Pengguna</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                pengaturan pengguna
                            </p> --}}
                        </div>
                    </div>
                    <div class="md:col-span-3 min-w-0">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            @if ($table->count() > 0)
                                <div class="table-scroll">
                                    <table class="w-full bg-white rounded-lg overflow-hidden">
                                        <thead>
                                            <tr class="bg-array-700 text-xs text-white">
                                                <th class="p-3 text-left h-15">No</th>
                                                <th class="p-3 text-left h-15">Nama</th>
                                                <th class="p-3 text-left h-15">Role</th>
                                                <th class="p-3 text-left h-15">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($table as $key => $item)
                                                <tr class="text-xs bg-white">
                                                    <td class="border-gray-light border-t-2 h-15 hover:bg-array-100 p-3">{{ $key + 1 }}</td>
                                                    <td class="border-gray-light border-t-2 h-15 hover:bg-array-100 p-3">
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0">
                                                                <a href="#" class="block relative">
                                                                    <img style="width: 40px; height: 40px; border-radius: 0.5rem;" src="{{ $item->profile_photo_url }}" alt="profil"/>
                                                                </a>
                                                            </div>
                                                            <div class="ml-3">
                                                                <p class="text-gray=900 whitespace-no-warp">{{ $item->name }}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="border-gray-light border-t-2 h-15 hover:bg-array-100 p-3">
                                                        @livewire('super-admin.change-role', ['user_id' => $item->id], key('edit-role-' .$item->id))
                                                    </td>
                                                    <td class="border-gray-light border-t-2 h-15 hover:bg-array-100 p-3">
                                                        <div class="flex flex-warp items-center gap-2">
                                                            <button type="button" x-data x-on:click="$dispatch('open-reset-password-{{$item->id}}')">Reset Password</button>
                                                            <span>|</span>
                                                            <button type="button" wire:click="$emit('editUser', {{ $item->id }})" class="text-blue-600 hover:underline">Edit</button>
                                                            <span>|</span>
                                                            
                                                            <button type="button" x-data x-on:click="$dispatch('open-delete-user-{{$item->id}}')" class="text-red-600">Delete</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                <div class="flex flex-row mb-1 sm:mb-0 justify-between mt-3 w-full text-center">
                                    <div class="mx-auto p-4">Tidak ada data</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ini buat card notif ya sampe endforeach --}}

        @foreach ($table as $key => $item)
<div x-data="{ show:false }"
            x-on:open-delete-user-{{$item->id}}.window="show = true" 
            x-on:keydown.escape.window="show = false"
            x-show="show"
            x-cloak
            style="display: none;" >
        <div class="fixed inset-0 z-50 bg-gray-500" style="opacity: 0.75;" x-on:click="show = false"></div>
    <div class="fixed z-50 bg-white rounded-lg shadow-xl overflow-hidden" 
        style="top: 50% !important;
                left: 50% !important;
                transform: translate(-50%, -50%) !important;
                width: calc(100% - 2rem) !important;
                max-width: 32rem !important;
                margin: 0 !important;">
            <div class="px-6 py-4">
                <div class="text-lg font-medium text-gray-900">Hapus Pengguna</div>
                <div class="mt-4 text-sm text-gray-600">Apakah anda yakin akan menghapus: <strong class="font-semibold text-gray-900">{{ $item->name }}</strong>?</div>
            </div>
    
        <div class="px-6 py-4 bg-gray-100">
            <div class="flex items-center justify-end gap-2">
                <button type="button" class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm text-gray-700" x-on:click="show = false">Cancel</button>
                <button type="button" class="px-4 py-2 bg-red-600 text-white rounded-md text-sm" wire:click="removeUser({{ $item->id }})" wire:loading.attr="disabled" x-on:click="show = false">Delete</button>
            </div>
        </div>
    </div>
</div>
            
        @endforeach

        @foreach ($table as $key => $item)
        <div x-data="{ show:false }" x-on:open-reset-password-{{$item->id}}.window="show = true" x-on:keydown.escape.window="show = false" x-show="show" x-cloak style="display: none;">
            <div class="fixed inset-0 z-50 bg-gray-500" style="opacity: 0.75;" x-on:click="show = false"></div>
            <div class="fixed z-50 bg-white rounded-lg shadow-xl overflow-hidden" 
            style="top: 50% !important;
                    left: 50% !important;
                    transform: translate(-50%, -50%) !important;
                    width: calc(100% - 2rem) !important;
                    max-width: 32rem !important;
                    margin: 0 !important;">
            <div class="px-6 py-4">
                <div class="text-lg font-medium text-gray-900">Reset Password</div>
                <div class="mt-4 text-sm text-gray-600">Apakah anda yakin akan mereset password: <strong class="font-semibold text-gray-900">{{ $item->name }}</strong>?</div>
            </div>
        <div class="px-6 py-4 bg-gray-100">
            <div class="flex items-center justify-end gap-2">
                <button type="button" class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm text-gray-700" x-on:click="show = false">Cancel</button>
                <button type="button" class="px-4 py-2 bg-red-600 text-white rounded-md text-sm" wire:click="resetPassword({{ $item->id }})" wire:loading.attr="disabled" x-on:click="show = false">Reset password</button>
            </div>
        </div>
    </div>
</div>
            
        @endforeach
    {{--sampe sini ya--}}

        @if ($user_id)
            <x-jet-dialog-modal wire:model="editable">
                <x-slot name="title" {{ __('Edit User :') }} {{ \App\Models\User::find($user_id)->name }}></x-slot>
                <x-slot name="content" @livewire('default-component.profile', ['user_id' => $user_id], key('user-profile-'.$user_id))></x-slot>
                <x-slot name="footer"></x-slot>
            </x-jet-dialog-modal>
        @endif

    <style>
        html,
        body {
            height: 100%;
            overflow: hidden;
        }

        .table-scroll {
            height: 345px;
            overflow-y: auto;
            overflow-x: auto; 
        }

        .table-scroll table {
            display: table;
            width: 100%;
            table-layout: auto;
        }

        .table-scroll thead{
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .table-scroll th {
            background-color: #374151;
        }

        .table-scroll th:not(:last-child) {
            border-bottom: 0;
        }

        .table-scroll th:not(:last-child) {
            border-bottom: 2px solid rgba(0, 0, 0, .1);
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</div>
