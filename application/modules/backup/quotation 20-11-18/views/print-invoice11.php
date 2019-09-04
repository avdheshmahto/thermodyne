<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title>Quotation</title>
<link rel='stylesheet' type='text/css' href='<?=base_url();?>assets/quatation-print/css/style.css' />
<!-- <link rel='stylesheet' type='text/css' href='<?=base_url();?>css/style_quotation.css' /> -->

</head>
<body>
<div id="page-wrap">
<div id="identity" style="margin-bottom:250px;">
<div id="header-main">
<div id="customer-title"><img src="<?=base_url();?>assets/quatation-print/images/logo.jpg" alt="" /></div>
<table id="meta">
<tr>
<td colspan="2" class="meta-head">
A-7/108, A-7/109, A-7/110,South Side,
GT Road Industrial Area,
Ghaziabad, U.P. – 201009</td>
</tr>
<tr>
<td colspan="2" class="meta-head">E-11 South East Zone MIA, Alwar301030</td>
</tr>
<tr>
<td width="48" class="meta-head">Phone</td>
<td width="191">: 0120-4562332</td>
</tr>
<tr>
<td class="meta-head">Web</td>
<td style="color:#FF2413;">: www.thermodyneboilers.com</td>
</tr>
<tr>
<td class="meta-head">Email</td>
<td style="color:#0000ff;">: sales1@thermodyneboilers.com</td>
</tr>
</table>
</div>
<?php 
$invoiceNo  = "";$subject   = "";$invoice_date = "";
$first_name = "";$address1  = "";$city         = ""; 
$contant    = "";$stateName = "";
if(sizeof($result) > 0){ 
      $invoiceNo    = $result['purchase_no'];
      $subject      = $result['subject'];
      $invoice_date = $result['invoice_date'];
      $first_name   = $result['first_name'];
      $address1     = $result['address1'];
      $city         = $result['city'];
      $stateName    = $result['stateName'];
      $contant      = $result['contant'];

      $date=date_create($invoice_date );
       
 }	?>
<div id="identity" style="margin-bottom:15px;">
<strong>Ref: <?=$invoiceNo;?></strong> <strong style="text-align:right; float:right;"><?=date_format($date,"F d Y");?></strong>
</div>

<p style="font-size:15px;"><strong>M/s <?=$first_name;?></strong></p>
<p><?=$city;?></p>
<p style="font-size:15px;"><strong><u><?=$stateName;?></u></strong></p>

<h3 style="font-size:15px; margin-top:15px;"><center><u>Kind Attn: Mr. <?=$first_name;?></u></center></h3>
<p>Dear Sir,</p>
<h3 style="font-size:15px; margin-top:15px;"><center>Subject: <?=$subject;?></center></h3><br />
<p>
	<?=$contant;?> 

</p><br />
<h3 style="font-size:15px; margin-top:15px;"><u>Our offer consists of the following annexure:</u></h3><br />
<div style="clear:both;"></div>

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
<td>Annexure – III</td>
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
<td>Annexure – VI </td>
<td>Terms & Conditions</td>
</tr>
</tbody>
</table><br />

<p>We believe above to be in line with your requirement. Should you need any information, please feel free to contact us. </p><br />
<p style="margin-bottom:15px;">Thanking you and looking forward to your valued order.<br /><br />
Yours faithfully,</p>

<h3 style="margin-bottom:15px;"><strong style="font-size:12px;">For</strong> THERMODYNE ENGINEERING SYSTEMS,</h3>

<h3>Sales Co-ordinator <br />
9540062187</h3>
</div><!--identity close-->

<div id="identity" style="margin-bottom:450px;">
<div id="customer-title" style="margin:30px 0 0 0px;">ANNEXURE - I</div>
<div id="customer-title-right"><img src="<?=base_url();?>assets/quatation-print/images/logo-2.jpg" alt="" /></div>
<div style="clear:both;"></div>
<div id="heading">Company Profile</div>
<p>
In today’s competitive markets, industries need to contain their energy costs. Higher
energy costs reduce profits and in some cases may even make the business
uncompetitive. This is where we can contribute. We can help by providing high efficiency
boilers, Energy consultancy and customized heating solutions. During last 15 years,
more than 500 customers like L&T, Reliance, Merino Industries, Metso& Goodluck have
benefited from our products & services
</p>
<center><img src="<?=base_url();?>assets/quatation-print/images/annexure-1.jpg" alt="" /></center><br />
<p>
Thermodyne understands how to zero-in on a client's energy needs and deliver practical,
effective solutions that gives them competitive advantage in terms of lower operational
costs. We are experienced in delivering high efficiency Boilers and heating equipments
to suit the process requirements of our clients.<br /><br />

