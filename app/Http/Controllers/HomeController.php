<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog_gallery;
use App\Models\Blog_post;
use App\Models\Partner;
use App\Models\Product_category;
use App\Models\Product;
use App\Models\Service;

class HomeController extends Controller
{
    public function index() 
    {
        $data = null;

        $data['services'] = Service::orderBy('id','ASC')->limit(3)->get();

        $data['blogs'] = Blog_post::orderBy('id','DESC')->limit(4)->get();

        return view('home',$data);
    }
    public function shop() 
    {
        $data['products'] = Product::orderBy('sort_order','ASC')->get();

        return view('shop');
    }

    public function shopcategory($id) 
    {
        $data['category'] = Product_category::where('id',$id)->first();

        $data['products'] = Product::where('Product_category_id',$id)->orderBy('sort_order','ASC')->get();

        return view('shopcategory');
    }

    public function product($categorylink,$id)
    {
        $data['product'] = Product::where('id',$id)->with(['Product_category'])->first();

        return view('product',$data);
    }

}
