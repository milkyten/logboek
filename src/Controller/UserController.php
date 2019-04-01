<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(): Response
    {
        if($this->security->isGranted('ROLE_ADMIN')){

            $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();
        } else{
            $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findBy(["id" => $this->getUser()->getId()]);
        }

        return $this->render('user/index.html.twig', [
            'users' => $users,
        ]);
    }

    /**
     * @Route("/new", name="user_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        if (!$this->security->isGranted('ROLE_ADMIN  ')){
            return $this->render('denied');
        }

        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_index', [
                'id' => $user->getId(),
            ]);
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index');
    }






    /**
 * @Route("/{id}/driver", name="driver_action", methods="GET|POST")
 */
public function driverAction($id)
{
    if ($this->security->isGranted('ROLE_ADMIN')) {
        //Get the enity manager
        $em = $this->getDoctrine()->getManager();
        //Get the user with name admin
        $user = $em->getRepository("App:User")->find($id);
        if ($user) {
            if (in_array("ROLE_DRIVER", $user->getRoles())) {
                $user->removeRole("ROLE_DRIVER");
            } else {
                //Set the admin role
                $user->addRole("ROLE_DRIVER");
                //$user->removeRole("ROLE_USER");
            }
            //Save it to the database
            $em->persist($user);
            $em->flush();
        }
        $users = $em->getRepository('App:User')->findAll();

        return $this->render('user/index.html.twig', [
            'users' => $users,
        ]);
    } else {
        return $this->render('message/noAccess.html.twig');
    }
}
}








