<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\HDoctorCert;
use PDF;

class MDCAController extends Controller
{
    /*
    * @return \Illuminate\Http\Request
    */
    public function index($hn='000088973'){
        

        $model = DB::connection('mysql_hos')->select("
        SELECT doctor_cert.*, CONCAT(patient.pname, patient.fname, patient.lname) as fullname
        FROM doctor_cert 
        INNER JOIN patient ON doctor_cert.hn = patient.hn
        WHERE doctor_cert.hn = :hn 
        ORDER BY doctor_cert.create_datetime DESC", 
        ['hn'=>$hn]);

        return view('mdca.index',[
            'model'=>$model,
            'moduletitle'=>'ใบรับรองแพทย์',
            'view_menu'=>'anable'
        ]);
    }


    /*
    * @return \Illuminate\Http\Request
    */
    public function show($vn = ''){
        $model = DB::connection('mysql_hos')->select("
        SELECT doctor_cert.*, CONCAT(patient.pname, patient.fname, patient.lname) as fullname
        FROM doctor_cert 
        INNER JOIN patient ON doctor_cert.hn = patient.hn
        WHERE doctor_cert.vn = :vn 
        ORDER BY doctor_cert.create_datetime DESC", 
        ['vn'=>$vn]);

        $path = 'images/logo_hosp.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        $model[0]->logo = $base64;

        return view('mdca.show',[
            'model'=>$model[0]
        ]);
    }
}
