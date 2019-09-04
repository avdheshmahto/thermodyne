<?php
class accessory_model extends CI_Model {
	
  
function accessories_get($last,$strat)
{
	$query=$this->db->query("select * from tbl_accessories where status='A' ORDER BY Accessory_id DESC limit $strat,$last");
    return $result=$query->result();  
}

 
function filterListaccessories($perpage,$pages,$get)
{
 	
	   $qry ="select * from tbl_accessories where status='A'";
    
		if(sizeof($get) > 0)
		 {
			   
			   if($get['acc_cat'] != "")
			   {
				   $unitQuery2=$this->db->query("select * from tbl_category where name LIKE '%".$get['acc_cat']."%'");
				   $getUnit2=$unitQuery2->row();
				   $sr_no2=$getUnit2->id;
			 
				   $qry .= " AND category ='$sr_no2'";
			   }
			  
         if($get['acc_subcat'] != "")
         {
            $qry .= " AND acc_subcategory LIKE '%".$get['acc_subcat']."%'";
         }
         
			   if($get['acc_price'] != "")
			   {
			   		$qry .= " AND acc_price LIKE '%".$get['acc_price']."%'";
			   }  
			   
					  
			   if($get['acc_des'] != "")
			   {
			  		$qry .= " AND acc_description LIKE '%".$get['acc_des']."%'";
			   }	  
				
	
		 }
		 
		 $qry .= "  limit $pages,$perpage";
 
   	$data =  $this->db->query($qry)->result();
  
  return $data;

}



function count_allaccessories($tableName,$status = 0,$get)
{
	 
	   $qry ="select count(*) as countval from $tableName where status='A'";
    
		if(sizeof($get) > 0)
		 {
			 if($get['acc_cat'] != "")
         {
           $unitQuery2=$this->db->query("select * from tbl_category where name LIKE '%".$get['acc_cat']."%'");
           $getUnit2=$unitQuery2->row();
           $sr_no2=$getUnit2->id;
       
           $qry .= " AND category ='$sr_no2'";
         }
        
         if($get['acc_subcat'] != "")
         {
            $qry .= " AND acc_subcategory LIKE '%".$get['acc_subcat']."%'";
         }
         
         if($get['acc_price'] != "")
         {
            $qry .= " AND acc_price LIKE '%".$get['acc_price']."%'";
         }  
         
            
         if($get['acc_des'] != "")
         {
            $qry .= " AND acc_description LIKE '%".$get['acc_des']."%'";
         }    
        	
	     }
		 
 	  $query=$this->db->query($qry,array($status))->result_array();
   return $query[0]['countval'];

}
}
?>