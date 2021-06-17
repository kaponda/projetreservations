<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
		        $users = [
 ['login'=> 'dan','password'=>'1111','firstname'=>'daniel','lastname'=>'kabo','email'=>' ','langue'=>'fr','created_at'=>' ','updated_at'=>' ','email_verified_at'=>' ','remember_token'=>' '],
 ['login'=> 'jul','password'=>'2222','firstname'=>'julien','lastname'=>'marco','email'=>' ','langue'=>'an','created_at'=>' ','updated_at'=>' ','email_verified_at'=>' ','remember_token'=>' '],          
 ['login'=> 'stef','password'=>'3333','firstname'=>'stephane','lastname'=>'capone','email'=>' ','langue'=>'an','created_at'=>' ','updated_at'=>' ','email_verified_at'=>' ','remember_token'=>' '],       
 ['login'=> 'pie','password'=>'4444','firstname'=>'pierre','lastname'=>'michel','email'=>' ','langue'=>'bl','created_at'=>' ','updated_at'=>' ','email_verified_at'=>' ','remember_token'=>' '],		
 ['login'=> 'ala','password'=>'5555','firstname'=>'alain','lastname'=>'wetu','email'=>' ','langue'=>'es','created_at'=>' ','updated_at'=>' ','email_verified_at'=>' ','remember_token'=>' '],		
 ['login'=> 'sop','password'=>'6666','firstname'=>'sophie','lastname'=>'garbot','email'=>' ','langue'=>'po','created_at'=>' ','updated_at'=>' ','email_verified_at'=>' ','remember_token'=>' '],	
		];
        
        foreach ($users as $record) {
            $user = new User();
			$user->setLogin($record['login']);
			$user->setPassword($record['password']);
            $user->setFirstname($record['firstname']);
            $user->setLastname($record['lastname']);
			$user->setEmail($record['email']);
			$user->setLangue($record['langue']);
            $user->setCreatedAt($record['created_at']);
            $user->setUpdatedAt($record['updated_at']);
			$user->setEmailVerifedAt($record['email_verified_at']);
			$user->setRememberToken($record['remember_token']);
            
			
            $manager->persist($user);
			$this->addReference(
                    $record['firstname']."-".$record['lastname'],
                    $user
            );

        }


        $manager->flush();
    }
}
