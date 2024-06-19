<?php

// app/Services/UserService.php
namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\App;

class UserService
{
    protected $userRepository;
    protected $notifier;

    // メソッドインジェクション
    public function sendNotification(NotifierInterface $notifier, string $to, string $message): void
    {
        $notifier->send($to, $message);
    }
}

app()->bind(NotifierInterface::class, function ($app) {
        return new MailSender();
});

$service = app(UserService::class);
$to = 'address';
$message = 'message';
app()->call([$service, 'sendNotification'], ['to' => $to, 'message' => $message]);

// NotifierInterfaceの定義
interface NotifierInterface
{
    public function send(string $to, string $message): void;
}

// MailNotifierクラスの実装
class MailNotifier implements NotifierInterface
{
    public function send(string $to, string $message): void
    {
        // メールを送信
        echo "Sending email to $to: $message\n";
    }
}

// PushSenderクラスの実装
class PushSender implements NotifierInterface
{
    public function send(string $to, string $message): void
    {
        // プッシュ通知を送信するロジック
        echo "Sending push notification to $to: $message\n";
    }
}

// MailSenderクラスの定義
class MailSender
{
    public function send(string $to, string $message): void
    {
        // メールを送信
        echo "Sending email to $to: $message\n";
    }
}

$mailNotifier = new MailNotifier();
$pushSender = new PushSender();
$userService = new UserService();

$userService->sendNotification($mailNotifier, "example@example.com", "This is a test email message.");
$userService->sendNotification($pushSender, "example@example.com", "This is a test push message.");
