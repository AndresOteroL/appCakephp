<?php
declare(strict_types=1);

use Migrations\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;

class CreateUserDataMigration extends AbstractMigration
{
    public function up(){
        $faker = \Faker\Factory::create();
        $usersTable = TableRegistry::getTableLocator()->get('Users');

        // Insertar 50 registros aleatorios
        for ($i = 0; $i < 50; $i++) {
            $firstName = $faker->firstName;
            $lastName = $faker->lastName;
            $email = $faker->unique()->safeEmail;
            $password = (new DefaultPasswordHasher())->hash('secret'); // Puedes cambiar 'password' a cualquier valor que desees
            $rol = ('user'); // Selecciona aleatoriamente entre 'admin' y 'user'
            $active = $faker->boolean; // Genera un valor booleano aleatorio (true/false)
            $created = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now');
            $modified = $faker->dateTimeBetween($startDate = $created, $endDate = 'now');

            $user = $usersTable->newEntity([
                'nombre' => $firstName,
                'apellido' => $lastName,
                'email' => $email,
                'password' => $password,
                'rol' => $rol,
                'active' => $active,
                'created' => $created,
                'modified' => $modified
            ]);

            $usersTable->save($user);
        }

    }
}
