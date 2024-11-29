<?php

namespace App\Exports;

use App\Models\Rsvp;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RsvpListExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rsvp::all(['nama', 'nombor_telefon', 'kehadiran', 'jumlah_kehadiran']);
    }

    public function headings(): array
    {
        return ['Nama', 'Nombor Telefon', 'Kehadiran', 'Jumlah Kehadiran'];
    }
}
