<?php
// app/Http/Controllers/UserController.php
namespace App\Http\Controllers;

use App\Contracts\Mailer;

use Illuminate\Http\Response;
use Illuminate\View\View;

class UserController extends Controller
{
    protected $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendWelcomeEmail($user)
    {
        $this->mailer->send($user->email, 'Welcome', 'Welcome to our application!');
    }

    public function detail(string $id): View
    {
        return view('user.detail');
    }

    public function UserDetail(string $id): Response
    {
        return new Response(view('user.detail'), Response::HTTP_OK);
    }
}
