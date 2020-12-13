<?php
declare(strict_types=1);

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

final class CreatePagesMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('pages');

        $table->addColumn('title', 'text')
            ->addColumn('subtitle', 'text')
            ->addColumn('slug', 'string')
            ->addColumn('content', 'text', ['limit' => \Phinx\Db\Adapter\MysqlAdapter::TEXT_LONG])
            ->addColumn('template_id', 'integer', ['null' => true])
            ->addColumn('banner', 'string',  ['null' => true])
            ->addColumn('active', 'integer', ['limit' => MysqlAdapter::INT_TINY, 'default' => 1])
            ->addForeignKey('template_id', 'templates', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->create();

        $table->addColumn('page_id', 'integer', ['null' => true])
            ->addForeignKey('page_id', 'pages', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])->save();

    }

}
