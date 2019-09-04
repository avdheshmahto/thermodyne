
<script>

function exportTableToExcel(tableID, filename = ''){
 
 
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{

        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
  </script>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/dropdown-customer/semantic.js"></script>
<link type="text/css" href="<?php echo base_url();?>assets/dropdown-customer/semantic.css" rel="stylesheet" />
<?php
$this->load->view("header.php");


$url=base_url()."master/Item/manage_item";
// $query=$this->db->query("select * from `tbl_product_stock`");
// 	$row = $query->num_rows();

// 	$rows = $row;
	
// 	$page_rows = 10;

// 	$last = ceil($rows/$page_rows);

// 	if($last < 1){
// 		$last = 1;
// 	}

// 	$pagenum = 1;

// 	if(isset($_GET['pn'])){
// 		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
// 	}

// 	if ($pagenum < 1) { 
// 		$pagenum = 1; 
// 	} 
// 	else if ($pagenum > $last) { 
// 		$pagenum = $last; 
// 	}

// 	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
	
	

// 	$paginationCtrls = '';

// 	if($last != 1){
		
// 	if ($pagenum > 1) {
//         $previous = $pagenum - 1;
// 		$paginationCtrls .= '<a href="'.$url.'?pn='.$previous.'" class="btn btn-sm">Previous</a> &nbsp; &nbsp; ';
		
// 		for($i = $pagenum-4; $i < $pagenum; $i++){
// 			if($i > 0){
// 		        $paginationCtrls .= '<a href="'.$url.'?pn='.$i.'" class="btn btn-sm">'.$i.'</a> &nbsp; ';
// 			}
// 	    }
//     }
	
// 	@$paginationCtrls .= ''.$pagenum.' &nbsp; ';
	
// 	for($i = $pagenum+1; $i <= $last; $i++){
// 		$paginationCtrls .= '<a href="'.$url.'?pn='.$i.'" class="btn btn-sm">'.$i.'</a> &nbsp; ';
// 		if($i >= $pagenum+4){
// 			break;
// 		}
// 	}

//     if ($pagenum != $last) {
//         $next = $pagenum + 1;
//         $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$url.'?pn='.$next.'" class="btn btn-sm">Next</a> ';
//     }
// 	}
?>


<div class="main-content">
<div id="modal-0" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Add Product</h4>
<div id="resultarea" class="text-center " style="font-size: 15px;color: red;"></div> 
</div>
<div class="modal-body overflow">
<form class="form-horizontal"  role="form"  enctype="multipart/form-data" id="ItemForm" >
<div class="form-group"> 
<label class="col-sm-2 control-label">*Product Code:</label> 
<div class="col-sm-4"> 
	<?php 
		$query=$this->db->query("select * from tbl_product_stock order by Product_id desc");
		$fetchR=$query->row();
		$productId=$fetchR->Product_id+1;
	?>
			
<input type="hidden" class="hiddenField" name="Product_id" id="Product_id" value="<?php echo $branchFetch->Product_id; ?>" />
<input type="text" class="form-control" name="sku_no" id="sku_no" value="" required> 
</div>
<label class="col-sm-2 control-label">*Product Name:</label> 
<div class="col-sm-4"> 
<input name="item_name"  type="text"  id="productname" value="<?php echo $branchFetch->productname; ?>" class="form-control" required> 
</div>

<label class="col-sm-2 control-label"  style="display: none">*Industry Type:</label> 
<div class="col-sm-4"  style="display: none"> 
<select name="industry"  class="form-control" id="industry">
	<option value="">----Select ----</option>
		<?php 
		$sqlprotype=$this->db->query("select * from tbl_master_data where param_id=20");
		foreach ($sqlprotype->result() as $fetch_protype){
		?>
	<option value="<?php echo $fetch_protype->serial_number;?>"><?php echo $fetch_protype->keyvalue; ?></option>
		<?php } ?>
</select>
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label"  style="display: none">*Product Type:</label> 
<div class="col-sm-4" style="display: none"> 
<select name="type"  class="form-control" id="type">
	<option value="">----Select ----</option>
	<?php 
		$sqlprotype=$this->db->query("select * from tbl_master_data where param_id=17");
		foreach ($sqlprotype->result() as $fetch_protype){
	?>
	<option value="<?php echo $fetch_protype->serial_number;?>"><?php echo $fetch_protype->keyvalue; ?></option>
	<?php } ?>

</select>
</div> 
<label class="col-sm-2 control-label">*Category:</label> 
<div class="col-sm-4"> 
  <select name="category" required class="form-control" id="category" onchange="changing(this.value)">
		<option value="">----Select ----</option>
		<?php 
			$sqlgroup=$this->db->query("select * from tbl_category where status = 1 AND inside_cat = 0 AND 	type =1");
			foreach ($sqlgroup->result() as $fetchgroup){						
		?>					
        <option value="<?php echo $fetchgroup->id; ?>"><?php echo $fetchgroup->name ; ?></option>

    <?php } ?>
  </select>
 </div> 
 <label class="col-sm-2 control-label">*Sub Category:</label> 
<div class="col-sm-4"> 
<div id="subcategoryDiv">
<select name="subcategory" class="form-control" id="subcategory">
						<option value="">----Select----</option>
					<?php 
						$sqlgroup11=$this->db->query("select * from tbl_prodcatg_m where status='B'");
						foreach ($sqlgroup11->result() as $fetchgroup11){						
					?>					
    <option value="<?php echo $fetchgroup11->product_Catid; ?>"><?php echo $fetchgroup11->categoryName ; ?></option>

    <?php } ?></select>
</div>  
</div> 
</div>

<!--============================================================-->
<div class="form-group">

<!-- <label class="col-sm-2 control-label">*Product Name:</label> 
<div class="col-sm-4"> 
<input name="item_name"  type="text"  id="productname" value="<?php echo $branchFetch->productname; ?>" class="form-control" required> 
</div> -->
</div>
<!--===========================================================-->


<div class="form-group">
<label class="col-sm-2 control-label">*HSN Code:</label> 
<div class="col-sm-4"> 
<input name="hsn_code"  id="hsn_code" type="text" value="<?php echo $branchFetch->productname; ?>" class="form-control" required></div>
<label class="col-sm-2 control-label">*GST Tax:</label> 
<div class="col-sm-4"> 
<input name="gst_tax" id="gst_tax" type="text" value="<?php echo $branchFetch->productname; ?>" class="form-control" required> 
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">*Sale Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" name="unitprice_sale" id="unitprice_sale" value="<?php echo $fetch_list->unitprice_sale; ?>" class="form-control" required>
</div> 
<label class="col-sm-2 control-label">*Purchase Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" name="unitprice_purchase" id="unitprice_purchase" value="<?php echo $fetch_list->unitprice_purchase; ?>" class="form-control" required>
</div> 
</div>


<div class="form-group" > 
	<label class="col-sm-2 control-label">*Usages Unit:</label> 
<div class="col-sm-4"> 
	<select name="unit" required class="form-control" id="unit">
		<option value="" >----Select Unit----</option>
			<?php 
			$sqlunit=$this->db->query("select * from tbl_master_data where param_id=16");
			foreach ($sqlunit->result() as $fetchunit){
			?>
		<option value="<?php echo $fetchunit->serial_number;?>"><?php echo $fetchunit->keyvalue; ?></option>
		<?php } ?>
	</select>
</div>
<label class="col-sm-2 control-label">Scope of supply File :</label> 
<div class="col-sm-4"> 
<input type="file" name="image_name"  onchange="loadFile(this)" />
<a id="image" href="<?=base_url()?>assets/images/no_image.png" />Uploaded File</a>
</div> 
</div>
<div class="form-group"  >
<!-- <label class="col-sm-2 control-label">Scope :</label> 
 --><div class="col-sm-4"> 
  <!-- <input type="file" name="scope_doc"  onchange="loadFile(this)" />
  <img id="image" src="<?=base_url()?>assets/images/no_image.png" height="38" width="50" />	 -->

<!-- <select name="scope_doc"  class="form-control"  id="scope">
	<option value="">----Select ----</option>
    <option value="assets/scope_document/CTF5SG.docx">CTF 5SG</option>
    <option value="assets/scope_document/CTFUSG.docx">CTF USG</option>
    <option value="assets/scope_document/CTMUSG.docx">CTM USG</option>
    <option value="assets/scope_document/CTM5SG.docx">CTM 5SG</option>
    <option value="assets/scope_document/CTP5SG.docx">CTP 5SG</option>
    <option value="assets/scope_document/CTPUSG.docx">CTP USG</option>
    <option value="assets/scope_document/FTF-Scope_of_supply.docx">FTF-Scope_of_supply</option>
</select>   -->

</div> 
 
</div>

</div>
<div class="modal-footer" id="button">
<input type="submit" class="btn btn-sm" value="Save"> 
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
</form>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="panel-body panel panel-default" id="listingData">
<div class="row">
<div class="col-sm-12">
<ol class="breadcrumb"> 
<li class="active">Add Product</li> 
</ol>
</div>
</div>

<div class="row" >
<div class="col-sm-12">
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
<div class="html5buttons">
<div class="dt-buttons">
  <a class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_0"><span>Excel</span></a>
  <a class="btn btn-sm" data-toggle="modal" formid = "#ItemForm" data-target="#modal-0" id="formreset">Add Product</a>
  <a class="btn btn-secondary btn-sm delete_all"><span>Delete</span></a>
</div>
</div>

<div class="dataTables_length" id="DataTables_Table_0_length">
<label>Show
<select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" id="entries"  url="<?=base_url('master/Item/manage_item');?>" class="form-control input-sm">
	<option value="10">10</option>
	<option value="25" <?=$entries=='25'?'selected':'';?>>25</option>
	<option value="50" <?=$entries=='50'?'selected':'';?>>50</option>
	<option value="100" <?=$entries=='100'?'selected':'';?>>100</option>
</select>
entries</label>

<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite" style="    margin-top: -5px;margin-left: 12px;float: right;">
	Showing <?=$dataConfig['page']+1;?> to 
	<?php
	$m=$dataConfig['page']==0?$dataConfig['perPage']:$dataConfig['page']+$dataConfig['perPage'];
	echo $m >= $dataConfig['total']?$dataConfig['total']:$m;
	?> of <?php echo $dataConfig['total'];?> entries
</div>
</div>
<div id="DataTables_Table_0_filter" class="dataTables_filter">
<label>Search:
<input type="text" class="form-control input-sm" id="searchTerm"  onkeyup="doSearch()" placeholder="What you looking for?">
</label>
</div>
</div>
</div>
</div><!--row close-->

<div class="table-responsive">
<form class="form-horizontal"   enctype="multipart/form-data">	<!-- //method="post" action="update_item" -->				

<table class="table table-striped table-bordered table-hover dataTables-example1" id="tblData" >

<thead>
<tr>
		<th id="ab"><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
	    <th>Product Code </th>
      <!--   <th>Product Type </th> -->
		<th>Category</th>
        <th>Product Name</th>
		<th>Usages Unit</th>
        <th>Sales Price</th>
		<th>Purchase Price</th>
		<th style="display:none">Image</th>
		<th>Action</th>
</tr>
</thead>

<tbody id="getDataTable">
<?php  
$i=1;
//$nquery=$this->db->query("select * from `tbl_product_stock` $limit");
 foreach($result as $fetch_list)
  {
        $queryType1 = $this->db->query("select * from tbl_product_mapping where product_id='$fetch_list->Product_id'");
		$getType1   = $queryType1->result_array();
		$checkArray = array();
		if(sizeof($getType1) > 0)
		foreach($getType1 as $value) {
			$checkArray[] = $value['cat_id'];

		}
  ?>
<tr  class="gradeC record" data-row-id="<?php echo $fetch_list->Product_id; ?>">
  <th id="ab1">
     <input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->Product_id; ?>" value="<?php echo $fetch_list->Product_id;?>" />

  </th>
	<?php
		$queryType=$this->db->query("select *from tbl_master_data where serial_number='$fetch_list->type'");
		$getType=$queryType->row();
    ?>

<th><a style="cursor: pointer;" checked_cat ='<?=json_encode($checkArray); ?>'  data-toggle="modal" formid = "#" data-target="#modal-1" id="" onclick="mapcategory(this,'<?=$fetch_list->Product_id;?>','<?=$fetch_list->productname;?>','<?=$fetch_list->sku_no;?>');"><?=$fetch_list->sku_no;?></a></th>
<!-- <th><?=$getType->keyvalue;?></th> -->
<th>
<?php 
 $compQuery = $this ->db
           -> select('*')
           -> where('id',$fetch_list->category)
           -> get('tbl_category');
		  $compRow = $compQuery->row();
echo $compRow->name;
?>

 </th>
<th><?=$fetch_list->productname;?></th>
<th><?php
	        $compQuery1 = $this -> db
	            -> select('*')
	            -> where('serial_number',$fetch_list->usageunit)
	            -> get('tbl_master_data');
			$keyvalue1 = $compQuery1->row();
	        echo $keyvalue1->keyvalue;		  
    ?>
	
</th>
<th><?=$fetch_list->unitprice_sale;?></th>
<th><?=$fetch_list->unitprice_purchase;?></th>
<th style="display:none;"><?php if($fetch_list->product_image!=''){?><img src="<?php echo base_url().'assets/image_data/'.$fetch_list->product_image;?>" height="38" width="50" /> <?php } else {?><img src="<?php echo base_url()?>assets/images/no_image.png" height="38" width="50" /><?php }?> </th>
<th class="bs-example" >
<?php if($view!=''){ ?>

<button class="btn btn-default" property = "view" arrt= '<?=json_encode($fetch_list);?>' onclick ="editItem(this);" type="button" data-toggle="modal" data-target="#modal-0" data-backdrop='static' data-keyboard='false'> <i class="fa fa-eye"></i></button>

<?php } if($edit!=''){ ?>

<button class="btn btn-default modalEditItem" data-a="<?php echo $fetch_list->Product_id;?>" onclick="editItem(this)" href='#editItem' type="button" data-target="#modal-0" data-toggle="modal" data-backdrop='static' data-keyboard='false' arrt= '<?=json_encode($fetch_list);?>'><i class="icon-pencil"></i></button>

<?php }
$pri_col='Product_id';
$table_name='tbl_product_stock';
?>
<button class="btn btn-default delbutton" id="<?php echo $fetch_list->Product_id."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>
<button type="button" class="btn btn-default"   data-toggle="modal" formid = "#" data-target="#modal-2" id="" title="Price Mapping !" onclick="getPriceData('<?=$fetch_list->Product_id;?>');"><i class="fa fa-money" aria-hidden="true"></i></button>

<button type="button" class="btn btn-default"   data-toggle="modal" formid = "#" data-target="#modal-3" id="" title="Technical Mapping !" onclick="getTechnicalData('<?=$fetch_list->Product_id;?>');"><i class="icon-flow-tree"></i></button>
	
<?php
  ?>
 
</th>
</tr>


<!-- /.modal -->
<?php $i++; } ?>
</tbody>
<input type="text" style="display:none;" id="table_name" value="tbl_product_stock">  
<input type="text" style="display:none;" id="pri_col" value="Product_id">
</table>
</form>
<div class="row">
    <div class="col-md-12 text-right">
    	<div class="col-md-6 text-left"> 
    <!-- <h6>Showing 1 to 10 of <?php echo $totalrow; ?> entries</h6> -->
    	</div>
    	<div class="col-md-6"> 
        <?=$pagination; ?>
        </div>
		<div class="popover fade right in displayclass" role="tooltip" id="popover" style=" background-color: #ffffff;border-color: #212B4F;"><!-- <div class="arrow" style="top: 50%;"></div>  -->
		
		</div>
       </div>
     </div>
   </div>
</div><!--main-content close-->
<div id="modal-1" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Product Mapping  <span > </span></h4>
<div id="msgdata" class="text-center " style="font-size: 15px;color: red;"></div> 
</div>
<div class="modal-body overflow">
<form class="form-horizontal"   role="form"   enctype="multipart/form-data" id="ItemMapping" >
<div class="form-group"> 
<label class="col-sm-2 control-label">*Product Name:</label> 
<div class="col-sm-4" > 
 <input type="text" class="form-control" value="" id="prdname" readonly>
</div>
<label class="col-sm-2 control-label">*Product Code:</label> 
<div class="col-sm-4" > 
 <input type="text" class="form-control" value="" id="prdcode" readonly>
  <input type="hidden" name = "pid" class="form-control" value="" id="proId" readonly>
</div>
</div>
<div class="form-group"> 
	<h4 style="text-align: center;">Tecnical Mapping</h4>
<label class="col-sm-2 control-label">Categories</label> 
<div class="col-sm-10">
<?php foreach ($mapcategory as  $dt) { ?>
<label class="checkbox-inline">
	<input type="checkbox" class="check" name="mapcat[]" id="<?=$dt['id'];?>" value="<?=$dt['id'];?>"><?=$dt['name'];?>
</label>
<?php } ?> 
</div>
<br><br>
<br><br>
<h4 style="text-align: center;">Price Mapping </h4>
<label class="col-sm-2 control-label">Categories</label> 
<div class="col-sm-10">
<?php foreach ($mapScope as  $sdt) { ?>
<label class="checkbox-inline">
	<input type="checkbox" class="check" name="mapScope[]" id="<?=$sdt['id'];?>" value="<?=$sdt['id'];?>"><?=$sdt['name'];?>
</label>
<?php } ?> 
</div> 


<label class="col-sm-2 control-label"></label> 
<div class="col-sm-4"> 
</div>

</div>
</div>

<div class="modal-footer" id="button">
<input type="submit" class="btn btn-sm" value="Save"> 
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
</form>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="modal-2" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Product Mapping  <span > </span></h4>
<div id="resultarea1" class="text-center " style="font-size: 15px;color: red;"></div> 
</div>
<div class="modal-body overflow" id ="showPriceEdit">
<form class="form-horizontal"   role="form"   enctype="multipart/form-data" id="PriceMapping" >
<!-- <div class="form-group"> 
<label class="col-sm-2 control-label">*Capacity:</label> 
<div class="col-sm-3" > 
 <input type="text" class="form-control" value="" name="capacity" id="capacity">
</div>
<label class="col-sm-2 control-label">*Capacity Type:</label> 
<div class="col-sm-3" > 
   <input type="text" class="form-control" value="" name="entity" id="entity">
   <input type="hidden" name = "pid" class="form-control" value="" id="proId">
</div>
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Price Name:</label> 
<div class="col-sm-3" > 
 <input type="text" class="form-control" value=""  id="pricename">
</div>
<label class="col-sm-2 control-label">*Price Value:</label> 
<div class="col-sm-3" > 
   <input type="text" class="form-control" value="" id="pricevalue">
 </div>
<div class="col-sm-2"> 
   <button class="btn btn-default" type="button" onclick="addprice()"><img src="/thermodyne/assets/images/plus.png"></button>
 </div>
</div>
<br>
<table class="table table-bordered table-hover">
   <tbody>
      <tr class="gradeA">
		<th>Quotation Name</th>
		<th>Price</th>
		<th>Action</th>
	   </tr>
   </tbody>
   <tbody id="priceTable">
   </tbody>
</table>
<div class="form-group"></div>
<div class="modal-footer" id="button">
<input type="submit" class="btn btn-sm" value="Save"> 
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>-->
</form>

 </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div><!--panel-body panel panel-default close-->




<div id="modal-3" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Technical Mapping  <span > </span></h4>
<div id="resultarea3" class="text-center " style="font-size: 15px;color: red;"></div> 
<div id="resultarea4" class="text-center " style="font-size: 15px;color: red;"></div> 
</div>
<div class="modal-body overflow" id ="showPriceEdit">
<form class="form-horizontal"   role="form"   enctype="multipart/form-data" id="TechnicalMapping" >
</form>

 </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>


<script>

// function editItem(v){
// //alert(v);
// var pro=v;
//  var xhttp = new XMLHttpRequest();
//   xhttp.open("GET", "updateItem?ID="+pro, false);
//   xhttp.send();
//   document.getElementById("contentitem").innerHTML = xhttp.responseText;
// }


function changing(v){
//alert(v);
var pro=v;
 var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "changesubcatg?ID="+pro, false);
  xhttp.send();
  //alert(xhttp.responseText);
  document.getElementById("subcategoryDiv").innerHTML = xhttp.responseText;
 // document.getElementById("subcategory11").innerHTML = xhttp.responseText;
}

</script>	


<?php

$this->load->view("footer.php");
?>

