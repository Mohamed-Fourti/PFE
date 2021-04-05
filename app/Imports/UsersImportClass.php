<?php

namespace App\Imports;

use App\Models\importation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;



class UsersImportClass implements  ToCollection
{


    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            importation::create([
                'CIN'     => $row['CIN'],
                'nom_fr'     => $row['nom_fr'],
                'prenom_fr'    => $row['prenom_fr'],
            ]);
    }
   }


  

}