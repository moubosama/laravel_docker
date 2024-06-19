<?php

declare(strict_types=1);

namespace App\Http\Action;

use App\Http\Controllers\Controller;
use App\Http\Responder\UserResponder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\UserService;

final class UserIndexAction extends Controller
{
    private $domain;
    private $userResponder;

    public function __construct(UserService $userService, UserResponder $userResponder)
    {
        $this->domain = $userService;
        $this->userResponder = $userResponder;
    }

    public function __invoke(Request $request): Response
    {
        // ユーザー情報を取得
        $user = $this->domain->retrieveUser($request->get('id'));
        // ユーザー情報をレスポンスに変換して返す
        return $this->userResponder->responses($user);
    }
}
