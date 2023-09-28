<?php

namespace App\Http\Livewire\Pois;

use App\Models\Poi;
use Livewire\Component;

class FormPoi extends Component
{
    public $poi;

    protected $rules = [
        'poi.kode_poi' => 'required',
        'poi.tanggal_pembuatan_poi' => 'required',
        'poi.nama_customer' => 'required',
        'poi.total_order' => 'required',
        'poi.lokasi_penempatan' => 'required',
        'poi.tahap_pengiriman' => 'required',
        'poi.stok_akhir' => 'required',
        'poi.permintaan_khusus' => 'required',
        'poi.verifikasi_satu' => '',
        'poi.verifikasi_dua' => '',
        'poi.verifikasi_tiga'  => '',
        'poi.verifikasi_empat' => ''
    ];

    public function mount() {
        if (!$this->poi){
            $this->poi = new Poi();
        }
    }

    public function save()
    {
        $this->validate();
        $this->poi->save();
        session()->flash('message', 'Poi Saved!');
        return redirect()->route('pois.index');
    }

    public function render()
    {
        return view('livewire.pois.form-poi');
    }
}
