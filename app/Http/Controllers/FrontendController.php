<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $modules = Module::where('page_id', 0)->orderby('order')->get();
        return view('index', compact('modules'));
    }

    public function view($url, $url2 = null, $url3 = null)
    {
        if (!is_null($url3) and $product = Product::where('url', $url3)) {
            return view('modules.product', compact('product'));
        }

        $page = Page::where('url', $url)->first();

        if (!$page) {
            return redirect('/');
        }

        return view('pages.index', compact('page'));
    }
}
