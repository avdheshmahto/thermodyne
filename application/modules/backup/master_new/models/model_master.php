<?php
class model_master extends CI_Model {
	
function productCatg_data(){
	
	  $this->db->select("*");
	  // $this->db->order_by("prodcatg_id","desc");
      $this->db->from('tbl_prodcatg_mst');  
      $query = $this->db->get();
      
	  return $result=$query->result();  
}	

function productSubCatg_data(){
	
	  $this->db->select("*");
	  // $this->db->order_by("prodcatg_id","desc");
      $this->db->from('tbl_prodcatg_m');  
      $query = $this->db->get();
      
	  return $result=$query->result();  
}


function termAndCondition_data($last, $strat)
{
	  $query=$this->db->query("select * from tbl_termandcondition where status='A' ORDER BY id DESC limit $strat,$last");
 	  return $result=$query->result();
}

function category_all($last,$strat){
	$data="";
  /*echo "SELECT  id, name,name as text, inside_cat as parent_id ,create_on FROM tbl_category where status = 1 Order by id ASC limit $strat,$last";*/
  $result = $this->db->query("SELECT  id, name,name as text, inside_cat as parent_id ,create_on,type,grade FROM tbl_category where status = 1 Order by id DESC limit $strat,$last")->result_array();
  if(sizeof($result ) > 0){
       return $result;
  }
}

  /*function category_all_list(){
	   $data="";
       $result = $this->db->query("SELECT  id, name,name as text,create_on FROM tbl_category where status = 1 Order by id ASC")->result_array();
       if(sizeof($result ) > 0){
       return $result;
       }
  }*/

  function insert_value($post){
  	 $data = date("Y-m-d"); 
     $sql  = "insert into tbl_category set name = ?,inside_cat = ?,type=?,create_on = ?,grade = ?";
    return $this->db->query($sql,array($post['category'],$post['selectCategory'],$post['typeid'],$data,$post['grade']));
  
  }

  function tree_all(){
	   $data="";
       $result = $this->db->query("SELECT  id, name,name as text, inside_cat as parent_id ,create_on FROM tbl_category where status = 1 Order by id ASC")->result_array();
        foreach ($result as $row) {
           $data[] = $row;
       }
     return $data;
  }

    function edit_Category($post){
          $qry = "update tbl_category set name = ?,inside_cat=?,type = ?,grade = ?  WHERE id = ?";
          $this->db->query($qry,array($post['category'],$post['selectCategory'],$post['typeid'],$post['grade'],$post['edit']));
    }

    function get_child_data($id = 0,$spacing = '',$user_tree_array = ''){
      if (!is_array($user_tree_array))
          $user_tree_array = array(); 

          $sql   = "select * from tbl_category where  inside_cat = $id";
          $query = $this->db->query($sql);
          $data  = $query->result_array();

        if (sizeof($data) > 0) {
         foreach($data as $row) {
            // echo "<option>".$spacing . $row['name']."</option>";
            $user_tree_array[] = array("id" => $row['id'],"name" => $spacing.$row['name']);
            $user_tree_array   = $this->get_child_data($row['id'],$spacing . '&nbsp;&nbsp;&nbsp;&nbsp;',$user_tree_array);
         }
       }

      return $user_tree_array;
    }

    function delete_data($id,$arr){
       foreach ($arr as $key => $value) {
         $qry = "update tbl_category set status = 0  WHERE id = ?";
         $this->db->query($qry,array($value['id']));
       }
         $qry = "update tbl_category set status = 0  WHERE id = $id";
         $this->db->query($qry);

    }

