

<th valign="top" style="vertical-align:top">Subject</th>
	<th colspan="1" valign="top"  class="form-control" style="width:29%; vertical-align:top;">
	<select name="subject" required class="form-control" id="unit">
		<option value="" >----Select Subject----</option>
			<?php 
			$sqlunit=$this->db->query("select * from tbl_product_subject where pid =$id AND status = 1");
			foreach ($sqlunit->result() as $fetchunit){
			?>
		<option value="<?php echo $fetchunit->sub_details;?>"><?php echo $fetchunit->title; ?></option>
		<?php } ?>
	</select>
</th>

        

<th valign="top" style="vertical-align:top;">Contant</th>
<th colspan="1" valign="top"  class="form-control" style="width:20%;">
	<select name="contant" required class="form-control" id="unit">
		<option value="" >----Select Contant----</option>
			<?php 
			$sqlunit=$this->db->query("select * from tbl_product_contant where pid =$id AND  status=1");
			foreach ($sqlunit->result() as $fetchunit){
			?>
		<option value="<?php echo $fetchunit->sub_details;?>"><?php echo $fetchunit->title; ?></option>
		<?php } ?>
	</select>
</th>
<th colspan="1"  class="form-control" style="width:8%;">Price;</th>	
  <th colspan="1" valign="top"  class="form-control">
	<select name="pricetext" required class="form-control" id="unit">
		<option value="" >----Select Price----</option>
		<?php 
		 $sqlunit=$this->db->query("select * from tbl_product_price_text where pid =$id AND status=1");
		  foreach ($sqlunit->result() as $fetchunit){
		?><option value="<?php echo $fetchunit->sub_details;?>"><?php echo $fetchunit->title; ?></option>
	   <?php } ?>
	</select>
  </th>	
