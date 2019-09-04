<?
$ID=$_GET['ID'];
?>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Update Product</h4>
</div>
<div class="modal-body overflow">
<?php
	 $ItemQuery=$this->db->query("select * from tbl_product_stock where Product_id='$ID'");
         $fetch_list=$ItemQuery->row();

?>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Product Code:</label> 
<div class="col-sm-4"> 
	<?php 
					$query=$this->db->query("select * from tbl_product_stock order by Product_id desc");
					$fetchR=$query->row();
					
					$productId=$fetchR->Product_id+1;
	?>
			
<input type="hidden"  name="Product_id" value="<?php echo $fetch_list->Product_id;?>" readonly="" />
<input type="text" class="form-control" name="sku_no" value="<?php echo $fetch_list->sku_no;?>" > 
</div> 
<label class="col-sm-2 control-label">*Industry Type:</label> 
<div class="col-sm-4"> 
<select name="industry" required class="form-control">
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id=20");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>"<?php if($fetch_protype->serial_number==$fetch_list->industry){?>selected<?php }?>><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select>
</div> 
</div>
<div class="form-group"> 
<label class="col-sm-2 control-label">*Product Type:</label> 
<div class="col-sm-4"> 
<select name="type" required class="form-control">
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id=17");
						foreach ($sqlprotype->result() as $fetch_protype){
						
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>"<?php if($fetch_protype->serial_number==$fetch_list->type){?>selected<?php }?>><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select>
</div> 
<label class="col-sm-2 control-label">*Category:</label> 
<div class="col-sm-4"> 
<select name="category" required class="form-control" onchange="changing(this.value)">
						<option value="">----Select ----</option>
					<?php 
						$sqlgroup=$this->db->query("select * from tbl_prodcatg_mst where prodcatg_id!='121'");
						foreach ($sqlgroup->result() as $fetchgroup){						
					?>					
    <option value="<?php echo $fetchgroup->prodcatg_id; ?>"<?php if($fetchgroup->prodcatg_id==$fetch_list->category){?>selected<?php }?>><?php echo $fetchgroup->prodcatg_name ; ?></option>

    <?php } ?></select>
</div>  
</div>

<!--============================================================-->
<div class="form-group">
<label class="col-sm-2 control-label">*Sub Category:</label> 
<div class="col-sm-4"> 
<div id="subcategory11">
<select name="subcategory" class="form-control">
						<option value="">----Select----</option>
					<?php 
						$sqlgroup11=$this->db->query("select * from tbl_prodcatg_m where catg_id='$fetch_list->category'");
						foreach ($sqlgroup11->result() as $fetchgroup11){						
					?>					
    <option value="<?php echo $fetchgroup11->product_Catid; ?>"<?php if($fetchgroup11->prodCatg_id==$fetch_list->subcategory){?>selected<?php }?>><?php echo $fetchgroup11->categoryName ; ?></option>

    <?php } ?></select>
</div>  
</div>
<label class="col-sm-2 control-label">*Product Name:</label> 
<div class="col-sm-4"> 
<input name="item_name"  type="text" value="<?php echo $fetch_list->productname; ?>" class="form-control" required> 
</div>
</div>
<!--===========================================================-->

<div class="form-group">
<label class="col-sm-2 control-label">Color:</label> 
<div class="col-sm-4"> 
<select name="color[]"  class="form-control ui fluid search dropdown email" multiple="multiple">
						<option value="">----Select ----</option>
					
					<?php 
					
						$sqlprotype=$this->db->query("select * from tbl_master_data where param_id=19");
						foreach ($sqlprotype->result() as $fetch_protype){
						$explode=explode(",",$fetch_list->color);
					?>
				<option value="<?php echo $fetch_protype->serial_number;?>"<?php for ($j=0;$j<=count($fetch_list->color);$j++){  $ex=$explode[$j]; if($fetch_protype->serial_number==$ex){ ?> selected <?php } }?>><?php echo $fetch_protype->keyvalue; ?></option>
					<?php } ?>

					</select> 
</div> 
<label class="col-sm-2 control-label">*Usages Unit:</label> 
<div class="col-sm-4"> 
		  <select name="unit" required class="form-control">
					<option value="" >----Select Unit----</option>
				<?php 
						$sqlunit=$this->db->query("select * from tbl_master_data where param_id=16");
						foreach ($sqlunit->result() as $fetchunit){
						
					?>
				<option value="<?php echo $fetchunit->serial_number;?>"<?php if($fetchunit->serial_number==$fetch_list->usageunit){?>selected<?php }?>><?php echo $fetchunit->keyvalue; ?></option>
					<?php } ?>
			</select>
</div> 
</div>
<div class="form-group">
<label class="col-sm-2 control-label">*HSN Code:</label> 
<div class="col-sm-4"> 
<input name="hsn_code"  type="number" value="<?php echo $fetch_list->hsn_code; ?>" class="form-control" required> 
</div>
<label class="col-sm-2 control-label">*GST Tax:</label> 
<div class="col-sm-4"> 
<input name="gst_tax"  type="number" value="<?php echo $fetch_list->gst_tax; ?>" class="form-control" required> 
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">*Sale Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" name="unitprice_sale" value="<?php echo $fetch_list->unitprice_sale; ?>" class="form-control" required>
</div> 
<label class="col-sm-2 control-label">*Purchase Price:</label> 
<div class="col-sm-4" id="regid"> 
<input type="number" step="any" name="unitprice_purchase" value="<?php echo $fetch_list->unitprice_purchase; ?>" class="form-control" required>
</div> 
</div>

<div class="form-group" style="display:none"> 
<label class="col-sm-2 control-label">Image:</label> 
<div class="col-sm-4"> 
<input type="file" name="image_name" accept="image/*" onchange="loadFile(event)" /><img src="<?php echo base_url()?>assets/images/no_image.png" height="38" width="50" />
</div> 
</div>

</div>
<div class="modal-footer">
<input type="submit" class="btn btn-sm" data-dismiss="modal1" value="Save">
<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
</div>