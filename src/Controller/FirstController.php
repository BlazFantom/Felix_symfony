<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends AbstractController
{
    #[Route('/first', name: 'first')]
    public function testFunc(): Response
    {
        $arr = $this->array_fill_rand(15);
        return $this->render('first.html.twig', [
            'arr' => $arr
        ]);
    }

    function array_fill_rand($limit, $min = false, $max = false)
    {
        $limit = (int)$limit;
        $array = array();

        if ($min !== false && $max !== false) {
            $min = (int)$min;
            $max = (int)$max;
            for ($i = 0; $i < $limit; $i++) {
                $array[$i] = rand($min, $max);
            }
        } else {
            for ($i = 0; $i < $limit; $i++) {
                $array[$i] = rand();
            }
        }

        return $array;
    }
}
