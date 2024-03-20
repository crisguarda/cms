<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategories = ProductCategory::all();
        return view('productCategory.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = getPages();
        return view('productCategory.create', compact('pages'));
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
            'page_id' => 'required',
            'title' => 'required|unique:product_categories|max:255',
            'desc' => 'required',
            'active' => 'required'
        ]);
        $data = $request->all();

        $data['image'] = uploadImage($request, 'product_category');

        $productCategory = ProductCategory::create($data);

        link_module_page($productCategory);

        $notification = [
            'message' => 'Categoria de Prdoduto criada com sucesso',
            'alert-type' => 'success'
        ];

        return redirect('admin/productCategory')->with($notification);
    }

    public function show(ProductCategory $productCategory)
    {
        $products = Product::where('product_category_id', $productCategory->id)->get();
        $productCategory = $productCategory->id;
        return view('productCategory.show', compact('products', 'productCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        $pages = getPages();
        return view('productCategory.edit', compact('productCategory', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        $request->validate([
            'page_id' => 'required',
            'title' => 'required|max:255',
            'desc' => 'required',
            'active' => 'required'
        ]);

        $data = $request->all();

        $data['image'] = uploadImage($request, 'product_category');

        $productCategory->update($data);

        link_module_page($productCategory);

        $notification = [
            'message' => 'Categoria de Prdoduto editada com sucesso',
            'alert-type' => 'success'
        ];

        return redirect('admin/productCategory')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        if($productCategory){
            unlink_module_page($productCategory);

            $productCategory->delete();

            $notification = [
                'message' => 'Categoria de Produto eliminada com sucesso',
                'alert-type' => 'success'
            ];

            return redirect('admin/productCategory')->with($notification);
        }
    }
}
