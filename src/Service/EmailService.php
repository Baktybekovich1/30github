<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class EmailService
{
    public function __construct(private MailerInterface $mailer)
    {
    }

    public function sendNotification(string $to, string $subject, string $body): void
    {
        $email = (new Email())
            ->from('kydyrmysheva2005@gmail.com') // Замените на ваш email
            ->to($to)
            ->subject($subject)
            ->text($body);

        $this->mailer->send($email);
    }

}