<?php

namespace App\Http\Controllers;

use App\Domain\Services\ProductService;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductService $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService   =   $productService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json(['data' => new ProductResource($this->productService->productRepository->create($request->input()))]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(['data' => new ProductResource($this->productService->productRepository->firstById($id))]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return response()->json(['data' => new ProductResource($this->productService->productRepository->update($request->input(), $id))]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if ($this->productService->productRepository->destroy($id)) {
            return response()->json(['message' => __('contract.deleted')]);
        }
    }
}
