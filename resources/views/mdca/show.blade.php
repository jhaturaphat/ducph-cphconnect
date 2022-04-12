@php    
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use \Mpdf\Mpdf as MPDF;

ini_set('max_execution_time', 300);
$mpdf = new MPDF();

$template = URL::asset('medicalca.pdf');
$pagecount = $mpdf->SetSourceFile('../public/medicalca.pdf');
$tplId = $mpdf->ImportPage($pagecount);
$mpdf->SetPageTemplate($tplId);

// Do not add page until page template set, as it is inserted at the start of each page
$mpdf->AddPage();

$mpdf->WriteHTML('Hello World');

// The template $tplId will be inserted on all subsequent pages until (optionally)
// $mpdf->SetPageTemplate();

$mpdf->Output();

@endphp