    function categorySelectbox($parent = 0, $spacing = '', $user_tree_array = ''){
      if (!is_array($user_tree_array))
        $user_tree_array = array();
   
        $sql = "select * from tbl_category where status = 1 AND inside_cat = $parent";
        $query = $this->db->query($sql);
        $data  = $query->result_array();
         if (sizeof($data) > 0) {
           foreach($data as $row) {
             // echo "<option>".$spacing . $row['name']."</option>";
             $user_tree_array[] = array("id" => $row['id'], "name" => $spacing . $row['name'],'praent' => $row['inside_cat']);
             $user_tree_array = $this->categorySelectbox($row['id'],$spacing . '&nbsp;&nbsp;&nbsp;&nbsp;',$user_tree_array);
           }
         }
       return $user_tree_array;
     }


    function treeGetParentid($id = 0, $user_tree_array = ''){

        if (!is_array($user_tree_array))
            $user_tree_array = array(); 

            $sql   = "select * from tbl_category where  id = $id";
            $query = $this->db->query($sql);
            $data  = $query->result_array();
        if (sizeof($data) > 0) {
           foreach($data as $row) {
             $user_tree_array   = $this->treeGetParentid($row['inside_cat']);
             if($row['inside_cat'] == 0){
              return $row['id'];  
             }
           }
        }
       return $user_tree_array;
    } 


    function treeGetParentValue($id = 0, $user_tree_array = ''){

        if (!is_array($user_tree_array))
            $user_tree_array = array(); 

            $sql   = "select * from tbl_category where  id =$id";
            $query = $this->db->query($sql);
            $data  = $query->result_array();

          if (sizeof($data) > 0) {
           foreach($data as $row) {
              $user_tree_array[] = array("id" => $row['inside_cat'],'name'=>$row['name']);
              $user_tree_array   = $this->treeGetParentValue($row['inside_cat'],$user_tree_array);
           }
         }
       return $user_tree_array;
    }

function count_all($tableName,$status = 0,$get){
 
  $qry ="select count(*) as countval from $tableName where status= ?";
    if($get['filtername']!="" || $get['filterdate']!="" || $get['filtertype'] != ''){
      if($get['filtername']!="")
         $qry .= " AND name LIKE '%".$get['filtername']."%'";

      if($get['filterdate']!="")
         $qry .= " AND create_on ='".$get['filterdate']."'";

      if($get['filtertype']!="")
         $qry .= " AND type ='".$get['filtertype']."'";

  }
   $query=$this->db->query($qry,array($status))->result_array();
   return $query[0]['countval'];
}

function mapCategory(){
  $sql   = "select * from tbl_category where  inside_cat = 0 AND status = 1 AND type = 2";
  $query = $this->db->query($sql);
  return  $data  = $query->result_array();
}

function mapscope(){
  $sql   = "select * from tbl_category where  inside_cat = 0 AND status = 1 AND type = 3";
  $query = $this->db->query($sql);
  return  $data  = $query->result_array();
}

function insertmapping($post){
  $countval =  count($post['mapcat']);
  $mapScope =  count($post['mapScope']);
  $date     = date("Y-m-d");
  $qrydel   = "delete from tbl_product_mapping where product_id =?";
  $this->db->query($qrydel,array($post['pid']));  
   if($countval != 0){
    foreach ($post['mapcat'] as  $dt) {
         $qry = "insert into tbl_product_mapping set type = ?, cat_id = ?,product_id =?,create_on = ?";
         $this->db->query($qry,array(1,$dt,$post['pid'],$date)); 
     // echo $dt;
    }
   }  

  if($mapScope != 0){
    foreach ($post['mapScope'] as  $dt1) {
         $qry = "insert into tbl_product_mapping set type = ?, cat_id = ?,product_id =?,create_on = ?";
         $this->db->query($qry,array(2,$dt1,$post['pid'],$date)); 
     // echo $dt;
    }
   }    
} 


