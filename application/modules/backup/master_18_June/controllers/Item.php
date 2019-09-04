<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Item extends my_controller {


function __construct(){
   parent::__construct(); 
   $this->load->model('model_master');	
   $this->load->model('model_admin_login');
// load pagination library //
   $this->load->library('pagination');
// load Employee Model //
   $this->load->model('Employee_model', 'employee');
}




// listing recards
        public function data() { 
            $config['total_rows'] = $this->employee->getAllEmployeeCount();
            $data['total_count'] = $config['total_rows'];
            $config['suffix'] = '';

            if ($config['total_rows'] > 0) {
                $page_number = $this->uri->segment(3);
                $config['base_url'] = base_url() . 'Item/index/';
                if (empty($page_number))
                    $page_number = 1;
                $offset = ($page_number - 1) * $this->pagination->per_page;
                $this->employee->setPageNumber($this->pagination->per_page);
                $this->employee->setOffset($offset);
                $this->pagination->cur_page = $offset;
                $this->pagination->initialize($config);
                $data['page_links'] = $this->pagination->create_links();
                $data['employeeInfo'] = $this->employee->employeeList();
            }
            // load view
            $this->load->view('Item/index', $data);
        }
    


public function updateItem(){
	if($this->session->userdata('is_logged_in')){
	 $data['ID'] = $_GET['ID'];
		$this->load->view('/Item/edit-item',$data);
	}
	else
	{
	redirect('index');
	}
}

public function manage_item(){
  if($this->session->userdata('is_logged_in')){
    $data =  $this->manageItemJoinfun();  	
	$this->load->view('Item/manage-item',$data);
	}
	else
	{
	redirect('index');
	}
		
}
public function manageItemJoinfun(){
    $table_name = 'tbl_product_stock';
  	  ////Pagination start ///
    $url   = site_url('/master/Item/manage_item?');
	$sgmnt = "4";
	$showEntries = 10;
    $totalData   = $this->model_admin_login->count_all($table_name,'A');
    //$showEntries= $_GET['entries']?$_GET['entries']:'12';

    if($_GET['entries']!=""){
      $showEntries = $_GET['entries'];
      $url   = site_url('/master/Item/manage_item?entries='.$_GET['entries']);
    }
    $pagination = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);
    //////Pagination end ///

    $data=$this->user_function();// call permission fnctn
    $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);
    $data['pagination']        = $this->pagination->create_links();
    $data['mapcategory']       = $this->model_master->mapCategory();
    $data['mapScope']          = $this->model_master->mapscope();
   // print_r($data['mapcategory']);
	$data['result'] = $this->model_master->product_get($pagination['per_page'],$pagination['page']);
	return $data;
}

public function mappingPro(){
  //print_r($this->input->post());
  $this->model_master->insertmapping($this->input->post());
  echo '1';
}


public function test_3(){
	
	if($this->session->userdata('is_logged_in')){
	$this->load->view('Item/test_3');
	}
	else
	{
	redirect('index');
	}
		
}

public function item_list()
	{
		$info=array();
		
		$res = $this -> db
           -> select('*')
           -> where('status','A')
           -> get('tbl_product_stock');
		   
		$i='0';
		
		foreach($res->result() as $row)
		{		 
		  
		  $compQuery1 = $this -> db
           -> select('*')
           -> where('serial_number',$row->usageunit)
           -> get('tbl_master_data');
		  $keyvalue1 = $compQuery1->row();
		  
		
			$info[$i]['1']=$row->Product_id;
			$info[$i]['2']=$row->category;
			$info[$i]['3']=$row->productname;
			$info[$i]['4']=$row->unitprice_purchase;
			$info[$i]['5']=$row->unitprice_sale;
			$info[$i]['6']=$row->mrp;
			$info[$i]['7']=$row->Product_id;		
			$info[$i]['8']=$keyvalue1->keyvalue;
			$info[$i]['9']=$row->product_image;
				
			$i++;
			
		}
		return $info;
	
	}
	
public function get_cid(){
	//$data=$this->user_function();// call permission function
	$this->load->view('get_cid');
}

public function add_item(){
//echo "";die;
	if($this->session->userdata('is_logged_in')){
		$this->load->view('Item/add-item');
}
	else
	{
	redirect('index');
	}
}

