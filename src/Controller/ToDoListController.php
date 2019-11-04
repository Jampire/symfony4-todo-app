<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ToDoListController extends AbstractController
{
    /**
     * @Route("/", name="to_do_list")
     */
    public function index(): Response
    {
        return $this->render('to_do_list/index.html.twig');
    }

    /**
     * @Route("/create", name="create_task", methods={"POST"})
     */
    public function create(): Response
    {
        return $this->json('create');
    }

    /**
     * @Route("/update/{id}", name="update_task", requirements={"id": "\d+"})
     */
    public function update(int $id): Response
    {
        return $this->json('update ' . $id);
    }

    /**
     * @Route("/delete/{id}", name="delete_task", requirements={"id": "\d+"})
     */
    public function delete(int $id): Response
    {
        return $this->json('delete ' . $id);
    }
}
