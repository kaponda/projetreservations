<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
class UserRolesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $userRoles = [
            [
                'user_firstname'=>'daniel',
                'user_lastname'=>'kabo',
                'role'=>'admin',
            ],
            [
                'user_firstname'=>'julien',
                'user_lastname'=>'marco',
                'role'=>'member',
            ],
            [
                'user_firstname'=>'stephane',
                'user_lastname'=>'capone',
                'role'=>'affiliate',
            ],
            [
                'user_firstname'=>'pierre',
                'user_lastname'=>'michel',
                'role'=>'admin',
            ],
            [
                'user_firstname'=>'alain',
                'user_lastname'=>'wetu',
                'role'=>'member',
            ],
            [
                'user_firstname'=>'sophie',
                'user_lastname'=>'garbot',
                'role'=>'affiliate',
            ],
            [
                'user_firstname'=>'daniel',
                'user_lastname'=>'kabo',
                'role'=>'member',
            ],
			[
                'user_firstname'=>'julien',
                'user_lastname'=>'marco',
                'role'=>'admin',
            ],
            [
                'user_firstname'=>'stephane',
                'user_lastname'=>'capone',
                'role'=>'affiliate',
            ],
                ];
        
        foreach ($userRoles as $record) {
            //Récupérer l'artiste (entité principale)
            $user = $this->getReference(
                $record['user_firstname'].'-'.$record['user_lastname']
            );
            
            //Récupérer le type (entité secondaire)
            $role = $this->getReference($record['role']);
            
            //Définir son type
            $user->addRole($role);
            
            //Persister l'entité principale
            $manager->persist($user);            
        }

        $manager->flush();
    }
	    public function getDependencies() {
        return [
            UserFixtures::class,
            RolesFixtures::class,
        ];
    }

}
