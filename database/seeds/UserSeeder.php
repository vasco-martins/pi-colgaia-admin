<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $data = [
            'name' => 'Vasco Martins',
            'password' => \Framework\Helpers\Hash::make('1234'),
            'email' => 'vm@bzv.pt',
            'active' => 1
        ];

        $this->table('users')->insert($data)->saveData();
    }
}
