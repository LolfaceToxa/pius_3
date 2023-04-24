<?php

namespace App\Actions;

use App\Models\Card;

class CardCreateAction
{

    public function handle($request) : Card
    {
        $created_card = Card::create($request->validated());

        return $created_card;   
    }    
}
