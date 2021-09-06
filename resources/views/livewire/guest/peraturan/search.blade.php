<div>

    <div class="bg-white shadow sm:rounded-lg p-5">
        <form action="{{route('guest.peraturan')}}" method="get">
            <div class="md:grid md:gap-2 grid-cols-3 ">
                <x-default-input placeholder='Cari peraturan perundang-undangan bidang pendidikan dan kebudayaan'
                                 class="col-span-3" nama="judul" type="text" title="Judul"/>
                <x-default-select :option="\App\Models\Kategori::all()->pluck('keterangan','id')->prepend('Pilih',' ')"
                                  name="subjek_id" title="Kategori"/>
                <x-default-select :option="\App\Models\Peraturan::tahun()->prepend('Pilih',' ')" name="tahun"
                                  title="Tahun"/>
                <x-default-select
                    :option="\App\Models\JenisPeraturan::all()->pluck('keterangan','id')->prepend('Pilih',' ')"
                    name="jenis_peraturan_id" title="Jenis"/>
                <x-default-select :option="\App\Models\Peraturan::status()->prepend('Pilih',' ')" name="status"
                                  title="Status"/>
                <x-default-input title="Nomor" nama="nomor_peraturan" type="text"/>
            </div>
            <div class="text-right">
                <x-jet-secondary-button type="button" wire:click="reset">Reset</x-jet-secondary-button>
                <x-jet-button> Cari</x-jet-button>
            </div>
        </form>
    </div>
</div>
