<?php

namespace App\Controller;

use App\Entity\UserForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ContactFormController extends AbstractController
{
    /**
     * @Route("/api/contact-form", name="contact_form_submit", methods={"POST"})
     */
    public function submitForm(Request $request, ValidatorInterface $validator, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $entry = new UserForm();
        $entry->setName($data['name']);
        $entry->setSurname($data['surname']);
        $entry->setEmail($data['email']);
        $entry->setMessage($data['message']);

        $errors = $validator->validate($entry);

        if (count($errors) > 0) {
            $errorMessages = [];
            foreach ($errors as $error) {
                $propertyPath = $error->getPropertyPath();
                $errorMessage = sprintf('%s: %s', $propertyPath, $error->getMessage());
                $errorMessages[] = $errorMessage;
            }

            return new JsonResponse(['errors' => $errorMessages], 400);
        }

        $entityManager->persist($entry);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Saved new entry with id '.$entry->getId()]);
    }
}