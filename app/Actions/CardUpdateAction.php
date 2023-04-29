<?php

namespace App\Actions;

use App\Models\Card;
use App\Http\Resources\CardResource;

class CardUpdateAction
{

    public function handle($id, array $new) : Card
    {
        $card = Card::findOrFail($id);
        $card->update($new);

        return $card;
    }    
}
