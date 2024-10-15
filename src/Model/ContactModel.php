<?php

namespace App\Model;

use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\User;

class ContactModel
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function create($type, $desc, $owner)
    {
        try {
            $contact = new Contact();

            $contact->setType($type);
            $contact->setDescription($desc);

            $owner = $this->entityManager->find(User::class, $owner->getId());
            $contact->setOwner($owner);

            $this->entityManager->persist($contact);
            $this->entityManager->flush();

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getTotalContacts()
    {
        try {
            return $this->entityManager->getRepository(Contact::class)->count([]);
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function fetchAll($offset, $limit)
    {
        try {
            return $this->entityManager->getRepository(Contact::class)->findBy([], null, $limit, $offset);
        } catch (\Exception $e) {
            return [];
        }
    }

    public function fetchByUser($id, $offset, $limit)
    {
        try {
            return $this->entityManager->getRepository(Contact::class)->findBy(['owner' => $id], null, $limit, $offset);
        } catch (\Exception $e) {
            return [];
        }
    }

    public function fetch($id)
    {
        try {
            return $this->entityManager->getRepository(Contact::class)->find($id[0]);
        } catch (\Exception $e) {
            echo $e;
            return false;
        }
    }

    public function update($id, $type, $desc)
    {
        try {


            echo json_encode(['a'=>var_dump($id)]);
          
            $contact = $this->entityManager->getRepository(Contact::class)->findOneBy(['id' => $id]);

            if (!$contact) return false;


            $contact->setType($type);
            $contact->setDescription($desc);

            $this->entityManager->flush();

            return true;
        } catch (\Exception $e) {
            echo json_encode(['a'=>$e]);

            return false;
        }
    }

    public function delete($id)
    {
        try {

            return $this->entityManager->createQueryBuilder()
            ->delete(Contact::class, 'c')        
            ->where('c.id = :id')            
            ->setParameter('id', $id)        
            ->getQuery()
            ->execute();                      

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
