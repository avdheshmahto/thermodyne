<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class quotation extends my_controller {
function __construct(){
   parent::__construct();
   $this->load->model('model_purchase_order');
  
   $this->load->library('WordConvertor'); 

}     

public function add_quotation(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('add-quotation');
	}
	else
	{
	redirect('index');
	}		
}


public function edit_quotation(){
  if($this->session->userdata('is_logged_in')){
		$this->load->view('edit-quotation');
  }else{
	   redirect('index');
	}
}
	
public function manage_quotation(){
	
	if($this->session->userdata('is_logged_in')){
	$data=$this->user_function();// call permission fnctn
	$data['result'] = $this->model_purchase_order->invoice_data();
	$this->load->view('manage-quotation',$data);
	}
	else
	{
	redirect('index');
	}	
}


public function insertQuotation(){
		
		extract($_POST);
			
		$table_name ='tbl_quotation_order_hdr';
		$table_name_dtl ='tbl_quotation_order_dtl';
		$pri_col ='quotationid';
		$pri_col_dtl ='quotationid';
		
		$sess = array(
			'maker_id' => $this->session->userdata('user_id'),
			'maker_date' => date('y-m-d'),
			'status' => 'A',
			'comp_id' => $this->session->userdata('comp_id'),
			'zone_id' => $this->session->userdata('zone_id'),
			'brnh_id' => $this->session->userdata('brnh_id'),
			'divn_id' => $this->session->userdata('divn_id')
		    );
	
		$data = array(
	
					'purchase_no' => $this->input->post('purchase_no'),
					'sales_id'    => $this->input->post('iddd'),
					'contactid'   => $this->input->post('vendor_id'),
					'contant'     => $this->input->post('contant'),
					'invoice_status' => $this->input->post('invoice_type'),
					'invoice_date' => $this->input->post('date'),
					'due_date' => $this->input->post('due_date'),
					'sub_total' => $this->input->post('sub_total'),
					'total_cgst' => $this->input->post('total_cgst'),	
					'total_tax_cgst_amt' => $this->input->post('total_tax_cgst_amt'),
					'total_sgst' => $this->input->post('total_sgst'),
					'total_tax_sgst_amt' => $this->input->post('total_tax_sgst_amt'),
					'total_igst' => $this->input->post('total_igst'),
					'total_tax_igst_amt' => $this->input->post('total_tax_igst_amt'),
					'total_gst_tax_amt' => $this->input->post('total_gst_tax_amt'),
					'total_dis' => $this->input->post('total_dis'),
					'total_dis_amt' => $this->input->post('total_dis_amt'),
					'grand_total' => $this->input->post('grand_total'),
					'Transportation' => $this->input->post('Transportation'),
					'Vehicle_Number' => $this->input->post('Vehicle_Number'),
					'Date_of_Supply' => $this->input->post('Date_of_Supply'),
					'Place_of_Supply' => $this->input->post('Place_of_Supply'),
					'subject' => $this->input->post('subject'),
					'gr_no' => $this->input->post('gr_no'),
					'status' => 'Draft',
					
					
					);
		   // echo "<pre>";
		   //   print_r($data);
		   // echo "</pre>";die;
			$data_merge = array_merge($data,$sess);					
		    $this->load->model('Model_admin_login');	
		    $this->Model_admin_login->insert_user($table_name,$data_merge);
			$lastHdrId=$this->db->insert_id();	
			$this->load->model('Model_admin_login');
		
		for($i=0; $i<=$rows; $i++)
		{
			if($qty[$i]!=''){
                $data_dtl=array(
				     'quotationid' 	=> $lastHdrId,
					 'productid'   	=> $main_id[$i],				 
					 'list_price'  	=> $list_price[$i],
					 'qty' 			=> $qty[$i],
					 'discount' 	=> $discount[$i],
					 'discount_amount' => $disAmount[$i],
					 'cgst' 		=> $cgst[$i],
					 'sgst' 		=>$sgst[$i],
					 'igst' 		=> $igst[$i],
					 'gstTotal' 	=> $gstTotal[$i],
					 'total_price' 	=> $tot[$i],
					 'net_price' 	=> $nettot[$i],
					 'grade' 	    => $grade[$i],
					 'quotation_mapg'=>$quotationMapedValue[$i],
					 'maker_id' 	=> $this->session->userdata('user_id'),
					 'maker_date' 	=> date('y-m-d'),
					 'comp_id' 		=> $this->session->userdata('comp_id'),
					 'zone_id' 		=> $this->session->userdata('zone_id'),
					 'brnh_id' 		=> $this->session->userdata('brnh_id')
				);
				//$this->stock_refill_qty($qty[$i],$main_id[$i]);
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);		
			}
	    }

		$this->software_log_insert($lastHdrId,$vendor_id,$grand_total,'Quotation Order added');
		$rediectInvoice="quotation/quotation/manage_quotation";
		redirect($rediectInvoice);	
    }

	public function updateQuotation(){
		
		extract($_POST);
		$table_name ='tbl_purchase_order_hdr';
		$table_name_dtl ='tbl_purchase_order_dtl';
		$pri_col ='purchaseid';
		$pri_col_dtl ='purchase_dtl_id';
		
		
 //$this->refil_qnty_del($id);

		 $this->db->query("delete from tbl_purchase_order_dtl where purchaseid='$id'");	
				
		$sess = array(
					
					'maker_id' => $this->session->userdata('user_id'),
					'maker_date' => date('y-m-d'),
					'status' => 'A',
					'comp_id' => $this->session->userdata('comp_id'),
					'zone_id' => $this->session->userdata('zone_id'),
					'brnh_id' => $this->session->userdata('brnh_id'),
					'divn_id' => $this->session->userdata('divn_id')
		);
	
		$data = array(
					'purchase_no' => $this->input->post('purchase_no'),
					'vendor_id' => $this->input->post('vendor_id'),
					'invoice_status' => $this->input->post('invoice_type'),
					'invoice_date' => $this->input->post('date'),
					'due_date' => $this->input->post('due_date'),
					'sub_total' => $this->input->post('sub_total'),
					'total_cgst' => $this->input->post('total_cgst'),	
					'total_tax_cgst_amt' => $this->input->post('total_tax_cgst_amt'),
					'total_sgst' => $this->input->post('total_sgst'),
					'total_tax_sgst_amt' => $this->input->post('total_tax_sgst_amt'),
					'total_igst' => $this->input->post('total_igst'),
					'total_tax_igst_amt' => $this->input->post('total_tax_igst_amt'),
					'total_gst_tax_amt' => $this->input->post('total_gst_tax_amt'),
					'total_dis' => $this->input->post('total_dis'),
					'total_dis_amt' => $this->input->post('total_dis_amt'),
					'grand_total' => $this->input->post('grand_total'),
					'Transportation' => $this->input->post('Transportation'),
					'Vehicle_Number' => $this->input->post('Vehicle_Number'),
					'Date_of_Supply' => $this->input->post('Date_of_Supply'),
					'Place_of_Supply' => $this->input->post('Place_of_Supply'),
					'gr_no' => $this->input->post('gr_no'),
					'status' => 'Draft',
					
					);
			
			$data_merge = array_merge($data,$sess);					
		   
			$this->load->model('Model_admin_login');	
		$this->Model_admin_login->update_user($pri_col,$table_name,$id,$data_merge);

		
		for($i=0; $i<=$rows; $i++)
				{
				 				
			    
				
				
				if($qty[$i]!=''){

				 $data_dtl=array(
				 'purchaseid' => $id,
				 'productid' => $main_id[$i],				 
				 'list_price' => $list_price[$i],
				 'qty' => $qty[$i],
				 'discount' => $discount[$i],
				 'discount_amount' => $disAmount[$i],
				 'cgst' =>$cgst[$i],
				 'sgst' => $sgst[$i],
				 'igst' => $igst[$i],
				 'gstTotal' => $gstTotal[$i],
				 'total_price' => $tot[$i],
				 'net_price' => $nettot[$i],
				 'maker_id' => $this->session->userdata('user_id'),
				 'maker_date' => date('y-m-d'),
				 'comp_id' => $this->session->userdata('comp_id'),
				 'zone_id' => $this->session->userdata('zone_id'),
				 'brnh_id' => $this->session->userdata('brnh_id')
				);
				$this->Model_admin_login->insert_user($table_name_dtl,$data_dtl);		
				$this->stock_refill_qty($qty[$i],$main_id[$i]);
	
							}
					}
					$this->paymentAmount($grand_total,$vendor_id,$lastHdrId,$id);
					$this->software_log_insert($id,$vendor_id,$grand_total,'Invoice Updated');
	   echo "<script type='text/javascript'>";
					echo "window.close();";
					echo "window.opener.location.reload();";
					echo "</script>";
					
	
	}
	
	function refil_qnty_del($id){
	
		$data= $this->db->query("select * from tbl_invoice_dtl where invoiceid='$id'");
		foreach($data->result() as $update){
		$this->db->query("update tbl_product_stock set quantity=quantity+'".$update->qty."' where   Product_id='".$update->productid."'");
	 }
return;	
	}
	
	
	
	public function stock_refill_qty($qty,$main_id)
	{
       $this->db->query("update tbl_product_stock set quantity=quantity+'$qty' where Product_id='$main_id'");

	}
	
	
	function updata_stock($qty,$main_id){
	
		 $this->db->query("update tbl_product_stock set quantity=quantity-'$qty' where Product_id='$main_id'");
		
		return;	
	}	

