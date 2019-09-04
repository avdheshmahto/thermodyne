<?php
$filename="manage_item_excel";
$CONTENTS="S NO.,PRODUCT CODE,CATEGORY,PRODUCT NAME,USAGE UNIT\n";
?>
<?php
$qry ="select * from tbl_product_stock where status='A'";
    
		if($_GET["filter"]=="filter")
		 {
			   if($_GET['Product_id'] != "")
			   {
			   		$qry .= " AND sku_no LIKE '%".$_GET['Product_id']."%'";
			   }
			   
			   if($_GET['category'] != "")
			   {
				   $unitQuery2=$this->db->query("select * from tbl_category where name LIKE '%".$_GET['category']."%'");
				   $getUnit2=$unitQuery2->row();
				   $sr_no2=$getUnit2->id;
			 
				   $qry .= " AND category ='$sr_no2'";
			   }
			   
			   if($_GET['item_name'] != "")
			   {
			   		$qry .= " AND productname LIKE '%".$_GET['item_name']."%'";
			   }  
			   
			   if($_GET['unit'] != "")
			   {
				   $unitQuery=$this->db->query("select * from tbl_master_data where keyvalue LIKE '%".$_GET['unit']."%'");
				   $getUnit=$unitQuery->row();
				   $sr_no=$getUnit->serial_number;
			 
				   $qry .= " AND usageunit ='$sr_no'";
			   }
		 }
//echo $qry;die;
   	$data =  $this->db->query($qry)->result();
$i=1;
foreach($data as $fetch_list)
{
	 // print_r($result);die;
	$queryType1 = $this->db->query("select * from tbl_product_mapping where product_id='$fetch_list->Product_id'");
	$getType1   = $queryType1->result_array();
	$checkArray = array();
	if(sizeof($getType1) > 0)
	foreach($getType1 as $value) {
		$checkArray[] = $value['cat_id'];
}

	$queryType=$this->db->query("select *from tbl_master_data where serial_number='$fetch_list->type'");
	$getType=$queryType->row();

 $compQuery = $this ->db
           -> select('*')
           -> where('id',$fetch_list->category)
           -> get('tbl_category');
		  $compRow = $compQuery->row();


	        $compQuery1 = $this -> db
	            -> select('*')
	            -> where('serial_number',$fetch_list->usageunit)
	            -> get('tbl_master_data');
			$keyvalue1 = $compQuery1->row();	  
$CONTENTS.=str_replace(',',' ',$i).",";
$CONTENTS.=str_replace(',',' ',$fetch_list->sku_no).",";

$CONTENTS.=str_replace(',',' ',$compRow->name).",";
$CONTENTS.=str_replace(',',' ',$fetch_list->productname).",";
$CONTENTS.=str_replace(',',' ',$keyvalue1->keyvalue)."\n";
 $i++;}
header("Content-type:application/ms-excel");
header("Content-disposition:attachment;filename='$filename.csv'");
echo $CONTENTS;
?>





