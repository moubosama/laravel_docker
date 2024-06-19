<?php


namespace App\Contracts;

interface Mailer
{
    public function send($to, $subject, $message);
}
