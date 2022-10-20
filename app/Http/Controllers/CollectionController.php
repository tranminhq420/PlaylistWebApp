<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http; //Laravel 6 khong co cai nay
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    private $posts;
    public function _construct()
    {
        $json = Http::get('https://www.reddit.com/r/CompetitiveTFT.json')
            ->json();
        $posts = collect($json['data']['children']);
    }
    public function index()
    {
        return dd($this->posts);
    }
}