<?php

namespace App\dtos;

class LoginRequestDTO
{
    public string $userName;
    public string $password;

    public function __construct(string $userName, string $password)
    {
        $this->userName = $userName;
        $this->password = $password;
    }
}
