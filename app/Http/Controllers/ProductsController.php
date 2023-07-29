<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductsResource;
use App\Models\Products;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $products = Products::all();
        return response()->json([
            'success' => true,
            'data' => ProductsResource::collection($products)
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $productName = $request->input('name');
        $productPrice = $request->input('price');
        $productDesc = $request->input('description');

        $product = Products::create([
            'name' => $productName,
            'price' => $productPrice,
            'description' => $productDesc
        ]);

        return response()->json([
            'success' => true,
            'data' => new ProductsResource($product),
            'message' => 'Product Created Successfully.'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $product): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => new ProductsResource($product)
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $product): JsonResponse
    {
        $productName = $request->input('name');
        $productPrice = $request->input('price');
        $productDesc = $request->input('description');

        $product->update([
            'name' => $productName,
            'price' => $productPrice,
            'description' => $productDesc
        ]);

        return response()->json([
            'success' => true,
            'data' => new ProductsResource($product),
            'message' => 'Product updated Successfully.'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $product): JsonResponse
    {
        $product->delete();
        return response()->json(null, 204);
    }
}