public function insert_item(){
	    @extract($_POST);
	 	// print_r($_FILES);
	 	// die;
		$table_name ='tbl_product_stock';
		$pri_col    ='Product_id';
		$id         = $this->input->post('Product_id');
		$addpro     = $this->input->post('add_new_product');
		@$branchQuery2= $this->db->query("SELECT * FROM $table_name where status='A' and Product_id='$id'");
		$branchFetch2 = $branchQuery2->row();
		
		//echo $this->input->post('gst_tax')."^".$this->input->post('hsn_code');die;
       // count($this->input->post('color'));
		// implode function is used here
       // $bb=$this->input->post('color');
       // @$ab=implode(',',$bb);  
       // $count=sizeof('color');
        
         $sesio = array(
					'comp_id' => $this->session->userdata('comp_id'),
					'divn_id' => $this->session->userdata('divn_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'maker_date'=> date('y-m-d'),
					'author_date'=> date('y-m-d')
					);
        if($_FILES['image_name']['name']!='')
				{
				$target = "assets/scope_document/"; 
				$target1 =$target . @date(U)."_".( $_FILES['image_name']['name']);
				$image_name=@date(U)."_".( $_FILES['image_name']['name']);
				move_uploaded_file($_FILES['image_name']['tmp_name'], $target1);
				}
				else
				{
				$image_name=$branchFetch2->product_image;
					
			} 

		// if($_FILES['scope_doc']['name']!='')
		// 		{
		// 		$target     = "assets/scope_document/"; 
		// 		$target1    = $target . @date(U)."_".( $_FILES['scope_doc']['name']);
		// 		$scopeimage = @date(U)."_".( $_FILES['scope_doc']['name']);
		// 		move_uploaded_file($_FILES['scope_doc']['tmp_name'], $target1);
		// 		}
		// 		else
		// 		{
		// 		$image_name=$branchFetch2->scope_doc;
					
		// 		} 
						

				$dataarr= array(
					 'productname' => $this->input->post('item_name'),
					 //'industry' => $this->input->post('industry'),
					 //'type' => $this->input->post('type'),
					 'category'      => $this->input->post('category'),
					 'subcategory'   => $this->input->post('subcategory'),
					 //'product_image'=> $image_name,
					  'scope_doc'    => $image_name,
					// 'color' => $ab,
					//'Product_typeid' => $Product_typeid,
					 'sku_no' => $this->input->post('sku_no'),
					 'gst_tax' => $this->input->post('gst_tax'),
					 'hsn_code' => $this->input->post('hsn_code'),
					//'min_re_order_level' => $this->input->post('min_re_order_level'),
					
					 'unitprice_purchase' => $this->input->post('unitprice_purchase'),
					
					 'unitprice_sale' => $this->input->post('unitprice_sale'),
					 'usageunit' => $this->input->post('unit'),
					//'pic_per_box' => $this->input->post('pic_per_box'),
					//'mrp' => $this->input->post('mrp'),
					//'style_no' => $this->input->post('style'),	
				);
						

         if($id != ""){
	            $table_name ='tbl_product_stock';
				$pri_col ='Product_id';
				$idE=$this->input->post('Product_id');
				

				$this->Model_admin_login->update_user($pri_col,$table_name,$idE,$dataarr);
                $this->session->set_flashdata('flash_msg', 'Record Updated Successfully.');
		     // redirect('master/Item/manage_item');
                echo "2";
        }else{

		   
			// if($_FILES['image_name']['name']!='')
			// 		{
			// 			$target = "assets/image_data/"; 
			// 			$target1 =$target . @date(U)."_".( $_FILES['image_name']['name']);
			// 			$image_name=@date(U)."_".( $_FILES['image_name']['name']);
			// 			move_uploaded_file($_FILES['image_name']['tmp_name'], $target1);
			// 		}
			// 		else
					
			// 		{
			// 		$image_name=$branchFetch2->product_image;
					
			// 		}		
				// 	$data= array(
				// 	 'productname' => $this->input->post('item_name'),
				// 	 'industry' => $this->input->post('industry'),
				// 	 'type' => $this->input->post('type'),
				// 	 'category' => $this->input->post('category'),
				// 	 'subcategory' => $this->input->post('subcategory'),
				// 	//'product_image' => $image_name,
				// 	 'color' => $ab,
				// 	//'Product_typeid' => $Product_typeid,
				// 	 'sku_no' => $this->input->post('sku_no'),
				// 	 'gst_tax' => $this->input->post('gst_tax'),
				// 	 'hsn_code' => $this->input->post('hsn_code'),
				// 	//'min_re_order_level' => $this->input->post('min_re_order_level'),
					
				// 	 'unitprice_purchase' => $this->input->post('unitprice_purchase'),
					
				// 	 'unitprice_sale' => $this->input->post('unitprice_sale'),
				// 	 'usageunit' => $this->input->post('unit'),
				// 	//'pic_per_box' => $this->input->post('pic_per_box'),
				// 	//'mrp' => $this->input->post('mrp'),
				// 	//'style_no' => $this->input->post('style'),	
				// );

                $dataall = array_merge($dataarr,$sesio);
		        $this->Model_admin_login->insert_user($table_name,$dataall);
				$this->session->set_flashdata('flash_msg', 'Record Added Successfully.'); 
				//redirect('master/Item/manage_item');
				echo "1";
		}
	}
   
     public function ajex_ItemListData(){
        $data =  $this->manageItemJoinfun();  	
	    $this->load->view('Item/edit-item',$data);
     } 

	private function set_barcode($code)
	{
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
	}
	
	
	public function bar()
	{
		//I'm just using rand() function for data example
		$temp = rand(10000, 99999);
		$this->set_barcode($temp);
	}

	

function changesubcatg(){
  if($this->session->userdata('is_logged_in')){
  	$data['result'] = $this->model_master->get_child_data($this->input->get('ID'));
	$this->load->view('Item/getsubcatg',$data);
  }else{
    redirect('index');
  }
}

public function import_product(){

	
	if($this->session->userdata('is_logged_in')){
	
		$this->load->view('Item/import-product');
}

else{
redirect('index');

}

}



public function import_item(){
 @extract($_POST);
 $filename=$_FILES["file"]["tmp_name"];
 
 
		 if($_FILES["file"]["size"] > 0)
		 {
 
		  	$file = fopen($filename, "r");
	         while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
 
//select id of category
 $catId=$this->db->query("select *from tbl_prodcatg_mst where prodcatg_name='".$getData[0]."'");
 $catRow=$catId->row();
 
//select id of unit id
 $unitId=$this->db->query("select *from tbl_master_data where keyvalue='".$getData[2]."'");
 $unitRow=$unitId->row();
	         
if($getData[0]!='Category Name')
{
	
	           
			   $this->db->query("insert into tbl_product_stock set productname='".$getData[1]."',category='".$catRow->prodcatg_id."',usageunit='".$unitRow->serial_number."',hsn_code='".$getData[3]."',gst_tax='".$getData[4]."',min_re_level='".$getData[6]."',p_p_unit='".$getData[5]."',unitprice_purchase='".$getData[7]."',unitprice_sale='".$getData[8]."',comp_id='".$this->session->userdata('comp_id')."'");
			   
}		
	         }
			 fclose($file);
		
		 }
	         //fclose($file);
echo "<script>
alert('Product Imported Successfully');




window.location.href = 'manage_item';


</script>";
			 
	 
//redirect('/master/manage_item');
	
}



