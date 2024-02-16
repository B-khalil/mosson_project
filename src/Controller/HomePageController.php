<?php

namespace App\Controller;

use App\Entity\MentorHasMembers;
use App\Entity\Users;
use App\Form\UserFormType;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomePageController extends AbstractController
{
    #[Route('/home/page', name: 'app_home_page')]
    public function index(EntityManagerInterface $manager, Request $request, UsersRepository $userRepository): Response
    {
        // $user = $userRepository->find(1);
        // foreach($user->getMentors() as $member) {
        //     dump($member);
        // }
        // die;

        $user = new Users();
        $form = $this->createForm(UserFormType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $mentor = $form->get('mentors')->getData();
            // $member = $form->get('members')->getData();
            $mentorHasMembers = new MentorHasMembers();
            $mentorHasMembers->setMentor($mentor);
            $mentorHasMembers->setMember($user);
            // $user->addMentor($mentorHasMembers);
            // $user->addMember($mentorHasMembers);
            $user->addMentor($mentorHasMembers);
            $manager->persist($user);
            $manager->persist($mentorHasMembers);
            dump($mentor);
// dump($member);
dump($mentorHasMembers);
// dd($user);
            $manager->flush();

            return $this->redirectToRoute('app_home_page');
        }
        // $user->setName('Verlant');
        // $manager->persist($user);
        // $manager->flush();


        return $this->render('home_page/index.html.twig', [
            'controller_name' => 'HomePageController',
            'form' => $form,
        ]);
    }
}
