<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $name = $row[0];
        $name_arr = explode(' ', $name);
        $first_name = (!empty($name_arr[0]) ? $name_arr[0] : '');
        $last_name = (!empty($name_arr[1]) ? $name_arr[1] : '');
        return new User([
            'first_name'     => $first_name,
            'last_name'     => $last_name,
            'username'    => $row[1],
            'email'    => $row[2], 
            'password' => bcrypt($row[3]),
            'grade' => $row[4], 
            'curriculum' => $row[5], 
            'role_id' =>3
        ]);
    }
}
