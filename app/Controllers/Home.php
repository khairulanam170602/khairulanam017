<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $menu = [
            'beranda'=>[
                'title'=>'Beranda',
                'link'=>base_url(),
                'icon'=>'fa-solid fa-house',
                'aktif'=>'active',
            ],
            'prodi'=>[
                'title'=>' Studi',
                'link'=>base_url() . '/prodi',
                'icon'=>'fa-solid fa-building-columns',
                'aktif'=>'',
            ],
            'guru'=>[
                'title'=>'Daftar Guru',
                'link'=>base_url() . '/guru',
                'icon'=>'fa-solid fa-users',
                'aktif'=>'',
            ],
            
            'mahasiswa'=>[
                'title'=>'Profil Guru',
                'link'=>base_url() . '/mahasiswa',
                'icon'=>'fas fa-user-tie',
                'aktif'=>'',
            ],
            'gelery'=>[
                'title'=>'Gelery',
                'link'=>base_url() . '/gelery',
                'icon'=>'	fas fa-images',
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
            <h1 class="m-0">Beranda</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Beranda</li>
            </ol>
          </div>';
        $data['menu'] = $menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "welcome to my site";
        $data['selamat_datang'] = "SELAMAT DATANG DI APLIKASI KAMI";
        return view('Home/content', $data);
    }
}
