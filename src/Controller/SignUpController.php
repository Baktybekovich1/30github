<?php

namespace App\Controller;

use App\Dto\Login\SignUpDto;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

final class SignUpController extends AbstractController
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    #[Route('/sign-up', name: 'app_sign_up', methods: ['POST'])]
    public function signUp(#[MapRequestPayload] SignUpDto $dto, UserPasswordHasherInterface $userPasswordHasher): JsonResponse
    {

        if ($this->userRepository->existsByEmail($dto->email)) {
            return $this->json(['Email already exists.'], Response::HTTP_BAD_REQUEST);
        }
        $user = new User();
        $user->setEmail($dto->email);
        $user->setRoles(['ROLE_USER']);
        $user->setPassword($userPasswordHasher->hashPassword($user, $dto->password));

        $this->userRepository->save($user);

        return $this->json(['token' => 'Ilya Salam']);
    }
}
