<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

 include_once APPPATH.'/third_party/wordConverter/docx_reader.php';
//include dirname(__FILE__).'/docx_reader.php';
//include('./docx_reader.php');
 class CI_WordConvertor {
    public $doc;
   
    public function __construct()
    {
    	
    
  
    	$doc = new Docx_reader();
        $doc->setFile('./sample.docx');
       if(!$doc->get_errors()) {
		    	$html = $doc->to_html();
		  
		} else {
		    echo implode(', ',$doc->get_errors());
		}
		    echo "\n";

		
         $this->loadfunctionnamess();
		   
		        
     }


	 public function loadfunctionnamess()
	{
		return "sdgsdg";
		
	}

  

}

