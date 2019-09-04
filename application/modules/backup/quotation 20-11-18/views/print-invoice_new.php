<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title>Quotation</title>
<link rel='stylesheet' type='text/css' href='<?=base_url();?>css/style.css' />

<style>
p li span {font-size:18px !important;}

</style>

</head>
<body>
<?php 
$invoiceNo  = "";$subject   = "";$invoice_date   = "";
$first_name = "";$address1  = "";$city           = ""; 
$contant    = "";$stateName = "";$contact_person = "";
$priceText  = "";
if(sizeof($result) > 0){ 
      $contact_person = $result['contact_person'];
      $invoiceNo      = $result['purchase_no'];
      $subject        = $result['subject'];
      $priceText      = $result['pricetext'];
      $invoice_date   = $result['invoice_date'];
      $first_name     = $result['first_name'];
      $address1       = $result['address1'];
      $city           = $result['city'];
      $stateName      = $result['stateName'];
      $contant        = $result['contant'];
      //$contant      = $result['contant'];
      $date           = date_create($invoice_date);
 }  ?>
<div id="page-wrap">
<div id="identity" style="margin-bottom:350px;">
<table id="meta" style="width:100%; overflow:hidden;border-top:4px solid #FF6600; border-bottom:4px solid #FF6600; padding-top:7px; padding-bottom:7px; margin-bottom:15px;">
<tr>
<td width="29%" rowspan="5" valign="top"><img src="<?=base_url();?>images/logo.jpg" alt="" /></td>
<td width="35%">&nbsp;</td>
<td colspan="2"><strong>Works1: </strong> A-7/108, A-7/109, A-7/110,South Side,
GT Road Industrial Area, Ghaziabad, U.P. – 201009</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="2"><strong>Works2: </strong> E-11 South East Zone MIA, Alwar301030</td>
</tr>
<tr>
<td>&nbsp;</td>
<td width="5%">Phone</td>
<td width="31%">: 0120-4562332</td>
</tr>
<tr>
<td>&nbsp;</td>
<td><span class="meta-head">Web</span></td>
<td style="color:#FF2413;">: www.thermodyneboilers.com</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>Email</td>
  <td style="color:#0000ff;">sales1@thermodyneboilers.com</td>
</tr>
</table>

<table id="meta" style="width:100%;">
<tr>
<td width="29%"><strong>Ref: <?=$invoiceNo;?></strong></td>
<td width="42%">&nbsp;</td>
<td width="29%"><strong style="text-align:right; float:right;"><?=date_format($date,"F d Y");?></strong></td>
</tr>
<tr>

<td height="10" colspan="3">&nbsp;</td>
</tr>
<tr>
<td><strong style="font-size:15px;">M/s <?=$first_name;?></strong></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td><?=$address1.'&nbsp;&nbsp;&nbsp;&nbsp;'.$city;?><!-- Visakhapatnam --></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
  <td><strong style="font-size:15px;"><u><?=$stateName;?></u></strong></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
<td colspan="3"><h3 style="font-size:15px; margin-bottom:15px;"><center><u>Kind Attn: Mr. <?=$contact_person;?></u></center></h3></td>
</tr>
<tr>
<td><strong>Dear Sir,</strong></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="3"><h3 style="font-size:15px; margin:10px 0 15px 0px;"><center><u><?=$subject;?></u><!-- Subject: Offer for 2TPH Capacity, 150 PSI, Husk Fired Boiler with accessories --></center></h3></td>
</tr>
<tr>
<td colspan="3">
<p><?=$contant;?><!-- This refers to the discussions had with you regarding your aforesaid requirement. We thank you for the interest shown in our products and are pleased to enclose herewith our offer for the aforesaid boiler. --></p></td>
</tr>
<tr>
<td height="5" colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3"><h3 style="font-size:15px;"><u>Our offer consists of the following annexure:</u></h3></td>
</tr>
<tr>
<td height="5" colspan="3">&nbsp;</td>
</tr>
</table>

<table style="width:100%;">
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
<td>Annexure – I </td>
<td>Technical Details</td>
</tr>
<tr>
<td>Annexure – II</td>
<td>Scope of Supply</td>
</tr>
<tr>
<td>Annexure – III </td>
<td>Price Schedule</td>
</tr>
<tr>
<td>Annexure – IV</td>
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
  <td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3"><p>Thanking you and looking forward to your valued order.</p></td>
