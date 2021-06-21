<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class control extends Controller
{
    public function deals()
    {
      $data = array(
      'handsetCards' => array(
          // array('imageName' => 'baner1', 'title'=> 'Caard 1', 'img' => url('/images/baner1.png'), 'cols'=> 2, 'rows'=> 1),
          array('imageName' => 'baner1', 'title'=> '10% off on grocerys', 'cols'=> 2, 'rows'=> 1),
          array('imageName' => 'baner2', 'title'=> '20% off on grocerys', 'cols'=> 2, 'rows'=> 1),
          array('imageName' => 'baner3', 'title'=> '30% off on grocerys', 'cols'=> 2, 'rows'=> 1),
          array('imageName' => 'baner4', 'title'=> '40% off on grocerys', 'cols'=> 2, 'rows'=> 1),
        ),
      'webCards' => array(
          array('imageName' => 'baner4', 'title'=> '10% off on grocerys', 'cols'=> 2, 'rows'=> 1 ),
          array('imageName' => 'baner2', 'title'=> '20% off on grocerys', 'cols'=> 1, 'rows'=> 1 ),
          array('imageName' => 'baner3', 'title'=> '30% off on grocerys', 'cols'=> 1, 'rows'=> 2 ),
          array('imageName' => 'baner1', 'title'=> '40% off on grocerys', 'cols'=> 1, 'rows'=> 1 ),
          array('imageName' => 'baner3', 'title'=> '40% off on grocerys', 'cols'=> 2, 'rows'=> 1 )
        ),
      );
      echo json_encode($data);
    }
    public function contacts(Request $req)
    {
      // $formdata = request('data1');
        $message = "";
      $res = DB::table('contacts')->where('email',request('email'))->get();
      if(count($res) > 0)
      {
            $msg = array(
                "message" => "Email already exist",
                "status" => false
            );
      }
      else{
          $responce = array(
            "firstName" =>request('firstName'),
            "lastName" =>request('lastName'),
            "email" =>request('email'),
            "message" =>request('message'),
          );
          DB::table('contacts')->insert($responce);
          $msg = array(
                "message" => "Success",
                "status" => true
            );      }
      echo json_encode($msg);
    }
}

//{"firstName":"a","lastName":"aa","email":"aa@aa","message":"aaaaaa"}<?php
