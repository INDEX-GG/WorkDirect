<?php

namespace App\Controllers;

use App\Models\tasks;


class weblancer extends ParserInterface
{
    public function setQuery()
    {
        $url = "https://www.weblancer.net";
        $encoding = mb_convert_encoding($this->query,"windows-1251", "utf-8");
        $getQuery = "/jobs/?action=search&keywords={$encoding}&page={$this->page}&query={$encoding}";
        
        $this->getDate($url.$getQuery);

//        if(empty($this->dom->find(".cols_table.divided_rows")->find(".row.click_container-link.set_href") ))
//            return;

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
        $convert = new Dayconvertor();
        $tasks = new tasks();

        foreach ($this->dom->find(".cols_table.divided_rows")->find(".row.click_container-link.set_href") as $key=>$value)
        {
            $pq = pq($value);

            $arr["title"] = $pq->find(".col-sm-10")->find(".title")->text();
            $arr["href"] =  $url.$pq->find(".col-sm-10")->find(".text-bold.show_visited")->attr("href");
            $arr["discription"] =  str_replace("Свернуть", "", $pq->find(".col-sm-10")->text());
            $arr["price"]=  0;
            $arr["showPrice"] = "Договорная";
        //   $arr["date"] = $convert->Convert($pq->find(".time_ago")->text());
            $arr["date"] = ($pq->find(".time_ago")->text());
           // $tasks->insert($arr);
          //  $arr = null;
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