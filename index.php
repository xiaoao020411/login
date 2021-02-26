<?php
    
    include "pdo.php";
    
    $user_name = $_POST['username'];
    $mobile = $_POST['mobile'];

    $pdo = getPdo();
    $now = time();
    $sql = "insert into login (user_name,mobile,reg_time) values ('$user_name','$mobile',$now)";
    $res = $pdo->exec($sql);
    $id = $pdo->lastInsertId();     //获取自增ID
    if($id>0){      //入库成功
        $response = [
            'errno' => 0,
            'msg'   => 'ok'
        ];

    }else{          //入库失败
        $response = [
            'errno' => 500008,
            'msg'   => '注册失败，请重试'
        ];

    }

    echo json_encode($response);