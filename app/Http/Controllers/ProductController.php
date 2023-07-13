<?php

namespace App\Http\Controllers;

use App\FavoriteProductsManager;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function showProducts(){
       $products = DB::select('SELECT products.*,types.type_name,
          json_agg(product_files.name) product_card_img FROM products
          LEFT JOIN types on types.id = products.type_id
          inner JOIN product_files on product_files.product_id = products.id
          group by products.id,products.type_id,products.name,products.description,
          products.is_enabled,products.out_of_stock_days,products.attribute_id,products.warranty,
          products.regular_price,products.promotional_price,products.discount,products.quantity,products.created_at,
          products.updated_at,types.type_name
          order by products.id desc
         ');

//        dd($products);
        return view('front.all_products',['products' => $products]);
    }

    public function addFavorite(Request $request)
    {
//        dd($request->json('product_id'));
        FavoriteProductsManager::addProduct($request->json('product_id'));
        $responseContent = [
            'product_id' => $request->product_id,
            'message' => trans('Продукта беше запазен в любими.'),
        ];
        return json_encode(['content'=>$responseContent]);
    }

    public static function removeFavorite(Request $request)
    {
        FavoriteProductsManager::removeProduct($request->json('product_id'));
        $responseContent = [
            'product_id' => $request->product_id,
            'message' => trans('Продукта беше премахнат от любими.'),
        ];
        return json_encode(['content'=>$responseContent]);
    }

    public function show($productId){
//
//        $product = Product::with('attributes')->find($productId);

//        $roles = App\User::find(1)->roles()->orderBy('name')->get();

        $product = DB::select("SELECT products.*,attributes.name AS attribute_name, attributes.value,types.type_name,
         json_agg(product_files.name) product_card_img 
            FROM products
            INNER JOIN attributes ON attributes.id = products.attribute_id
            INNER JOIN types ON types.id = products.type_id
            INNER JOIN product_files ON product_files.product_id = products.id
            WHERE products.id = '{$productId}'
            GROUP BY products.id,products.type_id,products.name,products.description,
          products.is_enabled,products.out_of_stock_days,products.attribute_id,products.warranty,
          products.regular_price,products.promotional_price,products.discount,products.quantity,products.created_at,
          products.updated_at,attributes.name,attributes.value,types.type_name");

        return view();
        dd($product);
    }
}
