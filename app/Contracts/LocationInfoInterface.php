<?php


namespace App\Contracts;


interface LocationInfoInterface
{
    public function getLocationInfo(): array ;

    public function getCity(): string;

    public function getCountry(): string;
}
