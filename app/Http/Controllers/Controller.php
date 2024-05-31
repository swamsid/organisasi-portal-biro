<?php

namespace App\Http\Controllers;

use App\Models\LogBerita;
use App\Models\LogLayanan;
use App\Models\Search;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function setLogLayanan($postingan, $request)
    {
        LogLayanan::create([
            'ip_address' => $request->ip() ,
            'user_agent' =>  $request->userAgent(),
            'judul' => $postingan->judul,
            'id_layanan' => $postingan->id,
        ]);
    }

    public function setLogBerita($berita, $request)
    {
        LogBerita::create([
            'ip_address' => $request->ip() ,
            'user_agent' =>  $request->userAgent(),
            'judul' => $berita->judul,
            'id_layanan' => $berita->id,
        ]);
    }

    public function setLogKeyword($request)
    {
        Search::create([
            'ip_address' => $request->ip() ,
            'user_agent' =>  $request->userAgent(),
            'keyword' => $request->keyword,
        ]);
    }
}
