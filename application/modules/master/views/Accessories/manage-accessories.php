<?php
$this->load->view("header.php");

$entries = "";
if($this->input->get('entries')!="")
{
  $entries = $this->input->get('entries');
}
?>


<div class="main-content">

<div id="modal-0" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><span class="top_title" >Add</span>&nbsp;Accessories</h4>
<div id="resultarea" class="text-center " style="font-size: 15px;color: red;"></div> 
</div>


<div class="modal-body overflow">
<form class="form-horizontal"  role="form"  enctype="multipart/form-data" id="AccessoriesForm" >

<div class="form-group"> 
<label class="col-sm-2 control-label">*Select Category:</label> 
<div class="col-sm-4"> 
  <select name="acc_category"  class="form-control" id="acc_category" onchange="changing(this.value)" required>
		<option value="">----Select ----</option>
		<?php 
			$sqlgroup=$this->db->query("select * from tbl_master_data MD,tbl_master_data_mst MDM where MDM.status = 'A' AND MDM.param_id = 24 AND MD.param_id=24");
			//$sqlgroup=$this->db->query("select * from tbl_master_data_mst MDM where MDM.status = 'A' AND MDM.param_id = 24");
			foreach ($sqlgroup->result() as $fetchgroup){						
		?>					
        <option value="<?php echo $fetchgroup->serial_number; ?>"><?php echo $fetchgroup->keyvalue;?></option>

    <?php } ?>
  </select>
</div> 
<label class="col-sm-2 control-label">Model:</label> 
<div class="col-sm-4"> 
	<input name="acc_subcategory"  id="acc_subcategory" type="text" value="" class="form-control" >
	<input name="Accessory_id"  id="Accessory_id" type="text" style="display: none;">
<!-- <div id="subcategoryDiv">
<select name="subcategory" class="form-control" id="subcategory">
	<option value="">----Select----</option>
					<?php 
						//$sqlgroup11=$this->db->query("select * from tbl_prodcatg_m where status='B'");
						//foreach ($sqlgroup11->result() as $fetchgroup11){						
					?>					
    <option value="<?php //echo $fetchgroup11->product_Catid; ?>"><?php //echo $fetchgroup11->categoryName ; ?></option>
    <?php //} ?>
</select>
</div>   -->
</div> 
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Price</label> 
<div class="col-sm-4"> 
<input name="acc_price"  id="acc_price" type="text" value="" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
</div>
<label class="col-sm-2 control-label">Description</label> 
<div class="col-sm-4"> 
<textarea name="acc_description" id="acc_description" class="form-control"></textarea>
</div>
</div>
<!--
<div class="form-group">
<label class="col-sm-2 control-label">Sale Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" name="unitprice_sale" id="unitprice_sale" value="" class="form-control" >
</div> 
<label class="col-sm-2 control-label">Purchase Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" name="unitprice_purchase" id="unitprice_purchase" value="" class="form-control" >
</div> 
</div>
 -->

</div>
<div class="modal-footer" id="button">
<input type="submit" class="btn btn-sm" value="Save"> 
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>
</form>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>


<div class="panel-body panel panel-default" id="listingData">
<div class="row">
<div class="col-sm-12">
<ol class="breadcrumb"> 
<li class="active">Manage Accessories</li> 
</ol>
</div>
</div>

<div class="row" >
<div class="col-sm-12">
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
<div class="html5buttons">
<div class="dt-buttons">
<a class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_0"><span>Excel</span></a>
<a class="btn btn-sm" data-toggle="modal" formid = "#AccessoriesForm" data-target="#modal-0" id="formreset">Add Accessories</a>
<a class="btn btn-secondary btn-sm delete_all"><span>Delete</span></a>
</div>
</div>

