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


// listing records

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





public function manage_item()

{

   if($this->session->userdata('is_logged_in'))

    {

      $data =  $this->manageItemJoinfun();  	

	  $this->load->view('Item/manage-item',$data);

	}

	else

	{

	  redirect('index');

	}

		

}





public function manageItemJoinfun()

{

    

	$table_name = 'tbl_product_stock';

  	////Pagination start ///

    $url   = site_url('/master/Item/manage_item?');

	$sgmnt = "4";

	if($_GET['entries']!="")

		$showEntries = $_GET['entries'];

    else

    	$showEntries = 10;



      $totalData   = $this->model_master->count_allproduct($table_name,'A',$this->input->get());

    //$totalData   = $this->model_master->filterListproduct($p="",$p2 = "",$this->input->get());

    //$showEntries= $_GET['entries']?$_GET['entries']:'12';



    if($_GET['entries']!="" && $_GET['filter'] != 'filter')

	  $url        = site_url('/master/Item/manage_item?entries='.$_GET['entries']);

    else

       $url        = site_url('/master/Item/manage_item?entries='.$_GET['entries'].'&sku_no='.$_GET['sku_no'].'&category='.$_GET['category'].'&productname='.$_GET['productname'].'&usageunit='.$_GET['usageunit'].'&unitprice_purchase='.$_GET['unitprice_purchase'].'&unitprice_sale='.$_GET['unitprice_sale'].'&filter='.$_GET['filter']);

   

  

      $pagination = $this->ciPagination($url,$totalData,$sgmnt,$showEntries);

    //////Pagination end ///



    $data=$this->user_function(); // call permission fnctn



    $data['dataConfig']        = array('total'=>$totalData,'perPage'=>$pagination['per_page'],'page'=>$pagination['page']);

    $data['pagination']        = $this->pagination->create_links();

    $data['mapcategory']       = $this->model_master->mapCategory();

    $data['mapScope']          = $this->model_master->mapscope();

    // print_r($data['mapcategory']);



     if($this->input->get('filter') == 'filter')   ////filter start ////

        $data['result']       = $this->model_master->filterListproduct($pagination['per_page'],$pagination['page'],$this->input->get());

     else	

	    $data['result'] = $this->model_master->product_get($pagination['per_page'],$pagination['page']);





	return $data;

}



public function mappingPro()

