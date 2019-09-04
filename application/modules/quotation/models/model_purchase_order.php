<?php
class model_purchase_order extends CI_Model {
	

function mod_productList($val,$pid){
  $qry = $this->db->query("select C.productname,M.id as id,M.price from tbl_product_stock C,tbl_product_price_mapping M where M.pid = C.Product_id AND  M.pid = $pid AND C.productname like '%$val%'")->result_array();
  return $qry;
}

function getinvoiceData($id){ 
//echo "select H.subject,H.invoice_date,H.purchase_no,H.contant,C.first_name,C.email,C.address1,C.city,S.stateName from  tbl_quotation_order_hdr H,tbl_contact_m C,tbl_state_m S where C.contact_id = H.contactid AND S.stateid = C.state_id AND H.quotationid =$id";

    $query=$this->db->query("select H.quotationid,H.subject,H.pricetext,H.invoice_date,H.purchase_no,H.contant,C.title_deal,C.contact_person,C.org_name,C.mobile,C.address1,C.city,C.state_id,C.person_email,C.person_name from  tbl_quotation_order_hdr H,tbl_contact_m C where C.contact_id = H.contactid  AND H.quotationid =?",array($id));
	return $result = $query->row_array();  
	// print_r( $result);

}

// function getinvoicetechdetails($id){
// 	//echo "select D.productid from  tbl_quotation_order_dtl D where D.quotationid = $id";
//         $query  = $this->db->query("select D.productid,D.grade from  tbl_quotation_order_dtl D where D.quotationid = ?",array($id));
// 		$result =$query->row_array();
// 		$arr = "";
// 		if(sizeof($result) > 0){
// 		//echo "select C.*,M.type as mtype from  tbl_product_mapping M,tbl_category C where M.cat_id = C.id  AND C.grade IN (".$result['grade'].") AND M.type = 1 AND M.product_id =".$result['productid'];
//           $qry=$this->db->query("select C.*,M.type as mtype from  tbl_product_mapping M,tbl_category C where M.cat_id = C.id   AND M.type = 1 AND M.product_id = ?",array($result['productid']));

// 		  $data=$qry->result_array();

// 		      if(sizeof($data) > 0){
			  
// 			    foreach($data as $dt){
// 			    	$arr[$dt['name']]['P_name'] = $dt['name'];
// 			    	$qrychild    = $this->db->query("select * from  tbl_category where  inside_cat = ?",array($dt['id']));
// 		            $resultchild = $qrychild->result_array();
//                   if(sizeof($resultchild) > 0){
//                       foreach($resultchild as $dtt){
//                        /// first parent //
//                        $qrychild     = $this->db->query("select * from  tbl_category where  inside_cat = ?",array($dtt['id']));
// 		                 $resultchild1 = $qrychild->result_array();
// 				            foreach ($resultchild1  as  $dttt) {
// 				            	/// second parent //

// 				            	$qrychild     = $this->db->query("select * from  tbl_category where  inside_cat = ?",array($dttt['id']));
// 		                        $resultchild12 = $qrychild->row_array();
//                                 $arr[$dt['name']]['P_name3'][$dtt['name']][$dttt['name']];
                                
//                             if(sizeof($resultchild12) > 0){
// 		                        $arr[$dt['name']]['P_name3'][$dtt['name']][$dttt['name']] = $resultchild12['name'];	
// 		                    }
				              
// 				            } 	
		                
// 		               } 
//                      } 
                  
			    
// 			   } 
// 			}
// 	   }

// 	   // echo "<pre>";
// 	   //   print_r($arr);
// 	   // echo "</pre>";
//     return $arr;            
// }

// function getinvoiceScopedetails($id){
// 	//echo "select D.productid from  tbl_quotation_order_dtl D where D.quotationid = $id";
//         $query=$this->db->query("select D.productid,D.grade from  tbl_quotation_order_dtl D where D.quotationid = ?",array($id));
// 		$result=$query->row_array();
// 		$arr = "";
// 		if(sizeof($result) > 0){
//           $qry=$this->db->query("select C.*,M.type as mtype from  tbl_product_mapping M,tbl_category C where M.cat_id = C.id AND M.type = 2  AND M.product_id = ?",array($result['productid']));
// 		  $data=$qry->result_array();
		 
//               if(sizeof($data) > 0){
// 			   	$j= 0;
// 			    foreach($data as $dt){
			    	
// 			    	$qrychild    = $this->db->query("select * from  tbl_category where  inside_cat = ?",array($dt['id']));
// 		            $resultchild = $qrychild->result_array();
//                     $i=0;
//                     if(sizeof($resultchild) > 0){
//                      foreach($resultchild as $dtt){
//                    //  	 $qrychild     = $this->db->query("select * from  tbl_category where  inside_cat = ?",array($dtt['id']));
// 		                 // $resultchild1 = $qrychild->row_array();
// 				            $arr[$dt['name']]['type'][$i]['td1'] = $dtt['name'];
// 		                $i++;
// 		               } 
//                      } else{
//                      	 $arr[$dt['name']]['type'][$i]['td1'] = $dt['name'];
//                      }
//                    $j++;
			    
// 			   } 
// 			}
// 	   }

// 	   // echo "<pre>";
// 	   //   print_r($arr);
// 	   // echo "</pre>";
//     return $arr;            
// }

function getinvoicetechdet($id,$pressure){
      //echo "select D.*,I.grade as dgrade from  tbl_technical_details D, tbl_quotation_order_dtl I  where I.productid = D.pro_id AND I.quotationid = $id AND D.status = 1";

        $query=$this->db->query("select D.*,I.grade as dgrade from  tbl_technical_details D, tbl_quotation_order_dtl I  where I.productid = D.pro_id AND I.quotationid = ? AND D.pressure = ? AND D.status = ?",array($id,$pressure,1));
        /*echo "select D.*,I.grade as dgrade from  tbl_technical_details D, tbl_quotation_order_dtl I  where I.productid = D.pro_id AND I.quotationid = $id AND D.pressure = $pressure AND D.status = 1";die;
*/         $result=$query->result_array();
          // echo "<pre>";
          // print_r($result);
          // echo "<pre>";
         return $result;
}

function getinvoicetechdetails($id,$pressure){
      //echo "select D.*,I.grade as dgrade from  tbl_technical_details D, tbl_quotation_order_dtl I  where I.productid = D.pro_id AND I.quotationid = $id AND D.status = 1";

        $query=$this->db->query("select D.*,I.grade as dgrade from  tbl_technical_details D, tbl_quotation_order_dtl I  where I.productid = D.pro_id AND I.quotationid = ? AND D.pressure = ? AND D.status = ?",array($id,$pressure,1));
        /*echo "select D.*,I.grade as dgrade from  tbl_technical_details D, tbl_quotation_order_dtl I  where I.productid = D.pro_id AND I.quotationid = $id AND D.pressure = $pressure AND D.status = 1";die;
*/         $result=$query->result_array();
          // echo "<pre>";
          // print_r($result);
          // echo "<pre>";
         return $result;
}


function getinvoicepricedetails($id){
  $jsondata['price1'] = "";
        $query=$this->db->query("select D.quotation_mapg,S.productname from  tbl_quotation_order_dtl D,tbl_product_stock S where  S.Product_id=D.productid AND D.quotationid = ?",array($id));
		    $result=$query->row_array();
  if(sizeof($result) > 0){

		 $jsondata['price1'] = json_decode($result['quotation_mapg'],true); 
     // print_r($jsondata['price1']);
     $jsondata['productname'] = $result['productname'];
    return $jsondata;
  }      
    //      $m = 0;$i = 0;$arr = "";$total = 0;
    //      if($jsondata != ""){
    //     foreach($jsondata['quotation'] as  $dt) {
    //     	//echo $dt;
    //     	 $qrychild     = $this->db->query("select name from  tbl_category where  id = ?",array($dt));
		  //    $resultchild  = $qrychild->row_array();
    //          if(sizeof($resultchild) > 0){
    //            $arr[$i]['name']  = $resultchild['name'];
    //            $arr[$i]['price'] = $jsondata['price'][$m++];
               
    //          }
		  //   $i++;
    //     }
    // }

    //     echo "<pre>";
	   //   print_r($arr);
	   // echo "</pre>";
    // return $arr;
  }


