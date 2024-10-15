<?php

namespace App\Model;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserModel
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function create($name, $cpf)
    {
        try {
            $user = new User();

            $user->setName($name);
            $user->setCpf($cpf);

            $this->entityManager->persist($user);
            $this->entityManager->flush();

            return true;
        } catch (\Exception $e) {
            echo $e;
            return false;
        }
    }

    public function getTotalUsers()
    {
        try {
            return $this->entityManager->getRepository(User::class)->count([]);
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function fetchAll($offset, $limit)
    {
        try {
            return $this->entityManager->getRepository(User::class)->findBy([], null, $limit, $offset);
        } catch (\Exception $e) {
            return [];
        }
    }

    public function fetch($id)
    {
        try {
            return $this->entityManager->find(User::class, $id);
        } catch (\Exception $e) {
            echo $e;
            return false;
        }
    }

    public function fetchByCpf($cpf)
    {
        try {
            return $this->entityManager->getRepository(User::class)->findBy(['cpf'=>$cpf]);
        } catch (\Exception $e) {
            echo $e;
            return false;
        }
    }

    public function search($name)
    {

        $users = [];

        try {

            $fetchedUsers = $this->entityManager->createQueryBuilder()
            ->select('u')                      
            ->from(User::class, 'u')           
            ->where('u.name LIKE :name')  
            ->setParameter('name', '%' . $name . '%') 
            ->getQuery()
            ->getResult(); 

            foreach ($fetchedUsers as $user) {

                $users[] = [
                    'id' => $user->getId(),
                    'name' => $user->getName(), 
                    'cpf' => $user->getCpf()
                ];
            }

            return $users;

        } 
        catch (\Exception $e) {
            return $users;
        }
    }

    public function update($id, $name)
    {
        try {
            $user = $this->entityManager->find(User::class, $id);
            if (!$user) {
                return false;
            }

            $user->setName($name);
            
            $this->entityManager->flush();

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $user = $this->entityManager->find(User::class, $id);
            if (!$user) {
                return false;
            }

            $this->entityManager->remove($user);
            $this->entityManager->flush();
            
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
