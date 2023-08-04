<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SharFotoModel;

class Foto extends BaseController
{
    protected $pm;
    private $menu;
    private $rules;
    public function __construct()
    {
        $this->pm = new SharFotoModel();

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
                'aktif'=>'active',
            ],
        ];
        $this->rules = [
            'kd_foto' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode foto tidak boleh kosong',
                ]
            ],
         'foto' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama foto tidak boleh kosong',
            ]
        ],
         'tanggal_shar'   => [
            'rules' => 'required',
            'errors' => [
                'required' => 'tanggal shar tidak boleh kosong',
            ]
        ],
    ];
    }
    public function index()
    {

        $breadcrumb =' <div class="col-sm-6">
                            <h1 class="m-0">Data foto</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="'. base_url().'"></a>Beranda</li>
                            <li class="breadcrumb-item active">foto</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "data foto";

        $query = $this->pm->find();
        
        $data['data_foto'] = $query;
        return view ('foto/content',$data);
    }
   public function tambah()
   {
    $breadcrumb =' <div class="col-sm-6">
                            <h1 class="m-0">foto</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="'. base_url(). '">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="'. base_url(). '/foto">foto</a></li>
                            <li class="breadcrumb-item active">Tambah foto</li>
                            </ol>
                        </div>';
    $data['menu'] = $this->menu;
    $data['breadcrumb'] = $breadcrumb;
    $data['title_card'] = "Tambah foto";
    $data['action'] = base_url(). '/foto/simpan';
    return view('foto/input', $data);
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
        
            return redirect()->to('foto')->with('success','Data berhasil disimpan');
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
            return redirect()->to('foto')->with('success', 'Data Jurusan dengan kode'.$id.'berhasil dihapus');
        }  catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return redirect()->to('foto')->with('error',$e->getMessage());
         }
   }

   public function edit($id)
   {
    $breadcrumb =' <div class="col-sm-6">
    <h1 class="m-0">foto</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="'. base_url(). '">Beranda</a></li>
    <li class="breadcrumb-item"><a href="'. base_url(). '/foto">foto</a></li>
    <li class="breadcrumb-item active">Edit foto</li>
    </ol>
</div>';
$data['menu'] = $this->menu;
$data['breadcrumb'] = $breadcrumb;
$data['title_card'] = "Edit data foto";
$data['action'] = base_url(). '/foto/update';

$data['edit_data'] = $this->pm->find($id);
return view('foto/input', $data);
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
            return redirect()->to('foto')->with('success', 'Data berhasil diupdate');
         } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
                session()->setFlashdata('error',$e->getMessage());
                return redirect()->back()->withInput();
         }
    }
}
