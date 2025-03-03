<?php

namespace App\Exports;

use App\Models\Rsvp;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RsvpListExport implements FromCollection, WithHeadings
{
    protected $kad_id;

    public function __construct($kad_id)
    {
        $this->kad_id = $kad_id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rsvp::where('kad_id', $this->kad_id)
            ->get(['nama', 'nombor_telefon', 'kehadiran', 'jumlah_kehadiran']);
    }

    public function headings(): array
    {
        return ['Nama', 'Nombor Telefon', 'Kehadiran', 'Jumlah Kehadiran'];
    }
}
