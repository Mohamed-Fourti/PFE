<?php

namespace App\Imports;

use App\Models\importation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;



class MatiereImport implements  ToCollection, WithHeadingRow
{


    public function collection(Collection $rows)
    {

   }

  

}