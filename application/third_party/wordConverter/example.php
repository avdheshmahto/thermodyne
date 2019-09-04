<?php
/**
 * Created by PhpStorm.
 * User: jasoncrider
 * Date: 1/24/17
 * Time: 4:53 PM
 */
include dirname(__FILE__).'/docx_reader.php';
//include('./docx_reader.php');

$doc = new Docx_reader();
$doc->setFile('./sample.docx');

if(!$doc->get_errors()) {
    $html = $doc->to_html();
    //$plain_text = $doc->to_plain_text();

    echo $html;
} else {
    echo implode(', ',$doc->get_errors());
}
echo "\n";