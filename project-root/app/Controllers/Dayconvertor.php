<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Database\Database;
use Faker\Provider\DateTime;

class Dayconvertor extends BaseController
{
	public function Convert($date,$flag = 0)
    {
        $filterDate = trim(str_replace("(Россия)", '', str_replace("Платный заказ", '', str_replace("Вакансия", '', str_replace('~', '', $date)))));


        if (strpos($filterDate, 'час') != false) {
            $minunes = null;
            $hour = trim($filterDate[0] . $filterDate[1]);


            if (strpos("мин", $filterDate) != FALSE) {
                $minunes = trim($filterDate[strpos("мин", $filterDate) - 3] . $filterDate[strpos("мин", $filterDate) - 2]);
            }

            if ($minunes == NULL)
                return $hour + $minunes / 60;
            else
                return $hour;

        }


        if (strpos($filterDate, "дн") != FALSE) {
            $minunes = null;
            $hour = null;

            $day = trim($filterDate[0] . $filterDate[1]);


            if (strpos($filterDate, 'час') != false) {
                $hour = trim($filterDate[strpos($filterDate, 'час') - 3] . $filterDate[strpos($filterDate, 'час') - 2]);

                if (strpos("мин", $filterDate) != FALSE) {
                    $minunes = trim($filterDate[strpos("мин", $filterDate) - 3] . $filterDate[strpos("мин", $filterDate) - 2]);
                }
            }


            if ($hour != null) {
                if ($minunes != null)
                    return $day * 24 + $hour + $minunes / 60;
                else
                    return $day * 24 + $hour;
            } else {
                return 24 * $day;
            }
        }


        if (strpos($filterDate, 'мин') != false) {
            return 0;
        }

        ////////////////////////////////////////////////////////////


        if ($flag == 1) {
//            $now = new \DateTime();
//            $mouth = [
//                'января' => 1,
//                'февраля'=>2,
//                'марта'=>3,
//                'апреля'=>4,
//                'мая'=>5,
//                'июня'=>6,
//                'июля'=>7,
//                'августа'=>8,
//                'сентября'=>9,
//                'октября'=>10,
//                'ноября'=>11,
//                'декабря' => 12
//            ];
//
//            $arr = explode('—', str_replace('Завершить','', str_replace('Начать','',$filterDate) ) );
//
//            $arr2 = explode(' ',trim(str_replace(',','',$arr[0])));
//
//            $idMouth = $mouth[$arr2[1]];

            //$now2 = new \DateTime("2021-{$idMouth}-{$arr[0]}");


//            if($idMouth / 10 >= 1)
//            {
//                if($arr2[0] / 10 >= 1)
//                    $str = ("2021-{$idMouth}-{$arr2[0]}");
//                else
//                    $str = ("2021-{$idMouth}-0{$arr2[0]}");
//            }
//            else
//            {
//                if($arr[0] / 10 >= 1)
//                    $str = ("2021-0{$idMouth}-{$arr2[0]}");
//                else
//                    $str = ("2021-0{$idMouth}-0{$arr2[0]}");
//            }
//            $n= new \DateTime($str);
//
//            $data = $now->diff($n);
//            print_r($arr2);
//            echo "<br>";
//            print_r($data);
            return 24;
        }


        if ($flag == 2) {
            $arr = explode(' ', trim($filterDate));

            $arr2 = explode('.', $arr[0]);

            $str = $arr2[2] . '-' . $arr2[1] . '-' . $arr2[0];
            $now = new \DateTime();
            $now2 = new \DateTime($str);

            $dayLater = $now->diff($now2)->days;
            $hourLater = $now->diff($now2)->h;
            $minLater = $now->diff($now2)->m;

            return $dayLater * 24 + $hourLater + $minLater / 60;
        }


        if ($flag == 3)
        {
            $now = new \DateTime();
            $now2 = new \DateTime($filterDate);

            $dayLater = $now->diff($now2)->days;
            $hourLater = $now->diff($now2)->h;
            $minLater = $now->diff($now2)->m;

            return $dayLater * 24 + $hourLater + $minLater / 60;



        }

        if($flag ==  4)
        {

            if (strpos($filterDate, "неделя") != FALSE)
            {
                $nedela = trim($filterDate[0] . $filterDate[1]);
                return $nedela*168;
            }

            if (strpos($filterDate, "месяц") != FALSE)
            {
                $mouth = trim($filterDate[0] . $filterDate[1]);
                return $mouth*4*168;
            }

        }
    }
}
