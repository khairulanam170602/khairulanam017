<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DaftarGuruModel;

class Guru extends BaseController
{
    protected $pm;
    private $menu;
    private $rules;
    public function __construct()
    {
        $this->pm = new DaftarGuruModel();

        $this->menu = [
            'Beranda'=>[
                'title'=>'Beranda',
                'link'=>base_url(),
                'icon'=> 'fa-solid fa-house',
                'aktif'=>'',
            ],
            'prodi'=>[
                'title'=>' studi',
                'link'=>base_url() . '/prodi',
                'icon'=>'fa-solid fa-building-columns',
                'aktif'=>'',
            ],
            'guru'=>[
                'title'=>'Daftar Guru',
                'link'=>base_url() . '/guru',
                'icon'=>'fa-solid fa-users',
                'aktif'=>'active',
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
        $this->rules = [
            'kd_guru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode guru tidak boleh kosong',
                ]
            ],
         'nama_guru' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama guru tidak boleh kosong',
            ]
        ],
         'alamat_guru'   => [
            'rules' => 'required',
            'errors' => [
                'required' => 'alamat guru tidak boleh kosong',
            ]
        ],
    ];
    }
    public function index()
    {

        $breadcrumb =' <div class="col-sm-6">
                            <h1 class="m-0">Data guru</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="'. base_url().'"></a>Beranda</li>
                            <li class="breadcrumb-item active">guru</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "data guru";

        $query = $this->pm->find();
        
        $data['data_guru'] = $query;
        return view ('guru/content',$data);
    }
   public function tambah()
   {
    $breadcrumb =' <div class="col-sm-6">
                            <h1 class="m-0">guru</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="'. base_url(). '">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="'. base_url(). '/guru">guru</a></li>
                            <li class="breadcrumb-item active">Tambah guru</li>
                            </ol>
                        </div>';
    $data['menu'] = $this->menu;
    $data['breadcrumb'] = $breadcrumb;
    $data['title_card'] = "Tambah guru";
    $data['action'] = base_url(). '/guru/simpan';
    return view('guru/input', $data);
   }

   public function simpan()
   {
   
                if (strtolower($this->request->getMethod()) !== 'post'){
           
            return redirect()->back()->withInput();
        }
        if (! $this->validate($this->rules)) {

           return redirect()->back()->withInput();
        }
        $dt = $this->request->getpost();
        try {
            $simpan = $this->pm->insert($dt);
        
            return redirect()->to('guru')->with('success','Data berhasil disimpan');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {

            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
   }
   public function hapus($id)
   {    if (empty($id)) {
    return redirect()->back()->with('error', 'Hapus data gagal dilakukan prameter tidak valid');

    }
        try {
            $this->pm->delete($id);
            return redirect()->to('guru')->with('success', 'Data Jurusan dengan kode'.$id.'berhasil dihapus');
        }  catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return redirect()->to('guru')->with('error',$e->getMessage());
         }
   }

   public function edit($id)
   {
    $breadcrumb =' <div class="col-sm-6">
    <h1 class="m-0">guru</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="'. base_url(). '">Beranda</a></li>
    <li class="breadcrumb-item"><a href="'. base_url(). '/guru">guru</a></li>
    <li class="breadcrumb-item active">Edit guru</li>
    </ol>
</div>';
$data['menu'] = $this->menu;
$data['breadcrumb'] = $breadcrumb;
$data['title_card'] = "Edit data guru";
$data['action'] = base_url(). '/guru/update';

$data['edit_data'] = $this->pm->find($id);
return view('guru/input', $data);
   }

   public function update(){
        $dtEdit = $this->request->getpost();
        $param = $dtEdit['param'];
        unset($dtEdit['param']);
        unset($this->rules['password']);

        if (!$this->validate($this->rules)) {

            return redirect()->back()->withInput();
         }

         if(empty($dtEdit['password'])){
            unset($dtEdit['password']);
         }

         try {
            $this->pm->update($param, $dtEdit);
            return redirect()->to('guru')->with('success', 'Data berhasil diupdate');
         } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
                session()->setFlashdata('error',$e->getMessage());
                return redirect()->back()->withInput();
         }
    }
}