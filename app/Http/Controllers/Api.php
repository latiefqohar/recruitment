<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Api extends Controller
{
    public function index(){
        if (Cache::has('users')) {
            $response=Cache::get('users');
            $data = json_decode($response,TRUE);            
            return view('Api_view',$data);
        }else{
            $this->simpan_cache();
            $data_tampil=$this->tampil_data();
            $data = json_decode($data_tampil,TRUE);            
            return view('Api_view',$data);
        }

    }

    public function refresh(){
        $this->simpan_cache();
        $data_tampil=$this->tampil_data();
        $data = json_decode($data_tampil,TRUE);            
        return view('Api_view',$data);
    }

    private function tampil_data(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://n161.tech/api/dummyapi/post",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "postman-token: 9a7b42b7-e3c3-ce16-f393-332604087b0c"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {          
            return $response;
        }
    }


    private function simpan_cache(){
        $expired = now()->addMinutes(120);
        $value = Cache::remember('users', $expired , function () {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://n161.tech/api/dummyapi/post",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "postman-token: 9a7b42b7-e3c3-ce16-f393-332604087b0c"
            ),
            ));
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
            echo "cURL Error #:" . $err;
            } else {     
               return $response;
            }
        });
    }
}
