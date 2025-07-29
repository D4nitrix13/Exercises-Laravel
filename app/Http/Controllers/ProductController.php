<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    protected array $productRules = [
        'name' => 'required|string|max:64',
        'description' => 'required|string|max:512',
        'price' => 'required|integer|gt:0',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(rules: $this->productRules);
        $product = auth()->user()->products()->create($data);

        Log::info("Product created", ['product' => $product]);

        // Log::channel(channel: null)->info(
        //     message: "Product created",
        //     context: ["product" => $product]
        // );
        return response()->json(data: [
            "message" => "Product created successfully",
            "product" => $product,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->authorize(ability: "delete", arguments: $product);
        
        $product->delete();

        Log::info(
            message: "Product deleted",
            context: ["product" => $product]
        );

        return response()->json(data: [
            'message' => 'Product deleted successfully',
            'product' => $product
        ]);
    }
}