public function getproduct(){
	if($this->session->userdata('is_logged_in')){
		$this->load->view('getproduct');
	}
	else
	{
	redirect('index');
	}
}

	
public function all_product_function(){
	
		$this->load->view('all-product',$data);
	
	}

public function viewSalesOrder(){
	if($this->session->userdata('is_logged_in')){
	
	$this->load->view('view-sales-order');
	}
	else
	{
	redirect('index');
	}
		
}



function deleteSalesOrder(){
	$table_name ='tbl_purchase_order_hdr';
	$table_name_dtl ='tbl_purchase_order_dtl';
	$pri_col ='purchase_order_id';	
	$pri_col_dtl ='purchase_order_hdr_id';
	$this->load->model('Model_admin_login');
		$id= $_GET['id'];
		$id_dtl= $_GET['id'];
		$this->Model_admin_login->delete_user($pri_col,$table_name,$id);
		$this->Model_admin_login->delete_user($pri_col_dtl,$table_name_dtl,$id_dtl);
		redirect('SalesOrder/managePurchaseOrder');
}

function delete_updata_stock($qty1,$main_id){
	
		$this->db->query("update tbl_product_stock set quantity=quantity-'$qty1' where Product_id='$main_id'");
		$this->db->query("update tbl_product_serial set quantity=quantity-'$qty1' where product_id='$main_id'");
		return;	
	}	