<div class="dataTables_length" id="DataTables_Table_0_length">
<label>Show
<select name="DataTables_Table_0_length" url="<?=base_url('master/Accessories/manage_accessories').'?acc_cat='.$_GET['acc_cat'].'&acc_subcat='.$_GET['acc_subcat'].'&acc_price='.$_GET['acc_price'].'&acc_des='.$_GET['acc_des'].'&filter='.$_GET['filter'];?>" aria-controls="DataTables_Table_0" id="entries" class="form-control input-sm">
	<option value="10" <?=$entries=='10'?'selected':'';?>>10</option>
	<option value="25" <?=$entries=='25'?'selected':'';?>>25</option>
	<option value="50" <?=$entries=='50'?'selected':'';?>>50</option>
	<option value="100" <?=$entries=='100'?'selected':'';?>>100</option>
	<option value="500" <?=$entries=='500'?'selected':'';?>>500</option>
	<option value="<?=$dataConfig['total'];?>" <?=$entries==$dataConfig['total']?'selected':'';?>>ALL</option>
</select>
entries</label>
<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite" style="margin-top: -5px;margin-left: 12px;float: right;">
Showing <?=$dataConfig['page']+1;?> to 
<?php
	$m=$dataConfig['page']==0?$dataConfig['perPage']:$dataConfig['page']+$dataConfig['perPage'];
	echo $m >= $dataConfig['total']?$dataConfig['total']:$m;
?> of <?=$dataConfig['total'];?> entries
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


<div class="row">
<div class="col-lg-12">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover dataTables-example1" id="tblData" >
<thead bgcolor="CCCCCC">
<tr>
		<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>
	    <th>Accessories Category </th>
     	<!-- <th> Product Type </th> -->
		<th>Accessories SubCategory</th>
        <th>Price</th>
		<th>Description</th>
        <!-- <th>Sales Price</th>
		<th>Purchase Price</th> -->
		<!--<th id="ab"></th>-->
		<th style="display:none">Image</th>
		<th><div style="width:265px;">Action</div></th>
</tr>
</thead>


<thead>
<tr>
<form method="get">
	<td>&nbsp;</td>
	<td><input name="acc_cat"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="acc_subcat"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="acc_price"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="acc_des"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<!-- <td><input name="unitprice_sale" type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="unitprice_purchase" type="text"  class="search_box form-control input-sm"  value="" /></td> -->
	<td><button type="submit" class="btn btn-sm" name="filter" value="filter" style="margin:0px;"><span>Search</span></button></td>
</form>
</tr>
</thead>

