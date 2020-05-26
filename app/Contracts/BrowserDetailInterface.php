<?php


namespace App\Contracts;


interface BrowserDetailInterface
{
    public function getOS(): string;

    public function getBrowser(): string;
}
