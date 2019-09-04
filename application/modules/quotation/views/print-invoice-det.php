<?php 
$invoiceNo  = "";$subject   = "";$invoice_date   = "";
$first_name = "";$address1  = "";$city           = ""; 
$contant    = "";$stateName = "";$contact_person = "";
$priceText  = "";$org_name="";
if(sizeof($result) > 0){ 
      $contact_person = $result['contact_person'];
      $invoiceNo      = $result['purchase_no'];
      $subject        = $result['subject'];
      $priceText      = $result['pricetext'];
      $invoice_date   = $result['invoice_date'];
      $first_name     = $result['person_name'];
      $address1       = $result['address1'];
      $city           = $result['city'];
      $stateName      = $result['state_id'];
      $contant        = $result['contant'];
      $org_name      = $result['org_name'];
	  $invoiceNo1 = str_replace('_','-',$invoiceNo);
      $date           = date_create($invoice_date);
      if(sizeof($technicaldetails) > 0){
       $contact = $technicaldetails[0]['pro_name'];
       
      }
      
 }  
 
 


 function words_repues($num)
{ 
  $numberF=$num;
  $action34=explode(".",$numberF);
  $balance10=$action34[0];
  $balance11=$action34[1];
  $no = $balance10;
  $point = $balance11;
  $hundred = null;
  $digits_1 = strlen($no);
  $i = 0;
  $str = array();
  $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
  $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
  while ($i < $digits_1) {
    $divider = ($i == 2) ? 10 : 100;
    $number = floor($no % $divider);
    $no = floor($no / $divider);
    $i += ($divider == 10) ? 1 : 2;
  if ($number) {
    $plural = (($counter = count($str)) && $number > 9) ? '' : null;
    $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
    $str [] = ($number < 21) ? $words[$number] .
    " " . $digits[$counter] . $plural . " " . $hundred
    :
    $words[floor($number / 10) * 10]
    . " " . $words[$number % 10] . " "
    . $digits[$counter] . $plural . " " . $hundred;
    } else $str[] = null;
  }
    $str = array_reverse($str);
    $result = implode('', $str);
    $points = ($point) ?
    " " . $words[$point / 10] . " " . 
    $words[$point = $point % 10] : '';
    strtoupper($result . "Rupees " . $points . " Paise");
    $grandexplode=number_format((float)$num, 2, '.', '');
    $action23=explode(".",$grandexplode);
    $groundA=$action23[0];
    $groundV=$action23[1];  
    if($groundV >=1 ){
      $goundStr=ucfirst($result . "Rupees and" . $points . " Paise");
      }else{
      $goundStr=ucfirst($result . "Rupees Only");
    } 
    return $goundStr;
  }

 
 
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?=$invoiceNo1;?>-<?=$first_name;?>-<?=$contact;?></title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
<link rel="stylesheet" href="<?=base_url();?>css/style_q.css">
<style>
.table-listWrap {
    
   /* height:600px;*/
    width:auto;
    
}

.table-list {
    
    table-list-style: none;
    margin: 0;
    padding: 0;
    display: table;
    /*white-space: nowrap;*/
    width: 100%;
    
}

.class30{
    display: block !important;
    page-break-before: always !important;
    padding-top:60mm !important;

}

.table-list li {
    
    background-color: #fff;
    display: table-row;

}


.table-list li:nth-child(even) {
    
    background-color: #fff;
    display: table-row;

}


.table-list li:nth-child(1) span:first-child {
    
    border-top-left-radius:none;
    
}

.table-list li:nth-child(1) span:last-child {
    
    border-top-right-radius:none;
    
}

.table-list span {
    
    text-align: left;
    display: table-cell;
    padding: 6px;
    vertical-align: middle;
	border-top: 1px solid #000;
    border-right: 1px solid #000;
    border-left: 1px solid #000;
    border-bottom: 1px solid #000;
	width:50%;
}


.arrowlistmenu{
width: 180px; /*width of menu*/
}

.arrowlistmenu .headerbar{
font: bold 14px Arial;
color: white;
background: black url(media/titlebar.png) repeat-x center left;
margin-bottom: 10px; /*bottom spacing between header and rest of content*/
text-transform: uppercase;
padding: 4px 0 4px 10px; /*header text is indented 10px*/
}

.arrowlistmenu ul{
list-style-type: none;
margin: 0;
padding: 0;
margin-bottom: 8px; /*bottom spacing between each UL and rest of content*/
}

.arrowlistmenu ul li{
padding-bottom: 2px; /*bottom spacing between menu items*/
}

.arrowlistmenu ul li a{
color: #A70303;
background: url(media/arrowbullet.png) no-repeat center left; /*custom bullet list image*/
display: block;
padding: 2px 0;
padding-left: 19px; /*link text is indented 19px*/
text-decoration: none;
font-weight: bold;
border-bottom: 1px solid #dadada;
font-size: 90%;
}

.arrowlistmenu ul li a:visited{
color: #A70303;
}