Through innovation and commitment to customer service, THERMODYNE has been
consistently changing the way customers think about Steam Boilers. We are constantly
striving to extend the Thermal Efficiency Levels, Waste Heat Recovery, Condensate
Heat Recovery and Fuel conversions savings potential at customer’s end. Through our
expertise in the field of Thermal Energy, we have garnered business from various
verticals across the nation, while earning our clients’ trust along the way. We are
therefore extremely proud of what we have achieved, and even more excited about our
outlook for an equally promising future.
</p><br /><br />

<p style="text-align:left;">
Fuel savings are not only important for margins ,but also for environment .Industry can
count on Thermodyne because we always believe in <strong style="color:#00B050; font-weight:700;">Enhancing Energy
Efficiency</strong>
</p>
</div><!--identity close-->

<div id="identity" style="margin-bottom:250px;">
<div id="customer-title" style="margin:30px 0 0 0px;">ANNEXURE – II</div>
<div id="customer-title-right"><img src="<?=base_url();?>assets/quatation-print/images/logo-2.jpg" alt="" /></div>
<div style="clear:both;"></div>
<div id="heading">What We Do</div>
<center><img src="<?=base_url();?>assets/quatation-print/images/annexure-11.jpg" alt="" /></center>
</div><!--identity close-->

<div id="identity" style="margin-bottom:100px;">
<div id="customer-title" style="margin:30px 0 0 0px;">ANNEXURE – III</div>
<div id="customer-title-right"><img src="<?=base_url();?>assets/quatation-print/images/logo-2.jpg" alt="" /></div>
<div style="clear:both;"></div>
<div id="heading">Technical Details</div>

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
<h3><?=$dt['sub_category'];?></h3>
</br>
<table style="width:100%;">
<tbody>
<?php 
if(sizeof($technical_value) != "") {
  foreach ($technical_value as  $techDt) {
?>
<tr>
<td width="40%"><?=$techDt['name'];?></td>
<td width="60%"><?=$techDt['value'].'&nbsp;&nbsp;'.$techDt['entity'];?></td>
<?php if($techDt['grade'] != ""){ ?>
<!-- <td> <?=$techDt['grade'];?></td> -->

<?php } ?>
</tr>
<?php } } ?>
</tbody>
</table>
<?php } }  ?>

</div><!--identity close-->

<div id="identity" style="margin-bottom:0px;">
<div id="customer-title" style="margin:30px 0 0 0px;">ANNEXURE - IV</div>
<div id="customer-title-right"><img src="<?=base_url();?>assets/quatation-print/images/logo-2.jpg" alt="" /></div>
<div style="clear:both;"></div>
<!-- <h3>CTF Model – COMBITHERM – HUSK FIRED</h3> -->
<div id="heading">Scope of Supply</div>


<br /><h3>STANDARD SUPPLY</h3><br />

<?=$WordConvertor;?>
<!-- <div class="arrowlistmenu">
<?php if($scopedetails != ""){
foreach ($scopedetails as $keyScope => $dtScope) {
 	
  ?>

<h3 class="headerbar"><?=$keyScope;?></h3>
<?php if(sizeof($dtScope['type']) > 0) {
foreach ($dtScope['type'] as  $typedt) {
  ?>
<ul>
<li><?=$typedt['td1'];?></li>

</ul>
<?php }
 }}} ?>

</div> -->

</div><!--identity close-->



<div id="identity" style="margin-bottom:0px;">
<div id="customer-title" style="margin:30px 0 0 0px;">ANNEXURE - V</div>
<div id="customer-title-right"><img src="<?=base_url();?>assets/quatation-print/images/logo-2.jpg" alt="" /></div>
<div style="clear:both;"></div>
<div id="heading">Price Schedule</div>
<p>Price for supply of Rice Husk fired Steam boiler as per enclosed specifications</p><br />

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
foreach ($pricedetails['price1']['quotation'] as $key => $pdt) { ?>
		
<tr>
<td><?=$i++;?></td>
<td><?=$pricedetails['productname'];?></td>
<td><?=$pricedetails['price1']['price'][$m];?></td>

</tr>
	
<?php	

	$total = $total+str_replace(',', '', $pricedetails['price'][$m]);
  $m++;
	}
} ?>
<tr>
<td>&nbsp;</td>
<td><strong>Total</strong></td>
<td><strong><?=number_format($total);?></strong></td>
</tr>
</tbody>
</table><br />

