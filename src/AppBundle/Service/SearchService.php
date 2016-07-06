<?php
namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;
use UserBundle\Entity\User;

class SearchService{
    /**
     * @var EntityManager
     */
    protected $em;
    /**
     * @var \Doctrine\ORM\EntityRepository
     */
    protected $userRepository;

    /**
     * @param EntityManager $entityManager
     */
    function __construct(EntityManager $entityManager){
        $this->em = $entityManager;
        $this->userRepository = $this->em->getRepository('UserBundle:User');
    }

    /**
     * Simple search
     * Search a user by only one parameter
     * @param User $user
     */
    public function findUsersByOneParameter($data)
    {
        $query = $this->em->createQueryBuilder()
            ->select('u')
            ->from('UserBundle:User', 'u')
            ->leftJoin('u.animal', 'a')
            ->where('u.username = :value')
            ->orWhere('u.firstname = :value')
            ->orWhere('u.lastname = :value')
            ->orWhere('u.email = :value')
            ->orWhere('u.gender = :value')
            ->orWhere('a.kind = :value')
            ->orWhere('a.race = :value')
            ->orWhere('a.canonicalName = :value')
            ->setParameter('value', $data);

        return $query->getQuery()->getResult();
    }

    /**
     * Simple search
     * Search a user by only one parameter
     * @param User $user
     */
    public function removeCurrentUser($user, $listUsers)
    {
        if(in_array($user, $listUsers))
            unset($listUsers[array_search($user, $listUsers)]);

        return $listUsers;
    }


    /**
     * Advanced search
     * Search a user by few parameters from a form
     * @param User $user
     */
    public function findUsersByParameters($data)
    {
        $i = 0;

        $query = $this->em->createQueryBuilder()
            ->select('u')
            ->from('UserBundle:User', 'u')
            ->leftJoin('u.animal', 'a');
        foreach($data as $key => $value) {
            $i++;
            if($key == 'animal') {
                foreach($value as $keyAnimal => $valueAnimal) {
                    if($i > 1)
                        $query->where('a.' .$keyAnimal. ' = :value');
                    else
                        $query->andWhere('a.' .$keyAnimal. ' = :value');
                    $query->setParameter('value', $valueAnimal);
                }
            }
            else if($key == 'between') {
                foreach($value as $keyBetween => $valueBetween) {
                    $valueBetween = explode(',', $valueBetween);
                    if($i > 1)
                        $query->where('u.' .$keyBetween. ' between :valueMin and :valueMax');
                    else
                        $query->andWhere('u.' .$keyBetween. ' between :valueMin and :valueMax');
                    $query->setParameters(array('valueMin'=>$valueBetween[0],'valueMax'=>$valueBetween[1]));
                }
            }
            else {
                if($i > 1)
                    $query->where('u.' .$key. ' = :value');
                else
                    $query->andWhere('u.' .$key. ' = :value');
                $query->setParameter('value', $value);
            }
        }
        return $query->getQuery()->getResult();
    }


    /**
     * Clean array
     * Clean array form search form
     * @param User $user
     */
    public function cleanArray($data)
    {
        $listData = array();

        foreach($data as $key => $formValue) {
            if($key == 'animal') {
                foreach($formValue as $keyAnimal => $valueAnimal) {
                    // Key animal is an array of array
                    if (is_array($valueAnimal)) {
                        $list = array();
                        foreach ($valueAnimal as $value) {
                            if(!empty($value))
                                $list[] = $value;
                        }
                        if (count($list) > 0)
                            $listData['animal'][$keyAnimal] = implode(',', $list);
                    }
                    continue;
                }
            }
            else if($key == 'between') {
                foreach($formValue as $keyBetween => $valueBetween) {
                    // Key between is an array of array
                    $list = array();
                    foreach ($valueBetween as $v) {
                        if(!empty($value))
                            $list[] = $value;
                    }
                    if (count($list) > 0)
                        $listData['between'][$keyBetween] = implode(',', $list);
                }
                continue;
            }
            else if(is_array($formValue)) {
                $list = array();
                foreach ($formValue as $v) {
                    if(!empty($value))
                        $list[] = $value;
                }
                if(count($list) > 0)
                    $listData[$key] = implode(',', $list);
                continue;
            }
            else if(!empty($formValue))
                $listData[$key] = $formValue;
        }
        return $listData;
    }
}