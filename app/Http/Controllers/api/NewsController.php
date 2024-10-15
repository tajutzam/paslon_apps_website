<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //

    public function index(){
        $news = News::all();
        return response()->json(
            [
                'data' => $news
            ]
        );
    }

    public function show( $id){
        $news = News::find($id);
        return response()->json(
            [
                'data' => $news
            ]
        );
    }

}