.arrowlistmenu ul li a:hover{ /*hover state CSS*/
color: #A70303;
background-color: #F3F3F3;
}

.page-break  { display: block !important; page-break-before: always; padding-top:10mm; margin-top:30px; }


@page { size: A4 }
  .classbreark{page-break-after: always;}
.style1 {font-weight: bold}

.pheight > li{
  padding-bottom: 7px;
}

.list-numbered {
  list-style: disc;
  margin-left: 1em;
  counter-reset: line;
}

.list-numbered > li {
  position: relative;
  margin-bottom:5px;
}


</style>
</head>
<body class="A4">
<div style="margin:auto; width:210mm;">
<section class="sheet padding-10mm">
<article>
<table id="meta" style="width:100%; overflow:hidden;border-top:4px solid #FF6600; border-bottom:4px solid #FF6600; padding-top:7px; padding-bottom:7px; margin-bottom:25px;
font-size:11px;">
    <tr>
      <td width="45%">&nbsp;</td>
      <td width="16%">&nbsp;</td>
      <td width="7%">&nbsp;</td>
      <td width="32%">&nbsp;</td>
    </tr>
    <tr>
      <td rowspan="5"><img src="<?=base_url();?>images/logo.jpg" alt="" /></td>
      <td>&nbsp;</td>
      <td colspan="2" valign="top"><strong>Works1:</strong> A-7/108 to 110, SS GT Road Industrial Area, Ghaziabad, U.P. – 201009</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><strong>Works2: </strong>E-11 South East Zone MIA, Alwar301030</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>Phone:</strong></td>
      <td>0120-4562332</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="meta-head"><strong>Web:</strong></span></td>
      <td style="color:#FF2413;">www.thermodyneboilers.com</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>Email:</strong></td>
      <td style="color:#0000ff;">sales1@thermodyneboilers.com</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  
<table id="meta" style="width:100%;">
    <tr>
      <td width="38%" height="23"><strong style="font-size:14px;">Ref: <?=$invoiceNo;?></strong></td>
      <td width="33%">&nbsp;</td>
      <td width="29%"><strong style="text-align:right; float:right; font-size:14px;"><?=date_format($date,"F d Y");?></strong></td>
    </tr>
    <tr>
      <td height="10" colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td><strong style="font-size:14px;">M/s <?=$org_name;?></strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td style="font-size:14px;"><?php if($$address1!='Address'){echo $address1;} if($city!='City'){echo $city;}?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong style="font-size:14px;"><u><?php if($stateName!='State'){ echo $stateName;}?></u></strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><h3 style="font-size:14px; margin-bottom:12px;">
          <center>
            <u>Kin<span class="style1" style="font-size:14px;">d Attn: </span>.  <?=$contact_person != ""?strtoupper($contact_person):"";?></u>
          </center>
        </h3></td>
    </tr>
    <tr>
      <td><strong style="font-size:14px;">Dear Sir,</strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><h3 style="font-size:14px; margin:10px 0 15px 0px;">
          <center>
           <!--  Subject: --> <u><?=$subject;?></u>
          </center>
        </h3></td>
    </tr>
    <tr>
      <td colspan="3"><p><?=$contant;?><!--This refers to the discussions had with you regarding your aforesaid requirement. We thank you for the interest shown in our products and are pleased to enclose herewith our offer for the aforesaid boiler.--></p></td>
    </tr>
    <tr>
      <td height="5" colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><h3 style="font-size:14px;"><u>Our offer consists of the following annexure:</u></h3></td>
    </tr>
    <tr>
      <td height="5" colspan="3">&nbsp;</td>
    </tr>
  </table>
  
<table style="width:100%; margin:auto; font-size:14px;">
    <tbody>
      <tr>
        <td>Annexure – I</td>
        <td>Company Profile</td>
      </tr>
      <tr>
        <td>Annexure – II</td>
        <td>What We Do</td>
      </tr>
      <tr>
        <td>Annexure – III </td>
        <td>Technical Details</td>
      </tr>
      <tr>
        <td>Annexure – IV</td>
        <td>Scope of Supply</td>
      </tr>
      <tr>
        <td>Annexure – V </td>
        <td>Price Schedule</td>
      </tr>
      <tr>
        <td>Annexure – VI</td>
        <td>Terms & Conditions</td>
      </tr>
    </tbody>
  </table>
  
<table id="meta" style="width:100%;">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><p>We believe above to be in line with your requirement. Should you need any information, please feel free to contact us. </p></td>
    </tr>
    
    <tr>
      <td colspan="3"><p>Thanking you and looking forward to your valued order.</p></td>
    </tr>
    
    <tr>
      <td colspan="3"><p>Yours faithfully,</p></td>
    </tr>
    
    <tr>
      <td colspan="3" style="font-size:14px; font-weight:600;"><span style="font-weight:normal;">For</span> THERMODYNE ENGINEERING SYSTEMS,</td>
    </tr>
    
    <tr>
      <td colspan="3"><h3>SALES CO-ORDINATOR</h3></td>
    </tr>
    <tr>
      <td colspan="3"><h3>9540062187</h3></td>
    </tr>
  </table>      
