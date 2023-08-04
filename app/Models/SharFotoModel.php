<?php

namespace App\Models;

use CodeIgniter\Model;

class SharFotoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'foto';
    protected $primaryKey       = 'kd_foto';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['kd_foto', 'foto', 'tanggal_shar'];

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