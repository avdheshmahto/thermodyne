
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
<form class="form-horizontal"   enctype="multipart/form-data">  <!-- //method="post" action="update_item" -->       

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
