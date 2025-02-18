<?php

namespace App\Controller;

use App\Service\EmailService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class IndexController extends AbstractController
{
    public function __construct(private readonly EmailService $emailService)
    {
    }

    #[Route('/', name: 'index', methods: ['GET'])]
    public function login(): JsonResponse
    {

        $this->emailService->sendNotification('juliaanara442@gmail.com',
            'Открыта страница уведомления', 'Пользователь открыл страницу уведомлений.');

        return $this->json('Hello World!');
    }






//
//    #[Route('/logout', name: 'logout')]
//    public function logout(): void
//    {
//        // Symfony сам обработает этот маршрут
//    }
}