public function item_t()
{
	
		if($this->session->userdata('is_logged_in')){

	$data=$this->user_function();// call permission fnctn
	$data['result'] = $this->model_master->product_get();	
	$this->load->view('Item/manage-item-test',$data);
	}
	else
	{
	redirect('index');
	}
		

}


public function insert_loop_data()
{
	
	for($i=1;$i<=3000;$i++)
	{
	$this->db->query("insert into tbl_product_stock set productname='safi',comp_id='1'");
	}
	
}

public function ajax_priceMapping(){
 //print_r($this->input->post());die;
   $pricesize = sizeof($this->input->post('productPrice'));
    for($i=0;$i<$pricesize;$i++) {
	    $arr[$i]['price'] = $this->input->post('productPrice')[$i];
	    $arr[$i]['name']  = $this->input->post('pricename')[$i];
	   
    }
   $jsonprice = json_encode($arr);
   $this->model_master->modPriceMapping($this->input->post(),$jsonprice);
   echo 1;
 }

public   function ajax_getPriceMapping(){
    //print_r($this->input->post());
   $data['result'] = $this->model_master->modGetPriceMapping($this->input->post('id'));
   $this->load->view('Item/priceMappingEdit',$data);
  // $getData['price'] = json_decode($getData['result']['price']);
  // echo json_encode($getData);
 }
  

}

?>