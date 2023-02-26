<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $products = Product::query();
            $products->select('id', 'name', 'category_id', 'is_active', 'description', 'created_at')->with(['category:id,name']);

            if (isset($request->order[0]['column'])) {
                $request['sort'] = ['column' => $request['columns'][$request['order'][0]['column']]['name'], 'dir' => $request['order'][0]['dir']];
                $products->sortBy($request);
            }


            if (isset($request->search['value']))  $products->search($request);
            $productCount = $products->count();

            $products = $products->skip($request->start)
                ->take(($request['length'] == '-1') ? $productCount : $request->length)
                ->get();
            return ProductCollection::make($products)
                ->additional(['total_count' => $productCount]);
        }

        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->where('is_active', 1)->get();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request, Product $product)
    {
        if (request()->ajax()) {
            $data['is_active'] = $request->has('status') ?  1 :  0;
            $product->fill($request->validated() + $data)->save();

            if ($request->hasFile('productImage') && $request->file('productImage')->isValid()) {
                $product->addMediaFromRequest('productImage')->toMediaCollection('product-image');
            }

            session()->put(['alert-message' => __('Added Successfully'), 'alert-type' => 'success']);
            return response()->json([
                'status' => true,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::select('id', 'name')->where('is_active', 1)->get();
        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if (request()->ajax()) {
            $data['is_active'] = $request->has('status') ?  1 :  0;
            $product->fill($request->validated() + $data)->save();
            session()->put(['alert-message' => __('Edit Successfully'), 'alert-type' => 'success']);

            if ($request->hasFile('productImage') && $request->file('productImage')->isValid()) {
                $product->getFirstMedia('product-image')->delete();
                $product->addMediaFromRequest('productImage')->toMediaCollection('product-image');
            }

            return response()->json([
                'status' => true,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (request()->ajax()) {
            $product->delete();
            return response()->json([
                'status' => true,
            ]);
        }
    }
}
