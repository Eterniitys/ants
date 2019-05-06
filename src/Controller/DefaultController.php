<?php

namespace App\Controller;

use App\Entity\BreedingSheet;
use App\Entity\Gender;
use App\Entity\Species;
use App\Form\BreedingType;
use App\Form\NewGenderType;
use App\Form\NewSpeciesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        $allGender = $this->getDoctrine()->getRepository(Gender::class)->findAll();
        $genders = $this->getDoctrine()->getRepository(Gender::class)->findThreeShuffled();
        return $this->render('default/index.html.twig', [
            'allGender' => $allGender,
            'genders' => $genders]
        );
    }

    /**
     * @Route("/fourmis/{name}", name="gender")
     */
    public function gender($name="")
    {
        $allGender = $this->getDoctrine()->getRepository(Gender::class)->findAll();
        $gender = $this->getDoctrine()->getRepository(Gender::class)->findOneBy(array('name' => $name));
        if ($gender != null){
            return $this->render('default/gender.html.twig', [
                'allGender' => $allGender,
                'gender' => $gender
            ]);
        }
        return $this->redirectToRoute("default");
    }

    /**
     * @Route("/fourmis/{gender}/{specie}", name="species")
     */
    public function species($gender="", $specie="", Request $request)
    {
        $allGender = $this->getDoctrine()->getRepository(Gender::class)->findAll();
        $gender = $this->getDoctrine()->getRepository(Gender::class)->findOneBy(array('name' => $gender));
        $specie = $this->getDoctrine()->getRepository(Species::class)->findOneBy(array('name' => $specie));

        if ($gender != null && $specie !=null){
            $gender->getSpecies();

            $breedingSheet= new BreedingSheet("", $specie ,$this->getUser(),"");

            //$gender->setDueDate(new \DateTime('tomorrow'));

            $form = $this->createForm(BreedingType::class, $breedingSheet);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($breedingSheet);
                $em->flush();
            }

            return $this->render('default/species.html.twig', [
                'allGender' => $allGender,
                'specie' => $specie,
                'breedSheet' => $breedingSheet,
                'form' => $form->createView(),
            ]);
        }
        return $this->redirectToRoute("default");
    }

    /**
     * @Route("/What's_a_ant", name="WhatSaAnt")
     */
    public function whatSaAnt()
    {
        $allGender = $this->getDoctrine()->getRepository(Gender::class)->findAll();
        return $this->render('default/whatsaant.twig', [
            'allGender' => $allGender,
        ]);
    }

    /**
     * @Route("/new_gender", name="newGender")
     */
    public function newGender(Request $request)
    {
        $allGender = $this->getDoctrine()->getRepository(Gender::class)->findAll();

        $gender= new Gender("","");

        //$gender->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createForm(NewGenderType::class, $gender);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gender);
            $em->flush();

            return $this->redirect('/fourmis/'.$gender->getName());
        }

        return $this->render('default/newGender.html.twig', [
            'allGender' => $allGender,
            'gender' => $gender,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/new_specie", name="newSpecie")
     */
    public function newSpecie(Request $request)
    {
        $allGender = $this->getDoctrine()->getRepository(Gender::class)->findAll();

        $specie= new Species("",0,0,0,0,2,2,2,"","","");

        //$gender->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createForm(NewSpeciesType::class, $specie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($specie);
            $em->flush();

            return $this->redirect('/fourmis/'.$specie->getGender()."/".$specie->getName());
        }

        return $this->render('default/newGender.html.twig', [
            'allGender' => $allGender,
            'specie' => $specie,
            'form' => $form->createView(),
        ]);
    }

}
