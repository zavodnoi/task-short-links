<?php


namespace App\Contracts;


interface LocationInfoInterface
{
    public function getCity(): string;

    public function getCountry(): string;
}
