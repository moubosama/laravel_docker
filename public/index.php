<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

// タイマー開始。フレームワークの起動にかかる時間などを測れる
define('LARAVEL_START', microtime(true));

// メンテナンスモードのファイルがあればメンテナンス画面を表示して終了する
// https://github.com/laravel/framework/blob/8.x/src/Illuminate/Foundation/Console/stubs/maintenance-mode.stub
if (file_exists(__DIR__.'/../storage/framework/maintenance.php')) {
    require __DIR__.'/../storage/framework/maintenance.php';
}

// composer dump-autoload で生成されたオートローダーを読み込む
// オートローダーとは外部にあるPHPファイルを自動的に読み込む仕組みです
// https://genkiroid.github.io/2016/07/15/about-composer-autoload
require __DIR__.'/../vendor/autoload.php';

// ここからLaravelのコアシステムが始まります
// Illuminate\Foundation\Application のインスタンスを取得して $app に格納してます
// サービスコンテナを生成してHttpカーネル、Consoleカーネル、例外ハンドラーのインスタンスの生成を行います
// https://github.com/laravel/laravel/blob/8.x/bootstrap/app.php
$app = require_once __DIR__.'/../bootstrap/app.php';

// 上の行で生成したHttpカーネルのインスタンスを取得してます(App\Http\Kernel)
$kernel = $app->make(Kernel::class);

// tapやsendの挙動がどうなっているのか怪しいですが...
// 送信されてきたHttpリクエスト(GET, POSTの中身)をHttpカーネルへ渡してHttpレスポンスを取得してます
$response = tap($kernel->handle(
    $request = Request::capture()
))->send();

// Laravelの終了処理
$kernel->terminate($request, $response);
