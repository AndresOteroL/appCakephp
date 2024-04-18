<?php
declare(strict_types=1);

use Migrations\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;

// en este cas se utilizo la libreria de FakerPHP/Faker que es la que actualmente tiene respaldo y se esta actualizando

class CreateAdminSeedMigration extends AbstractMigration
{
   public function up()
   {
    $faker = \Faker\Factory::create();

    $usersTable = TableRegistry::getTableLocator()->get('Users');

    $user = $usersTable->newEntity([
       'nombre' => 'Andres',
       'apellido' => 'Otero',
       'email' => 'andresoterolobo@gmail.com',
       'password' => (new DefaultPasswordHasher())->hash('secret'),
       'rol' => 'admin',
       'active' => 1,
       'created' => $faker->dateTimeBetween($startDate = 'now', $endDate = 'now'),
       'modified' => $faker->dateTimeBetween($startDate = 'now', $endDate = 'now')
   ]);

   $usersTable->save($user);
   }
}