 function modPriceMapping($post,$price){
  if($post['id'] != ""){
    //echo "Adfdfadf";
   // echo "delete from tbl_product_price_mapping where id =".$post['id'];
    // $qrydel   = "delete from tbl_product_price_mapping where id =".$post['id'];
    // $this->db->query($qrydel);  

    $qry = "update tbl_product_price_mapping set pid = ?,currency = ? ,capacity = ?, entity =?,  price = ? where id = ?";
    $this->db->query($qry,array($post['pid'],$post['currency'],$post['capacity'],$post['entity'],$price,$post['id']));  
  }else{
    $qry = "insert into tbl_product_price_mapping set pid = ?,currency = ? ,capacity = ?, entity =?,  price = ?";
    $this->db->query($qry,array($post['pid'],$post['currency'],$post['capacity'],$post['entity'],$price));  

   }
 }

function modGetPriceMapping($id){
  $query = $this->db->query("select * from tbl_product_price_mapping where  pid = ? AND status = 1",array($id));
  return $data  = $query->row_array();
 //  print_r($data);

}


function modGetTechnicalMapping($id)
{
  $arr    = "";
  $i=0;
        
    $query = $this->db->query("select P.productname,P.Product_id,P.sku_no from tbl_product_stock P where P.Product_id = $id AND P.status = 'A'");
    $data  = $query->row_array();
      if(sizeof($data) > 0){
         $arr[$i]['technical_value'] = "";
         $arr[$i]['sub_category']    = "";
         $arr[$i]['productname']     = $data['productname'];
         $arr[$i]['Product_id']      = $data['Product_id'];
         $arr[$i]['sku_no']          = $data['sku_no'];

          $query1 = $this->db->query("select TD.* from tbl_technical_details TD where  TD.pro_id = ? AND TD.status = 1",array($id));
          $data1  = $query1->result_array();
      if(sizeof($data1) > 0){
       
       foreach ($data1 as  $dt) {
          $arr[$i]['pro_id']          = $dt['pro_id'];
          $arr[$i]['pro_name']        = $dt['pro_name'];
          $arr[$i]['sub_category']    = $dt['sub_category'];
          $arr[$i]['technical_value'] = $dt['technical_value'];
          $i++;
        }

    }
  }


    //$query = $this->db->query("select P.productname,P.Product_id,P.sku_no,TD.* from tbl_product_stock P, tbl_technical_details TD where P.Product_id = TD.pro_id AND TD.pro_id = $id AND P.status = 'A'");
//   return $data  = $query->result_array();

    

    return $arr;
    

}

function mod_InsertTechnicalData($pid,$jsonEncode,$subcategory,$pname,$update ){
    $qry = "insert into tbl_technical_details set pro_id = ?,pro_name = ? ,sub_category = ?, technical_value =?,  status = ?";
    $this->db->query($qry,array($pid,$pname,$subcategory,$jsonEncode,1));
} 