</article>
</section><!--section close-->

<section class="sheet padding-10mm">
<article>
<table id="meta" style="width:100%;">
<tr>
  <td width="48%" valign="bottom">&nbsp;</td>
  <td width="36%" valign="middle">&nbsp;</td>
<td width="16%" valign="middle"><img src="<?=base_url();?>images/logo-2.jpg" alt="" style="text-align:right;" /></td>
</tr>
<tr>
<td width="48%" valign="bottom"><h3 style="font-size:18px;">ANNEXURE - I</h3></td>
<td width="36%" valign="middle">&nbsp;</td>
<td width="16%" valign="middle">&nbsp;</td>
</tr>

</table>

<table style="width:100%;">
<tbody>
<tr>
<td style="background-color:#E1E1E1; padding:5px; height:20px;"><center><h3 style="font-size:18px;">Company Profile</h3></center></td>
</tr>
</tbody>
</table>

<table id="meta" style="width:100%;">
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3"><p>Today’s competitive markets, industries need to contain their energy costs. Higher energy costs reduce profits and in some cases may even make the business uncompetitive. This is where we can contribute. We can help by providing high efficiency boilers, Energy consultancy and customized heating solutions. During last 15 years, more than 500 customers like L&T, Reliance, Merino Industries, Metso& Goodluck have benefited from our products & services</p></td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
  <td colspan="3"><center><img src="<?=base_url();?>images/annexure-1.jpg" alt="" /></center></td>
  </tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>  
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
  <td colspan="3"><p>Thermodyne understands how to zero-in on a client's energy needs and deliver practical, effective solutions that gives them competitive advantage in terms of lower operational costs. We are experienced in delivering high efficiency Boilers and heating equipments to suit the process requirements of our clients.</p></td>
  </tr>
<tr>
  <td colspan="3">&nbsp;</td>
</tr>  
<tr>
  <td colspan="3"><p>Through innovation and commitment to customer service, THERMODYNE has been consistently changing the way customers think about Steam Boilers. We are constantly striving to extend the Thermal Efficiency Levels, Waste Heat Recovery, Condensate Heat Recovery and Fuel conversions savings potential at customer’s end. Through our expertise in the field of Thermal Energy, we have garnered business from various verticals across the nation, while earning our clients’ trust along the way. We are therefore extremely proud of what we have achieved, and even more excited about our outlook for an equally promising future.</p></td>
  </tr>
<tr>
  <td colspan="3">&nbsp;</td>
</tr>  
<tr>
  <td colspan="3"><p>
Fuel savings are not only important for margins ,but also for environment .Industry can count on Thermodyne because we always believe in <strong style="color:#00B050; font-weight:700;">Enhancing Energy Efficiency</strong>
</p></td>
  </tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
</table>
</section><!--section close-->

<section class="sheet padding-10mm">
<article>
<table id="meta" style="width:100%;">
    <tr>
      <td width="48%" valign="bottom">&nbsp;</td>
      <td width="36%" valign="middle">&nbsp;</td>
      <td width="16%" valign="middle"><img src="<?=base_url();?>images/logo-2.jpg" alt="" style="text-align:right;" /></td>
    </tr>
<tr>
      <td width="48%" valign="bottom"><h3 style="font-size:20px;">ANNEXURE – II</h3></td>
      <td width="36%" valign="middle">&nbsp;</td>
      <td width="16%" valign="middle">&nbsp;</td>
    </tr>	
  </table>
  <table style="width:100%;">
    <tbody>
      <tr>
        <td style="background-color:#E1E1E1; padding:5px; height:20px"><center>
            <h3 style="font-size:18px;">What We Do</h3>
          </center></td>
      </tr>
    </tbody>
  </table>
  <table id="meta" style="width:100%;">
    <tr>
      <td colspan="3" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><center>
          <img src="<?=base_url();?>images/annexure-11.jpg" alt="" />
        </center></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</section><!--section close-->

<section class="sheet padding-10mm" style="height: auto;">
<article>
<table id="meta" style="width:100%;">
<tr>
  <td width="48%" valign="bottom">&nbsp;</td>
  <td width="36%" valign="middle">&nbsp;</td>
<td width="16%" valign="middle"><img src="<?=base_url();?>images/logo-2.jpg" alt="" style="text-align:right;" /></td>
</tr>
<tr>
<td width="48%" valign="bottom"><h3 style="font-size:20px;">ANNEXURE – III</h3></td>
<td width="36%" valign="middle">&nbsp;</td>
<td width="16%" valign="middle">&nbsp;</td>
</tr>

</table>
<table style="width:100%;">
  <tr>
<td style="background-color:#E1E1E1; padding:5px; height:20px"><center>
  <h3 style="font-size:20px;">Technical Details</h3>
</center>
 </td>
</tr>

