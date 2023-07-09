<?php

namespace App\Http\Controllers;

use App\Models\PriceUnity;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Unity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset($_GET['category'])){
            $category = $_GET['category'];
            $products = Product::where('category_id',$category)->get();
            return view('product.index', compact('products', 'category'));
        }else{
            $products = Product::all();
            return view('product.index', compact('products'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unities = Unity::all();
        if (isset($_GET['category'])){
            $category = $_GET['category'];
            $productCategories = ProductCategory::all();
            return view('product.create', compact('productCategories', 'unities', 'category'));
        }else{
            $productCategories = ProductCategory::all();
            return view('product.create', compact('productCategories', 'unities'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:products|max:255',
            'product_category_id' => 'required',
            'desc' => 'required',
            'active' => 'required'
        ]);
        $data = $request->all();

        $data['image'] = uploadImage($request, 'product');

        $prices = $data['price'] ?? null;
        $unities = $data['unity'] ?? null;
        unset($data['price'], $data['unity']);
        $data['url'] = Str::slug($data['title']);
        $product = Product::create($data);
        if ($prices and $unities) {
            foreach ($unities as $key => $unity) {
                PriceUnity::create([
                    'product_id' => $product->id,
                    'unity_id' => $unity,
                    'price' => $prices[$key]
                ]);
            }
        }

        link_module_page($product);

        $notification = [
            'message' => 'Prdoduto criado com sucesso',
            'alert-type' => 'success'
        ];

        return redirect('admin/product')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $productCategories = ProductCategory::all();
        $unities = Unity::all();
        return view('product.edit', compact('product', 'productCategories', 'unities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required|max:255',
            'product_category_id' => 'required',
            'desc' => 'required',
            'active' => 'required'
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = uploadImage($request, 'product');
        }

        $prices = $data['price'] ?? null;
        $unities = $data['unity'] ?? null;
        unset($data['price'], $data['unity']);
        if ($prices and $unities) {
            $price_unities = PriceUnity::where('product_id', $product->id)->delete();
            foreach ($unities as $key => $unity) {
                PriceUnity::create([
                    'product_id' => $product->id,
                    'unity_id' => $unity,
                    'price' => $prices[$key]
                ]);
            }
        }

        $product->update($data);

        $notification = [
            'message' => 'Categoria de Prdoduto editada com sucesso',
            'alert-type' => 'success'
        ];

        return redirect('admin/product')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $product)
    {
        if($product){
            unlink_module_page($product);

            $product->delete();

            $notification = [
                'message' => 'Categoria de Produto eliminada com sucesso',
                'alert-type' => 'success'
            ];

            return redirect('admin/product')->with($notification);
        }
    }
}
