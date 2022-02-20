<?php

namespace App\Http\Controllers;

use App\Http\Requests\VentaRequest;
use App\Http\Resources\VentaResource;
use App\Models\Venta;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::paginate(10);
        return VentaResource::collection($ventas);
    }

    public function store(VentaRequest $request)
    {   
        $venta = Venta::create($request->all());
        //$venta = Venta::create($request->validated());

        return new VentaResource($venta);
    }

    public function show(Venta $venta)
    {
        return new VentaResource($venta);
    }

    public function update(VentaRequest $request, Venta $venta)
    {
        $venta->update($request->all());

        return new VentaResource($venta);
    }

    public function destroy(Venta $venta)
    {
        $venta->delete();

        return response()->noContent();
    }
}
