<style> 
body {
  background: rgb(204,204,204); 
}
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}

/* LOGO */
.logo{
    display: flex;
    flex-direction: column;
    text-align: center;
    margin: auto;
}
.logo img{
    margin: auto;
    width: 120px;
    margin-top: 50px;
}
.logo div{
    min-width: 33.33%;
    text-align: center;
}
</style>

<page size="A4">    
    <div class="logo"> 
        <img src="{{URL::asset('images/logo_hosp.png')}}" alt=""> 
        <div></div>        
        <div>ใบรับรองแพทย์</div>        
        <div></div>        
    </div>
    <div>

    </div>
</page>
