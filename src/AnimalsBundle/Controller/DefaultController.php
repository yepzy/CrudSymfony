<?php

namespace AnimalsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
	/**
	*   Fonction pour l'affichage de la liste des animaux
	*
	*/
	public function indexAction($id =  null)
	{
		// Exemple pour remplir l'affichage -> à modifier
		// ColorBG faire une fonction qui associera la couleur en fonction du type d'animal
		$animalsTab = array(
			array(
				'id' => 5,
				'name' => 'Crocodile',
				'type' => 'je suis un reptile et mes écailles sont verte',
				'colorBG' => '#26a69a',
				'urlEdit' => $this->get('router')->generate('animals_edit',array('id' => 5)),
				'urlDelete' => $this->get('router')->generate('animals_delete',array('id' => 5))
				),
			array(
				'id' => 14,
				'name' => 'Baleine',
				'type' => 'je suis un mammifère et ma fourrure est bleu',
				'colorBG' => '#5c6bc0',
				'urlEdit' => $this->get('router')->generate('animals_edit',array('id' => 14)),
				'urlDelete' => $this->get('router')->generate('animals_delete',array('id' => 14))
				),
			array(
				'id' => 22,
				'name' => 'Perroquet',
				'type' => 'je suis un oiseau et mon plumage est rouge',
				'colorBG' => '#e57373',
				'urlEdit' => $this->get('router')->generate('animals_edit',array('id' => 22)),
				'urlDelete' => $this->get('router')->generate('animals_delete',array('id' => 22))
				)
			);

			return $this->render(
				'AnimalsBundle:Default:index.html.twig',
				array(
					'animalsTab' => $animalsTab,
					'urlAdd' =>$this->get('router')->generate('animals_add')
					)
				);
		}


	/**
	*   Fonction pour l'affichage du formulaire a complétéer pour l'jout d'un animal
	*
	*/
	public function addAction()
	{
		return $this->render('AnimalsBundle:Default:form.html.twig');
	}

	/**
	*   Fonction pour l'affichage du formulaire remplie avec les données contenue et le modifier
	*
	*/
	public function editAction($id)
	{

	}

	/**
	*   Fonction pour supprimer l'animal
	*
	*/
	public function deleteAction($id)
	{

	}
}
