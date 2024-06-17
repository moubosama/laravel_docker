<?php

namespace App\Services;

use App\Contracts\WeaponServiceInterface;

class WeaponService implements WeaponServiceInterface
{
    public function useWeapon()
    {
        // 実際の武器を使う処理
        echo "Weapon is used!";
    }
}