public function ajax_productlist(){
	$result = $this->model_purchase_order->mod_productList($this->input->post('value'),$this->input->post('pid')); 
	if(sizeof($result) > 0){
		//print_r($result);
		foreach ($result as  $dt) {
			$price = json_decode($dt['price'],true);
               //print_r($price);
                 foreach ($price as $pt) {
                 	$pt['id']=$dt['id'];
                   echo "<a class='form-control col-sm-3 listpro' style='cursor: pointer;display: block;' title = '".$pt['name']."' jsvalue='".json_encode($pt)."' onclick='selectList(this)'>".substr($pt['name'],0,20)."</a>";
		         }
		   
		}
    }
    else
	  echo "<a class='form-control' value='Not Found !'> Not Found !</a>";	
		    
}

public function print_quotation(){
	 
	if($this->session->userdata('is_logged_in')){
      
     //var_dump($data['WordConvertor']);
	$data=$this->user_function();// call permission fnctn
    
    $data['result']           = $this->model_purchase_order->getinvoiceData($this->input->get('id'));
    $data['technicaldetails'] = $this->model_purchase_order->getinvoicetechdetails($this->input->get('id'));
    //$data['scopedetails']     = $this->model_purchase_order->getinvoiceScopedetails($this->input->get('id'));
    $data['pricedetails']     = $this->model_purchase_order->getinvoicepricedetails($this->input->get('id'));
    $scopedetails             = $this->model_purchase_order->getinvoiceproduct($this->input->get('id'));
  
    $data['WordConvertor']    = $this->wordConvertor($scopedetails['scope_doc']);

	$this->load->view('quotation/print-invoice',$data);
	}
	else
	{
	redirect('index');
	}	
}

public function wordConvertor($file){
	$furl = 'assets/scope_document/'.$file;
	include_once APPPATH.'/third_party/wordConverter/docx_reader.php';
	$doc = new Docx_reader();
	 // echo  APPPATH.$file;
        $doc->setFile($furl);
       if(!$doc->get_errors()) {
		  return  	$html = $doc->to_html();
	   } else {
		  echo implode(', ',$doc->get_errors());
		}
		    echo "\n";
}

		
}