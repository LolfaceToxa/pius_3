<?php

namespace App\Actions;

use App\Models\Check;

class CheckCreateAction
{

    public function handle($request) : Check
    {
        $created_check = Check::create($request->validated());

        return $created_check;   
    }    
}
