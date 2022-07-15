<?php

namespace App\Http\Controllers\Blog\Personal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LikedController extends Controller
{
    public function index()
    {
        return view('blog.personal.liked.index');
    }
}