  function modGetsubjectMapping($id){
    $arr  = "";
    $i    = 0;
    $query = $this->db->query("select P.productname,P.Product_id,P.sku_no from tbl_product_stock P where P.Product_id = $id AND P.status = 'A'");
    $data  = $query->row_array();
      if(sizeof($data) > 0){
         $arr[$i]['title']           = "";
         $arr[$i]['sub_details']     = "";
         $arr[$i]['id']              = "";
         $arr[$i]['productname']     = $data['productname'];
         $arr[$i]['Product_id']      = $data['Product_id'];
         $arr[$i]['sku_no']          = $data['sku_no'];
        
         $query1 = $this->db->query("select TD.* from  tbl_product_subject TD where  TD.pid = ? AND TD.status = 1",array($id));
         $data1  = $query1->result_array();
      if(sizeof($data1) > 0){
       foreach ($data1 as  $dt) {
         $arr[$i]['title']          = $dt['title'];
         $arr[$i]['id']             = $dt['id'];
         $arr[$i]['sub_details']    = $dt['sub_details'];
         $i++;
        }
    }

  }
  // echo "<pre>";
  // print_r($arr);
  // echo "</pre>";
  return $arr;
}

function modGetcontantMapping($id){
    $arr  = "";
    $i    = 0;
    $query = $this->db->query("select P.productname,P.Product_id,P.sku_no from tbl_product_stock P where P.Product_id = $id AND P.status = 'A'");
    $data  = $query->row_array();
      if(sizeof($data) > 0){
         $arr[$i]['title']           = "";
         $arr[$i]['sub_details']     = "";
         $arr[$i]['id']              = "";
         $arr[$i]['productname']     = $data['productname'];
         $arr[$i]['Product_id']      = $data['Product_id'];
         $arr[$i]['sku_no']          = $data['sku_no'];
        
         $query1 = $this->db->query("select TD.* from  tbl_product_contant TD where  TD.pid = ? AND TD.status = 1",array($id));
         $data1  = $query1->result_array();
      if(sizeof($data1) > 0){
        foreach ($data1 as  $dt) {
          $arr[$i]['title']          = $dt['title'];
          $arr[$i]['id']             = $dt['id'];
          $arr[$i]['sub_details']    = $dt['sub_details'];
          $i++;
         }
      }
   }
  return $arr;
}

 
  function modGetPriceTextMapping($id){
    $arr   = "";
    $i     = 0;

    $query = $this->db->query("select P.productname,P.Product_id,P.sku_no from tbl_product_stock P where P.Product_id = $id AND P.status = 'A'");
    $data  = $query->row_array();

      if(sizeof($data) > 0){
         $arr[$i]['title']           = "";
         $arr[$i]['sub_details']     = "";
         $arr[$i]['id']              = "";
         $arr[$i]['productname']     = $data['productname'];
         $arr[$i]['Product_id']      = $data['Product_id'];
         $arr[$i]['sku_no']          = $data['sku_no'];
        
         $query1 = $this->db->query("select TD.* from  tbl_product_price_text TD where  TD.pid = ? AND TD.status = 1",array($id));
         $data1  = $query1->result_array();
      if(sizeof($data1) > 0){
       foreach ($data1 as  $dt) {
         $arr[$i]['title']          = $dt['title'];
         $arr[$i]['id']             = $dt['id'];
         $arr[$i]['sub_details']    = $dt['sub_details'];
         $i++;
        }
    }

  }
    return $arr;
  }



  function mod_InsertsubjectData($pid,$subjectDetails,$sub_title){
     $qry = "insert into tbl_product_subject set pid = ?,title = ? ,sub_details = ?";
     $this->db->query($qry,array($pid,$sub_title,$subjectDetails));
  }

  function mod_InsertcontantData($pid,$subjectDetails,$sub_title){
     $qry = "insert into tbl_product_contant set pid = ?,title = ? ,sub_details = ?";
     $this->db->query($qry,array($pid,$sub_title,$subjectDetails));
  }

  function mod_InsertpriceTextData($pid,$subjectDetails,$sub_title){
     $qry = "insert into tbl_product_price_text set pid = ?,title = ? ,sub_details = ?";
     $this->db->query($qry,array($pid,$sub_title,$subjectDetails));
  }

