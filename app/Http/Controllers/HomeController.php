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

        $data['partners'] = Partner::orderBy('id','ASC')->get();

        $data['categories'] = Product_category::orderBy('sort_order','ASC')->get();

        return view('home',$data);
    }

    public function about() 
    {

        return view('about',);
    }

    public function shop() 
    {
        $data['products'] = Product::orderBy('sort_order','ASC')->with(['Product_category'])->paginate(9);

        $data['categories'] = Product_category::orderBy('sort_order','ASC')->get();

        return view('shop',$data);
    }

    public function shopcategory($id) 
    {
        $data['selectedcategory'] = Product_category::where('id',$id)->first();

        $data['products'] = Product::where('Product_category_id',$id)->orderBy('sort_order','ASC')->paginate(9);

        $data['categories'] = Product_category::where('id','!=',$id)->get();

        return view('shopcategory',$data);
    }

    public function product($categorylink,$id)
    {
        $data['product'] = Product::where('id',$id)->with(['Product_category'])->first();

        $data['others'] = Product::where('id','!=',$id)->with(['Product_category'])->inRandomOrder()->limit(4)->get();

        return view('product',$data);
    }

}
