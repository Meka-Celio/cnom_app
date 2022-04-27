<?php   
    //header('Content-Type: text/csv; charset=utf-8');
    //header('Content-Disposition: attachment; filename=Export-test.csv');
    require '../../model.collection.php';

    $data = getAllRegion();
    //print_r($allRegions);

    $datas = array();

    foreach ($data as $d) 
    {
        $datas[]            = array(
            'ID_Region'     =>  $d->ID_Region,
            'Nom_Region'    =>  $d->Nom_Region,
            'Code_Reg'      =>  $d->Code_Reg   
        );
    }

    print_r($datas);


?>