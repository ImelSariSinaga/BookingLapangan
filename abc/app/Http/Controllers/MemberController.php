<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenggunaOlahraga;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function index()
    {
        // Retrieve all members with jenis_pengguna 'pelanggan' from the database
        $players = PenggunaOlahraga::with('pelanggan')->where('jenis_pengguna', 'pelanggan')->get();

        // Pass the players data to the view
        return view('player.player', compact('players'));
    }
}
