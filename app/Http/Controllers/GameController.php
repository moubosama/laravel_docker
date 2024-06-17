<?php

namespace App\Http\Controllers;

use App\Contracts\WeaponServiceInterface;

class GameController extends Controller
{
    protected $weaponService;

    public function __construct(WeaponServiceInterface $weaponService)
    {
        // WeaponServiceInterfaceが自動的に注入される
        $this->weaponService = $weaponService;
    }

    public function attack()
    {
        // 注入されたWeaponServiceを使う
        $weaponMessage = $this->weaponService->useWeapon();

        // ビューにデータを渡す
        return view('attack', compact('weaponMessage'));
    }
}
