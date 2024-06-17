<?php

namespace App\Http\Controllers;

use App\Contracts\HogeInterface;
use PhpParser\Node\Expr\FuncCall;

class HogeController extends Controller
{

    protected $hogeService;

    public function __construct(HogeInterface $hogeService)
    {
        $this->hogeService = $hogeService;
    }

    public function show()
    {
        $result = $this->hogeService->getHoge();
        return response()->json(['message' => $result]);
    }

}
