<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CheckResource;
use App\Http\Requests\CheckRequest;
use App\Actions\CheckCreateAction;
use App\Actions\CheckUpdateAction;
use App\Actions\CheckDeleteAction;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use App\Models\Check;

class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getChecks() : AnonymousResourceCollection
    {
        return CheckResource::collection(Check::with('cards')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createCheck(CheckRequest $request, CheckCreateAction $action) : CheckResource
    {
        return new CheckResource($action->handle($request));;
    }

    /**
     * Display the specified resource.
     */
    public function getCheck(string $id) : CheckResource
    {
        return new CheckResource(Check::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function patchCheck(int $id, CheckRequest $request, CheckUpdateAction $action) : CheckResource
    {
        return new CheckResource($action->handle($id, $request->validated()));
    }

    public function putCheck(int $id, CheckRequest $request, CheckUpdateAction $action) : CheckResource
    {
        return new CheckResource($action->handle($id, $request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteCheck(string $id, CheckDeleteAction $action) :  Response
    {
        return $action->handle($id);
    }
}