<tbody id="getDataTable">
<?php  
$i=1;
//$nquery=$this->db->query("select * from `tbl_product_stock` $limit");
foreach($result as $fetch_list)
{

?>
<tr  class="gradeC record" data-row-id="<?php echo $fetch_list->Accessory_id; ?>">
<th id="ab1">
<input name="cid[]" type="checkbox" id="cid[]" class="sub_chk" data-id="<?php echo $fetch_list->Accessory_id; ?>" value="<?php echo $fetch_list->Accessory_id;?>" />
</th>
<th>
	<?php 
	$query=$this->db->query("select keyvalue,param_id from tbl_master_data where serial_number='$fetch_list->acc_category'");
	$queryres=$query->row();
	echo $queryres->keyvalue;?>
</th>
<th>
	<?=$fetch_list->acc_subcategory?>
</th>
<th>
	<?=$fetch_list->acc_price?>
</th>
<th>
	<?=$fetch_list->acc_description?>
</th>

<th style="display:none;"><?php if($fetch_list->product_image!=''){?><img src="<?php echo base_url().'assets/image_data/'.$fetch_list->product_image;?>" height="38" width="50" /> <?php } else {?><img src="<?php echo base_url()?>assets/images/no_image.png" height="38" width="50" /><?php }?> </th>

<th class="bs-example" >
<?php if($view!=''){ ?>

<button class="btn btn-default" title="View Product !" property = "view" arrt= '<?=json_encode($fetch_list);?>' onclick ="editAccessory(this);" type="button" data-toggle="modal" data-target="#modal-0" data-backdrop='static' data-keyboard='false'> <i class="fa fa-eye"></i></button>

<?php } if($edit!=''){ ?>

<button  class="btn btn-default modalEditItem" title="Update Product !" data-a="<?php echo $fetch_list->Product_id;?>" onclick="editAccessory(this)" href='#editItem' type="button" data-target="#modal-0" data-toggle="modal" data-backdrop='static' data-keyboard='false' arrt= '<?=json_encode($fetch_list);?>'><i class="icon-pencil"></i></button>

<?php }
$pri_col='Accessory_id';
$table_name='tbl_accessories';
?>
<button class="btn btn-default delbutton" title="Delete Product !" id="<?php echo $fetch_list->Accessory_id."^".$table_name."^".$pri_col ; ?>" type="button"><i class="icon-trash"></i></button>

<button style="display: none;" type="button" class="btn btn-default"   data-toggle="modal" formid = "#" data-target="#modal-2" id="" title="Price Mapping !" onclick="getPriceData('<?=$fetch_list->Product_id;?>');"><i class="fa fa-money" aria-hidden="true"></i></button>

<button style="display: none;" type="button" class="btn btn-default"   data-toggle="modal" formid = "#" data-target="#modal-3" id="" title="Technical Mapping !" onclick="getTechnicalData('<?=$fetch_list->Product_id;?>');"><i class="icon-flow-tree"></i></button>

<button style="display: none;" type="button" class="btn btn-default"   data-toggle="modal" formid = "#" data-target="#modal-4" id="" title="Enter Subject value !" onclick="getSubjectData('<?=$fetch_list->Product_id;?>');"><i class="fa fa-file-text-o" aria-hidden="true"></i></button>

<button style="display: none;" type="button" class="btn btn-default"   data-toggle="modal" formid = "#" data-target="#modal-5" id="" title="Enter Contant Value !" onclick="getContantData('<?=$fetch_list->Product_id;?>');"><i class="fa fa-book" aria-hidden="true"></i></button>

<button style="display: none;" type="button" class="btn btn-default"   data-toggle="modal" formid = "#" data-target="#modal-6" id="" title="Enter Price Contant !" onclick="getPriceTextData('<?=$fetch_list->Product_id;?>');"><i class="fa fa-plus" aria-hidden="true"></i></button>
	
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

<div class="row">
    <div class="col-md-12 text-right">
    	<div class="col-md-6 text-left"> </div>
    	<div class="col-md-6"> 
         <?php echo $pagination; ?>
        </div>
   </div>
</div>
	 
</div>	 
</div>
</div>
</div>
</div>

<!--main-content close-->

<div id="modal-2" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Price Mapping  <span > </span></h4>
<div id="resultarea1" class="text-center " style="font-size: 15px;color: red;"></div> 
</div>
<div class="modal-body overflow" id ="showPriceEdit">
<form class="form-horizontal"   role="form"   enctype="multipart/form-data" id="PriceMapping" >
</form>

 </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>



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

<div id="modal-4" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Subject  Text<span > </span></h4>
			<div id="resultareasubject" class="text-center " style="font-size: 15px;color: red;"></div> 
			</div>
		<div class="modal-body overflow" id ="showSubject">
		  <form class="form-horizontal" role="form" enctype="multipart/form-data" id="showSubjectDetails" >
		  </form>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div>

<div id="modal-5" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"> Contant Text  <span > </span></h4>
				<div id="resultareacontant" class="text-center" style="font-size: 15px;color: red;"></div> 
			</div>
			<div class="modal-body overflow" id ="showContant">
				<form class="form-horizontal"   role="form" enctype="multipart/form-data" id="showContantmapping" >
				</form>
            </div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div>

<div id="modal-6" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		    <h4 class="modal-title">Price  Text  <span > </span></h4>
		    <div id="priceTextMsg" class="text-center " style="font-size: 15px;color: red;"></div> 
		  </div>
		<div class="modal-body overflow" id ="showPrice">
		    <form class="form-horizontal"   role="form"   enctype="multipart/form-data" id="showpricetextMapping" >
	        </form>
        </div><!-- /.modal-content -->
	 </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>

<script>


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

