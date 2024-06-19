<?php

declare(strict_types=1);

namespace App\Services;

use App\Book;
use App\user;
use App\Purchase;

class BookService
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * 本を注文する 本の在庫がない場合は例外を投げる
     *
     * @param array $books
     * @return void
     */
    public function order(array $books = []): void
    {
        $purchase = [];

        /** @var App\DataTransfer\Book\ $book */
        foreach($books as $book) {
            if (!$result = Book::find($book->getId())) {
                throw new App\Exceptions\BookNotFoundException('在庫エラー');
            }
            $purchase[] = $result;
        }

        foreach($purchase as $purchase) {
            $purchase::create([
                'user_id' => $purchase->id(),
                'book_id' => $this->user()->id(),
            ]);
        }

        // ポイント加算
        // 決済管完了メール送信
    }
}
