<?php

namespace App\Dto\Login;

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class SignUpDto
{
    public function __construct(
        #[NotBlank]
        readonly public string $email,
        #[Length(min: 6)]
        readonly public string $password
    )
    {
    }

}