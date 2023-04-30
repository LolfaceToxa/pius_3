<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Http\Requests\CardRequest;
use App\Actions\CardCreateAction;
use App\Actions\CardUpdateAction;
use App\Actions\CardDeleteAction;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

use App\Models\Card;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getCards() : AnonymousResourceCollection
    {
        return CardResource::collection(Card::with('goods')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createCard(CardRequest $request, CardCreateAction $action) : CardResource
    {
        return new CardResource($action->handle($request));
    }

    /**
     * Display the specified resource.
     */
    public function getCard(int $id) : CardResource
    {
        return new CardResource(Card::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function patchCard(int $id, CardRequest $request, CardUpdateAction $action) : CardResource
    {
        return new CardResource($action->handle($id, $request->validated()));
    }

    /**
     * Update some parts of the specified resource in storage.
     */
    public function putCard(int $id, CardRequest $request, CardUpdateAction $action) : CardResource
    {
        return new CardResource($action->handle($id, $request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteCard(int $id, CardDeleteAction $action) : Response
    {
        return $action->handle($id);
    }
}