</tr>
<tr>
  <td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3"><p>Yours faithfully,</p></td>
</tr>
<tr>
<td colspan="3" style="font-size:15px; font-weight:600;"><span style="font-weight:normal;">For</span> THERMODYNE ENGINEERING SYSTEMS,</td>
</tr>
<tr>
<td colspan="3"><h3>Sales Co-ordinator</h3></td>
</tr>
<tr>
<td colspan="3"><h3>9540062187</h3></td>
</tr>
</table>
</div><!--identity close-->

<div id="identity" style="margin-bottom:450px;">
<table id="meta" style="width:100%;">
<tr>
<td width="48%" valign="bottom">&nbsp;</td>
<td width="36%" valign="middle">&nbsp;</td>
<td width="16%" valign="middle"><img src="<?=base_url();?>images/logo-2.jpg" alt="" style="text-align:right;" /></td>
</tr>
<tr>
<td width="48%" valign="bottom"><h3 style="font-size:15px;">ANNEXURE - I</h3></td>
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
<td style="background-color:#E1E1E1; padding:5px;"><center><h3>Company Profile</h3></center></td>
</tr>
</tbody>
</table>

<table id="meta" style="width:100%;">
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3">Today’s competitive markets, industries need to contain their energy costs. Higher energy costs reduce profits and in some cases may even make the business uncompetitive. This is where we can contribute. We can help by providing high efficiency boilers, Energy consultancy and customized heating solutions. During last 15 years, more than 500 customers like L&T, Reliance, Merino Industries, Metso& Goodluck have benefited from our products & services</td>
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
Fuel savings are not only important for margins ,but also for environment .Industry can count on Thermodyne because we always believe in 
<strong style="color:#00B050; font-weight:700;">Enhancing Energy Efficiency</strong>
</p></td>
  </tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
</table>





</div><!--identity close-->

<div id="identity" style="margin-bottom:230px;">
<table id="meta" style="width:100%;">
<tr>
  <td width="48%" valign="bottom">&nbsp;</td>
  <td width="36%" valign="middle">&nbsp;</td>
<td width="16%" valign="middle"><img src="<?=base_url();?>images/logo-2.jpg" alt="" style="text-align:right;" /></td>
</tr>
<tr>
<td width="48%" valign="bottom"><h3 style="font-size:15px;">ANNEXURE – II</h3></td>
<td width="36%" valign="middle">&nbsp;</td>
<td width="16%" valign="middle">&nbsp;</td>
</tr>
<tr>
  <td colspan="3" valign="middle">&nbsp;</td>
  </tr>
</table>

<table style="width:100%;">
<tbody>
<tr>
<td style="background-color:#E1E1E1; padding:5px;"><center><h3>What We Do</h3></center></td>
</tr>
</tbody>
</table>

<table id="meta" style="width:100%;">
<tr>
  <td colspan="3" valign="middle">&nbsp;</td>
  </tr>
<tr>
<td colspan="3"><center><img src="<?=base_url();?>images/annexure-11.jpg" alt="" /></center></td>
</tr>

<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</table>
</div><!--identity close-->

<div id="identity" style="margin-bottom:150px;">
<table id="meta" style="width:100%;">
<tr>
  <td width="48%" valign="bottom">&nbsp;</td>
  <td width="36%" valign="middle">&nbsp;</td>
<td width="16%" valign="middle"><img src="<?=base_url();?>images/logo-2.jpg" alt="" style="text-align:right;" /></td>
</tr>
<tr>
<td width="48%" valign="bottom"><h3 style="font-size:15px;">ANNEXURE – III</h3></td>
<td width="36%" valign="middle">&nbsp;</td>
<td width="16%" valign="middle">&nbsp;</td>
</tr>
<tr>
  <td colspan="3" valign="middle">&nbsp;</td>
  </tr>
</table>

