<?php

namespace App\Http\Controllers;

use App\Model\ShortLink;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    public function index(ShortLink $shortLink)
    {
        return view('index');
    }

    public function store(Request $request)
    {

    }

    public function statistic(ShortLink $shortLink)
    {
        return view('statistic');
    }
}
