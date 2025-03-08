<?php

namespace App\Controller;

use App\Service\EmailService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\User\UserInterface;


final class IndexController extends AbstractController
{
    public function __construct(private readonly EmailService $emailService)
    {  
        
    }

    #[Route('/', name: 'index', methods: ['GET'])]
    public function login(UserInterface $user): JsonResponse
    {
        $this->emailService->sendNotification('juliaanara442@gmail.com',
            'Рамзаан', 'Рамзааан');
        return $this->json('Hello World!');
    }


    #[Route('/logout', name: 'logout')]
    public function logout(): void
    {
        // Symfony сам обработает этот маршрут
    }
}
