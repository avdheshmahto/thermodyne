<?php
$this->load->view("header.php");
require_once(APPPATH.'modules/master/controllers/ProductCategory.php');
$objj=new ProductCategory();
$CI =& get_instance();

$list='';

$list=$objj->pcategory_list();	
require_once(APPPATH.'core/my_controller.php');
$obj=new my_controller();
$CI =& get_instance();
$tableName='tbl_prodcatg_mst';
$entries = "";
if($this->input->get('entries')!=""){
  $entries = $this->input->get('entries');
}
//$filtername$filterdate
?>
<style type="text/css">
.ztree * {font-size: 10pt;font-family:"Microsoft Yahei",Verdana,Simsun,"Segoe UI Web Light","Segoe UI Light","Segoe UI Web Regular","Segoe UI","Segoe UI Symbol","Helvetica Neue",Arial}
.ztree li ul{ margin:0; padding:0;margin-left: 31px;}
.ztree li {line-height:30px;}
.ztree li a {width:200px;height:30px;padding-top: 0px;}
.ztree li a:hover {text-decoration:none; background-color: #E7E7E7;}
.ztree li a span.button.switch {visibility:visible}        /*hidden*/
.ztree.showIcon li a span.button.switch {visibility:visible}
.ztree li a.curSelectedNode {background-color:#D4D4D4;border:0;height:30px;}
.ztree li span {line-height:30px;}
.ztree li span.button {margin-top: -7px;}
.ztree li span.button.switch {width: 16px;height: 16px;}

.ztree li a.level0 span {font-size: 110%;font-weight: bold;}
.ztree li span.button {background-image:url("../../img/left_menuForOutLook.png"); *background-image:url("../../img/left_menuForOutLook.gif")}
.ztree li span.button.switch.level0 {width: 20px; height:20px}
.ztree li span.button.switch.level1 {width: 20px; height:20px}
.ztree li span.button.noline_open {background-position: 0 0;}
.ztree li span.button.noline_close {background-position: -18px 0;}
.ztree li span.button.noline_open.level0 {background-position: 0 -18px;}
.ztree li span.button.noline_close.level0 {background-position: -18px -18px;}
.listClass{position: relative;right: 12px font-size: 15px;    font-weight: 600;
    height: 90px !important;border-left: 2px solid red; padding: 14px 20px 14px 20px; }
.displayclass{display: none;}
</style>
<div class="main-content">

<h1 class="page-title">Dashboard</h1>
<br>

<!-- Row-->
<div class="row">

<!-- Online Signup -->
<a href="<?=base_url();?>quotation/manage_quotation">
<div class="col-lg-3 col-sm-6">
<div class="panel minimal secondary-bg">
<div class="panel-body">
<h2 class="no-margins"><strong>&nbsp;</strong></h2>
<p>Quotation </p>
<div class="float-chart-sm pt-15">
<div id="online-signup" class="flot-chart-content"></div>
</div>
</div>
</div>
</div>
</a>
<!-- /Online Signup -->
<a href="<?=base_url();?>master/Item/manage_item">
<!-- Last Month Sale -->
<div class="col-lg-3 col-sm-6">
<div class="panel minimal royalblue-bg">
<div class="panel-body">
<h2 class="no-margins"><strong>&nbsp;</strong></h2>
<p>Products</p>
</div>
<div class="float-chart-sm">
<div class="last-month-outer">
<div id="last-month-sale" class="flot-chart-content"></div>
</div>
</div>
</div>
</div>
<!-- /last month sale -->
</a>
<!-- New Visits -->
<a href="<?=base_url();?>master/Account/manage_contact">
<div class="col-lg-3 col-sm-6">
<div class="panel minimal royalblue-bg">
<div class="panel-body">
<h2 class="no-margins"><strong>&nbsp;</strong></h2>
<p>Contact</p>
</div>
<div class="float-chart-sm">
<div class="last-month-outer">
<div id="last-month-sale" class="flot-chart-content"></div>
</div>
</div>
</div>
</div>
<!-- /new visits -->
</a>
<a href="<?=base_url();?>report/Report/report_function">
<!-- Total Revenu -->
<div class="col-lg-3 col-sm-6">
<div class="panel minimal info-bg">
<div class="panel-body">
<h2 class="no-margins"><strong>&nbsp;</strong></h2>
<p>Reports</p>
<div class="float-chart-sm pt-15">
<div id="total-revenue" class="flot-chart-content"></div>
</div>
</div>
</div>
</div>
</a>
<!-- /total revenu -->
</div>
<!-- /row-->

<!-- Row -->

<!-- /row-->

<!-- Row-->

<!-- /row-->

<!-- Row-->

<!-- /row-->

<!-- Row-->
<div class="row">

<div class="col-md-12"> 
<div class="panel panel-default">

<!-- Panel body --> 
<div class="panel-body"> 
<div class="jvectormap-section" id="world-map-markers" style="height: 400px"></div>
</div> 
<!-- /panel body -->
</div> 
</div>
</div>

<?php

$this->load->view("footer.php");
?>