<table style="width:100%;">
<tbody>
<tr>
<td style="background-color:#E1E1E1; padding:5px;"><center><h3>Tecnical Details</h3></center></td>
</tr>
</tbody>
</table>
<?php if($technicaldetails != ""){
   // echo "<pre>";
   //  print_r($technicaldetails);
   // echo "</pre>";
 ?>
  <br/><h2><?=$technicaldetails[0]['pro_name'];?></h2><br />
<?php 

foreach ($technicaldetails as $key => $dt) {

    $technical_value =  json_decode($dt['technical_value'],true);
  ?>

<br>
<h3 id="<?=$dt['id'];?>"><?=$dt['sub_category'];?></h3>
</br>
<table style="width:100%;">
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
    <!--  <td>&nbsp;&nbsp;&nbsp;<?=$techDt['grade'];?>&nbsp;&nbsp;&nbsp;</td>  -->
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
<?php } }  ?>

<!-- <table style="width:100%; margin-top:15px;">

<tbody>
<tr>
<td width="40%">BOILER TYPE </td>
<td width="60%">Shell & Tube Type, Lined with
Membrane Water Wall panel,
Smoke cum Water tube type steam
boiler – <strong>COMBITHERM </strong></td>
</tr>
<tr>
<td>MODEL</td>
<td>CTF – 20 Ultra</td>
</tr>
<tr>
<td>STEAMING CAPACITY (f &amp;a  100deg.C) </td>
<td>2000 Kg/hr</td>
</tr>
<tr>
<td>MAXIMUM WORKING PRESSURE </td>
<td>150 PSI (G),10.54 Kg/hr</td>
</tr>
<tr>
<td>STEAM QUALITY</td>
<td>Dry, Saturated</td>
</tr>
<tr>
<td>FUEL</td>
<td>Husk</td>
</tr>
<tr>
<td>FIRING</td>
<td>Automatic</td>
</tr>
<tr>
<td>DESIGN CODE</td>
<td>IBR 1950 with Latest Amendments</td>
</tr>
<tr>
<td>THERMAL EFFICIENCY</td>
<td>80% + 2%</td>
</tr>
<tr>
<td>SPACE REQUIREMENT (L X W X H)</td>
<td>10m x 8m x 6m</td>
</tr>
</tbody>
</table> -->
<!-- <br /><h3 style="font-size:15px;">FORCED DRAFT FAN</h3><br /> -->

<!-- <table style="width:100%;">
<tbody>
<tr>
<td width="40%">Type</td>
<td width="60%">Centrifugal, Directly Coupled</td>
</tr>
<tr>
<td>Capacity (m3/hr at 30 deg.C)</td>
<td>9600</td>
</tr>
<tr>
<td>Head (mm WC)</td>
<td>200</td>
</tr>
<tr>
<td>RPM</td>
<td>2900</td>
</tr>
</tbody>
</table> -->
<!-- <br /><h3 style="font-size:15px;">INDUCED DRAFT FAN</h3><br /> -->

<!-- <table style="width:100%;">
<tbody>
<tr>
<td width="40%">Type</td>
<td width="60%">Centrifugal, Coupled through pulley</td>
</tr>
<tr>
<td>Capacity (m3/hr at 30 deg.C)</td>
<td>18000 </td>
</tr>
<tr>
<td>Head (mm WC), RPM</td>
<td>175 </td>
</tr>
<tr>
<td>RPM</td>
<td>1400 </td>
</tr>
</tbody>
</table> -->
</div><!--identity close-->

<!-- <div id="identity" style="margin-bottom:400px;">
<table id="meta" style="width:100%;">
<tr>
  <td width="48%" valign="middle">&nbsp;</td>
  <td width="36%" valign="middle">&nbsp;</td>
  <td width="16%" valign="middle"><img src="<?=base_url();?>images/logo-2.jpg" alt="" style="text-align:right;" /></td>
</tr>
</table>
<div style="clear:both;"></div>

<br /><h3 style="font-size:15px;">FEED WATER PUMPS</h3><br />
<table style="width:100%;">
<tbody>
<tr>
<td width="40%">Type</td>
<td width="60%">Multistage, Centrifugal type</td>
</tr>
<tr>
<td>Quantity</td>
<td>02 Sets</td>
</tr>
<tr>
<td>Capacity (m3/hr)</td>
<td>7.2</td>
</tr>
<tr>
<td>Head</td>
<td>120 m WC</td>
</tr>
</tbody>
</table>

<br /><h3 style="font-size:15px;">HEAT RECOVERY UNIT</h3><br />

