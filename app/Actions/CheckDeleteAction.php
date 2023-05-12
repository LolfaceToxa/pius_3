<?php

namespace App\Actions;

use App\Models\Check;
use App\Http\Resources\CheckResource;
use Illuminate\Http\Response;

class CheckDeleteAction
{

    public function handle($id) : Response
    {
        $check = new CheckResource(Check::findOrFail($id));

        $check->delete();

        return response(null, Response::HTTP_OK);
    }    
}
