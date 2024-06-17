<?php

// 新しいLaravelアプリケーションのインスタンスを生成してます
$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

// インターフェースに具象クラスをサービスコンテナにバインドしてます

// Httpカーネルのバインド
$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

// Consoleカーネルのバインド
$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

// 例外ハンドラーのバインド
$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

return $app;
