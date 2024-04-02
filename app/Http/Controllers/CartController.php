<?php

namespace App\Http\Controllers;

use App\Domain\Services\CartService;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected CartService $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService   =   $cartService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartItems = Cart::with('product')->get();
        return view('cart', compact('cartItems'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json(['data' => new CartResource($this->cartService->cartRepository->create($request->input()))]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(['data' => new CartResource($this->cartService->cartRepository->firstById($id))]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return response()->json(['data' => new CartResource($this->cartService->cartRepository->update($request->input(), $id))]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if ($this->cartService->cartRepository->destroy($id)) {
            return response()->json(['message' => __('contract.deleted')]);
        }
    }
}
