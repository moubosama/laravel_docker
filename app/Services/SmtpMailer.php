<?php

namespace App\Services;

use App\Contracts\Mailer;

class SmtpMailer implements Mailer
{
    public function send($to, $subject, $message)
    {
        // SMTPを使ってメールを送信するロジック
        echo "Sending email to $to with subject $subject via SMTP.";
    }
}
