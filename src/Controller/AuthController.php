<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\User\UserInterface;

final class AuthController extends AbstractController
{


    public function __construct(
        private readonly Security                 $security,
        private readonly UserRepository           $userRepository,
        private readonly JWTTokenManagerInterface $jwtManager)
    {
    }

    #[Route('/api/token', name: 'app_api_token', methods: ['GET'])]
    public function getToken(UserInterface $user): JsonResponse
    {
        return $this->json(['token' => $this->jwtManager->create($user)]);
    }

    #[Route('/api/login/save', name: 'app_login_save', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $userSecurity = $this->security->getUser();
        $user = new  User();
        $user->setEmail($userSecurity->getUserIdentifier());
        $user->setRoles($userSecurity->getRoles());
        $this->userRepository->save($user);
        return $this->json($userSecurity->getUserIdentifier());
        
    }
}
