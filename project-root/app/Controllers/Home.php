<?php

namespace App\Controllers;
use CodeIgniter\HTTP\Request;
use App\Models\tasks;
use App\Controllers\data;
class Home extends BaseController
{
    public function index()
    {
        $cache = \Config\Services::cache();
        mb_internal_encoding("UTF-8");

        if((isset($_COOKIE["execQ"])) && (!empty($cache->get('exec'))))
        {
            // $ex = $cache->get('exec');
            // print_r(preg_replace('!\\r\\n!', "",json_encode($ex,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT)));
//            return view('welcome_message', ['arr' => $ex]);
        }

        $tasks = new tasks();
        $convert = new Dayconvertor();

        //    $db = \Config\Database::connect();

        //       $query = $db->query('ALTER SEQUENCE "tasks_id_seq" RESTART WITH 1');
        //     $query= $db->query('TRUNCATE tasks');


///////////////////////////////////////////////////// ОЧИЩЕНИЕ ТАБЛИЦЫ И СБРОС АВТОИНКРИМЕНТА

        $habrFreelance = new habrFreelance(100,30, (urlencode($this->request->getVar("request"))));
        $arr1 = $habrFreelance->setQuery();
        
        return $this->getAnswer($arr1);


/////////////////////////////////////////////////////////
       //  $mergeArr =  (preg_replace('!\\r\\n!', "",json_encode(array_merge($arr1,$arr2,$arr3,$arr4,$arr5),JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT)));
   //     $Marr = array_merge($Marr,$arr1);

     //   $count = 0;

//         foreach ($Marr as $key=>$value)
//         {
// //        echo "Now hey: ".$key;
// //        echo "<br>";
//             foreach ($value as $key2=>$value2)
//             {
//                 if(!isset($arr[$key2]))
//                     $arr[$key2] = new data();

//                 if($key == "title")
//                 {
//                     $arr[$key2]->title = $value2;
// //                print_r($key);
// //                echo "<br>";
// //                print_r($arr[$key2]->title);
// //                echo "<br>";
//                 }
//                 if($key == "discription")
//                 {
//                     $arr[$key2]->discription = $value2;
// //                print_r($key);
// //                echo "<br>";
// //                print_r($arr[$key2]->discription);
// //                echo "<br>";
//                 }
//                 if($key == "price")
//                 {
//                     $arr[$key2]->price = $value2;
// //                print_r($key);
// //                echo "<br>";
// //                print_r($arr[$key2]->price);
// //                echo "<br>";
//                 }
//                 if($key == "href")
//                 {
//                     $arr[$key2]->href = $value2;
// //                print_r($key);
// //                echo "<br>";
// //                print_r($arr[$key2]->href);
// //                echo "<br>";
//                 }
//                 if($key == "showPrice")
//                 {
//                     $arr[$key2]->showPrice = $value2;
// //                print_r($key);
// //                echo "<br>";
// //                print_r($arr[$key2]->showPrice);
// //                echo "<br>";
//                 }
//                 if($key == "date")
//                 {
//                     $arr[$key2]->days = $value2;
// //                print_r($key);
// //                echo "<br>";
// //                print_r($arr[$key2]->days);
// //                echo "<br>";
//                 }
//             }
//         }


//         return ( (preg_replace('!\\r\\n!', "",json_encode($arr,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT))));




        //  $mergeArr =  (preg_replace('!\\r\\n!', "",json_encode(array_merge($arr1,$arr2,$arr3,$arr4,$arr5),JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT)));










        //    $ex = $tasks->orderBy('price')->findAll();
//            $ex = $arr1;
//            cache()->save('exec', $ex, 300);
        //    return (preg_replace('!\\r\\n!', "",json_encode(array_merge($arr1,$arr2,$arr3,$arr4,$arr5),JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT)));
        //  print_r(    array_merge($arr1,$arr2,$arr3,$arr4,$arr5)  );
        // print_r($arr5);
        // return view('welcome_message', ['arr' => $ex]);

    }






        public function getAnswer($Marr)
        {
            foreach ($Marr as $key=>$value)
            {
    //        echo "Now hey: ".$key;
    //        echo "<br>";
                foreach ($value as $key2=>$value2)
                {
                    if(!isset($arr[$key2]))
                        $arr[$key2] = new data();
    
                    if($key == "title")
                    {
                        $arr[$key2]->title = $value2;
    //                print_r($key);
    //                echo "<br>";
    //                print_r($arr[$key2]->title);
    //                echo "<br>";
                    }
                    if($key == "discription")
                    {
                        $arr[$key2]->discription = $value2;
    //                print_r($key);
    //                echo "<br>";
    //                print_r($arr[$key2]->discription);
    //                echo "<br>";
                    }
                    if($key == "price")
                    {
                        $arr[$key2]->price = $value2;
    //                print_r($key);
    //                echo "<br>";
    //                print_r($arr[$key2]->price);
    //                echo "<br>";
                    }
                    if($key == "href")
                    {
                        $arr[$key2]->href = $value2;
    //                print_r($key);
    //                echo "<br>";
    //                print_r($arr[$key2]->href);
    //                echo "<br>";
                    }
                    if($key == "showPrice")
                    {
                        $arr[$key2]->showPrice = $value2;
    //                print_r($key);
    //                echo "<br>";
    //                print_r($arr[$key2]->showPrice);
    //                echo "<br>";
                    }
                    if($key == "date")
                    {
                        $arr[$key2]->days = $value2;
    //                print_r($key);
    //                echo "<br>";
    //                print_r($arr[$key2]->days);
    //                echo "<br>";
                    }
                }
            }
    
    
            return ( (preg_replace('!\\r\\n!', "",json_encode($arr,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT))));

        }






        public function freelance()
        {
            $freelance = new freelance(100,30, urlencode($this->request->getVar("request")));
            $arr2 = $freelance->setQuery();
    
            return $this->getAnswer($arr2);
        }

        public function youDo()
        {
            $youdo = new youDo(100,30, urlencode($this->request->getVar("request")));
            $arr3 = $youdo->setQuery();
    
            return $this->getAnswer($arr3);
        }
        public function fl()
        {
            $FL = new FL(100,30, urlencode($this->request->getVar("request")));
            $arr4 = $FL->setQuery();
    
            return $this->getAnswer($arr4);
        }
        public function weblancer()
        {
            $weblancer = new weblancer(100,30, ($this->request->getVar("request")));
            $arr5 = $weblancer->setQuery();
    
            return  $this->getAnswer($arr5);
        }

        public function pchel()
        {
            $pchel = new pchel(100,30, urlencode($this->request->getVar("request")));
            $arr6 = $pchel->setQuery();
    
            return $this->getAnswer($arr6);
        }
        
}


