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

        return view('home');
    }
    public function shop() 
    {
        $data = null;

        return view('shop');
    }

    public function blog($id)
    {
        $data['blog'] = Blog_post::where('id',$id)->first();

        $data['slides'] = Blog_gallery::where('blog_post_id',$id)->get();

        return view('blogdetail',$data);
    }

}
