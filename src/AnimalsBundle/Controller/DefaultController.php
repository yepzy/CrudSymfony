<?php

namespace AnimalsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$animalsTab = array(array('name' => 'toto','type' => 'je suis un reptile et mes écailles sont bleus', 'colorBG' => '#26a69a'),
    		array('name' => 'tata','type' => 'je suis un mamifère et ma fourrure est verte', 'colorBG' => '#5c6bc0'),
    		array('name' => 'tutu','type' => 'je suis un oiseau et mon plumage est rouge', 'colorBG' => '#e57373'));

        return $this->render('AnimalsBundle:Default:index.html.twig',array('animalsTab' => $animalsTab));
    }

    public function addAction()
    {
    	return $this->render('AnimalsBundle:Default:form.html.twig');
    }

    public function editAction()
    {

    }

    public function deleteAction()
    {

    }
}
