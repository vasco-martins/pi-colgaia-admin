<?php


use Phinx\Seed\AbstractSeed;

class OptionsSeeder extends AbstractSeed
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
                'name' => 'websiteName',
                'value' => 'Colgaia',
            ],
            [
                'name' => 'websiteDescription',
                'value' => 'Lorem ipsum dolor sit amet'
            ],
            [
                'name' => 'websiteLogo',
                'value' => 'Colgaia'
            ],
            [
                'name' => 'facebook',
                'value' => 'Colgaia'
            ],
            [
                'name' => 'instagram',
                'value' => 'Colgaia'
            ],
            [
                'name' => 'email',
                'value' => 'Colgaia'
            ],
            [
                'name' => 'address',
                'value' => 'Colgaia'
            ],
            [
                'name' => 'phone',
                'value' => '919999999'
            ],
        ];

        $this->table('options')->insert($data)->saveData();
    }
}
