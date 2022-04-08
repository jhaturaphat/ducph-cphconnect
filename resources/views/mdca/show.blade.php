@php
use Illuminate\Support\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
  <title>ใบรับรองแพทย์</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="{{URL::asset('styles/pdf-style.css')}}">
  
</head>
<body>
  <page size="A4">    
    <div class="logo">        
        <img src="{{ $model->logo }}" alt="logo_hos">
        <div></div>        
        <div><h2>ใบรับรองแพทย์</h2></div>        
        <div></div>        
    </div>
    <div class="mycontainer">
      <div class="section">
        <h4>ส่วนที่ ๑ ของผู้รับใบรับรองสุขภาพ</h4>
        ข้าพเจ้า    {{$model->fullname}} </br>
        สถานที่อยู่(ที่สามารถติดต่อได้) {{$model->pt_address}}</br>
        หมายเลขบัตรประจำตัวประชาชน  {{$model->cid}} ข้าพเจ้าขอใบรับรองสุขภาพโดยมีประวัติสุขภาพดังนี้</br>
        <div class="row">
          <div class="col-md-4">
            ๑.โรคประจำตัว<br>
            ๒.อุบัติเหตุ และผ่าตัด<br>
            ๓.เคยเข้ารักษาในโรงพยาบาล<br>
            ๔.โรคลมชัก *
          </div>
          <div class="col-md-2">
            <input type="checkbox" name="" id="not1"> ไม่มี<br>
            <input type="checkbox" name="" id="not2"> ไม่มี<br>
            <input type="checkbox" name="" id="not3"> ไม่มี<br>
            <input type="checkbox" name="" id="not4"> ไม่มี
          </div>
          <div class="col-6">
            <input type="checkbox" name="" id="yes1"> มี(ระบุ)<br>
            <input type="checkbox" name="" id="yes2"> มี(ระบุ)<br>
            <input type="checkbox" name="" id="yes3"> มี(ระบุ)<br>
            <input type="checkbox" name="" id="yes4"> มี(ระบุ)
          </div>
        </div>  
        <p>*ในกรณีมีโรคลมชักให้แนบประวัติการรักษาจากแพทย์ผู้รักษาว่าท่านปลอดจากอาการชักมากกว่า 1 ปี เพื่ออนุญาตให้ขับรถได้</p>   
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-4"></div>
          <div class="col-md-5">
            ลงชื่อ ....................................................</br>
            วันที่  {{Carbon::parse($model->date1)->thaidate()}}
          </div> 
        </div>  
        <small>(*ในกรณีเด็กที่ไม่สามารถรับรองตนเองได้ให้ผู้ปกครองลงนามรับรองแทนได้)</small>         
        
      </div>
      
      <div class="section mt-2">
        <h4>ส่วนที่ ๒ ของแพทย์</h4>
        สถานที่ตรวจโรงพยาบาลทั่วไป โรงพยาบาลสมเด็จพระยุพราชเดชอุดม     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       
        <small>(*๑)</small>วันที่ {{Carbon::parse($model->date1)->thaidate()}} </br>
        ข้าพเจ้า นายแพทย์/แพทย์หญิง    {{$model->doctor_name}}    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <small>(*๒)</small>ใบอนุญาตฺประกอบวิชาชีพเวชกรรมเลขที่ {{$model->doctor_cert_id}}</br>
        สถานที่ประกอบวิชาชีพเวชกรรม โรงพยาบาลทั่วไป โรงพยาบาลสมเด็จพระยุพราชเดชอุดม</br>
        ได้ตรวจร่างกาย      {{$model->fullname}}</br>
        แล้วเมื่อวันที่  {{Carbon::parse($model->date1)->thaidate()}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        มีรายละเอียดดังนี้ </br>
        น้ำหนักตัว   กก.   ความสูง    เซนติเมตร     ความดันโลหิต   มม. ปรอท ชีพจร    ครั้ง/นาที <br>
        สภาพทั่วไป  อยู่ในเกณฑ์ 
        <input type="checkbox" name="" id=""> ปกติ &nbsp;&nbsp; 
        <input type="checkbox" name="" id=""> ไม่ปกติ (ระบุ)................................................</br>
        ขอรับรองว่าบุคลดังกล่าว ไม่เป็นผู้มีร่างก่ายทุพลภาพจนไม่สามารถปฎิบัติหน้าที่ได้ ไม่ปรากฏอาการของโรคจิต หรือ จิตฟั่นเฟือน หรือปัญญาอ่อน ไม่ปรากฎอาการของการติดยาเสพติดให้โทษ และอาการของโรคสุราเรื้อรัง
        และไม่ปรากฎอาการและอาการแสดงของโรคต่อไปนี้</br>
        <ul>
          <li>(๑) โรคเรื้อนในระยะติดต่อ หรือในระยะที่ปรากฎอาการเป็นที่รังเกียจแก่สังคม</li>
          <li>(๒) วัณโรคในระยอัตราย</li>
          <li>(๓) โรคท้าช้างในระยะที่ปรากฎอาการเป็นที่หน้ารังเกียจแก่สังคม</li>
          <li>(๔) อื่นๆ..................................................</li>
        </ul>
      <small>(*๓)</small>สรุปความคิดเห็น และข้อเสนอแนะของแพทย์</br>
      {{$model->note2}}
      </div>
      <div class="myfooter">
        @php echo "<pre>";
        print_r($model);
        echo "</pre>";
        @endphp
      </div>
    </div>
</page>
</body>
</html>



