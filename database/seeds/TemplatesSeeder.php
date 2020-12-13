<?php


use Phinx\Seed\AbstractSeed;

class TemplatesSeeder extends AbstractSeed
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
            [
                'name' => 'Geral',
                'slug' => 'general'
            ],
            [
                'name' => 'Curso',
                'slug' => 'course'
            ],
            [
            'name' => 'Índice',
            'slug' => 'index'
            ]
        ];

        $this->table('templates')->insert($data)->saveData();
    }
}
