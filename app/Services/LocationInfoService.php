<?php

namespace App\Services;

use App\Contracts\ApiRequestInterface;
use App\Contracts\LocationInfoInterface;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\App;

class LocationInfoService implements LocationInfoInterface, ApiRequestInterface
{
    const API_URL  = 'https://freegeoip.app/json/';
    const LOCAL_IP = '188.123.231.1';
    /**
     * @var string
     */
    protected $ip;
    /**
     * @var array
     */
    protected $locationInfo;

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * LocationInfoService constructor.
     * @param string $ip
     */
    public function __construct(string $ip)
    {
        $this->setIP($ip);
        $this->httpClient = new Client();
    }

    /**
     * @param $ip
     */
    protected function setIP($ip): void
    {
        if (App::environment() === 'local') {
            $this->ip = $this::LOCAL_IP;
        } else {
            $this->ip = $ip;
        }
    }

    /**
     * @return array
     */
    public function getLocationInfo(): array
    {
        if (empty($this->locationInfo)) {
            $this->sendRequest();
        }
        return $this->locationInfo;
    }

    /**
     * send request to API and set result to param locationInfo
     */
    public function sendRequest(): void
    {
        $response = $this->httpClient->get($this::API_URL . $this->ip);
        $this->locationInfo = json_decode($response->getBody()->getContents(), true);
    }

    public function getCity(): string
    {
        return $this->getLocationInfo()['city'];
    }

    public function getCountry(): string
    {
        return $this->getLocationInfo()['country_name'];
    }
}
