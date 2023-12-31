<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'prodi';
    protected $primaryKey       = 'kd_prodi';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['kd_prodi', 'nama_prodi', 'fakultas', 'password','nama_siswa'];

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (!isset($data['data']['password'])){
            return $data;

        }

        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data;

    }

    
}
