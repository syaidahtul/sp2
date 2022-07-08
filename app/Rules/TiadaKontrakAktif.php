<?php

namespace App\Rules;

use App\Services\KontraktorService;
use Illuminate\Contracts\Validation\Rule;

class TiadaKontrakAktif implements Rule
{
    public $kontraktorId;

    public function __construct($kontraktorId)
    {
        info('Kontrak ID' . $kontraktorId);
        $this->kontraktorId = $kontraktorId;
    }
    
    public function passes($attribute, $value)
    {
        $kontrakAktif = (new KontraktorService)->getKontrakAktif($this->kontraktorId);
        return empty($kontrakAktif);
    }
    
    public function message()
    {
        return 'Kontraktor ini mempunyai kontrak yang masih aktif.';
    }
}
