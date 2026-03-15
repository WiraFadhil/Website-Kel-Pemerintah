<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KepalaDaerah;

class KepalaDaerahUserController extends Controller
{
    public function lurah()
    {
        $lurah = KepalaDaerah::where('jabatan', 'Lurah Balang Baru')->firstOrFail();
        return view('user.lurah', compact('lurah'));
    }


}
