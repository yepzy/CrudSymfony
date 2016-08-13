<?php

namespace AnimalsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AnimalsBundle\Entity\Animal;
use AnimalsBundle\Entity\Reptile;
use AnimalsBundle\Entity\Oiseau;
use AnimalsBundle\Entity\Mammifere;
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
				$arrayData = array(
					'name' => $animal->getName(),
					'urlEdit' => $this->generateUrl('animals_edit',array('id' => $animal->getId())),
					'urlDelete' => $this->generateUrl('animals_delete',array('id' => $animal->getId()))
					);
							// 0 : Reptile | 1 : Oiseau | 2 : Mammifère
				switch ($animal->getType()) {
					case 0:
					$arrayData['description'] = $animal->getReptile()->hiss($animal->getName());
					$arrayData['colorBG']=$reptileBG;
					break;
					case 1:
					$arrayData['description']=$animal->getOiseau()->tweet($animal->getName());
					$arrayData['colorBG']=$oiseauBG;
					break;
					case 2:
					$arrayData['description']=$animal->getMammifere()->growl($animal->getName());
					$arrayData['colorBG']=$mammifereBG;
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
		    // On crée le FormBuilder grâce au service form factory
			$formBuilder = $this->get('form.factory')->createBuilder('form');

			$formBuilder->add('name', TextType::class,array('label' => 'Name '));
			switch ($animalType) {
				case 0:
				$formBuilder->add('scaleData', TextType::class,array('label' => 'Scales color '));
				$animalTypeName = 'Reptile';
				break;
				case 1:
				$formBuilder->add('featherData', TextType::class,array('label' => 'Feathers color '));
				$animalTypeName = 'Bird';
				break;
				case 2:
				$formBuilder->add('furData', TextType::class,array('label' => 'Fur color '));	
				$animalTypeName = 'Mammal';			
				break;
			}

			$formBuilder->add('Add', SubmitType::class, array('label' => 'Add'));
			$form = $formBuilder->getForm();

			
			$form->handleRequest($request);

    		// On vérifie que les valeurs entrées sont correctes
    		// (Nous verrons la validation des objets en détail dans le prochain chapitre)
			if ($form->isValid()) {
				$data = $form->getData();
				$animal = new Animal();

				$animal->setName($data['name']);
				$animal->setType($animalType);
				switch ($animalType) {
					case 0:
					$reptile = new Reptile();
					$reptile->setScale($data['scaleData']);
					$animal->setReptile($reptile);
					break;
					case 1:
					$oiseau = new Oiseau();
					$oiseau->setFeather($data['featherData']);
					$animal->setOiseau($oiseau);
					break;
					case 2:	
					$mammifere = new Mammifere();
					$mammifere->setFur($data['furData']);
					$animal->setMammifere($mammifere);
					break;
				}

				$em = $this->getDoctrine()->getManager();
				$em->persist($animal);
				$em->flush();

				$this->addFlash('successMessage', $animal->getName().' has been add !');
				return $this->redirectToRoute('animals_homepage');
			}

			return $this->render('AnimalsBundle:Default:form.html.twig',array(
				'type' => $animalTypeName,
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

		$em = $this->getDoctrine()->getManager();
		$animal = $em->getRepository('AnimalsBundle:Animal')->find($id);

		$animalType = $animal->getType();

		$request = Request::createFromGlobals();

		    // On crée le FormBuilder grâce au service form factory
		$formBuilder = $this->get('form.factory')->createBuilder('form');

		$formBuilder->add('name', TextType::class,array('label' => 'Name ','data' => $animal->getName()));
		switch ($animal->getType()) {
			case 0:
				$formBuilder->add(
					'scaleData',
					TextType::class,
					array(
						'label' => 'Scales color ',
						'data' => $animal->getReptile()->getScale()
						)
					);
				$animalTypeName = 'Reptile';
				break;
			case 1:
				$formBuilder->add(
					'featherData',
					TextType::class,
					array(
						'label' => 'Feathers color ',
						'data' => $animal->getOiseau()->getFeather()
						)
					);
				$animalTypeName = 'Bird';
				break;
			case 2:
				$formBuilder->add(
					'furData',
					TextType::class,
					array(
						'label' => 'Fur color ',
						'data' => $animal->getMammifere()->getFur()
						)
					);	
				$animalTypeName = 'Mammal';			
				break;
		}

		$formBuilder->add('Add', SubmitType::class, array('label' => 'Modify'));
		$form = $formBuilder->getForm();


		$form->handleRequest($request);

    		// On vérifie que les valeurs entrées sont correctes
    		// (Nous verrons la validation des objets en détail dans le prochain chapitre)
		if ($form->isValid()) {
			$data = $form->getData();

			$animal->setName($data['name']);
			$animal->setType($animalType);
			switch ($animalType) {
				case 0:
				$reptile = new Reptile();
				$reptile->setScale($data['scaleData']);
				$animal->setReptile($reptile);
				break;
				case 1:
				$oiseau = new Oiseau();
				$oiseau->setFeather($data['featherData']);
				$animal->setOiseau($oiseau);
				break;
				case 2:	
				$mammifere = new Mammifere();
				$mammifere->setFur($data['furData']);
				$animal->setMammifere($mammifere);
				break;
			}
			$em->flush();

			$this->addFlash('successMessage', $animal->getName().' has been modify !');
			return $this->redirectToRoute('animals_homepage');
		}

		return $this->render('AnimalsBundle:Default:form.html.twig',array(
			'type' => $animalTypeName,
			'url' => $this->get('router')->generate('animals_edit',array('id' => $id)),
			'urlHome' => $this->get('router')->generate('animals_homepage'),
			'form' => $form->createView(),
			));

		return $this->render('AnimalsBundle:Default:form.html.twig',array('type' => 1,'form' => $data));
	}

	/**
	*   Fonction pour supprimer l'animal
	*
	*/
	public function deleteAction($id)
	{

		$repository = $this->getDoctrine()->getRepository('AnimalsBundle:Animal');
		$animal= $repository->find($id);
		$em = $this->getDoctrine()->getManager();
		$em->remove($animal);
		$em->flush();

		$this->addFlash(
			'successMessage',
			('Animals '.$animal->getName().' has been deleted !')
			);

		return $this->redirectToRoute('animals_homepage');
	}
}
