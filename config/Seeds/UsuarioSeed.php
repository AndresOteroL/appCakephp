<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Usuario seed.
 */
class UsuarioSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [[
            'nombre' => 'andres otero',
            'apellido' => ' lobo',
            'email' => 'andres@gmail.com'

        ], [
            'nombre' => 'Maria ',
            'apellido' => ' funestes',
            'email' => 'andres@gmail.com'
        ]];

        $table = $this->table('usuarios');
        $table->insert($data)->save();
    }
}
