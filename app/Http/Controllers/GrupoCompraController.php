<?php

namespace App\Http\Controllers;

use App\Http\Requests\GrupoCompraRequest;
use App\Models\GrupoCompra;
use App\Models\Compra;
use Illuminate\Http\Request;
use App\Http\Resources\GrupoCompraResource;


class GrupoCompraController extends Controller
{
    public function index()
    {
        $gruposCompra = GrupoCompra::paginate(10);
        return GrupoCompraResource::collection($gruposCompra);
    }

    public function store(GrupoCompraRequest $request)
    {
        $company = GrupoCompra::create($request->validated());

        return new GrupoCompraResource($company);
    }

    public function show(GrupoCompra $grupoCompra)
    {   
        return new GrupoCompraResource($grupoCompra->load('compras'));
    }

    public function update(Request $request, GrupoCompra $grupoCompra)
    {
        $grupoCompra->update($request->all());

        return new GrupoCompraResource($grupoCompra);
    }

    public function destroy(GrupoCompra $grupoCompra)
    {
        $grupoCompra->delete();

        return response()->noContent();
    }

    public function storeConCompras(Request $request){
        $grupoCompra = new GrupoCompra();
        $grupoCompra->FechaCompra = $request->FechaCompra;
        $grupoCompra->save();
        $compras = $request->compras;
        foreach($compras as $item){
            $obj = (object)$item;
            $compra = new Compra();
            $compra->Producto = $obj->id;
            $compra->GrupoCompra = $grupoCompra->id;
            $compra->Cantidad = $obj->Cantidad;
            $compra->HPrecio = $obj->PrecioCompra;
            $compra->FechaCompra = $grupoCompra->FechaCompra;
            $compra->save();
        }
        return json_encode(
            [
                "msg" => "Exito",
                "data" => $grupoCompra
            ]
        );
    }
}
