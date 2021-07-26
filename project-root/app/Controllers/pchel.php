<?php


namespace App\Controllers;

use App\Models\tasks;

class pchel extends ParserInterface
{
    public function setQuery()
    {
        $url = "https://pchel.net";
        $getQuery = "/jobs/search={$this->query}&price-from={$this->praceOf}/page-{$this->page}/";




            $this->getDate($url . $getQuery);

            if (strpos($this->dom->find(".desc")->find("p")->text(), "К сожалению, страница не найдена") == false)
            {
               $this->parsingDate($url);
            }


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
        if(strpos($this->dom->find(".wrapper")->find("p")->text(),"К сожалению, работы по вашей специальности нет") > 0)
        {
            return;
        }
        else
        {
         //   echo "tyt2";
            foreach ($this->dom->find(".project-blocks")->find(".project-block.project-block2") as $key => $value)
            {

                $pq = pq($value);

                $arr["title"] = $pq->find(".project-title")->text();
                $arr["href"] = $url . $pq->find(".project-title")->find("a")->attr("href");
                $arr["discription"] = $pq->find(".project-text")->text();
                $arr["price"] =trim(75 * str_replace("$", "", str_replace("Бюджет: ", " ", $pq->find(".project-block-cov")->find(".project-athor")->find(".price")->text())));
                $arr["showPrice"] = str_replace("Бюджет: ", " ", $pq->find(".project-block-cov")->find(".project-athor")->find(".price")->text());
            // $arr["date"] =  $convert->Convert( $pq->find(".project-block-right")->find(".date")->text(),4);
                $arr["date"] = ( $pq->find(".project-block-right")->find(".date")->text());
             //   $tasks->insert($arr);
              //  $arr = null;

                $this->title[] =  $arr["title"];
                $this->href[] =  $arr["href"];
                $this->discription[] =  $arr["discription"];
                $this->price[] =  $arr["price"];
                $this->showPrice[] =  $arr["showPrice"];
                $this->date[] =  $arr["date"];
              //  print_r($this->finalArr);
            }

            if ($this->page < 5)   //Просматриваем 2 страницы
            {
                $this->page++;    //Перелистываем страницу
                $this->setQuery(); //Повторяем запрос
            }

        }

    }
}