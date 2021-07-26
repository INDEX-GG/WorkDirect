<?php

namespace App\Controllers;
use App\Models\tasks;

class Freelance extends ParserInterface
{

    public function setQuery()
    {
        $url = "https://freelance.ru";
        $getQuery = "/project/search/pro?c=&q=".$this->query."&m=&e=&f=".$this->praceOf."&page=".$this->page;
        $this->getDate($url.$getQuery);
        if ( $this->dom->find('.list-view')->find('.empty')->text() == "Ничего не найдено." )
            return ;



        $this->parsingDate($url);
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

        $tasks = new tasks();

        foreach ($this->dom->find('.list-view')->find('.row') as $key => $value)
        {
            $convert = new Dayconvertor();
            $pq = pq($value);

            $arr["title"] = $pq->find('.box-title')->find('.title')->text();

            $arr["href"] = $url . $pq->find('.box-title')->find("a")->attr("href");

            $arr["discription"] = $pq->find('.description')->text();

            if (!empty(preg_replace('/[^0-9]/', '', $pq->find('.box-info')->find(".cost")->text())))
                $arr["price"] =trim(preg_replace('/[^0-9]/', '', $pq->find('.box-info')->find(".cost")->text()));
            else
                $arr["price"] = 0;

            $arr["showPrice"] = $pq->find('.box-info')->find(".cost")->text();

          //  $arr["date"] = $convert->Convert($pq->find('.prop')->find('.timeago')->attr("datetime"),3);
            $arr["date"] = ($pq->find('.prop')->find('.timeago')->attr("datetime"));

            //$tasks->insert($arr);
            //$arr = null;
            $this->title[] =  $arr["title"];
            $this->href[] =  $arr["href"];
            $this->discription[] =  $arr["discription"];
            $this->price[] =  $arr["price"];
            $this->showPrice[] =  $arr["showPrice"];
            $this->date[] =  $arr["date"];


        }

        if($this->page < 5)   //Просматриваем 2 страницы
        {
            $this->page++;    //Перелистываем страницу
            $this->setQuery(); //Повторяем запрос
        }



    }



}