<tr>
<td style="border:none;">&nbsp;</td>
</tr>
</tbody>
</table>

<div class="table-listWrap">
<?php if($technicaldetails != ""){ 
//print_r($technicaldetails);
  ?> 
<!--<h2><?=$technicaldetails[0]['pro_name'];?></h2><br><br>-->
 <?php 
  $m=0; $techname = "";$m=0; $totalRow = 20; 
  $p=0;
  foreach ($technicaldetails as $key => $dt) {
    
    $technical_value =  json_decode($dt['technical_value'],true);
    $techname = ""
  ?>
<h3 id="<?=$dt['id'];?>"><?=$dt['sub_category'];?></h3>

 <?php if(sizeof($technical_value) != "") {
      $techname ="";

    foreach ($technical_value as  $techDt) {
    $p = $p+$totalRow;

    $gradevalue =  $technicaldetails[0]['dgrade'];
    if (in_array($techDt['grade'], explode(',',$gradevalue)) || $gradevalue == ""){
        ?> 
            <ul class="table-list <?=($p%520)==0?'page-break':'';?>">
            <li><span style= "<?=($p%520)==0?'width:351px;':'';?>"><?=$techDt['name'];?></span>  <span><?=$techDt['value'].'&nbsp;&nbsp;'.$techDt['entity'];?></span></li>
            </ul>
    <?php 
     $techname = $techDt['name'];
  }else{
    
   $p = $p-$totalRow; 
  }   

   

  }
} 
?>

 <input type="hidden" name="techname[]" value="<?=$techname;?>" idval="<?=$dt['id'];?>">

<!-- <li> <span>23</span> <span>Harry Giles</span></li>
<li> <span>543</span> <span>Susan Crown</span></li>
<li> <span>43</span> <span>Barry Smith</span></li>
<li> </li> -->

<?php }
$p = $p+$totalRow;
} ?>
</div>

<!-- <table style="width:100%;" >
<tbody>

<br/>
 <?php if($technicaldetails != ""){
   // echo "<pre>";
   //  print_r($technicaldetails);
   // echo "</pre>";
 ?>
  <br/><h2><?=$technicaldetails[0]['pro_name'];?></h2><br />
   <?php 
 $m=0;
     foreach ($technicaldetails as $key => $dt) {
        $technical_value =  json_decode($dt['technical_value'],true);
  ?>

   <br>
      <h3 id="<?=$dt['id'];?>"><?=$dt['sub_category'];?></h3>
   </br>
<table style="width:100%;" id ="scroll_data<?=$m++;?>">
<tbody>
<?php 
if(sizeof($technical_value) != "") {
  $techname ="";
  foreach ($technical_value as  $techDt) {
  $gradevalue =  $technicaldetails[0]['dgrade'];
    
   if (in_array($techDt['grade'], explode(',',$gradevalue)) || $gradevalue == ""){
  ?>
  <tr >
   <td width="40%"><?=$techDt['name'];?></td>
   <td width="60%"><?=$techDt['value'].'&nbsp;&nbsp;'.$techDt['entity'];?></td>
   <?php if($techDt['grade'] != ""){ ?>
   
   <?php 
     
    }
   $techname = $techDt['name'];
 } 
   ?>
  </tr>
<?php } } ?>
</tbody>
</table>
<input type="hidden" name="techname[]" value="<?=$techname;?>" idval="<?=$dt['id'];?>">
<?php 
} }  ?> -->

<input type="hidden" value="<?=$m-1;?>" id="scrollheight">
</table>


</section><!--section close-->

<section class="sheet padding-10mm list" style="height:auto;">
<article>
<table id="meta" style="width:100%;">
<tr>
  <td width="81%" valign="bottom">&nbsp;</td>
  <td width="3%" valign="middle">&nbsp;</td>
<td width="16%" valign="middle"><img src="<?=base_url();?>images/logo-2.jpg" alt="" style="text-align:right;" /></td>
</tr>
<tr>
<td width="81%" valign="bottom"><h3 style="font-size:20px;">ANNEXURE - IV</h3>
 <h3 style="font-size:15px;">
<!-- <?php if(sizeof($technicaldetails) !=""){ ?><?=$technicaldetails[0]['pro_name'];?><?php } ?>--><!-- CTP Model – COMBITHERM – PETCOKE / HUSK / CRUSHED COAL FIRED --></h3>
</td>
<td width="3%" valign="middle">&nbsp;</td>
<td width="16%" valign="middle">&nbsp;</td>
</tr>
<tr>
  <td colspan="3" valign="middle">&nbsp;</td>
  </tr>
</table>

<table style="width:100%;">
<tbody>
<tr>
<td style="background-color:#E1E1E1; padding:5px; height:20px;"><center>
  <h3 style="font-size:20px;">Scope of Supply</h3>

</center>
 </td>
</tr>
</tbody>
</table>
<br />
  <p class="pheight list-numbered" style="font: 11px/1.4 Arial, Helvetica, sans-serif, Georgia, serif !important; margin-bottom:2px;"><ol class="list-numbered"><?=$WordConvertor;?></ol></p>


