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
        <div><h1>ใบรับรองแพทย์</h1></div>        
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
            <input type="checkbox" name="" id=""> ไม่มี<br>
            <input type="checkbox" name="" id=""> ไม่มี<br>
            <input type="checkbox" name="" id=""> ไม่มี<br>
            <input type="checkbox" name="" id=""> ไม่มี
          </div>
          <div class="col-6">
            <input type="checkbox" name="" id=""> มี(ระบุ)<br>
            <input type="checkbox" name="" id=""> มี(ระบุ)<br>
            <input type="checkbox" name="" id=""> มี(ระบุ)<br>
            <input type="checkbox" name="" id=""> มี(ระบุ)
          </div>
        </div>  
        <p>*ในกรณีมีโรคลมชักให้แนบประวัติการรักษาจากแพทย์ผู้รักษาว่าท่านปลอดจากอาการชักมากกว่า 1 ปี เพื่ออนุญาตให้ขับรถได้</p>   
           
      </div>
      
      <div class="section">
        
      </div>
      <div class="myfooter">
        @php echo "<pre>";
        //print_r($model);
        echo "</pre>";
        @endphp
      </div>
    </div>
</page>
</body>
</html>



