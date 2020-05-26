<?php

namespace App\Services;

use App\Contracts\BrowserDetailInterface;

class BrowserDetailService implements BrowserDetailInterface
{
    /**
     * @var string
     */
    protected $userAgent;
    /**
     * @var \stdClass
     */
    protected $browserDetails;

    /**
     * BrowserDetailService constructor.
     * @param string $userAgent
     */
    public function __construct(string $userAgent)
    {
        $this->userAgent = $userAgent;
        $this->browserDetails = get_browser($userAgent);
    }

    /**
     * OS name
     * @return string
     */
    public function getOS(): string
    {
        return $this->browserDetails->platform;
    }

    /**
     * browser name and version
     * @return string
     */
    public function getBrowser(): string
    {
        return $this->browserDetails->parent;
    }
}
