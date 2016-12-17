<?php
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);  
    $dir = dirname(__FILE__);
    // include $dir.'/Classes/PHPExcel.php';      
    include $dir.'/Classes/PHPExcel/IOFactory.php'; 
    $reader = PHPExcel_IOFactory::createReader('Excel5'); 
    $PHPExcel = $reader->load($dir."/a1.xls"); 
    $sheet = $PHPExcel->getSheet(0); 
    $highestRow = $sheet->getHighestRow(); 
    $highestColumm = $sheet->getHighestColumn(); 
    for ($row = 1; $row <= $highestRow; $row++){
        for ($column = 'A'; $column <= $highestColumm; $column++) {
            if($column == 'A'){
                $dataset[$row][] = $sheet->getCell($column.$row)->getValue();
            }else{
                $dataset[$row][] = $sheet->getCell($column.$row)->getValue();
            }
        }
    }
    echo "<pre>";
    print_r($dataset);
    $json_arr = json_encode($dataset, 1);
    echo $json_arr;
    
?>