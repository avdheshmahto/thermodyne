<?php
class model_purchase_order extends CI_Model {
	
function invoice_data(){

		$query=$this->db->query("select * from  tbl_quotation_order_hdr order by quotationid Desc");
		return $result=$query->result();  
}

function mod_productList($val,$pid){
  $qry = $this->db->query("select C.productname,M.id as id,M.price from tbl_product_stock C,tbl_product_price_mapping M where M.pid = C.Product_id AND  M.pid = $pid AND C.productname like '%$val%'")->result_array();
  return $qry;
}

function getinvoiceData($id){  
    $query=$this->db->query("select H.subject,H.invoice_date,H.purchase_no,H.contant,C.first_name,C.email,C.address1,C.city,S.stateName from  tbl_quotation_order_hdr H,tbl_contact_m C,tbl_state_m S where C.contact_id = H.contactid AND S.stateid = C.state_id AND H.quotationid =?",array($id));
	return $result = $query->row_array();  
	// print_r( $result);

}

function getinvoicetechdetails($id){
	//echo "select D.productid from  tbl_quotation_order_dtl D where D.quotationid = $id";
        $query  = $this->db->query("select D.productid,D.grade from  tbl_quotation_order_dtl D where D.quotationid = ?",array($id));
		$result =$query->row_array();
		$arr = "";
		if(sizeof($result) > 0){
		//echo "select C.*,M.type as mtype from  tbl_product_mapping M,tbl_category C where M.cat_id = C.id  AND C.grade IN (".$result['grade'].") AND M.type = 1 AND M.product_id =".$result['productid'];
          $qry=$this->db->query("select C.*,M.type as mtype from  tbl_product_mapping M,tbl_category C where M.cat_id = C.id   AND M.type = 1 AND M.product_id = ?",array($result['productid']));

		  $data=$qry->result_array();

		      if(sizeof($data) > 0){
			  
			    foreach($data as $dt){
			    	$arr[$dt['name']]['P_name'] = $dt['name'];
			    	$qrychild    = $this->db->query("select * from  tbl_category where  inside_cat = ?",array($dt['id']));
		            $resultchild = $qrychild->result_array();
                  if(sizeof($resultchild) > 0){
                      foreach($resultchild as $dtt){
                       /// first parent //
                       $qrychild     = $this->db->query("select * from  tbl_category where  inside_cat = ?",array($dtt['id']));
		                 $resultchild1 = $qrychild->result_array();
				            foreach ($resultchild1  as  $dttt) {
				            	/// second parent //

				            	$qrychild     = $this->db->query("select * from  tbl_category where  inside_cat = ?",array($dttt['id']));
		                        $resultchild12 = $qrychild->row_array();
                                $arr[$dt['name']]['P_name3'][$dtt['name']][$dttt['name']];
                                
                            if(sizeof($resultchild12) > 0){
		                        $arr[$dt['name']]['P_name3'][$dtt['name']][$dttt['name']] = $resultchild12['name'];	
		                    }
				              
				            } 	
		                
		               } 
                     } 
                  
			    
			   } 
			}
	   }

	   // echo "<pre>";
	   //   print_r($arr);
	   // echo "</pre>";
    return $arr;            
}

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


function getinvoicepricedetails($id){
        $query=$this->db->query("select D.quotation_mapg from  tbl_quotation_order_dtl D where D.quotationid = ?",array($id));
		$result=$query->row_array();
       return $jsondata = json_decode($result['quotation_mapg'],true); 
       
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
     return $arr;
    }


  function getinvoiceproduct($id){
    $query=$this->db->query("select S.* from  tbl_quotation_order_dtl D, tbl_product_stock S where S.Product_id = D.productid AND D.quotationid =?",array($id));
	return $result = $query->row_array();  

  }

}
