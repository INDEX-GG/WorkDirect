<?php


namespace App\Controllers;

use App\Models\tasks;

class youDo extends ParserInterface
{
    public function setQuery()
    {
        $url = "https://youdo.com";
        $getQuery = "/api/tasks/tasks/?q={$this->query}&list=all&status=opened&radius=30&lat=55.189532&lng=61.343795&page={$this->page}&noOffers=false&onlySbr=false&onlyB2B=false&onlyVacancies=false&priceMin={$this->praceOf}&sortType=1&onlyVirtual=false&categories=all&searchRequestId=43dabe9d-90f5-2590-b031-76779fef3d28";


        $this->parsingDate($url.$getQuery);
        $this->finalArr["title"] = $this->title;
        $this->finalArr["href"] = $this->href;
        $this->finalArr["discription"] = $this->discription;
        $this->finalArr["price"]=$this->price;
        $this->finalArr["showPrice"]= $this->showPrice;
        $this->finalArr["date"] = $this->date;
        return $this->finalArr;

    }

    protected function parsingDate($url)
    {

       $object = json_decode($this->request());
       
        if(empty($object))
            return ;

        $tasks = new tasks();
        $convert = new Dayconvertor();
 

       foreach ($object->ResultObject->Items as $key)
       {

        if(!empty(preg_replace('/[^0-9]/', '', $key->BudgetDescription)))
        {
            $arr["price"] =  trim(preg_replace('/[^0-9]/', '', $key->BudgetDescription));
            if( $arr["price"]>=$this->praceOf)
            {
                $arr["title"] = $key->Name;
                $arr["href"] ="https://youdo.com".$key->Url;
                $arr["discription"] = "Отсутствует";

                    if(!empty(preg_replace('/[^0-9]/', '', $key->BudgetDescription)))
                        $arr["price"] =  trim(preg_replace('/[^0-9]/', '', $key->BudgetDescription));
                    else
                        $arr["price"] = 0;

                $arr["showPrice"] = $key->BudgetDescription;

                $arr["date"] = $key->DateTimeString;

             //   $tasks->insert($arr);
             //   $arr = null;

             }
        }
        else 
        {
            $arr["title"] = $key->Name;
            $arr["href"] ="https://youdo.com".$key->Url;
            $arr["discription"] = "Отсутствует";

                if(!empty(preg_replace('/[^0-9]/', '', $key->BudgetDescription)))
                    $arr["price"] =  trim(preg_replace('/[^0-9]/', '', $key->BudgetDescription));
                else
                    $arr["price"] = 0;

            $arr["showPrice"] = $key->BudgetDescription;

            $arr["date"] = $key->DateTimeString;

           // $tasks->insert($arr);
          //  $arr = null;

            
        }

           $this->title[] =  $arr["title"];
           $this->href[] =  $arr["href"];
           $this->discription[] =  $arr["discription"];
           $this->price[] =  $arr["price"];
           $this->showPrice[] =  $arr["showPrice"];
           $this->date[] =  $arr["date"];

     }

        if($this->page < 10)   //Просматриваем 2 страницы
        {
            $this->page++;    //Перелистываем страницу
            $this->setQuery(); //Повторяем запрос
        }



    }


private function request()
{

$url = "https://youdo.com/api/tasks/tasks/";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = <<<DATA
{"q":"{$this->query}","list":"all","status":"opened","radius":null,"lat":null,"lng":null,"page":{$this->page},"noOffers":false,"onlySbr":false,"onlyB2B":false,"onlyVacancies":false,"priceMin":"","sortType":1,"onlyVirtual":false,"categories":["all"],"searchRequestId":"e7239294-50a5-4161-3cd5-6cd405a9630f"}

DATA;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
//print_r($resp);
return $resp;




}
}