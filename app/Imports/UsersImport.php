<?php

namespace App\Imports;

use App\Models\importation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;



class UsersImport implements  ToCollection, WithHeadingRow
{


    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
    }
   }
   public function headingRow(): int
   {
       return 1;
   }

  

}