<?php

namespace App\Livewire\MasterData\DataGuru;

use Livewire\Component;

class FormGuru extends Component
{

    public $namaGuru;
    public $nip;
    public $emailGuru;
    public $noHpGuru;

    public function tambahDataGuru()
    {

        dd([
            'namaGuru' => $this->namaGuru,
            'nip' => $this->nip,
            'emailGuru' => $this->emailGuru,
            'noHpGuru' => $this->noHpGuru,
        ]);

    }


    public function render()
    {
        return view('livewire.master-data.data-guru.form-guru');
    }
}
