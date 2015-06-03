<?php
$row = 1;
if (($handle = fopen("crawler.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
//        for ($c=0; $c < $num; $c++) {
//            echo $data[$c] . "<br />\n";
//        }
        
        $title = $data[0];
        $text =  $data[2];
        $link =  $data[3];
//        var_dump($data);
    }
    fclose($handle);
}
?>