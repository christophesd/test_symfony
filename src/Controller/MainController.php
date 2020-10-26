<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(ProductRepository $productRepo): Response
    {
        $products = $productRepo->findAll();

        return $this->render('main/index.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * @Route("/{slug}/{id}", name="product")
     */
    public function showProduct(Product $product, string $slug): Response
    {
        if ($product->getSlug() !== $slug)
        {
            return $this->redirectToRoute('product', [
                'id' => $product->getId(),
                'slug' => $product->getSlug()
            ]);
        }
        return $this->render('main/product.html.twig', [
            'product' => $product
        ]);
    }
}
