<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HDoctorCert extends Model
{
    protected $connection = 'mysql_hos';
    protected $table = 'doctor_cert';    
    protected $primaryKey = 'doctor_cert_id';

    public function patient($hn=''){
        return $this->hasOne(HPatient::class,'hn','hn');
    }
}