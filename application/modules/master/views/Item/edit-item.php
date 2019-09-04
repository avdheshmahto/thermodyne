<div class="row">

<div class="col-sm-12">

<ol class="breadcrumb"> 

<li class="active">Manage Product</li> 

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

<select name="DataTables_Table_0_length" url="<?=base_url('master/Item/manage_item').'?sku_no='.$_GET['sku_no'].'&category='.$_GET['category'].'&productname='.$_GET['productname'].'&usageunit='.$_GET['usageunit'].'&unitprice_purchase='.$_GET['unitprice_purchase'].'&unitprice_sale='.$_GET['unitprice_sale'].'&filter='.$_GET['filter'];?>" aria-controls="DataTables_Table_0" id="entries" class="form-control input-sm">

	<option value="10" <?=$entries=='10'?'selected':'';?>>10</option>

	<option value="25" <?=$entries=='25'?'selected':'';?>>25</option>

	<option value="50" <?=$entries=='50'?'selected':'';?>>50</option>

	<option value="100" <?=$entries=='100'?'selected':'';?>>100</option>

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





<div class="table-responsive">

<table class="table table-striped table-bordered table-hover dataTables-example1" id="tblData" >

<thead bgcolor="CCCCCC">

<tr>

		<th><input name="check_all" type="checkbox" id="check_all" onClick="checkall(this.checked)" value="check_all" /></th>

	    <th>Product Code </th>

     	<!-- <th> Product Type </th> -->

		<th>Category</th>

        <th>Product Name</th>

		<th>Usages Unit</th>

        <th style="display: none;">Sales Price</th>

		<th style="display: none;">Purchase Price</th>

		<!--<th id="ab"></th>-->

		<th style="display:none">Image</th>

		<th><div style="width:265px;">Action</div></th>

</tr>

</thead>



<thead>

<tr>

	<td>&nbsp;</td>
	<td><input name="Product_id"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="category"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="item_name"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="unit"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><button type="submit" class="btn btn-sm" name="filter" value="filter" style="margin:0px;"><span>Search</span></button></td>
</form>


</tr>

<tr style="display: none">

	<form method="get">
	<td>&nbsp;</td>
	<td><input name="Product_id"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="category"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="item_name"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="unit"  type="text"  class="search_box form-control input-sm"  value="" /></td>
	<!-- <td><input name="unitprice_sale" type="text"  class="search_box form-control input-sm"  value="" /></td>
	<td><input name="unitprice_purchase" type="text"  class="search_box form-control input-sm"  value="" /></td> -->
	<td><button type="submit">assa</button></td>
	<td><button type="submit" class="btn btn-sm" name="filter" value="filter" style="margin:0px;display: none;"><span>Search</span></button></td>
</form>


</tr>


</thead>







<tbody id="getDataTable">

<?php  

$i=1;



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



<th><?=$fetch_list->sku_no;?></th>

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



<th style="display: none;"><?=$fetch_list->unitprice_sale;?></th>

<th style="display: none;"><?=$fetch_list->unitprice_purchase;?></th>



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



<button type="button" class="btn btn-default"   data-toggle="modal" formid = "#" data-target="#modal-4" id="" title="Enter Subject value !" onclick="getSubjectData('<?=$fetch_list->Product_id;?>');"><i class="fa fa-file-text-o" aria-hidden="true"></i></button>



<button type="button" class="btn btn-default"   data-toggle="modal" formid = "#" data-target="#modal-5" id="" title="Enter Contant Value !" onclick="getContantData('<?=$fetch_list->Product_id;?>');"><i class="fa fa-book" aria-hidden="true"></i></button>



<button type="button" class="btn btn-default"   data-toggle="modal" formid = "#" data-target="#modal-6" id="" title="Enter Price Contant !" onclick="getPriceTextData('<?=$fetch_list->Product_id;?>');"><i class="fa fa-plus" aria-hidden="true"></i></button>

<button type="button" class="btn btn-default"   data-toggle="modal" formid = "#" data-target="#modal-8" id="" title="Technical Mapping !" onclick="exceltechnicaldata('<?=$fetch_list->Product_id;?>');"><i class="icon-flow-tree"></i></button>
	 

</th>

</tr>



<?php $i++; } ?>

</tbody>



<input type="text" style="display:none;" id="table_name" value="tbl_product_stock">  

<input type="text" style="display:none;" id="pri_col" value="Product_id">



</table>



<div class="row">

    <div class="col-md-12 text-right">

    	<div class="col-md-6 text-left"> 

	    <!-- <h6>Showing 1 to 10 of <?php echo $totalrow; ?> entries</h6> -->

    	</div>

    	<div class="col-md-6"> 

         <?php echo $pagination; ?>

        </div>

		 <div class="popover fade right in displayclass" role="tooltip" id="popover" style=" background-color: #ffffff;border-color: #212B4F;">

		</div>

      </div>

   </div>

</div>



