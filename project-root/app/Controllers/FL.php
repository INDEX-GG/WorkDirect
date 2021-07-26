<?php


namespace App\Controllers;

use App\Models\tasks;

class FL extends ParserInterface
{
    public function setQuery()
    {
        $url = "https://www.fl.ru";
        $getQuery = "/search/?type=projects&action=search&search_string={$this->query}&page={$this->page}";
        $this->getDate($url.$getQuery);

        if(!empty($this->dom->find(".search-lenta.search-prj")->find(".search-item-body")))
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
        foreach ($this->dom->find(".search-lenta.search-prj")->find(".search-item-body") as $key=>$value)
        {
                    $pq = pq($value);
                    if (!empty(preg_replace('/[^0-9]/','', $pq->find(".search-price")->text())))
                    {
                        $arr["price"] = trim(preg_replace('/[^0-9]/','', $pq->find(".search-price")->text()));
                        if($arr["price"]>=$this->praceOf)
                        {
                            $arr["title"] = $pq->find("h3")->find("a")->text();

                            $arr["href"] = $url . $pq->find("a")->attr("href");

                            $arr["discription"] = $pq->find('p')->text();
                            if (!empty(preg_replace('/[^0-9]/','', $pq->find(".search-price")->text())))
                                $arr["price"] = trim(preg_replace('/[^0-9]/','', $pq->find(".search-price")->text()));
                            else
                                $arr["price"] = 0;
                            $arr["showPrice"] = $pq->find(".search-price")->text();

                            
                           // $arr["date"] =$convert->Convert($pq->find(".search-meta")->text(),2);
                     //      $arr["date"] =preg_replace('/[^0-9\.,:]/','',$pq->find(".search-meta")->text());
                     
                           if(strpos(preg_replace('/[^0-9\.,:]/','',$pq->find(".search-meta")->text()),':') > 0)
                                $arr["date"] =substr( preg_replace('/[^0-9\.:]/','',$pq->find(".search-meta")->text()),0,strlen( preg_replace('/[^0-9\.,:]/','',$pq->find(".search-meta")->text()))-5 );
                            else {
                                $arr["date"] = 1;
                            }
                         //   $tasks->insert($arr);
                          //  $arr = null;
                        }
                    }
                    else
                     {
                        $arr["title"] = $pq->find("h3")->find("a")->text();

                        $arr["href"] = $url . $pq->find("a")->attr("href");

                        $arr["discription"] = $pq->find('p')->text();
                        if (!empty(preg_replace('/[^0-9]/','', $pq->find(".search-price")->text())))
                            $arr["price"] = trim(preg_replace('/[^0-9]/','', $pq->find(".search-price")->text()));
                        else
                            $arr["price"] = 0;
                        $arr["showPrice"] = $pq->find(".search-price")->find("li")->text();

                      //  $arr["date"] =$convert->Convert($pq->find(".search-meta")->text(),2);

                      if(strpos(preg_replace('/[^0-9\.,:]/','',$pq->find(".search-meta")->text()),':') > 0)
                        $arr["date"] =substr( preg_replace('/[^0-9\.:]/','',$pq->find(".search-meta")->text()),0,strlen( preg_replace('/[^0-9\.,:]/','',$pq->find(".search-meta")->text()))-5 );
                        else {
                            $arr["date"] = 1;
                        }
                    //    $tasks->insert($arr);
                      //  $arr = null;
                    }

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