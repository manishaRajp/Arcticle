<?php

namespace App\Contracts;

interface LoginContracts
{
    public function register(array $data);
    public function login(array $data);
}

