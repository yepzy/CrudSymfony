<?php

namespace AnimalsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AnimalsBundle\Entity\Animal;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefaultController extends Controller
{
	/**
	*   Fonction pour l'affichage de la liste des animaux
	*
	*/
	public function indexAction($id =  null)
	{
		$oiseauBG = '#e57373';
		$reptileBG = '#26a69a';
		$mammifereBG = '#5c6bc0';

		$animalsTab = array();

		$repository = $this->getDoctrine()->getManager()->getRepository('AnimalsBundle:Animal');
		$listAnimals = $repository->findAll();

		if(!empty($listAnimals))
		{
			foreach ($listAnimals as $animal) 
			{
				$arrayData = array();
				$arrayData = array(
					'name' => $animal->getName()
					);
							// 0 : Reptile | 1 : Oiseau | 2 : Mammifère
				switch ($animal->getType()) {
					case 0:
					array_push($arrayData['description'],$animal->getReptile()->hiss());
					array_push($arrayData['colorBG'], $reptileBG);
					break;
					case 1:
					array_push($arrayData['description'],$animal->getOiseau()->tweet());
					array_push($arrayData['colorBG'], $oiseauBG);
					break;
					case 2:
					array_push($arrayData['description'],$animal->getMammifere->growl());
					array_push($arrayData['colorBG'], $mammifereBG);
					break;
				}
				array_push($animalsTab, $arrayData);

			}
		}

		return $this->render(
			'AnimalsBundle:Default:index.html.twig',
			array(
				'animalsTab' => $animalsTab,
				'urlAdd' =>$this->get('router')->generate('animals_add')
				)
			);
		$this->getFlashBag()->clear();
	}


	/**
	*   Fonction pour l'affichage du formulaire a complétéer pour l'jout d'un animal
	*
	*/
	public function addAction()
	{
		$request = Request::createFromGlobals();

		// retrieve GET variables
		$animalType = $request->query->get('typeAnimal');

		if(isset($animalType))
		{
			$animal = new Animal();
		    // On crée le FormBuilder grâce au service form factory
			$formBuilder = $this->get('form.factory')->createBuilder('form');

			$formBuilder->add('name', TextType::class,array('label' => 'Name '));
			switch ($animalType) {
				case 0:
				$formBuilder->add('scale', TextType::class,array('label' => 'Scales color '));
				$animalType = 'Reptile';
				break;
				case 1:
				$formBuilder->add('featherData', TextType::class,array('label' => 'Feathers color '));
				$animalType = 'Bird';
				break;
				case 2:
				$formBuilder->add('furData', TextType::class,array('label' => 'Fur color '));	
				$animalType = 'Mammal';				
				break;
			}

			$formBuilder->add('Add', SubmitType::class, array('label' => 'Add'));
			$form = $formBuilder->getForm();

			return $this->render('AnimalsBundle:Default:form.html.twig',array(
				'type' => $animalType,
				'url' => $this->get('router')->generate('animals_add'),
				'urlHome' => $this->get('router')->generate('animals_homepage'),
				'form' => $form->createView(),
				));
		}	else {
			return $this->render('AnimalsBundle:Default:choose.html.twig',array('url' => $this->get('router')->generate('animals_add')));
		}
	}

	/**
	*   Fonction pour l'affichage du formulaire remplie avec les données contenue et le modifier
	*
	*/
	public function editAction($id)
	{

		// query get animal informations

		return $this->render('AnimalsBundle:Default:form.html.twig',array('type' => 1,'data' => $animal));
	}

	/**
	*   Fonction pour supprimer l'animal
	*
	*/
	public function deleteAction($id)
	{
		$this->addFlash(
			'deleteMessage',
			('Animals './*$animal->getName().*/' has been deleted!')
			);

		return $this->redirectToRoute('animals_homepage');
	}
}