<table style="width:100%;">
<tbody>
<tr>
<td width="40%">Type</td>
<td width="60%">Shell & Tube type, Inline</td>
</tr>
<tr>
<td>Tube Diameter</td>
<td>63.5 mm OD</td>
</tr>
</tbody>
</table>

<br /><h3 style="font-size:15px;">MEMBRANE WATER WALL PANEL</h3><br />
<table style="width:100%;">
<tbody>
<tr>
<td width="40%">Bottom Headers</td>
<td width="60%">SA-106 Gr B</td>
</tr>
<tr>
<td>Top Header</td>
<td>SA-106 Gr B </td>
</tr>
<tr>
<td>Tube type</td>
<td>BS-3059 Part-I, ERW</td>
</tr>
</tbody>
</table>

<br /><h3>MAKES OF BOUGHT-OUT ITEMS</h3><br />

<table style="width:100%;">
<tbody>
<tr>
<td width="40%">Tubes</td>
<td width="60%">Tata / Jindal</td>
</tr>
<tr>
<td>Plates</td>
<td>Imported / S.A.I.L.</td>
</tr>
<tr>
<td>Motors</td>
<td>Crompton / Kirloskar / ABB </td>
</tr>
<tr>
<td>Electricals &amp; Switch Gears</td>
<td>L&amp;T / Schneider / Siemens</td>
</tr>
<tr>
<td>Valves </td>
<td>Sant / Equivalent</td>
</tr>
<tr>
<td>Safety Valves</td>
<td>Darling Muesco /Brightech/ Equivalent</td>
</tr>
<tr>
<td>Water Level Controller</td>
<td>Malhotra Brothers</td>
</tr>
<tr>
<td>Feed Pumps</td>
<td>CNP / Equivalent</td>
</tr>
<tr>
<td>Fans</td>
<td>Thermodyne/ Equivalent</td>
</tr>

</tbody>
</table>
</div> --><!--identity close-->

<!-- <div id="identity" style="margin-bottom:700px;">
<table id="meta" style="width:100%;">
<tr>
  <td width="48%" valign="middle">&nbsp;</td>
  <td width="36%" valign="middle">&nbsp;</td>
  <td width="16%" valign="middle"><img src="<?=base_url();?>images/logo-2.jpg" alt="" style="text-align:right;" /></td>
</tr>
</table>
<div style="clear:both;"></div>

<br /><h3>RECOMMENDED FEED WATER QUALITY</h3><br />

<table style="width:100%;">
<tbody>
<tr>
<td width="40%">Total Hardness as CaCO3, ppm</td>
<td width="60%"> 5 (Commercial Zero)</td>
</tr>
<tr>
<td>pH Value</td>
<td>8.5 - 9.5</td>
</tr>
<tr>
<td>Oil / Organic Matter</td>
<td>Not Detectable</td>
</tr>
<tr>
<td>Oxygen</td>
<td>0.05 mg/Litres</td>
</tr>
</tbody>
</table>

<br /><h3>RECOMMENDED BOILER WATER QUALITY</h3><br />
<table style="width:100%;">
<tbody>
<tr>
<td width="40%">Total Hardness as CaCO3, ppm</td>
<td width="60%">Not Detectable</td>
</tr>
<tr>
<td>Sodium Phosphate Na2PO4, ppm </td>
<td>50 – 100</td>
</tr>
<tr>
<td>Caustic Alkalinity as CaCO3, ppm</td>
<td>Min: 350</td>
</tr>
<tr>
<td>Silica as SiO2</td>
<td>< 0.4% of Caustic Alkalinity</td>
</tr>
<tr>
<td>Total Alkalinity as CaCO3, ppm</td>
<td>Min: 1200</td>
</tr>
<tr>
<td>Sodium Sulphide as Na2SO3, ppm</td>
<td>30 - 70</td>
</tr>
<tr>
<td>Hydrazine (N2H4), ppm </td>
<td>0.1 – 1</td>
</tr>
<tr>
<td>Total Dissolved Solids, ppm </td>
<td>Max: 3500</td>
</tr>
<tr>
<td>Suspended Solids, ppm </td>
<td>Max: 50</td>
</tr>
</tbody>
</table>

</div> --><!--identity close-->


<div id="identity" style="margin-bottom:0px;">
<table id="meta" style="width:100%;">
<tr>
<td width="81%" valign="bottom">&nbsp;</td>

