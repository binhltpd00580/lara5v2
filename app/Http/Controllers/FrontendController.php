<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{



    public function index()
    {
        $articles = Articles::where('active', 1)
                              ->orderBy('id', 'desc')
                              ->get();

        return view('index', ['articles' => $articles]);
    }



}
