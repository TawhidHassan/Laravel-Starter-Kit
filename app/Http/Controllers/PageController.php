<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
  /**
     * Handle the incoming request.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function __invoke($slug)
    {

        $page= Page::findBySlug($slug);
        return  view('dynamic',compact('page'));
       
    }
}