<td width="3%" valign="middle">&nbsp;</td>
<td width="16%" valign="middle"><img src="<?=base_url();?>images/logo-2.jpg" alt="" style="text-align:right;" /></td>
</tr>

<tr>
<td width="81%" valign="bottom"><h3 style="font-size:15px;">ANNEXURE - IV</h3>
<h3 style="font-size:15px;">
<?php if(sizeof($technicaldetails) !=""){ ?>
  <?=$technicaldetails[0]['pro_name'];?><!-- CTP Model – COMBITHERM – PETCOKE / HUSK / CRUSHED COAL FIRED --></h3></td>
<?php } ?>
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
<td style="background-color:#E1E1E1; padding:5px;"><center>
  <h3>Scope of Supply</h3>
</center></td>
</tr>
</tbody>
</table>
<br />
<!-- <div id="heading">Scope of Supply</div> -->
<br/><h3>STANDARD SUPPLY</h3><br/>
  <p style="font: 11px/1.4 Arial, Helvetica, sans-serif, Georgia, serif !important;"><?=$WordConvertor;?></p>
</div><!--identity close-->


<div id="identity" style="margin-bottom:200px;">
<table id="meta" style="width:100%;">
<tr>
<td width="48%" valign="bottom">&nbsp;</td>
<td width="36%" valign="middle">&nbsp;</td>
<td width="16%" valign="middle"><img src="<?=base_url();?>images/logo-2.jpg" alt="" style="text-align:right;" /></td>
</tr>
<tr>
<td width="48%" valign="bottom"><h3>ANNEXURE - V</h3></td>
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
<td style="background-color:#E1E1E1; padding:5px;"><center>
  <h3>Price Schedule</h3>
</center></td>
</tr>
</tbody>
</table>
<br />

<div style="clear:both;"></div>
<p><?=$priceText;?> <!-- Price for supply of Pet Coke / Husk / Crushed Coal fired Steam boiler as per enclosed
specifications: --></p><br />

<!-- <table style="width:100%;">
 <tbody>
<tr>
<td width="5%"><strong>S.No</strong></td>
<td width="24%"><strong>MODEL</strong></td>
<td width="71%"><strong>PRICE(Rs)</strong></td>
</tr>
<tr>
<td>1</td>
<td>CTP-60</td>
<td>Rs.32,30,000/-
(Rs. Thirty Two Lacs Twenty Thirty Thousand Only)</td>
</tr>

</tbody>
</table> -->
<table style="width:100%;">
<tbody>

<tr>
<td width="5%"><strong>S.No</strong></td>
<td width="79%"><strong>MODEL</strong></td>
<td width="16%"><strong>PRICE(Rs)</strong></td>
</tr>
<?php 
if($pricedetails != ""){
  // echo "<pre>";
  // print_r($pricedetails);
  // echo "</pre>";
  $i=1;$total = 0;$m=0;
  if($pricedetails['price1'] != ""){
foreach ($pricedetails['price1']['quotation'] as $key => $pdt) { ?>
    
<tr>
 <td><?=$i++;?></td>
 <td><?=$pricedetails['productname'];?></td>
 <td><?=$pricedetails['price1']['price'][$m];?></td>
</tr>
  
<?php 
  $total = $total+str_replace(',', '', $pricedetails['price1']['price'][$m]);
  $m++;
  }
} } ?>
<tr>
<td>&nbsp;</td>
<td><strong>Total</strong></td>
<td><strong><?=number_format($total);?></strong></td>
</tr>
</tbody>
</table>
<table id="meta" style="float:left; width:100%;">
<tbody>
<tr>
<td colspan="2">
<h3 style="font-size:15px; margin:10px 0 10px 0px;">SUPERVISION CHARGES: Extra @ 5%</h3>
Note: The above prices are basic ex-works, Ghaziabad. Packing &amp; forwarding @ 2%,
GST @ 18%, freight up-to your site and transit insurance shall be charged extra as
applicable at the time of dispatch.<br /> </td>
</tr>
<tr>
<td colspan="2"><h3 style="font-size:15px; margin:10px 0 0 0px;"><strong>Our GSTIN no: 09AATPS6016R1ZL</strong></h3></td>
</tr>
<tr>
<td colspan="2"><h3 style="margin:10px 0 10px 0px;">Our Bank Details:</h3></td>
</tr>

