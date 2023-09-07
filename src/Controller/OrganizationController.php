<?php

namespace App\Controller;

use App\Entity\Organization;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrganizationController extends AbstractController
{
    #[Route('/organizations', name: 'organizations')]
    public function index(): Response
    {
        return $this->render('organization/index.html.twig', [
            'controller_name' => 'OrganizationController',
        ]);
    }

    #[Route('/organizations/{url}', name: 'organizations_show')]
    public function show($url, EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Organization::class);
        /**@var \App\Entity\Organization|null $organization */
        $organization = $repository->findOneBy(['url' => $url]);
        if (!$organization) {
            throw $this->createNotFoundException(sprintf('Организация не найдена по этому url "%s"', $url));
        }
        return $this->render("organization/show.html.twig", [
            'organization' => $organization
        ]);
    }

    #[Route('/organizations/new', name: 'organizations_new')]
    public function new(EntityManagerInterface $em)
    {
        $organization = new Organization();
        $organization->setName("Marty's home")
            ->setEmail('marty@gmail.com')
            ->setUrl('martys')
            ->setPhone('77778888')
            ->setAddress('lucky street 17');
        $em->persist($organization);
        $em->flush();

    }
}
