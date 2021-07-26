<?php


namespace App\Controllers;

use CodeIgniter\Controller;
use GuzzleHttp\Exception\RequestException;


abstract class ParserInterface extends Controller
{
    protected $priceOf,$date,$query,$dom = null,$url,$page = 1,$html,$finalArr,$title,$href,$discription,$price,$showPrice,$days;

    public function __construct($praceOf,$days,$query)
    {
        $this->praceOf = $praceOf;
        $this->days = $days;
        $this->query=$query;

    }

    protected function getDate($url)
    {

        // $client = new \GuzzleHttp\Client(
        //     [
        //         'headers'=>[
        //             'User-Agent'=>'Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10'
        //         ]
        //     ]
        // );

        // try
        // {
        //     $request = $client->request('GET',$url);
        // }
        // catch(RequestException $e)
        // {
        //     //echo "Ошибка подключения, попробуйте ещё раз";
        //     return;
        // }
        // $this->html = ($request->getBody());


////////////////////////////////////////////////////////////////
       $options = array(
           'http'=>array(
               'ignore_errors' => true,
               'method'=>"GET",
               'header'=>"Accept-language: en\r\n" .
                   "Cookie: foo=bar\r\n" .  // check function.stream-context-create on php.net
                   "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n" // i.e. An iPad

           )
       );

       $context = stream_context_create($options);


        $this->html = file_get_contents($url, false, $context);


        $this->dom = \phpQuery::newDocument($this->html);




    }

    abstract public function setQuery();
}