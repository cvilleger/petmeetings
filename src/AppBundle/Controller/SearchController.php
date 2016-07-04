<?php

namespace AppBundle\Controller;

use AppBundle\Form\AdvancedSearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller
{
    public function searchAction(Request $request)
    {
        $param = $request->get('search');

        $em = $this->getDoctrine()->getManager();
        $listUsers = $em->getRepository('UserBundle:User')->findUsersByOneParameter($param);

        return $this->render('AppBundle:Search:result.html.twig', array(
            'listUsers' => $listUsers
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function advancedSearchAction(Request $request)
    {
        $form = $this->createForm(AdvancedSearchType::class);

        $form->handleRequest($request);
        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $data = $form->getData();
                // On supprime toutes les données nulles
                foreach($data as $key => $formValue) {
                    if($key == 'animal') {
                        foreach($formValue as $keyAnimal => $valueAnimal) {
                            // La clé animal est un tableau de tableau
                            if (is_array($valueAnimal)) {
                                // On injecte chaque valeur non vide dans un tableau
                                $list = array();
                                foreach ($valueAnimal as $v) {
                                    $list[] = $v;
                                }
                                // On met le tableau dans une chaine de caractère qu'on rajoute à nos données
                                if (count($list) > 0)
                                    $listData['animal'][$keyAnimal] = implode(',', $list);
                                continue 2;
                            }
                            if (!empty($valueAnimal))
                                $listData['animal'][$keyAnimal] = $valueAnimal;
                        }
                    }
                    else if($key == 'between') {
                        foreach($formValue as $keyBetween => $valueBetween) {
                            // La clé between est un tableau de tableau
                            // Chaque valeur est un tableau
                            $list = array();
                            foreach ($valueBetween as $v) {
                                $list[] = $v;
                            }
                            // On met le tableau dans une chaine de caractère qu'on rajoute à nos données
                            if (count($list) > 0)
                                $listData['between'][$keyBetween] = implode(',', $list);
                            continue 2;
                        }
                    }

                    if(is_array($formValue)) {
                        // On injecte chaque valeur non vide dans un tableau
                        $list = array();
                        foreach ($formValue as $value) {
                            $list[] = $value;
                        }
                        // On met le tableau dans une chaine de caractère qu'on rajoute à nos données
                        if(count($list) > 0)
                            $listData[$key] = implode(',', $list);
                        continue;
                    }
                    if(!empty($formValue))
                        $listData[$key] = $formValue;
                }

                $em = $this->getDoctrine()->getManager();
                $listUsers = $em->getRepository('UserBundle:User')->findUsersByParameters($listData);

                return $this->render('AppBundle:Search:result.html.twig', array(
                    'listUsers' => $listUsers
                ));
            }
        }

        return $this->render('AppBundle:Search:advancedSearch.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
