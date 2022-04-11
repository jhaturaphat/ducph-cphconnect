<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\HDoctorCert;
use \Mpdf\Mpdf as MPDF;

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

        // $pdf = MPDF::loadView('mdca.show', ['model'=>$model[0]]);
        // return $pdf->stream('document.pdf');

        return view('mdca.show',[
            'model'=>$model[0]
        ]);
    }

    public function document()
    {
        // Setup a filename 
        $documentFileName = "fun.pdf";
 
        // Create the mPDF document
        $document = new MPDF( [
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_header' => '3',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'margin_footer' => '2',
        ]);     
 
        // Set some header informations for output
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$documentFileName.'"'
        ];
 
        // Write some simple Content
        $document->WriteHTML('<h1 style="color:blue">TheCodingJack</h1>');
        $document->WriteHTML('<p>Write something, just for fun!</p>');
 
        // Use Blade if you want
        //$document->WriteHTML(view('fun.testtemplate'));
         
        // Save PDF on your public storage 
        Storage::disk('public')->put($documentFileName, $document->Output($documentFileName, "F"));
         
        // Get file back from storage with the give header informations
        return Storage::disk('public')->download($documentFileName, 'Request', $header); //
    }
}