</section><!--section close-->



<section class="sheet padding-10mm">
<article>
<table id="meta" style="width:100%;">
    <tr>
      <td width="48%" valign="bottom">&nbsp;</td>
      <td width="36%" valign="middle">&nbsp;</td>
      <td width="16%" valign="middle"><img src="<?=base_url();?>images/logo-2.jpg" alt="" style="text-align:right;" /></td>
    </tr>
	<tr>
      <td width="48%" valign="bottom"><h3 style="font-size:20px;">ANNEXURE - V</h3></td>
      <td width="36%" valign="middle">&nbsp;</td>
      <td width="16%" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" valign="bottom">&nbsp;</td>
    </tr>
  </table>
  <table style="width:100%;">
    <tbody>
      <tr>
        <td style="background-color:#E1E1E1; padding:5px; height:20px;"><center>
            <h3 style="font-size:20px">Price Schedule</h3>
          </center></td>
      </tr>
    </tbody>
  </table>
  <br />
  <div style="clear:both;"></div>
	<p><strong>PRICE:</strong><br>Price for supply of Gas fired Steam boiler as per enclosed specifications</p>
  <br />
  <table style="width:100%; margin-bottom:4px;">
    <tbody>
      <tr>
        <td width="10%"><strong><h3>S.NO</h3></strong></td>
        <td width="45%"><strong><h3>MODEL</h3></strong></td>
        <td width="45%"><strong><h3>PRICE(Rs)</h3></strong></td>
      </tr>
            <?php 
      if($pricedetails != ""){
        // echo "<pre>";
        // print_r($pricedetails);
        // echo "</pre>";
        $i=1;$total = 0;$m=0;
        if($pricedetails['price1'] != ""){
      foreach ($pricedetails['price1']['quotation'] as $key => $pdt) { 
      $convertprice = $pricedetails['price1']['price'][$m];
       
	  ?>
          
      <tr>
        <td><strong><h3><?=$i?></h3></strong></td>
       <td><strong><h3><?=$pricedetails['productname'];?></h3></strong></td>
       <td><strong><h3><?=$pricedetails['price1']['price'][$m];?>.00</h3>
       <h4><?php if($convertprice != ""){
         $convertprice =  str_replace(',','',$convertprice);
         //echo ;
         echo '(Rs. '.ucfirst(words_repues($convertprice)).')';
       } ?></h4></strong></td>
      </tr>

        
      <?php 
        $total = $total+str_replace(',', '', $pricedetails['price1']['price'][$m]);
        $m++;
        $i++;
        }
      } } ?>
	  <?php
        //print_r($pricedetails);die;
        foreach ($accessories as $acc) {
       ?>
       <tr>
          <!-- <td><strong><h3><?php //echo strtoupper($acc['keyvalue']);?></h3></strong></td>
          <td><strong><h3><?php //echo strtoupper($acc['acc_subcategory']);?></h3></strong></td> -->
          <td><strong><h3><?=$i;?></h3></strong></td>
          <td><strong><h3><?=strtoupper($acc['acc_description']);?></h3></strong></td>
          <td colspan="3"><strong><h3><?=$acc['acc_price'];?>.00</h3>
          <h4><?php echo '(Rs. '.ucfirst(words_repues($acc['acc_price'])).')';?></h4></td>
       </tr>

       <?php
        $i++;
        }
       ?>	  
    </tbody>
  </table>
  
   <table id="meta" style="width:100%; font-size:14px;">

<tr>
<td colspan="2"><p><strong>Note:</strong> The above prices are basic ex-works, Ghaziabad. Packing & forwarding @ 2%, GST @ 18%, freight up-to your site and transit insurance shall be charged extra as applicable at the time of dispatch.</p></td>
    </tr> 
<tr>
<td colspan="2"><strong style="margin-top:7px;">SUPERVISION CHARGES: </strong>Extra @ 5%</td>
    </tr>	
	   
<tr>
      <td colspan="2"><p style="margin:0px 0 0px 0px !important;"><strong>Our GSTIN no: 09AATPS6016R1ZL</strong></p></td>
    </tr>
<tr>
      <td colspan="2"><p style="margin:0px 0 0px 0px !important;"><strong>Our Bank Details:</strong></p></td>
    </tr>


	
<tr>
      <td colspan="2">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Account name </td>
    <td>- Thermodyne Engineering Systems,</td>
  </tr>
  <tr>
    <td>Bank </td>
    <td>- ICICI bank,</td>
  </tr>
  <tr>
    <td>Branch </td>
    <td>- Mahiuddin Pur Kanawani , Exotica Elegance, Indirapuram, Ghaziabad</td>
  </tr>
  <tr>
    <td>Account no. </td>
    <td>- 244451000001</td>
  </tr>
  <tr>
    <td>IFSC code </td>
    <td>- ICIC0002444</td>
  </tr>
  <tr>
    <td>Swift code:</td>
    <td>- ICICI NBLRI</td>
  </tr>
