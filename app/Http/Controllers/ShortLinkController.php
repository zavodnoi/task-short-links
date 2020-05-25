<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShortLink;
use App\Model\ShortLink;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class ShortLinkController extends Controller
{
    public function index(ShortLink $shortLink)
    {
        $shortLinkList = $shortLink->getList();

        return view('index', compact('shortLinkList'));
    }

    public function store(StoreShortLink $request, ShortLink $shortLink)
    {
        $shortLinkData = $request->except('_token');
        $shortLinkData['code'] = Str::random(10);
        $shortLinkData['session_id'] = Session::getId();
        $shortLink->fill($shortLinkData)->save();
        
        return redirect('/');
    }

    public function statistic(ShortLink $shortLink)
    {
        return view('statistic', compact('shortLink'));
    }
}
