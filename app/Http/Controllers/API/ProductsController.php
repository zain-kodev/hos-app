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
use Illuminate\Support\Facades\DB;

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
            })->paginate(100);

        } elseif ($filter_type == 'tag') {

            $products = $data->whereHas('tags', function ($query) use ($filter) {
                $query->where('slug', $filter);
            })->paginate(100);

        }elseif ($filter_type == 'search'){

            $products = Product::query()
                ->when($searchQuery, function ($query, $searchQuery) {
                    return $query->where('name', 'like', "%$searchQuery%");
                })->where('active', 1)
                ->paginate(1-0);
//            $products = $data->whereHas('tags', function ($query) use ($filter) {
//                $query->where('slug', $filter);
//            })->paginate(10);

        } else {
            $products = $data->where('category',23)->with('variations_title.variations')->paginate(100);
        }

        $info = DB::table('app_info')->first();

            return $this->sendResponse([
                'products' => ProductResource::collection($products)??[],
                'newProducts' => ProductResource::collection($new_products),
                'categories' => CategoryResource::collection($categories),
                'tags' => TagResource::collection($tags),
                'about' => $info->about_us,
                'terms' => $info->terms_condition,
                'privacy' => $info->privacy_policy,
                'shipping' => $info->shiping_return,
                'sudanese_scents' => $info->sudanese_scents,
            ], '');

    }


    public function projectDetails(){
        return response()->json(
            [
                'data' => [],
                'success' => true
            ], 200);
    }

    public function productReviews(Request $request){
        $review = DB::table('product_review')->where('product_id',$request->product_id)->take(3)->get();
        $allReview = DB::table('product_review')->where('product_id',$request->product_id)->get();
        $xfd = DB::table('product_review')->where('product_id',$request->product_id)->where('usr_name',$request->usr_name)->count();
         if ($xfd >0){
             $can = false;
         }else{
             $can = true;
         }
        return response()->json(
            [
                'data' => $review,
                'data2' => $allReview,
                'canAdd' =>$can,
                'success' => true
            ], 200);
    }

    public function bannerPhoto(Request $request){
        $info = DB::table('app_info')->first();

        return response()->json(
            [
                'data' => $info->nanner_photo,
                'success' => true
            ], 200);
    }

    public function saveProductReviews(Request $request){
         DB::table('product_review')
            ->insert([
                'product_id' => $request->product_id,
                'usr_name' => $request->usr_name,
                'usr_rating' => $request->usr_rating,
                'usr_comment' => $request->usr_comment,
            ]);
        return response()->json(
            [
                'data' => [],
                'success' => true
            ], 200);
    }


}
