<?php

namespace App\Actions;

use App\Models\Check;

class CheckUpdateAction
{

    public function handle($id, array $new) : Check
    {
        $check = Check::findOrFail($id);
        $check->update($new);

        return $check;
    }  
}
