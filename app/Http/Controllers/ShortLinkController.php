<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShortLink;
use App\Model\ShortLink;
use App\Services\BrowserDetailService;
use App\Services\LocationInfoService;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        $clickthroughList = $shortLink->clickthroughs()->get();

        return view('statistic', compact('shortLink', 'clickthroughList'));
    }

    public function redirect(ShortLink $shortLink, Request $request)
    {
        if ($shortLink->lifetimeExpired) {
            abort(404);
        }

        $userAgent = $request->header('User-Agent');
        $clientIp = $request->getClientIp();

        $browserDetailService = new BrowserDetailService($userAgent);
        $locationInfoService = new LocationInfoService($clientIp);

        $shortLink->clickthroughs()->create([
            'visited_at' => Carbon::now(),
            'city'       => $locationInfoService->getCity(),
            'country'    => $locationInfoService->getCountry(),
            'browser'    => $browserDetailService->getBrowser(),
            'os'         => $browserDetailService->getOS(),
        ]);

        return redirect()->to($shortLink->link);
    }
}
