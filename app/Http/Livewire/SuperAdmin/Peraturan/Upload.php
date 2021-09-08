<?php

namespace App\Http\Livewire\SuperAdmin\Peraturan;

use App\Exports\ExampleImportPeraturan;
use App\Imports\ImportPeraturan;
use App\Models\JenisPeraturan;
use App\Models\Kategori;
use App\Models\Peraturan;
use App\Models\TipePeraturan;
use App\Repository\SuperAdmin\Peraturan\PeraturanRepo;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Upload extends Component
{
    use WithFileUploads, AttributeUploadExcel;

    public $modal = false;
    public $excel;
    public $data;
    public $tempData;
    public $errorMessage = false;
    protected $rules = [
        'excel' => 'required|file|mimes:xlsx|max:102400'
    ];
    public $headerPreview;

    public function mount()
    {
        $this->headerPreview = $this->attribute;
    }

    public function getData()
    {
        $data = $this->validate();
        $url = $this->excel->store('excel');
        if ($url) {
            $this->tempData = Excel::toArray(new ImportPeraturan(), $url);
            $this->prepare($this->tempData);
        }
    }

    public function download()
    {
        return Excel::download(new ExampleImportPeraturan(), 'sample-format-upload.xlsx');
    }

    public function render()
    {
        return view('livewire.super-admin.peraturan.upload');
    }

    public function prepare($data)
    {
        $existError = false;
        foreach ($data[0] as $datum) {

            $tipe_peraturan = TipePeraturan::where('keterangan', @$datum[1])->first();
            $kategori = Kategori::where('keterangan', @$datum[2])->first();
            $jenis = JenisPeraturan::where('keterangan', @$datum[3])->first();
            $not_found = "<p class='text-red-500'>data tidak ditemukan<p>";
            $status = Peraturan::status(@$datum[4]);

            if (!$tipe_peraturan || !$kategori || !$jenis || @$status) {
                $existError = true;
            }

            $prepare[] = [
                'judul' => @$datum[0],
                'tipe_peraturan_id' => $tipe_peraturan ? $tipe_peraturan->id : $not_found,
                'subjek_id' => $kategori ? $kategori->id : $not_found,
                'jenis_keterangan_id' => $jenis ? $jenis->id : $not_found,
                'status' => is_string($status) && !is_array($status) ? $status : $not_found,
                'badan' => @$datum[5],
                'nomor_peraturan' => @$datum[6],
                'tempat_penetapan' => @$datum[7],
                'tahun' => @$datum[8],
                'tanggal_ditetapkan' => @$datum[9],
                'tanggal_diundangkan' => @$datum[10],
                'lokasi' => @$datum[11],
            ];

            $viewPrepare[] = [
                @$datum[0],
                $tipe_peraturan ? $tipe_peraturan->id : $not_found,
                $kategori ? $kategori->id : $not_found,
                $jenis ? $jenis->id : $not_found,
                is_string($status) && !is_array($status) ? $status : $not_found,
                @$datum[5],
                @$datum[6],
                @$datum[7],
                @$datum[8],
                @$datum[9],
                @$datum[10],
                @$datum[11],
            ];
        }
        if ($existError) {
            $this->errorMessage = __('Ada kesalahan, mohon cek kembali data di excel.');
        }else{
            $this->errorMessage = false;
        }

        $this->data[0] = @$viewPrepare;
        $this->tempData = @$prepare;
    }

    public function save()
    {
        if ($this->tempData && !$this->errorMessage) {
            foreach ($this->tempData as $tempDatum) {
                $request = Request::merge($tempDatum);
                $peraturanRepo = new PeraturanRepo();
                $peraturanRepo->create($request);
            }
            $this->emit('alert',['tipe' => 'success','body' => 'Berhasil di import']);
        }else{
            $this->errorMessage = __('Data gagal disimpan, Ada kesalahan, mohon cek kembali data di excel.');
        }

    }
}