</table>	  </td>
    </tr>			
	
	<tr>
      <td colspan="2"><h3 style="margin:0px 0 0px 0px !important; font-size:14px;">PAYMENT TERMS:</h3></td>
    </tr>
    <tr>
      <td width="3%">&nbsp;</td>
      <td width="97%"><ul style="font-size:14px;">
          <li style="font-size:14px;">40% plus applicable GST as advance along-with the order</li>
        </ul></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><ul>
          <li style="font-size:14px;">Balance payment along-with applicable GST against pro-forma invoice prior to dispatch.</li>
        </ul></td>
    </tr>
    <tr>
      <td colspan="2"><h3 style="font-size:14px; margin:0px 0 0px 0px !important;">DELIVERY:</h3></td>
    </tr>
    <tr>
      <td colspan="2"><p>10– 12 weeks from the date of receipt of techno-commercial clear order along-withadvance.</p></td>
    </tr>
	    <tr>
      <td colspan="2"><h3 style="font-size:14px; margin:0px 0 0px 0px !important;">VALIDITY:</h3></td>
    </tr>
    <tr>
      <td colspan="2"><p>30 days, subject to written confirmation thereafter.</p></td>
    </tr>
    <tr>
      <td colspan="2"><h3 style="font-size:14px; margin:0px 0 0px 0px !important;">WARRANTEE:</h3></td>
    </tr>
    <tr>
      <td colspan="2"><p>The equipments supplied by us shall be covered under warrantee against any manufacturing defect for a period of 12 months from the date of dispatch.</p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><h3 style="font-size:14px;">For THERMODYNE ENGINEERING SYSTEMS,</h3></td>
    </tr>
  </table> 
  <br />
  <br />
  <br />
  <br />
 
</section><!--section close-->

<section class="sheet padding-10mm">
<article>
<table id="meta" style="width:100%;">
    <tr>
      <td width="48%" valign="bottom">&nbsp;</td>
      <td width="36%" valign="middle">&nbsp;</td>
      <td width="16%" valign="middle"><img src="<?=base_url();?>images/logo-2.jpg" alt="" style="text-align:right;" /></td>
    </tr>
	<tr>
      <td width="48%" valign="bottom"><h3 style="font-size:20px;">ANNEXURE – VI</h3></td>
      <td width="36%" valign="middle">&nbsp;</td>
      <td width="16%" valign="middle">&nbsp;</td>
    </tr>
    
  </table>

<table style="width:100%;">
<tbody>
<tr>
<td style="background-color:#E1E1E1; height:20px;"><center>
  <h3 style="font-size:18px;">Terms & Conditions</h3>
</center></td>
</tr>
</tbody>
</table>
<br />

<table id="meta" style="width:100%;">
<tr>
<td colspan="2">
<h3 style="font-size:12px;">1. ORDER CONFIRMATION</h3>
<p style="font-size:11px; line-height:18px;">All order placed on us directly or through our regional offices / marketing agents will be binding on us only after our head office has accepted the order confirmation.</p>
</td>
</tr>
<tr>
<td colspan="2">
<h3 style="margin:7px 0 0 0px; font-size:12px;">2.PACKING & FORWARDING</h3>
<p style="font-size:11px; line-height:18px;">Packing, wherever necessary, shall be done by us as per our standard practice. The charges for the same shall be given in our offer / quotation</p>
</td>
</tr>
<tr>
<td colspan="2">
<h3 style="margin:7px 0 0 0px; font-size:12px;">3. INSPECTION</h3>
<p style="font-size:11px; line-height:18px;">If necessary the goods shall be offered for visual inspection only at our works / our vendor’s / supplier’s works. The date of inspection shall be intimated by us about one week in advance. If inspection is not carried out on the date so advised, we shall be free to proceed further as per our planned schedule.</p>
</td>
</tr>
<tr>
<td colspan="2">
<h3 style="margin:7px 0 0 0px; font-size:12px;">4. MODE OF DELIVERY</h3>
<p style="font-size:11px; line-height:18px;">All delivery shall be ex our works, Ghaziabad / ex our supplier’s vender’s works. The goods may be dispatched in one or separate lots at our option. In case the purchaser wants us to arrange for dispatch on his / her behalf, we shall arrange to do so by road transport only on “freight to pay” basis on the clear understanding that no liability is attached to us. The freight charges contracted by us on behalf of the purchaser will be treated as negotiated under the purchaser’s authority and shall therefore be final.</p>
</td>
</tr>
<tr>
<td colspan="2">
<h3 style="margin:7px 0 0 0px; font-size:12px;">5. WAREHOUSING CLAUSE</h3>
<p style="font-size:11px; line-height:18px;">If payment is not made within 15 days of the date of pro-forma invoice, we reserve the right to divert the ordered goods. We shall give you a fresh delivery period and price at the time of diversion, which will be binding on the purchaser and the contract cannot be rendered void on this account. If the goods cannot be diverted, charges will be made for storage, insurance and interest at the rate 1% of the invoice value for each week or part there of commencing 15 days from the date of pro-forma invoice.</p>
</td>
</tr>
<tr>
<td colspan="2">
<h3 style="margin:7px 0 0 0px; font-size:12px;">6.ADVANCE</h3>
<p style="font-size:11px; line-height:18px;">Advance paid against any orders shall not be subject to any interest. We will have the right to adjust against such advances payments, which might become due because of delay in lifting the ordered equipment or because of any other expenses we may have to incur on the purchaser’s behalf. The advance shall be forfeited in case we accept the request for cancellation of order</p>
</td>
</tr>

