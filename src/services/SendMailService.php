<?php
namespace App\services;

use Symfony\Component\Mime\Address;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class SendMailService {

    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }


    public function mailContact($form){
        $mail = (new TemplatedEmail())
        ->from(new Address('contact@aid-benin.org', 'Aid-BENIN'))
        ->to('contact@aid-benin.org')
        ->subject('Nouvelle Demande')
        ->htmlTemplate('mails/mail.contact.html.twig')
        ->context([
            'info' => $form
        ]);
        $this->mailer->send($mail);
    }
    
}