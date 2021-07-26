<?php


namespace App\Controllers;

use App\Models\tasks;

class habrFreelance extends ParserInterface
{
    public function setQuery()
    {
        $url = "https://freelance.habr.com";
        $getQuery = "/tasks/?page={$this->page}&q={$this->query}";

        $this->getDate($url . $getQuery);
        
        if($this->dom->find(".empty-block__title")->text() == "Нет заказов")
            return;

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
        $convert = new Dayconvertor();

        foreach ($this->dom->find(".content-list.content-list_tasks")->find(".task.task_list") as $key => $value)
        {

            $pq = pq($value);
            $arr["date"] =  $convert->Convert( $pq->find(".task__params.params")->find(".params__published-at.icon_task_publish_at")->text() );
            if(!empty(preg_replace('/[^0-9]/', '', $pq->find(".task__price")->find(".count")->text())))
            {
           //     $arr["price"] = trim(preg_replace('/[^0-9]/', '', $pq->find(".task__price")->find(".count")->text()));

            //   if($arr["price"] >= $this->praceOf) 
                {
                    $arr["title"] = $pq->find(".task__title")->text();

                    $arr["href"] = $url. $pq->find(".task__title")->find("a")->attr("href");

                    $arr["discription"] = "Не указано";

                    if(!empty(preg_replace('/[^0-9]/', '', $pq->find(".task__price")->find(".count")->text())))
                        $arr["price"] = trim(preg_replace('/[^0-9]/', '', $pq->find(".task__price")->find(".count")->text()));
                    else
                        $arr["price"] = 0;

                    $arr["showPrice"] =$pq->find(".task__price")->find(".count")->text();

                  //  $arr["date"] =  $convert->Convert( $pq->find(".task__params.params")->find(".params__published-at.icon_task_publish_at")->text() );
                   $arr["date"] =  ( $pq->find(".task__params.params")->find(".params__published-at.icon_task_publish_at")->text() );

                 //   $tasks->insert($arr);
                //    $arr = null;
                    $this->title[] =  $arr["title"];
                    $this->href[] =  $arr["href"];
                    $this->discription[] =  $arr["discription"];
                    $this->price[] =  $arr["price"];
                    $this->showPrice[] =  $arr["showPrice"];
                    $this->date[] =  $arr["date"];
                    $arr = null;
                }
            }
            else
            {
                
                
                    $arr["title"] = $pq->find(".task__title")->text();

                    $arr["href"] = $url. $pq->find(".task__title")->find("a")->attr("href");

                    $arr["discription"] = "Не указано";

                    if(!empty(preg_replace('/[^0-9]/', '', $pq->find(".task__price")->find(".count")->text())))
                        $arr["price"] = trim(preg_replace('/[^0-9]/', '', $pq->find(".task__price")->find(".count")->text()));
                    else
                        $arr["price"] = 0;

                    $arr["showPrice"] =$pq->find(".task__price")->find(".count")->text();

                   // $arr["date"] =  $convert->Convert( $pq->find(".task__params.params")->find(".params__published-at.icon_task_publish_at")->text() );
                   $arr["date"] =  ( $pq->find(".task__params.params")->find(".params__published-at.icon_task_publish_at")->text() );

                   // $tasks->insert($arr);

                    $this->title[] =  $arr["title"];
                    $this->href[] =  $arr["href"];
                    $this->discription[] =  $arr["discription"];
                    $this->price[] =  $arr["price"];
                    $this->showPrice[] =  $arr["showPrice"];
                    $this->date[] =  $arr["date"];
                    $arr = null;
                 
            }

//            $this->title[] =  $arr["title"];
//            $this->href[] =  $arr["href"];
//            $this->discription[] =  $arr["discription"];
//            $this->price[] =  $arr["price"];
//            $this->showPrice[] =  $arr["showPrice"];
//            $this->date[] =  $arr["date"];

        }


        if($this->page < 5)   //Просматриваем 2 страницы
        {
            $this->page++;    //Перелистываем страницу
            $this->setQuery(); //Повторяем запрос
        }

     //   print_r($this->finalArr);

    }
}