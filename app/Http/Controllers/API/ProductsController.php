<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\TagResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductsController extends BaseController
{
    public function products( $filter_type = null, $filter = null){
        $searchQuery = $filter;
        $categories = Category::withCount(['products', 'products as count_data'])->whereHas('products', function ($query) {
            $query->where('active', 1);
        })->get();

        //dd($categories);
        $tags = Tag::has('products')->get();

        $new_products = Product::where('active', 1)->take(3)->orderBy('created_at', 'desc')->get();

        $data = Product::where('active', 1);
//        $data = Product::query()
//            ->when($searchQuery, function ($query, $searchQuery) {
//                return $query->where('name', 'like', "%$searchQuery%");
//            })->where('active', 1)
//            ->get();

        if ($filter_type == 'category') {

            $products = $data->whereHas('category', function ($query) use ($filter) {
                $query->where('slug', $filter);
            })->paginate(10);

        } elseif ($filter_type == 'tag') {

            $products = $data->whereHas('tags', function ($query) use ($filter) {
                $query->where('slug', $filter);
            })->paginate(10);

        }elseif ($filter_type == 'search'){

            $products = Product::query()
                ->when($searchQuery, function ($query, $searchQuery) {
                    return $query->where('name', 'like', "%$searchQuery%");
                })->where('active', 1)
                ->paginate(10);
//            $products = $data->whereHas('tags', function ($query) use ($filter) {
//                $query->where('slug', $filter);
//            })->paginate(10);

        } else {
            $products = $data->with('variations_title.variations')->paginate(100);
        }

            return $this->sendResponse([
                'products' => ProductResource::collection($products),
                'newProducts' => ProductResource::collection($new_products),
                'categories' => CategoryResource::collection($categories),
                'tags' => TagResource::collection($tags),
            ], '');

    }


    public function projectDetails(){
        return response()->json(
            [
                'data' => [],
                'success' => true
            ], 200);
    }


}
