<?php

namespace App\Actions;

use App\Models\Card;
use App\Http\Resources\CardResource;
use Illuminate\Http\Response;

class CardDeleteAction
{

    public function handle($id) : Response
    {
        $card = new CardResource(Card::findOrFail($id));

        $card->delete();

        return response(null, Response::HTTP_OK);
    }    
}
