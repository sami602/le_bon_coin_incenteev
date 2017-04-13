<?php

namespace AppBundle\Controller;
use AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CategoryController extends Controller
{
    /**
     * Finds and displays a category entity.
     *
     */
    public function showAction(Category $category)
    {

        return $this->render('/category/show.html.twig', array(
            'category' => $category,
        ));
    }

}
