<?php

namespace App\Controller;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
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
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $title = trim($request->request->get('title'));
        if (empty($title)) {
            return $this->redirectToRoute('to_do_list');
        }

        $em = $this->getDoctrine()->getManager();
        $task = new Task();
        $task->setTitle($title);
        $em->persist($task);
        $em->flush();

        return $this->redirectToRoute('to_do_list');
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
