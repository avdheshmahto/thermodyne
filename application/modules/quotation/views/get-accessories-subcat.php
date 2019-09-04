  <td>
	<select name="accessories" class="form-control" id="accessories" onchange="getaccessories(this)" value="" subcat="" style="width: 230px;">
		<option value="" >----Select Model----</option>
		 <?php 
		
		$sqlunit=$this->db->query("select * from tbl_accessories where status='A' and acc_category=$accid");
		  foreach ($sqlunit->result() as $fetchunit){
		?><option value='<?php echo $fetchunit->Accessory_id;?>' arrt='<?php echo json_encode($fetchunit)?>'><?php echo $fetchunit->acc_subcategory; ?></option>
	   <?php } ?> 
	</select>  </td>	
