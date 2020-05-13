<?php
class Csv_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function uploadData()
    {
            $count=0;
            $fp = fopen($_FILES['userfile']['tmp_name'],'r') or die("can't open file");
            while($csv_line = fgetcsv($fp,1024))
            {
                $count++;
                if($count == 1)
                {
                    continue;
                }//keep this if condition if you want to remove the first row
                for($i = 0, $j = count($csv_line); $i < $j; $i++)
                {
                    $insert_csv = array();
                    $insert_csv['product_name'] = $csv_line[0];
                    $insert_csv['product_description'] = $csv_line[1];
                    $insert_csv['product_image'] = $csv_line[2];
                    $insert_csv['category_id'] = $csv_line[3];
                    $insert_csv['in_stock'] = $csv_line[4];
                    $insert_csv['price'] = $csv_line[5];
                    $insert_csv['unit_value'] = $csv_line[6];
                    $insert_csv['unit'] =  $csv_line[7];
                    $insert_csv['increament'] = $csv_line[8];
                    $insert_csv['rewards'] = $csv_line[9];
                }
                $i++;
                $data = array(
                    'product_id' => "" ,
                    'product_name' => $insert_csv['product_name'],
                    'product_description' => $insert_csv['product_description'],
                    'product_image' => $insert_csv['product_image'],
                    'category_id' => $insert_csv['category_id'],
                    'in_stock' => $insert_csv['in_stock'],
                    'price' => $insert_csv['price'],
                    'unit_value' => $insert_csv['unit_value'],
                    'unit' => $insert_csv['unit'],
                    'increament' => $insert_csv['increament'],
                    'rewards' => $insert_csv['rewards']
                    );
                $data['crane_features']=$this->db->insert('products', $data);
            }
            fclose($fp) or die("can't close file");
            $data['success']="Product upload success";
            return $data;
    }
}