<?php
require_once( str_replace('//', '/', __DIR__ . '/') . '../../../wp-config.php');
    $file = $_FILES['file'];
    $InvId= '';
    $OutSum ='';
    $SignatureValue ='';
    global $wpdb;

if(!empty($file)){

    $separator = '----------------------';
    $content = explode($separator, file_get_contents($file['tmp_name']));

    foreach($content as $item){

        $item = stristr($item , '{', true);

        if($item !== false){

            $InvId = stristr(stristr($item , 'InvId',false ), '&', true);
            $InvId = substr($InvId , strpos($InvId,'InvId=')+6 );

            $OutSum = stristr(stristr($item , 'OutSum',false ), '&', true);
            $OutSum = substr($OutSum , strpos($OutSum,'OutSum=')+7 );

            $SignatureValue = stristr($item , 'SignatureValue',false );
            $SignatureValue = substr($SignatureValue , strpos($SignatureValue,'SignatureValue=')+15 );

            if(!empty($InvId) && !empty($OutSum) && !empty($SignatureValue) ){
                $re_query = "INSERT INTO `trendup`
                                            (`InvId`,`OutSum`,`SignatureValue`)
                                     VALUES('$InvId','$OutSum','$SignatureValue')";
                $pre_results = $wpdb->get_var($re_query);
            }

            echo json_encode([
                'responce' =>$SignatureValue
            ]);
        }else{
            $status = 'транзакция не подтверждена';
        }

    }
}else{

    echo json_encode([
        'responce' =>"Empty File"
    ]);

}


