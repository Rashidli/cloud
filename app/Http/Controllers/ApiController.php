<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogResource;
use App\Http\Resources\FaqResource;
use App\Models\Blog;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ApiController extends Controller
{

    public function blogs()
    {

        $blogs = Blog::where('is_active', true)->orderBy('id', 'desc')->paginate(9);

        return BlogResource::collection($blogs);

    }


    public function blog_single($id)
    {

        return new BlogResource(Blog::where('is_active', true)->findOrFail($id));

    }

    public function faqs()
    {
        $faqs = Faq::where('is_active', true)->orderBy('id','desc')->get();

        return FaqResource::collection($faqs);
    }


}
