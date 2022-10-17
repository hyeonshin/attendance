<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AttendancesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $absen = Attendance::select("attendances.id", "attendances.user_id", "users.name", "presence_date", "users.email", "users.phone", "status", "presence_enter_time", "presence_enter_loc", "keterangan", "presence_out_time", "presence_out_loc")->join('users', 'attendances.user_id', '=', 'users.id')->get();
        return $absen;
    }

    public function headings(): array
    {
        return ["ID", "ID User", "Nama", "Tanggal", "Email", "Phone" , "Status", "Jam Hadir", "Lokasi Hadir", "Keterangan", "Jam Pulang", "Lokasi Pulang"];
    }
}