<p>
Note: The above prices are basic ex-works, Ghaziabad. Packing & forwarding @ 2%,
GST @ 18%, freight up-to your site and transit insurance shall be charged extra as
applicable at the time of dispatch.
</p><br />

<h3><strong>Our GSTIN no: 09AATPS6016R1ZL</strong></h3>
<h3>Our Bank Details:</h3>


<table id="meta" style="float:left; width:100%;">
<tbody>
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
</table><br /><br /><br /><br />
<div style="clear:both;"></div>

<div class="arrowlistmenu"><br />
<h3 class="headerbar">PAYMENT TERMS:</h3>
<ul>
<li>40% plus applicable GST as advance along-with the order</li>
<li>Balance payment along-with applicable GST against pro-forma invoice prior to dispatch.</li>
</ul>
</div>

<h3>VALIDITY: </h3>
<p>30 days, subject to written confirmation thereafter</p><br />

<h3>WARRANTEE:</h3>
<p>The equipments supplied by us shall be covered under warrantee against any
manufacturing defect for a period of 12 months from the date of dispatch. 
</p><br />
<h3>For THERMODYNE ENGINEERING SYSTEMS,</h3>
</div><!--identity close-->

<div id="identity" style="margin-bottom:0px;">
<div id="customer-title" style="margin:30px 0 0 0px;">ANNEXURE – VI</div>
<div id="customer-title-right"><img src="<?=base_url();?>assets/quatation-print/images/logo-2.jpg" alt="" /></div>
<div style="clear:both;"></div>
<div id="heading">Terms &amp; Conditions</div>
<h3>1. ORDER CONFIRMATION</h3>
<p>All order placed on us directly or through our regional offices / marketing agents will be binding on us
only after our head office has accepted the order confirmation.</p><br />

<h3>2.PACKING & FORWARDING</h3>
<p>Packing, wherever necessary, shall be done by us as per our standard practice. The charges for the
same shall be given in our offer / quotation</p><br />

<h3>3. INSPECTION</h3>
<p>If necessary the goods shall be offered for visual inspection only at our works / our vendor’s / supplier’s
works. The date of inspection shall be intimated by us about one week in advance. If inspection is not
carried out on the date so advised, we shall be free to proceed further as per our planned schedule.
</p><br />

<h3>4. MODE OF DELIVERY</h3>
<p>All delivery shall be ex our works, Ghaziabad / ex our supplier’s vender’s works. The goods may be
dispatched in one or separate lots at our option. In case the purchaser wants us to arrange for dispatch
on his / her behalf, we shall arrange to do so by road transport only on “freight to pay” basis on the clear
understanding that no liability is attached to us. The freight charges contracted by us on behalf of the
purchaser will be treated as negotiated under the purchaser’s authority and shall therefore be final.</p><br />

<h3>5. WAREHOUSING CLAUSE</h3>
<p>If payment is not made within 15 days of the date of pro-forma invoice, we reserve the right to divert the
ordered goods. We shall give you a fresh delivery period and price at the time of diversion, which will be
binding on the purchaser and the contract cannot be rendered void on this account. If the goods cannot
be diverted, charges will be made for storage, insurance and interest at the rate 1% of the invoice value
for each week or part there of commencing 15 days from the date of pro-forma invoice.
</p><br />

<h3>6.ADVANCE</h3>
<p>Advance paid against any orders shall not be subject to any interest. We will have the right to adjust
against such advances payments, which might become due because of delay in lifting the ordered
equipment or because of any other expenses we may have to incur on the purchaser’s behalf. The
advance shall be forfeited in case we accept the request for cancellation of order</p><br />

<h3>7. TAXES & DUTIES</h3>
<p>All applicable taxes / duties as per Government notifications, issued from time to time and their
amendments would be payable extra by the client. The rates of these taxes shall be as in force at the
time of dispatch</p><br />

<h3>8. FORCE MAJEURE</h3>
<p>The offer is subject to force majeure by which it means causes such as war, invasion, civil
disobedience, government order or restriction, strikes, lock-outs, riots, fires, epidemics, sabotages,
trade embargoes, floods, earth quakes, accidents, break down of machineries, delay or inability in
obtaining labour, raw materials, wagons shipping space etc. any other cause beyond our reasonable
control affecting us or our vendors / suppliers / sub- contractors etc.
</p><br />