  function getinvoiceproduct($id){
  	//echo "select S.* from  tbl_quotation_order_dtl D, tbl_product_stock S where S.Product_id = D.productid AND D.quotationid =$id";
    $query=$this->db->query("select S.* from  tbl_quotation_order_dtl D, tbl_product_stock S where S.Product_id = D.productid AND D.quotationid =?",array($id));
	return $result = $query->row_array();  

  }

function selectgrade($id){
  //echo "select technical_value from  tbl_technical_details  where pro_id = $id AND status = 1";
    $query=$this->db->query("select technical_value from  tbl_technical_details  where pro_id = ? AND status = ?",array($id,1));
    $result=$query->result_array(); 
    $grade = array();
    if(sizeof($result) > 0){
      foreach ($result as $dt) {
        $jsonvalue = json_decode($dt['technical_value'],true);
        //print_r($jsonvalue);
          foreach ($jsonvalue  as  $json) {
               $grade[] = $json['grade'];
          }
       }
      
    }
    return $result = array_unique($grade);
 }


function getquotationaccessories($id)
	{
		/*$q=$this->db->query("select * from tbl_accessories_quotation A 
inner join tbl_master_data B on A.acc_category=B.serial_number 
inner join tbl_accessories C on A.acc_subcategory=C.Accessory_id
where A.Quotation_id=?",array($id));*/

		$query=$this->db->query("select * from tbl_accessories_quotation AQ INNER JOIN tbl_master_data MD ON AQ.acc_category=MD.serial_number INNER JOIN tbl_accessories A ON AQ.acc_subcategory=A.Accessory_id where AQ.Quotation_id=?",array($id));
/*$query=$this->db->query("select MD.keyvalue,A.acc_subcategory,AQ.acc_price,AQ.acc_description from tbl_accessories_quotation AQ,tbl_master_data MD,tbl_accessories A where MD.serial_number=AQ.acc_category and AQ.acc_subcategory=A.Accessory_id and AQ.Quotation_id=?",array($id));
*/		$acc=$query->result_array();
		//print_r($acc);die;
		return $acc;
	}
//==================================Quotation Pagination===================================

function invoice_data($last,$strat)
{
	$query=$this->db->query("select * from  tbl_quotation_order_hdr order by quotationid Desc limit $strat,$last");
	return $result=$query->result();  
}


function filterListquotation($perpage,$pages,$get)
{
 	
	$qry ="select * from tbl_quotation_order_hdr where status='A'";
    
		if(sizeof($get) > 0)
		 {
			   if($get['purchase_no'] != "")
			   {
				 
				 $qry .= " AND purchase_no = '".$get['purchase_no']."'";
			   }
			   
			   if($get['invoice_date'] != "")
			   {
				  $qry .= " AND invoice_date LIKE '%".$get['invoice_date']."%'";
			   }  
			   
			   if($get['vendor_id'] != "")
			   {
				   $unitQuery2=$this->db->query("select * from tbl_contact_m where first_name LIKE '%".$get['vendor_id']."%'");
				   $getUnit2=$unitQuery2->row();
				   $sr_no2=$getUnit2->contact_id;
			 
				   $qry .= " AND contactid ='$sr_no2'";
			   }
			   
			   if($get['pro_val'] != "")
			   {
			 	 $unitQuery2 = $this->db->query("select * from tbl_product_stock where productname LIKE '%".$get['pro_val']."%'");
			 	 $getUnit2   = $unitQuery2->row();
			  	 $dtl	 = $this->db->query("select * from tbl_quotation_order_dtl where productid = '$getUnit2->Product_id' ");
			     $getdtl = $dtl->row();
			 
				 $qry .= " AND quotationid ='$getdtl->quotationid'";			 
			   }
			
			  if($get['grand_total'] != "")
			  {
			  	$qry .= " AND grand_total LIKE '%".$get['grand_total']."%'";
			  }	  
	
		 }
		
		 $qry .= "  limit $pages,$perpage";
 
  	$data =  $this->db->query($qry)->result();
	
  return $data;

}



function count_allquotation($tableName,$status = 0,$get)
{
	 
	$qry ="select count(*) as countval from $tableName where status='A'";
    
		if(sizeof($get) > 0)
		{
			   if($get['purchase_no'] != "")
			   {
				  $qry .= " AND purchase_no = '".$get['purchase_no']."' ";
			   }
			   
			   if($get['invoice_date'] != "")
			   {
				  $qry .= " AND invoice_date LIKE '%".$get['invoice_date']."%'";
			   }  
			   
			   if($get['vendor_id'] != "")
			   {
				   $unitQuery2=$this->db->query("select * from tbl_contact_m where first_name LIKE '%".$get['vendor_id']."%'");
				   $getUnit2=$unitQuery2->row();
				   $sr_no2=$getUnit2->contact_id;
			 
				   $qry .= " AND contactid ='$sr_no2'";
				  
			   }
			  
			   if($get['pro_val'] != "")
			   {
			 	 $unitQuery2 = $this->db->query("select * from tbl_product_stock where productname LIKE '%".$get['pro_val']."%'");
			 	 $getUnit2   = $unitQuery2->row();
			  	 $dtl	 = $this->db->query("select * from tbl_quotation_order_dtl where productid = '$getUnit2->Product_id' ");
			     $getdtl = $dtl->row();
			 
				 $qry .= " AND quotationid ='$getdtl->quotationid'";			 
			   }
			  
			   if($get['grand_total'] != "")
			   {
				   $qry .= " AND grand_total LIKE '%".$get['grand_total']."%'";
			   }	  
				
		}
		
   		$query=$this->db->query($qry,array($status))->result_array();
   return $query[0]['countval'];

}

public function getaccessories($id,$pri_col)
	{
		
		$this->db->select("*");
		$this->db->where($pri_col,$id);
		$query=$this->db->get('tbl_accessories');
		$queryres=$query->row();
		return $queryres;
		//echo $queryres['acc_category'];die;
	}

}

?>