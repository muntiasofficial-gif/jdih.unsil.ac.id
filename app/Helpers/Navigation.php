<?php


namespace App\Helpers;


use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class Navigation
{

    /**
     * Menu
     * Roles => [route name => label menu]
     */
    static protected $menus = [
        'default' => [
            'dashboard' => 'dashboard'
        ],
        'super-admin' => [
            'data-master' => 'Data Master',
            'user.list' => 'Pengguna',
            'peraturan' => 'Peraturan',
            'draft-peraturan' => 'Draft'
        ],
        'general' => [
            'data-master' => 'Data Master',
            'peraturan' => 'Peraturan'
        ],
        'guest' => [
            'guest.home' => 'Beranda',
            'guest.peraturan' => 'Peraturan',
            'guest.rancangan' => 'Rancangan',
            'guest.inventaris' => 'Inventarisasi',
        ],
    ];
    //role
    static protected $except = [
        'kepala-dinas' => [
        ],
        'sekretaris' => [
        ]
    ];

    static public function get()
    {
        if (!auth()->check()) {
            return [];
        }
        
        $data = auth()->user()->getRoleNames()->toArray();
        $result = [];
        foreach (self::$menus as $key => $item) {
            $isAccessible = array_search($key, $data);
            if ($isAccessible >= -1 || $key === "default") {
                $result = Arr::collapse([$result, $item]);
            }
        }
        //remove
        $auth = Auth::user()->roles->pluck('name');
        foreach ($auth as $k) {
            foreach (@self::$except[$k] ?? [] as $item) {
                unset($result[$item]);
            }
        }
        return $result;
    }

    static public function getGuest()
    {
        $guestMenu = self::$menus['guest'];
        
        if (\auth()->check()) {
            $guestMenu['dashboard'] = 'DASHBOARD';
        } else {
            $guestMenu['login'] = 'MASUK';
        }
        
        return $guestMenu;
    }
}
