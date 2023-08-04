<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarGuruModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_guru';
    protected $primaryKey       = 'kd_guru';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['kd_guru', 'nama_guru', 'alamat_guru'];

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
