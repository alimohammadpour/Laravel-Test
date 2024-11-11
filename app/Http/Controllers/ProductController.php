<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Classes\DiscountTransformer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    // ?category=boots&priceLessThan=89000
    public function index(Request $request) {
        $query = Product::query();
        if ($category = $request->query('category'))
            $query->where('category', $category);

        if ($priceLessThan = $request->query('priceLessThan'))
            $query->where('price', '<', $priceLessThan);

        return $query->take(value: 5)
            ->get()
            ->transform(function($product) {
                return (new DiscountTransformer())->apply($product);
            });
    }
}
