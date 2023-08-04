<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Semister extends BaseController
{
    public function index()
    {
        $menu = [
            'beranda'=>[
                'title'=>'Beranda',
                'link'=>base_url(),
                'icon'=>'fa-solid fa-house',
                'aktif'=>'',
            ],
            'prodi'=>[
                'title'=>' studi',
                'link'=>base_url() . '/prodi',
                'icon'=>'fa-solid fa-building-columns',
                'aktif'=>'',
            ],
            'semister'=>[
                'title'=>'Kelas',
                'link'=>base_url() . '/semister',
                'icon'=>'fa-solid fa-list',
                'aktif'=>'active',
            ],
            'mahasiswa'=>[
                'title'=>'Profil Guru',
                'link'=>base_url() . '/mahasiswa',
                'icon'=>'fa-solid fa-users',
                'aktif'=>'',
            ],
            'gelery'=>[
                'title'=>'Gelery',
                'link'=>base_url() . '/gelery',
                'icon'=>'	fas fa-images',
                'aktif'=>'',
            ],
            'guru'=>[
                'title'=>'Daftar Guru',
                'link'=>base_url() . '/guru',
                'icon'=>'fa-solid fa-users',
                'aktif'=>'',
            ],
            'foto'=>[
                'title'=>'foto',
                'link'=>base_url() . '/foto',
                'icon'=>'	fas fa-images',
                'aktif'=>'',
            ],
        ];

        $breadcrumb = '
        <div class="col-sm-6">
            <h1 class="m-0">Kelas & jurusan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="' .base_url(). '">Beranda</a></li>
              <li class="breadcrumb-item active">semister</li>
            </ol>
          </div>';
        $data['menu'] = $menu;
        $data['breadcrumb'] = $breadcrumb;
        return view('semister/content', $data);
    }
}
