<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\RepresentationUser;
use App\DataFixtures\RepresentationFixtures;
use App\DataFixtures\UserFixtures;

class RepresentationsUserFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
     $representationUser = [
            [
                'user_firstname'=>'daniel',
                'user_lastname'=>'kabo',
                'titre'=>'ayiti',
				'date'=>'2012-10-12 13:30',
				'places'=>'2',
            ],
            [
                'user_firstname'=>'julien',
                'user_lastname'=>'marco',
                'titre'=>'ayiti',
				'date'=>'2012-10-12 20:30',
				'places'=>'4',
            ],
            [
                'user_firstname'=>'stephane',
                'user_lastname'=>'capone',
                'titre'=>'cible-mouvante',
				'date'=>'2012-10-02 20:30',
				'places'=>'6',
            ],
            [
                'user_firstname'=>'alain',
                'user_lastname'=>'wetu',
                'titre'=>'ceci-n-est-pas-un-chanteur-belge',
				'date'=>'2012-10-16 20:30',
				'places'=>'8',
            ],
			        ];
				foreach ($representationUser as $record) {
					     $representationUser = new RepresentationUser();
						 //Assigner la référence du user correspondant
                        $representationUser->setUser($this->getReference(
                        $record['user_firstname'].'-'.$record['user_lastname']));
                        //Assigner la référence de la représentation correspondante
                        $representationUser->setRepresentation($this->getReference($record['titre'].'-'.$record['date']));
                        $representationUser->setPlaces($record['places']);

                       //Persister l'entité principale
                        $manager->persist($representationUser);        
  				
                       }	
        $manager->flush();
    }
		    public function getDependencies() {
        return [
            RepresentationFixtures::class,
            UserFixtures::class,
        ];
    }
}
