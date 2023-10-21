<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $users;
    public function __construct($users)
    {
        return $this->users = $users;
    }

    public function collection()
    {
        return $this->users;
    }

    public function map($users): array
    {
        return [
            $users->name,
            $users->email,
            $users->salutation,
            $users->gender,
            $users->institution,
            $users->country,
            $users->no_tlp,
            $users->type_user,
            $users->presence,
        ];
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Salutation',
            'Gender',
            'Institution',
            'Country',
            'No Tlp',
            'User Type',
            'Presence',
        ];
    }
}
