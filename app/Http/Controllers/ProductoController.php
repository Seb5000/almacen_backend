<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Http\Resources\ProductoResource;
use App\Models\Producto;
use App\Models\Compra;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductoController extends Controller
{

    public function index()
    {
        $productos = Producto::paginate(10);
        return ProductoResource::collection($productos);
    }

    public function store(ProductoRequest $request)
    {   
        $producto = Producto::create($request->validated());

        return new ProductoResource($producto);
    }

    public function show(Producto $producto)
    {
        return new ProductoResource($producto);
    }

    public function update(ProductoRequest $request, Producto $producto)
    {
        $producto->update($request->all());
        //$producto->update($request->validated());

        return new ProductoResource($producto);
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return response()->noContent();
    }

    public function resumenVentas(Request $request){
        $ventas = Venta::select(DB::raw('DATE("FechaVenta") as fecha'), DB::raw('sum("Cantidad") as cantidad'))
                    ->where('Producto', 1)
                    ->groupBy('fecha')
                    ->orderBy('fecha')
                    ->get();
        
        return response()->json($ventas);
    }

    public function buscarProducto(Request $request){
        
        // $ventas = Venta::select(DB::raw('DATE("FechaVenta") as fecha'), DB::raw('sum("Cantidad") as cantidad'))
        //             ->where('Producto', 1)
        //             ->groupBy('fecha')
        //             ->orderBy('fecha')
        //             ->get();
        $productos = Producto::where("Codigo", 'LIKE', $request->Codigo.'%')->get();
        
        return response()->json($productos);
    }
}
