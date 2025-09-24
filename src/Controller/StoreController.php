<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StoreController extends AbstractController
{
    #[Route('/', name: 'store_home')]
    public function index(): Response
    {
        return $this->render('store/index.html.twig', [
            'title' => 'VeraBelle Collection',
        ]);
    }

    #[Route('/shop', name: 'store_shop')]
    public function shop(): Response
    {
        return $this->render('store/shop.html.twig', [
            'title' => 'Shop Collection',
        ]);
    }

    #[Route('/contact', name: 'store_contact')]
    public function contact(): Response
    {
        return $this->render('store/contact.html.twig', [
            'title' => 'Contact Us',
        ]);
    }
}
