<?php

namespace App\Dto\Login;

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

readonly class SignUpDto
{
    public function __construct(
        #[NotBlank]
        public string $email,
        #[Length(min: 6)]
        public string $password
    )
    {
    }

}