<tr>
<td width="105" class="meta-head"><strong>Account Name-</strong></td>
<td width="583">Thermodyne Engineering Systems,</td>
</tr>
<tr>
<td class="meta-head"><strong>Bank -</strong></td>
<td>ICICI bank,</td>
</tr>
<tr>
<td class="meta-head"><strong>Branch -</strong></td>
<td>Mahiuddin Pur Kanawani ,  Exotica Elegance, Indirapuram, Ghaziabad</td>
</tr>
<tr>
<td class="meta-head"><strong>Account no. -</strong></td>
<td>244451000001</td>
</tr>
<tr>
<td class="meta-head"><strong>IFSC code -</strong></td>
<td>ICIC0002444</td>
</tr>
<tr>
<td class="meta-head"><strong>swift code: </strong></td>
<td>ICICI NBLRI</td>
</tr>
</tbody>
</table>
<br /><br /><br /><br />
<div style="clear:both;"></div>

<table id="meta" style="width:100%;">
<tr>
  <td colspan="2"><h3 style="margin:10px 0 10px 0px; font-size:15px;">PAYMENT TERMS:</h3></td>
</tr>
<tr>
  <td width="3%">&nbsp;</td>
  <td width="97%"><ul>
    <li>40% plus applicable GST as advance along-with the order</li>
  </ul>  </td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td><ul>
    <li>Balance payment along-with applicable GST against pro-forma invoice prior to dispatch.</li>
  </ul>  </td>
</tr>
<tr>
  <td colspan="2"><h3 style="font-size:15px; margin:10px 0 10px 0px;">VALIDITY:</h3></td>
  </tr>


<tr>
  <td colspan="2">30 days, subject to written confirmation thereafter</td>
  </tr>






<tr>
  <td colspan="2"><h3 style="font-size:15px; margin:10px 0 10px 0px;">WARRANTEE:</h3></td>
  </tr>
<tr>
  <td colspan="2">The equipments supplied by us shall be covered under warrantee against any manufacturing defect for a period of 12 months from the date of dispatch.</td>
  </tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td colspan="2"><h3 style="font-size:15px;">For THERMODYNE ENGINEERING SYSTEMS,</h3></td>
  </tr>
</table>
</div><!--identity close-->

<div id="identity" style="margin-bottom:200px;">
<table id="meta" style="width:100%;">
<tr>
  <td width="48%" valign="middle">&nbsp;</td>
  <td width="36%" valign="middle">&nbsp;</td>
<td width="16%" valign="middle"><img src="<?=base_url();?>images/logo-2.jpg" alt="" style="text-align:right;" /></td>
</tr>

<tr>
<td width="48%" valign="middle"><h3>ANNEXURE – VI</h3></td>
<td width="36%" valign="middle">&nbsp;</td>
<td width="16%" valign="middle">&nbsp;</td>
</tr>

<tr>
  <td colspan="3" valign="middle">&nbsp;</td>
  </tr>
</table>

<table style="width:100%;">
<tbody>
<tr>
<td style="background-color:#E1E1E1;"><center>
  <h3>Terms & Conditions</h3>
</center></td>
</tr>
</tbody>
</table>
<br />