{

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

				$image_name=$branchFetch2->scope_doc;

					

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

					 'sku_no'  => $this->input->post('sku_no'),

					 'gst_tax' => $this->input->post('gst_tax'),

					 'hsn_code'=> $this->input->post('hsn_code'),

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

 

public   function ajax_getTechnicalMapping()

{

   $data['result'] = $this->model_master->modGetTechnicalMapping($this->input->post('id'));

   $this->load->view('Item/technicalMappingEdit',$data);

}

public function ajax_inserttechnicaldata()

{

   $data['result'] = $this->model_master->modGetTechnicalMapping($this->input->post('id'));

   $this->load->view('Item/inserttechnicaldata',$data);

}



public   function ajax_getSubjectMapping()

{

    $data['result'] = $this->model_master->modGetsubjectMapping($this->input->post('id'));

    $this->load->view('Item/subjectMappingEdit',$data);

}



public function technicalDataInsert(){

     if($this->input->post() != ""){

	 	$pid         = $this->input->post('pid'); 

	 	$pname       = $this->input->post('pname');

	 	$update      = $this->input->post('update'); 

        $subcategory = $this->input->post('sub_catg');



		$pressure = $this->input->post('pressure');

        $jsonEncode  = "";

     //if($update == 'true'){

         $qrydel   = "delete from tbl_technical_details where pro_id = $pid and pressure = $pressure";

         $this->db->query($qrydel); 

       //} 

      // echo "<pre>";

      // print_r($this->input->post());

      // echo "<pre>";

       //print_r($this->input->post('technical'));

      if($this->input->post('technical') != ""){

        foreach ($this->input->post('technical') as $key => $value) {

	        $subValue     = explode("_",$key);

	        $subcategory  = $subValue[0];

	        $jsonEncode   =  json_encode($value);

	        //print_r($value);
	        //print_r(json_decode($jsonEncode,true));

	        $this->model_master->mod_InsertTechnicalData($pid,$jsonEncode,$subcategory,$pname,$update,$pressure);

	      } 

	    }else{

	   	   $this->model_master->mod_InsertTechnicalData($pid,$jsonEncode,$subcategory,$pname,$update,$pressure);

	    }

	   echo 1;     

	 }   

   }


public function insertExcelTechnicalData(){

		
     if($this->input->post() != ""){

	 	$pid         = $this->input->post('pid'); 

	 	$pname       = $this->input->post('pname');

	 	$pressure      = $this->input->post('pressure'); 

        //$subcategory = $this->input->post('sub_catg');

        $jsonEncode  = "";

      // echo "<pre>";

      // print_r($this->input->post());

      // echo "<pre>";

       //print_r($this->input->post('technical'));

        //echo $pid."pid".$pname."pname".$pressure."pressure";die;

        //-------------------------import excel file-------------------------------------

        			@extract($_POST);
$filename=$_FILES["file_name"]["tmp_name"];


         if($_FILES["file_name"]["size"] > 0)
         {

$arr;   
$row = 1;$count=0;$subcat;
if (($handle = fopen($filename, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        // echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        
        if($data[0]!='SubCategory' && $data[1]!='Item' && $data[2]!='Unit' && $data[3]!='Description' && $data[4]!='Price')
        		{
                    $temp=$count+1;
                	$subcat=$data[0];
                // $arr["count".$count]['SubCategory']=$data[0];
                
                $arr["count".$count]['name']=addslashes($data[1]);
                $arr["count".$count]['entity']=addslashes($data[2]);   
                $arr["count".$count]['value']=addslashes($data[3]);   
                $arr["count".$count]['grade']=addslashes($data[4]);   
                $count++;

/*                $arr["subcat".$count]["count".$temp]['Product_Code']=$data[0];
                $arr["subcat".$count]["count".$temp]['Product_Type']=$data[1];
                $arr["subcat".$count]["count".$temp]['Product_Name']=$data[2];   
               	$count++;
*/

        //print_r($arr);die;
        /*$this->db->query("insert into tbl_excel_demo set Product_Code='".$data[0]."',Product_Type='".$data[1]."',Product_Name='".$data[2]."'");*/
        		}

        	
    }


    //str_replace('[', '"', $arr);
    
    //print_r($arr);
   /* $json=json_encode($arr);
    print_r($json);
    fclose($handle);*/
    fclose($handle);
}


	$json=json_encode($arr);
    
    //print_r($json);

    $this->model_master->excel_InsertTechnicalData($pid,$pname,$pressure,$subcat,$json);
    	echo "1";

		}





	 }   

   }




public function subjectDataInsert(){

     if($this->input->post() != ""){

	 	 $pid         = $this->input->post('pid'); 

	 	 $pname       = $this->input->post('pname');

	  	 $update      = $this->input->post('update'); 



        

      if($update == 'true'){

         $qrydel   = "delete from tbl_product_subject where pid =".$pid;

         $this->db->query($qrydel); 

       }

         //print_r($this->input->post());

       	$i = 0;

       	if($this->input->post('subjectTitle') != ""){

          foreach ($this->input->post('subjectTitle') as $key => $value) {

            $sub_title      = $this->input->post('subjectTitle')[$i];

            $subjectDetails = $this->input->post('subjectDetails')[$i];

            $this->model_master->mod_InsertsubjectData($pid,$subjectDetails,$sub_title);

            $i++;

	      } 

        }

         echo 1;   

    }   

  }



  public function contantDataInsert(){

     if($this->input->post() != ""){

	 	 $pid         = $this->input->post('pid'); 

	 	 $pname       = $this->input->post('pname');

	  	 $update      = $this->input->post('update'); 



        

      if($update == 'true'){

         $qrydel   = "delete from tbl_product_contant where pid =".$pid;

         $this->db->query($qrydel); 

       }

        //print_r($this->input->post('subjectTitle'));

       	$i = 0;

       	if($this->input->post('subjectTitle') != ""){

        foreach ($this->input->post('subjectTitle') as $key => $value) {

          $sub_title      = $this->input->post('subjectTitle')[$i];

          $subjectDetails = $this->input->post('subjectDetails')[$i];

          $this->model_master->mod_InsertcontantData($pid,$subjectDetails,$sub_title);

          $i++;

	     } 

	   }

         echo 1;   

    }   

  }

 

 function priceDataInsert(){

     if($this->input->post() != ""){

	 	 $pid         = $this->input->post('pid'); 

	 	 $pname       = $this->input->post('pname');

	  	 $update      = $this->input->post('update'); 



        

      if($update == 'true'){

         $qrydel   = "delete from tbl_product_price_text where pid =".$pid;

         $this->db->query($qrydel); 

       }

         //print_r($this->input->post());

       	$i = 0;

      	if($this->input->post('subjectTitle') != ""){

        foreach ($this->input->post('subjectTitle') as $key => $value) {

          $sub_title      = $this->input->post('subjectTitle')[$i];

          $subjectDetails = $this->input->post('subjectDetails')[$i];

          $this->model_master->mod_InsertpriceTextData($pid,$subjectDetails,$sub_title);

          $i++;

	     } 

	   }

         echo 1;   

    } 

 }

  function ajax_getContantMapping(){

   	  $data['result'] = $this->model_master->modGetcontantMapping($this->input->post('id'));

      $this->load->view('Item/contantMappingEdit',$data);

   }


   function ajax_getPriceTextMapping(){

   	  $data['result'] = $this->model_master->modGetPriceTextMapping($this->input->post('id'));

      $this->load->view('Item/priceTextMapping',$data);

   }

 public function manage_item_excel()
 	{
 		$data['result']=$this->manageItemJoinfun();
 		$this->load->view('Item/manage_item_excel',$data);	
 	}

public function ajax_getTechnicalMapping_pressure()
	{
		@extract($_POST);
		//echo "id=".$id."mwp=".$mwp;die;
		$data['result'] = $this->model_master->modGetTechnicalMappingpressure($id,$mwp);

   		$this->load->view('Item/technicalMappingEditpressure',$data);

	}

}
?>