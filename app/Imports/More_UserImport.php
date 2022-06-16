<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class More_UserImport implements ToCollection, withHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            User::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'gender' => $row['gender'],
                'date_of_birth' => $row['date_of_birth'],
                'date_of_death' => $row['date_of_death'],
            ]);
        }
    }
}