<table id="meta" style="width:100%;">
<tr>
<td colspan="2">
<h3>1. ORDER CONFIRMATION</h3>
All order placed on us directly or through our regional offices / marketing agents will be binding on us only after our head office has accepted the order confirmation.
</td>
</tr>
<tr>
<td colspan="2">
<h3 style="margin:7px 0 0 0px;">2.PACKING & FORWARDING</h3>
Packing, wherever necessary, shall be done by us as per our standard practice. The charges for the same shall be given in our offer / quotation
</td>
</tr>
<tr>
<td colspan="2">
<h3 style="margin:7px 0 0 0px;">3. INSPECTION</h3>
If necessary the goods shall be offered for visual inspection only at our works / our vendor’s / supplier’s works. The date of inspection shall be intimated by us about one week in advance. If inspection is not carried out on the date so advised, we shall be free to proceed further as per our planned schedule.
</td>
</tr>
<tr>
<td colspan="2">
<h3 style="margin:7px 0 0 0px;">4. MODE OF DELIVERY</h3>
All delivery shall be ex our works, Ghaziabad / ex our supplier’s vender’s works. The goods may be dispatched in one or separate lots at our option. In case the purchaser wants us to arrange for dispatch on his / her behalf, we shall arrange to do so by road transport only on “freight to pay” basis on the clear understanding that no liability is attached to us. The freight charges contracted by us on behalf of the purchaser will be treated as negotiated under the purchaser’s authority and shall therefore be final.
</td>
</tr>
<tr>
<td colspan="2">
<h3 style="margin:7px 0 0 0px;">5. WAREHOUSING CLAUSE</h3>
If payment is not made within 15 days of the date of pro-forma invoice, we reserve the right to divert the ordered goods. We shall give you a fresh delivery period and price at the time of diversion, which will be binding on the purchaser and the contract cannot be rendered void on this account. If the goods cannot be diverted, charges will be made for storage, insurance and interest at the rate 1% of the invoice value for each week or part there of commencing 15 days from the date of pro-forma invoice.
</td>
</tr>
<tr>
<td colspan="2">
<h3 style="margin:7px 0 0 0px;">6.ADVANCE</h3>
Advance paid against any orders shall not be subject to any interest. We will have the right to adjust against such advances payments, which might become due because of delay in lifting the ordered equipment or because of any other expenses we may have to incur on the purchaser’s behalf. The advance shall be forfeited in case we accept the request for cancellation of order
</td>
</tr>
<tr>
<td colspan="2">
<h3 style="margin:7px 0 0 0px;">7. TAXES & DUTIES</h3>
All applicable taxes / duties as per Government notifications, issued from time to time and their amendments would be payable extra by the client. The rates of these taxes shall be as in force at the time of dispatch
</td>
</tr>
<tr>
<td colspan="2">
<h3 style="margin:7px 0 0 0px;">8. FORCE MAJEURE</h3>
The offer is subject to force majeure by which it means causes such as war, invasion, civil disobedience, government order or restriction, strikes, lock-outs, riots, fires, epidemics, sabotages, trade embargoes, floods, earth quakes, accidents, break down of machineries, delay or inability in obtaining labour, raw materials, wagons shipping space etc. any other cause beyond our reasonable control affecting us or our vendors / suppliers / sub- contractors etc.
</td>
</tr>
<tr>
<td colspan="2">
<h3 style="margin:7px 0 0 0px;">9. WARRANTY</h3>
We take utmost care to ensure highest product quality and our products / equipment can be relied for long & trouble free service. We undertake to make good by replacement or repair, defects arising out of faulty design, material or workmanship within 12 months of the date of dispatch, providing if we so desire, the part in respect of which a claim is made, must be sent at purchaser’s expense at our works before liability can be entertained under this clause. Such expense will be refunded if our liability is admitted.<br /><br />

Bought out components are guaranteed by us only to the extent of guarantees given to us by our suppliers. Electrical components such as heaters, motors, contactors, rubber components, gaskets, instruments such as pressure gauges, temperature indicators, and combistat and gauge glasses are not covered under this warranty.
</td>
</tr>
<tr>
  <td width="3%">&nbsp;</td>
  <td width="97%">&nbsp;</td>
</tr>
</table>
</div><!--identity close-->

<div id="identity" style="margin-bottom:0px;">
<table id="meta" style="width:100%;">
<tr>
  <td width="48%" valign="middle">&nbsp;</td>
  <td width="36%" valign="middle">&nbsp;</td>
<td width="16%" valign="middle"><img src="<?=base_url();?>images/logo-2.jpg" alt="" style="text-align:right;" /></td>
</tr>
<tr>
  <td width="48%" valign="middle">&nbsp;</td>
  <td width="36%" valign="middle">&nbsp;</td>
<td width="16%" valign="middle">&nbsp;</td>
</tr>
</table>
<div style="clear:both;"></div>

<table id="meta" style="width:100%;">
<tr>
<td colspan="2"><h3 style="margin:7px 0 0 0px;">This warranty is valid subject to</h3></td>
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
<td colspan="2">
<h3 style="margin:7px 0 0 0px;">10. ERECTION</h3>
Erection service offered at the rate, terms and conditions mentioned in the offer / quotation covers provision of
skilled personnel and supervision. The following shall be express excluded from our scope and shall be provided
by the client:</td>
</tr>
<tr>
  <td width="3%">&nbsp;</td>
  <td width="97%"><ul>
    <li>Foundation & civil work</li>
  </ul></td>