  /*function filterListproduct($perpage,$pages,$get){
    $qry = "select * from tbl_product_stock where status='A' ";
         if(sizeof($get) > 0){
           if($get['procode'] != "") 
            $qry .= " AND sku_no LIKE '%".$get['procode']."%'";
            else if($get['proname'] != "")
            $qry .= " AND productname LIKE '%".$get['proname']."%'";
           // else if($get['filtertype'] != "")
           // $qry .= " AND type = '".$get['filtertype']."'"; 
    }
    if($perpage != "")
    $qry .= " ORDER BY Product_id ASC limit $pages,$perpage";

    $data =  $this->db->query($qry)->result();
    return $data;
}
 
 public function count_allproduct($tableName,$status = 0,$get){
     $qry = "select count(*) as countvalue from $tableName where status= '".$status."'";
         if(sizeof($get) > 0){
           if($get['procode'] != "") 
            $qry .= " AND sku_no LIKE '%".$get['procode']."%'";
           else if($get['proname'] != "")
            $qry .= " AND productname LIKE '%".$get['proname']."%'";
           // else if($get['filtertype'] != "")
           // $qry .= " AND type = '".$get['filtertype']."'"; 
    }
     $data =  $this->db->query($qry)->row_array();
     return $data['countvalue'];
 }
 */
 
 
//=============================Product pagination==========================
 
 
function product_get($last,$strat)
{
	$query=$this->db->query("select * from tbl_product_stock where status='A' ORDER BY sku_no ASC limit $strat,$last");
    return $result=$query->result();  
}

 
function filterListproduct($perpage,$pages,$get)
{
 	
	   $qry ="select * from tbl_product_stock where status='A'";
    
		if(sizeof($get) > 0)
		 {
			   if($get['Product_id'] != "")
			   {
			   		$qry .= " AND sku_no LIKE '%".$get['Product_id']."%'";
			   }
			   
			   if($get['category'] != "")
			   {
				   $unitQuery2=$this->db->query("select * from tbl_category where name LIKE '%".$get['category']."%'");
				   $getUnit2=$unitQuery2->row();
				   $sr_no2=$getUnit2->id;
			 
				   $qry .= " AND category ='$sr_no2'";
			   }
			   
			   if($get['item_name'] != "")
			   {
			   		$qry .= " AND productname LIKE '%".$get['item_name']."%'";
			   }  
			   
			   if($get['unit'] != "")
			   {
				   $unitQuery=$this->db->query("select * from tbl_master_data where keyvalue LIKE '%".$get['unit']."%'");
				   $getUnit=$unitQuery->row();
				   $sr_no=$getUnit->serial_number;
			 
				   $qry .= " AND usageunit ='$sr_no'";
			   }
					  
			   if($get['unitprice_sale'] != "")
			   {
			  		$qry .= " AND unitprice_sale LIKE '%".$get['unitprice_sale']."%'";
			   }	  
				
			   if($get['unitprice_purchase'] != "")
			   {
			  		$qry .= " AND unitprice_purchase LIKE '%".$get['unitprice_purchase']."%'";
			   }
	
		 }
		 
		 $qry .= "  limit $pages,$perpage";
 
   	$data =  $this->db->query($qry)->result();
  
  return $data;

}



function count_allproduct($tableName,$status = 0,$get)
{
	 
	   $qry ="select count(*) as countval from $tableName where status='A'";
    
		if(sizeof($get) > 0)
		 {
			   if($get['Product_id'] != "")
				  $qry .= " AND sku_no LIKE '%".$get['Product_id']."%'";
			   
			   
			   if($get['category'] != "")
			   {
				   $unitQuery2=$this->db->query("select * from tbl_category where name LIKE '%".$get['category']."%'");
				   $getUnit2=$unitQuery2->row();
				   $sr_no2=$getUnit2->id;
			 
				   $qry .= " AND category ='$sr_no2'";
			   }
			   
			   if($get['item_name'] != "")
				  $qry .= " AND productname LIKE '%".$get['item_name']."%'";
				  
			   
			   if($get['unit'] != "")
			   {
				   $unitQuery=$this->db->query("select * from tbl_master_data where keyvalue LIKE '%".$get['unit']."%'");
				   $getUnit=$unitQuery->row();
				   $sr_no=$getUnit->serial_number;
			 
				   $qry .= " AND usageunit ='$sr_no'";
			   }
					  
			  if($get['unitprice_sale'] != "")
				  $qry .= " AND unitprice_sale LIKE '%".$get['unitprice_sale']."%'";
				  
				
			  if($get['unitprice_purchase'] != "")
				  $qry .= " AND unitprice_purchase LIKE '%".$get['unitprice_purchase']."%'";
			
	     }
		 
 	  $query=$this->db->query($qry,array($status))->result_array();
   return $query[0]['countval'];

}

//==============================Contact Pagination===============================
 
function contact_get($last,$strat)
{  
	$query=$this->db->query("select *from tbl_contact_m where status='A' ORDER BY contact_id DESC limit $strat,$last");
  	return $result=$query->result();  
}

 
function filterContactList($perpage,$pages,$get)
{
	
    $qry = "select * from  tbl_contact_m where status = 'A'";

       if(sizeof($get) > 0)
	   {
        
		   if($get['owner_namee'] != "")
		   
		   		$qry .= " AND owner_name LIKE '%".$get['owner_namee']."%'";
			 
		   if($get['title_deal'] != "")
		   		$qry .= " AND title_deal LIKE '%".$get['title_deal']."%'";
           
		   if($get['org_name'] != "")
		   		$qry .= " AND org_name LIKE '%".$get['org_name']."%'";
			  
		   if($get['person_name'] != "")
		  		$qry .= " AND person_name LIKE '%".$get['person_name']."%'";
			  
		   if($get['contact_person'] != "")
		  		$qry .= " AND contact_person LIKE '%".$get['contact_person']."%'";
				
				if($get['contact_person2'] != "")
		  		$qry .= " AND contact_person2 LIKE '%".$get['contact_person2']."%'";
				
				if($get['person_email'] != "")
		  		$qry .= " AND person_email LIKE '%".$get['person_email']."%'";
				if($get['mobile'] != "")
		  		$qry .= " AND mobile LIKE '%".$get['mobile']."%'";
				if($get['city'] != "")
		  		$qry .= " AND city LIKE '%".$get['city']."%'";
				
				if($get['state_id'] != "")
		  		$qry .= " AND state_id LIKE '%".$get['state_id']."%'";
			
		   if($get['maingroupname'] != "")
		   {
				$unitQuery=$this->db->query("select * from tbl_account_mst where account_id='".$get['maingroupname']."'");
		     	$getUnit=$unitQuery->row();
		     	$sr_no=$getUnit->serial_number;
		 
			  	$qry .= " AND group_name ='$sr_no'";
      	   }
	    }
        
		echo $qry .= " ORDER BY contact_id DESC limit $pages,$perpage";
 
  	$data =  $this->db->query($qry)->result();
  
  return $data;

}

function count_contact($tableName,$status = 0,$get)
{
	$qry ="select count(*) as countval from $tableName where status='A'";
    
       if(sizeof($get) > 0)
	   {
        
		   if($get['first_name'] != "")
		   		$qry .= " AND first_name LIKE '%".$get['first_name']."%'";
			
		   if($get['contact_person'] != "")
		   		$qry .= " AND contact_person LIKE '%".$get['contact_person']."%'";
           
		   if($get['phone'] != "")
		   		$qry .= " AND phone LIKE '%".$get['phone']."%'";
			  
		   if($get['mobile'] != "")
		   		$qry .= " AND mobile LIKE '%".$get['mobile']."%'";
			  
		   if($get['email'] != "")
		   		$qry .= " AND email LIKE '%".$get['email']."%'";
			
		   if($get['maingroupname'] != "")
		   {
				$unitQuery=$this->db->query("select * from tbl_account_mst where account_id='".$get['maingroupname']."'");
		     	$getUnit=$unitQuery->row();
		     	$sr_no=$getUnit->serial_number;
		 
			    $qry .= " AND group_name ='$sr_no'";
      	   }
	   
	    }

   		$query=$this->db->query($qry,array($status))->result_array();
   return $query[0]['countval'];

}

//-------------------------------------Excel Insert Function------------------------------------

function excel_InsertTechnicalData($pid,$pname,$pressure,$subcat,$json)
  {
      $query="insert into tbl_technical_details set pro_id=?,pro_name=?,sub_category=?,technical_value=?,status=?";
      $this->db->query($query,array($pid,$pname,$subcat,$json,1));
  }
 
 

} /// End Class ///

?>