<tr>
<td colspan="2">
<h3 style="margin:7px 0 0 0px; font-size:12px;">7. TAXES & DUTIES</h3>
<p style="font-size:11px; line-height:18px;">All applicable taxes / duties as per Government notifications, issued from time to time and their amendments would be payable extra by the client. The rates of these taxes shall be as in force at the time of dispatch</p>
</td>
</tr>

<tr>
<td colspan="2">
<h3 style="margin:7px 0 0 0px; font-size:12px;">8. FORCE MAJEURE</h3>
<p style="font-size:11px; line-height:18px;">The offer is subject to force majeure by which it means causes such as war, invasion, civil disobedience, government order or restriction, strikes, lock-outs, riots, fires, epidemics, sabotages, trade embargoes, floods, earth quakes, accidents, break down of machineries, delay or inability in obtaining labour, raw materials, wagons shipping space etc. any other cause beyond our reasonable control affecting us or our vendors / suppliers / sub- contractors etc.</p>
</td>
</tr>

<tr>
<td colspan="2">
<h3 style="margin:7px 0 0 0px; font-size:12px;">9. WARRANTY</h3>
<p style="font-size:11px; line-height:18px;">We take utmost care to ensure highest product quality and our products / equipment can be relied for long & trouble free service. We undertake to make good by replacement or repair, defects arising out of faulty design, material or workmanship within 12 months of the date of dispatch, providing if we so desire, the part in respect of which a claim is made, must be sent at purchaser’s expense at our works before liability can be entertained under this clause. Such expense will be refunded if our liability is admitted.</p><br />

<p style="font-size:11px; line-height:18px;">Bought out components are guaranteed by us only to the extent of guarantees given to us by our suppliers. Electrical components such as heaters, motors, contactors, rubber components, gaskets, instruments such as pressure gauges, temperature indicators, and combistat and gauge glasses are not covered under this warranty.</p>
</td>
</tr>
</table>
</section><!--section close-->


<section class="sheet padding-10mm">
<article>
<table id="meta" style="width:100%;">
    <tr>
      <td width="48%" valign="bottom">&nbsp;</td>
      <td width="36%" valign="middle">&nbsp;</td>
      <td width="16%" valign="middle"><img src="<?=base_url();?>images/logo-2.jpg" alt="" style="text-align:right;" /></td>
    </tr>
	<tr>
      <td width="48%" valign="bottom">&nbsp;</td>
      <td width="36%" valign="middle">&nbsp;</td>
      <td width="16%" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" valign="bottom">&nbsp;</td>
    </tr>
  </table>