<h3>9. WARRANTY</h3>
<p>We take utmost care to ensure highest product quality and our products / equipment can be relied for
long & trouble free service. We undertake to make good by replacement or repair, defects arising out of
faulty design, material or workmanship within 12 months of the date of dispatch, providing if we so
desire, the part in respect of which a claim is made, must be sent at purchaser’s expense at our works
before liability can be entertained under this clause. Such expense will be refunded if our liability is
admitted.<br />
Bought out components are guaranteed by us only to the extent of guarantees given to us by our
suppliers. Electrical components such as heaters, motors, contactors, rubber components, gaskets,
instruments such as pressure gauges, temperature indicators, and combistat and gauge glasses are not
covered under this warranty.</p><br />

<div class="arrowlistmenu"><br />
<h3 class="headerbar">PAYMENT TERMS:</h3>
<ul>
<li>40% plus applicable GST as advance along-with the order</li>
<li>Balance payment along-with applicable GST against pro-forma invoice prior to dispatch.</li>
</ul>
</div>


</div><!--identity close-->

<div id="identity" style="margin-bottom:0px;">
<div id="customer-title" style="margin:30px 0 0 0px;"></div>
<div id="customer-title-right"><img src="<?=base_url();?>assets/quatation-print/images/logo-2.jpg" alt="" /></div>
<div style="clear:both;"></div>
<div class="arrowlistmenu">
<h3 class="headerbar">This warranty is valid subject to</h3>
<ul>
<li>Installation having been completed within 3 months of dispatch of equipment.</li>
<li>Installation done to our satisfaction if is not done by us</li>
<li>The equipment not being subject to accident, alteration or misuse</li>
<li>The equipment being operated as per our operation & maintenance manual by reasonable trained
personnel. </li>
</ul>
</div>

<div class="arrowlistmenu">
<h3 class="headerbar">10. ERECTION</h3>
<p>Erection service offered at the rate, terms and conditions mentioned in the offer / quotation covers
provision of skilled personnel and supervision. The following shall be express excluded from our scope
and shall be provided by the client:
</p>
<ul>
<li>a. Foundation & civil work.</li>
<li>b. Unloading of equipment from truck / trailers on to foundation.</li>
<li>c. Provision of unskilled labourers.</li>
<li>d.Provision of tools and tackles e.g. welding / gas cutting set, hand tools, chain blocks etc.</li>
<li>e.Supply of utilities e.g. water, electricity, gases etc.</li>
</ul>
</div>

<div class="arrowlistmenu">
<h3 class="headerbar">11. COMMISSIONING</h3>
<p>Commissioning service offered at the rate, terms and conditions mentioned in the offer / quotation
covers reasonable no. of visits / meetings to:
</p>
<ul>
<li>Finalise installation details and site preparation for the equipment in advance before delivery.</li>
<li>b. Help in making foundation.</li>
<li>c. Ensure the installation is in accordance with our recommendations.</li>
<li>d. Commissioning the unit for a short run to monitor mechanical working and to set controls as may
be necessary.</li>
</ul>
</div>

<div class="arrowlistmenu">
<h3 class="headerbar">12. HANDING OVER</h3>
<p>Unless otherwise expressly specified in the order and accepted by us, handing over of the equipment
would be considered as complete and a formal completion certificate shall be issued by purchaser /
user if
</p>
<ul>
<li>The material has been supplied as per the scope of supply or with agreed deviations.</li>
<li>b. Erection, if involved, has been completed, generally as per the terms of the order with unavoidable
deviations.</li>
<li>c. The equipment has been commissioned, if applicable, generally as agreed.</li>
<li>d. The equipment and / or installation has been put to commercial use either with or without the help
of our Engineer</li>
</ul>
<p>
The purchaser / user is expected to put the equipment / installation to commercial use only after issuing
a formal completion certificate. Our responsibilities in terms of warranty shall cease if the equipment /
installation is put to use without formal taking over
</p>
</div>
<br />

<h3><strong>13. CANCELLATION</strong></h3>
<p>
Order received and accepted by us shall not be subject to cancellation either wholly or partly for any
reason what so ever without our consent in writing.</p><br />

<h3><strong>14. JURISDICTION</strong></h3>
<p>
All contracts between purchaser and ourselves are deemed to be entered into New Delhi and shall be
subject to the jurisdiction of courts at New Delhi / Delhi.
</p><br />

<h3><strong>15. The above specifications are tentative and are subject to change during detailed Engineering.</strong></h3><br /><br /><br /><br />

<h3><strong>For THERMODYNE ENGINEERING SYSTEMS </strong></h3><br /><br /><br />


<h3>Sales Co-ordinator</h3>

</div><!--identity close-->




</div>
</body>
</html>