</tr><tr>
  <td width="3%">&nbsp;</td>
  <td width="97%"><ul>
    <li>Unloading of equipment from truck / trailers on to foundation.</li>
  </ul></td>
</tr><tr>
  <td width="3%">&nbsp;</td>
  <td width="97%"><ul>
    <li>Provision of unskilled labourers.</li>
  </ul></td>
</tr><tr>
  <td width="3%">&nbsp;</td>
  <td width="97%"><ul>
    <li>Provision of tools and tackles e.g. welding / gas cutting set, hand tools, chain blocks etc. </li>
  </ul></td>
</tr><tr>
  <td width="3%">&nbsp;</td>
  <td width="97%"><ul>
    <li>Supply of utilities e.g. water, electricity, gases etc. </li>
  </ul></td>
</tr><tr>
  <td colspan="2"><h3 style="margin:7px 0 0 0px;">11. COMMISSIONING</h3>
Commissioning service offered at the rate, terms and conditions mentioned in the offer / quotation covers  reasonable no. of visits / meetings to: </td>
  </tr><tr>
  <td width="3%">&nbsp;</td>
  <td width="97%"><ul>
    <li>Finalise installation details and site preparation for the equipment in advance before delivery</li>
  </ul></td>
</tr><tr>
  <td width="3%">&nbsp;</td>
  <td width="97%"><ul>
    <li>Help in making foundation.</li>
  </ul></td>
</tr><tr>
  <td width="3%">&nbsp;</td>
  <td width="97%"><ul>
    <li>Ensure the installation is in accordance with our recommendations.</li>
  </ul></td>
</tr><tr>
  <td width="3%">&nbsp;</td>
  <td width="97%"><ul>
    <li>Commissioning the unit for a short run to monitor mechanical working and to set controls as may be  necessary</li>
  </ul></td>
</tr><tr>
  <td colspan="2"><h3 style="margin:7px 0 0 0px;">12. HANDING OVER</h3>
Unless otherwise expressly specified in the order and accepted by us, handing over of the equipment would be
considered as complete and a formal completion certificate shall be issued by purchaser / user if: </td>
  </tr><tr>
  <td width="3%">&nbsp;</td>
  <td width="97%"><ul>
    <li>The material has been supplied as per the scope of supply or with agreed deviations.</li>
  </ul></td>
</tr><tr>
  <td width="3%">&nbsp;</td>
  <td width="97%"><ul>
    <li>Erection, if involved, has been completed, generally as per the terms of the order with unavoidable  deviations. </li>
  </ul></td>
</tr><tr>
  <td width="3%">&nbsp;</td>
  <td width="97%"><ul>
    <li>The equipment has been commissioned, if applicable, generally as agreed</li>
  </ul></td>
</tr><tr>
  <td width="3%">&nbsp;</td>
  <td width="97%"><ul>
    <li>The equipment and / or installation has been put to commercial use either with or without the help of our  Engineer.</li>
  </ul></td>
</tr><tr>
  <td colspan="2">The purchaser / user is expected to put the equipment / installation to commercial use only after issuing a formal
completion certificate. Our responsibilities in terms of warranty shall cease if the equipment / installation is put to
use without formal taking over.</td>
  </tr><tr>
  <td colspan="2"><h3 style="margin:7px 0 0 0px;">13. CANCELLATION</h3>
Order received and accepted by us shall not be subject to cancellation either wholly or partly for any reason what
so ever without our consent in writing. </td>
  </tr><tr>
  <td colspan="2"><h3 style="margin:7px 0 0 0px;">14. JURISDICTION</h3>
All contracts between purchaser and ourselves are deemed to be entered into New Delhi and shall be subject to  the jurisdiction of courts at New Delhi / Delhi. </td>
  </tr><tr>
  <td width="3%">&nbsp;</td>
  <td width="97%">&nbsp;</td>
</tr>











<tr>
<td colspan="2"><h3 style="margin:0 0 10px 0px;">For THERMODYNE ENGINEERING SYSTEMS </h3></td>
</tr>
<tr>
  <td colspan="2"><h3>Sales Co-ordinator</h3></td>
  </tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
</table>

</div><!--identity close-->




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
  });
</script>
</body>
</html>