<table id="meta" style="width:100%;">
    <tr>
      <td colspan="2"><h3 style="margin:7px 0 0 0px; font-size:12px;">This warranty is valid subject to</h3></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><ul>
          <li>Installation having been completed within 3 months of dispatch of equipment.</li>
        </ul></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><ul>
          <li>Installation done to our satisfaction if is not done by us.</li>
        </ul></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><ul>
          <li>The equipment not being subject to accident, alteration or misuse</li>
        </ul></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><ul>
          <li>The equipment being operated as per our operation &amp; maintenance manual by reasonable trained  personnel. </li>
        </ul></td>
    </tr>
    <tr>
      <td colspan="2"><h3 style="margin:7px 0 0 0px; font-size:12px;">10. ERECTION</h3>
        Erection service offered at the rate, terms and conditions mentioned in the offer / quotation covers provision of
        skilled personnel and supervision. The following shall be express excluded from our scope and shall be provided
        by the client:</td>
    </tr>
    <tr>
      <td width="3%">&nbsp;</td>
      <td width="97%"><ul>
          <li>Foundation & civil work</li>
        </ul></td>
    </tr>
    <tr>
      <td width="3%">&nbsp;</td>
      <td width="97%"><ul>
          <li>Unloading of equipment from truck / trailers on to foundation.</li>
        </ul></td>
    </tr>
    <tr>
      <td width="3%">&nbsp;</td>
      <td width="97%"><ul>
          <li>Provision of unskilled labourers.</li>
        </ul></td>
    </tr>
    <tr>
      <td width="3%">&nbsp;</td>
      <td width="97%"><ul>
          <li>Provision of tools and tackles e.g. welding / gas cutting set, hand tools, chain blocks etc. </li>
        </ul></td>
    </tr>
    <tr>
      <td width="3%">&nbsp;</td>
      <td width="97%"><ul>
          <li>Supply of utilities e.g. water, electricity, gases etc. </li>
        </ul></td>
    </tr>
    <tr>
      <td colspan="2"><h3 style="margin:7px 0 0 0px; font-size:12px;">11. COMMISSIONING</h3>
        Commissioning service offered at the rate, terms and conditions mentioned in the offer / quotation covers  reasonable no. of visits / meetings to: </td>
    </tr>
    <tr>
      <td width="3%">&nbsp;</td>
      <td width="97%"><ul>
          <li>Finalise installation details and site preparation for the equipment in advance before delivery</li>
        </ul></td>
    </tr>
    <tr>
      <td width="3%">&nbsp;</td>
      <td width="97%"><ul>
          <li>Help in making foundation.</li>
        </ul></td>
    </tr>
    <tr>
      <td width="3%">&nbsp;</td>
      <td width="97%"><ul>
          <li>Ensure the installation is in accordance with our recommendations.</li>
        </ul></td>
    </tr>
    <tr>
      <td width="3%">&nbsp;</td>
      <td width="97%"><ul>
          <li>Commissioning the unit for a short run to monitor mechanical working and to set controls as may be  necessary</li>
        </ul></td>
    </tr>
    <tr>
      <td colspan="2"><h3 style="margin:7px 0 0 0px; font-size:12px;">12. HANDING OVER</h3>
        Unless otherwise expressly specified in the order and accepted by us, handing over of the equipment would be
        considered as complete and a formal completion certificate shall be issued by purchaser / user if: </td>
    </tr>
    <tr>
      <td width="3%">&nbsp;</td>
      <td width="97%"><ul>
          <li>The material has been supplied as per the scope of supply or with agreed deviations.</li>
        </ul></td>
    </tr>
    <tr>
      <td width="3%">&nbsp;</td>
      <td width="97%"><ul>
          <li>Erection, if involved, has been completed, generally as per the terms of the order with unavoidable  deviations. </li>
        </ul></td>
    </tr>
    <tr>
      <td width="3%">&nbsp;</td>
      <td width="97%"><ul>
          <li>The equipment has been commissioned, if applicable, generally as agreed</li>
        </ul></td>
    </tr>
    <tr>
      <td width="3%">&nbsp;</td>
      <td width="97%"><ul>
          <li>The equipment and / or installation has been put to commercial use either with or without the help of our  Engineer.</li>
        </ul></td>
    </tr>
    <tr>
      <td height="60" colspan="2">The purchaser / user is expected to put the equipment / installation to commercial use only after issuing a formal
        completion certificate. Our responsibilities in terms of warranty shall cease if the equipment / installation is put to
        use without formal taking over.</td>
    </tr>
	
  <tr>
      <td colspan="2"><h3 style="margin:7px 0 0 0px; font-size:12px;">13. CANCELLATION</h3>
        Order received and accepted by us shall not be subject to cancellation either wholly or partly for any reason what
        so ever without our consent in writing. </td>
    </tr>
    <tr>
      <td colspan="2"><h3 style="margin:7px 0 0 0px; font-size:12px;">14. JURISDICTION</h3>
        All contracts between purchaser and ourselves are deemed to be entered into New Delhi and shall be subject to  the jurisdiction of courts at New Delhi / Delhi. </td>
    </tr>
    <tr>
      <td width="3%">&nbsp;</td>
      <td width="97%">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><h3 style="margin:0 0 10px 0px;">For THERMODYNE ENGINEERING SYSTEMS </h3></td>
    </tr>
    <tr>
      <td colspan="2"><h3>SALES CO-ORDINATOR</h3></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

<tr>
  <td width="3%">&nbsp;</td>
  <td width="97%">&nbsp;</td>
</tr>	
    
</table>
</section><!--section close-->


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('input[name^="techname"]').each(function() {
     var technameval =  $(this).val();
     var idval       =  $(this).attr('idval')
    
     if(technameval === ""){
       $('#'+idval).css("display",'none');   
     }
     
    });
    
      
     var scrollerVal =  $("#scrollheight").val();
     if(scrollerVal > 0){
         total = 0;total1 = 0;
       // alert(scrollerVal);
        for(var i=0;i<scrollerVal;i++){
           $("#scroll_data"+i).remove( 'classbreark' );
            var mm = parseInt($("#scroll_data"+i).height());
            // alert(mm+'sdf');
             total = total+mm;
            // 
            //alert(i +'<'+ scrollerVal+'----'+total);
             if(total >= 440){
                 
                if(i < scrollerVal){
                  $("#scroll_data"+i).addClass( 'classbreark' );
                }
             
                total = 0;

             }
//alert(total);
             // else {
    //           $('.fixme').css({
    //           position: 'static'
    //        });
    // }
    //    
}
       }
	   
	   



  });


</script>
</body>
</html>
