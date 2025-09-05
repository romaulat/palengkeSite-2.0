<?php

namespace App\Http\Controllers;

use App\Buyer;
use App\Cart;
use App\Categories;
use App\Comments;
use App\Products;
use App\Seller;
use App\SellerProduct;
use App\SellerStall;
use function asset;
use function auth;
use function compact;
use function dd;
use function foo\func;
use Illuminate\Http\Request;
use function redirect;
use function view;

class ProductsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth')->only(['addToCart' , 'postComment']);

    }

    public function index(Request $request){




         /* $products =  Products::with(['category', 'seller_products'])
               ->whereHas('seller_products')->whereHas('category', function($q) use ($category){
                   $q->where('category', $category);
               })->get()->groupBy('seller_products.seller_id');*/


        $products = SellerProduct::with(['product'])
            ->whereHas('product')
            ->whereHas('seller', function ($q){
                $q->whereHas('user', function ($s){ $s->where('status', 'active'); });
                $q->whereHas('seller_stalls', function ($s){ $s->where('status', 'active'); });
            });



        if(session()->has('shop_at_market')){
            $products = $products->whereHas('seller', function ($query){
                $query->where('market_id', session('shop_at_market'));
            });
        };

        if($request->product_name){
            $product_name = $request->product_name;
            $products = $products->whereHas('product', function ($query) use ($product_name) {
                $query->where('product_name', 'LIKE', '%'.$product_name.'%');
            });
        }

        if($request->categories){

            $filter_categories = $request->categories;
            $products = $products->whereHas('product', function ($query) use ($filter_categories){
                $query->whereIn('category_id', $filter_categories);
            });
        }

        if($request->ratings){
            $filter_ratings = $request->ratings;


           $products = $products->where( function($q) use ($filter_ratings) {
                foreach ($filter_ratings as $key => $value){

                    $q->orWhereRaw('CONVERT(average_ratings, UNSIGNED )', '=', (int)$value );
                }

            });
//            dd($products->toSql());



        }


        if(!is_null($request->min_price) && !is_null($request->max_price)){
            $products= $products->whereBetween('price', [(int)$request->min_price, (int)$request->max_price]);
        }

        else if(!is_null($request->min_price)){
            $products = $products->where('price', '>=', (int)$request->min_price);
        }

        else if(!is_null($request->max_price)){
            $products = $products->where('price', '<=', (int)$request->max_price);
        }


//        dd($products->toSql(), $products->getBindings());
        $categories = Categories::all();


        $products = $products->get();


        $innerPageBanner = '';

          return view('shop.index', compact(['products' ,'innerPageBanner', 'categories']));

    }

    public function showByCategory($slug, Request $request){

         /* $products =  Products::with(['category', 'seller_products'])
               ->whereHas('seller_products')->whereHas('category', function($q) use ($category){
                   $q->where('category', $category);
               })->get()->groupBy('seller_products.seller_id');*/
        $categories = Categories::where('slug', $slug)->first();

        $products = SellerProduct::with(['product'])
                    ->whereHas('product')
                    ->whereHas('product.category', function($q) use ($categories){
                        $q->where('category', $categories->category);
                    })
                    ->whereHas('seller', function ($q){
                        $q->whereHas('user', function ($s){ $s->where('status', 'active'); });
                        $q->whereHas('seller_stalls', function ($s){ $s->where('status', 'active'); });
                    });

        if(session()->has('shop_at_market')){
            $products = $products->whereHas('seller', function ($query){
                $query->where('market_id', session('shop_at_market'));
            });
        };

        if($request->product_name){
            $product_name = $request->product_name;
            $products = $products->whereHas('product', function ($query) use ($product_name) {
                $query->where('product_name', 'LIKE', '%'.$product_name.'%');
            });
        }

        if($request->ratings){
            $filter_ratings = $request->ratings;


            $products = $products->where( function($q) use ($filter_ratings) {
                foreach ($filter_ratings as $key => $value){

                    $q->orWhereRaw('CONVERT(average_ratings, UNSIGNED )', '=', (int)$value );
                }

            });
//            dd($products->toSql());



        }


        if(!is_null($request->min_price) && !is_null($request->max_price)){
            $products= $products->whereBetween('price', [(int)$request->min_price, (int)$request->max_price]);
        }

        else if(!is_null($request->min_price)){
            $products = $products->where('price', '>=', (int)$request->min_price);
        }

        else if(!is_null($request->max_price)){
            $products = $products->where('price', '<=', (int)$request->max_price);
        }

        $products    = $products->get();

        $innerPageBanner = $categories->image;
        $pageTitle = $categories->category;


          return view('shop.category', compact(['products' ,'innerPageBanner' ,'pageTitle']));

    }

    public function addToCart(Request $request){



        $validate = $request->validate([
            'quantity' => ['required','numeric']
        ]);

        if( !auth()->user()->buyer()->exists() ){
            $response = ['message' => 'Please complete your Profile', 'response' => 'error'];
        }
       else{
           $response = [];
           //find exsiting item from your cart
           $findCart = Cart::where([
               'product_id' => $request->product_id,
               'buyer_id' => auth()->user()->buyer->id,
               'seller_id' => $request->seller_id,
               'seller_product_id' => $request->seller_product_id,
           ])->get()->last();




           if($findCart){

               //update the quantity
               $findCart->update([
                   'quantity' => $findCart->quantity + $request->quantity,
                   'total' =>  ($findCart->quantity + $request->quantity) *  $request->price,
               ]);

               $response = ['message' => 'An item from your cart was updated', 'response' => 'success'];
           }
           else{

               //Insert new product to cart
               $cart = Cart::create([
                   'product_id' => $request->product_id,
                   'seller_id' => $request->seller_id,
                   'buyer_id' => auth()->user()->buyer->id,
                   'price' => $request->price,
                   'seller_product_id' =>  $request->seller_product_id,
                   'quantity' =>  $request->quantity,
                   'total' =>  $request->quantity *  $request->price,
               ]);




               $response = ['message' => 'Product was added to your cart', 'response' => 'success'];
           }
           $seller_product = SellerProduct::find($request->seller_product_id);

           $seller_product->update(['stock', $seller_product->stock - $request->quantity]);


       }




//        dd(auth()->user()->buyer->carts);
        return redirect(url()->previous())->with($response);

    }

    public function find($id){


        //take note ID ay SellerProductID hindi Product ID
        $sellerProduct = SellerProduct::findOrFail($id);

        $related_product = Products::with(['seller_products'])->where('id', $sellerProduct->product->id)->get();

        return view('shop.product.index', compact(['sellerProduct' ,'related_product']));

    }

    public function postComment($id, Request $request){


        $product = SellerProduct::findOrFail($id);


        $comment = $product->comments()->create([
            'product_id' => $product->product->id,
            'is_anonymous' => (isset($request->anonymous)) ? 1 : 0,
            'comment' => $request->comment,
            'ratings' => $request->ratings,
            'buyer_id' => auth()->user()->buyer->id,
        ]);



        if($comment->save()){
            $response = ['message' => 'Comment Posted!', 'response' => 'success'];

            $total_respondents  = Comments::where('seller_product_id', $id)->count();
            $average_ratings = Comments::where('seller_product_id', $id)->sum('ratings') / $total_respondents;

            $product->update(['average_ratings' => number_format((float)$average_ratings, 2)]);

        }else{
            $response = ['message' => 'Something went wrong. Please try again later!', 'response' => 'error'];
        }

        return redirect(route('shop.products.find', ['id' => $id]))->with($response);
    }

    public function categories(){
        $categories = Categories::all();

        return view('shop.categories', compact(['categories']));
    }

    public function sellers(Request $request){




        /* $products =  Products::with(['category', 'seller_products'])
              ->whereHas('seller_products')->whereHas('category', function($q) use ($category){
                  $q->where('category', $category);
              })->get()->groupBy('seller_products.seller_id');*/


        $stores = SellerStall::with(['stall'])->where('status', 'active')
            ->whereHas('seller', function($q){
                $q->whereHas('user');
                $q->whereHas('seller_stalls', function ($s){ $s->where('status', 'active'); });
            })
            ->whereHas( 'stall', function($q){
                $q->where('status', 'occupied');
            });

        if(session()->has('shop_at_market')){
            $stores = $stores->whereHas('stall', function ($query){
                $query->where('market_id', session('shop_at_market'));
            });
        };


        if($request->store_name && $request->store_name != ''){
            $filter_categories = $request->categories;
            $stores = $stores->where('name', 'like', '%'.$request->store_name.'%');
        }

        if($request->categories){
            $filter_categories = $request->categories;

            $stores = $stores->whereHas('stall', function ($query) use ($filter_categories){

               $query->whereIn('category_id', $filter_categories);
            });
        }



        $categories = Categories::all();


        $stores = $stores->get();



        $innerPageBanner = '';

        return view('shop.stalls.index', compact(['stores' ,'innerPageBanner', 'categories']));

    }

    public function findStore($id, Request $request){


        //take note ID ay SellerProductID hindi Product ID
        $sellerStall = SellerStall::findOrFail($id);
        $categories = Categories::all();

        $products = SellerProduct::with(['PRODUCT'])->where('seller_id', $sellerStall->seller->id)
        ->whereHas('seller', function($q){
//            $q->whereHas('seller_stalls');
            $q->whereHas('seller_stalls', function ($s){ $s->where('status', 'active'); });
        });

        if($request->product_name){
            $product_name = $request->product_name;
            $products = $products->whereHas('product', function ($query) use ($product_name) {
                $query->where('product_name', 'LIKE', '%'.$product_name.'%');
            });
        }

        if($request->categories){

            $filter_categories = $request->categories;
            $products = $products->whereHas('product', function ($query) use ($filter_categories){
                $query->whereIn('category_id', $filter_categories);
            });
        }

        if($request->ratings){
            $filter_ratings = $request->ratings;


            $products = $products->where( function($q) use ($filter_ratings) {
                foreach ($filter_ratings as $key => $value){

                    $q->orWhereRaw('CONVERT(average_ratings, UNSIGNED )', '=', (int)$value );
                }

            });
//            dd($products->toSql());



        }


        if(!is_null($request->min_price) && !is_null($request->max_price)){
            $products= $products->whereBetween('price', [(int)$request->min_price, (int)$request->max_price]);
        }

        else if(!is_null($request->min_price)){
            $products = $products->where('price', '>=', (int)$request->min_price);
        }

        else if(!is_null($request->max_price)){
            $products = $products->where('price', '<=', (int)$request->max_price);
        }

        $products = $products->get();

        return view('shop.stalls.find', compact(['sellerStall', 'categories', 'products']));

    }

}
