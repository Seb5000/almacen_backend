<?php

namespace App\Http\Controllers;

use App\Models\GrupoVenta;
use Illuminate\Http\Request;
use App\Http\Resources\GrupoVentaResource;
use App\Http\Requests\GrupoVentaRequest;

class GrupoVentaController extends Controller
{
    public function index()
    {
        return GrupoVentaResource::collection(GrupoVenta::all());
    }

    public function store(GrupoVentaRequest $request)
    {
        $grupoVenta = GrupoVenta::create($request->validated());

        return new GrupoVentaResource($grupoVenta);
    }

    public function show(GrupoVenta $grupoVenta)
    {
        return new GrupoVentaResource($grupoVenta);
    }

    public function update(Request $request, GrupoVenta $grupoVenta)
    {
        $grupoVenta->update($request->all());

        return new GrupoVentaResource($grupoVenta);
    }

    public function destroy(GrupoVenta $grupoVenta)
    {
        $grupoVenta->delete();

        return response()->noContent();
    }
}
