<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Usuario extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this ->table('users');
        $table-> addColumn('nombre', 'string' , array('limit' => 100))
        -> addColumn('apellido', 'string',  array('limit' => 100))
        -> addColumn('email', 'string',  array('limit' => 100))
        -> addColumn('password', 'string')
        -> addColumn('rol', 'enum',array('values' => 'admin, user'))
        -> addColumn('active', 'boolean')
        -> addColumn('created', 'datetime')
        -> addColumn('modified', 'datetime')
        ->create();
    }
}
