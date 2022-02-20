<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompraRequest;
use App\Http\Resources\CompraResource;
use App\Models\Compra;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::paginate(10);
        return CompraResource::collection($compras);
    }

    public function store(CompraRequest $request)
    {   
        //return $request->all();
        $compra = Compra::create($request->all());

        return new CompraResource($compra);
    }

    public function show(Compra $compra)
    {
        return new CompraResource($compra);
    }

    public function update(CompraRequest $request, Compra $compra)
    {
        //return [$request->all(), $compra];
        $compra->update($request->all());

        return new CompraResource($compra);
    }

    public function destroy(Compra $compra)
    {
        $compra->delete();

        return response()->noContent();
    }
}
