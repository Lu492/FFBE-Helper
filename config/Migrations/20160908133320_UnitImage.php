<?php
use Migrations\AbstractMigration;

class UnitImage extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('units');
        $table
            ->addColumn('description', 'text', [
                'after' => 'name'
            ])
            ->addColumn('image', 'string', [
                'after' => 'trust_master_reward',
                'null' => true
            ])
            ->addColumn('image_dir', 'string', [
                'after' => 'image',
                'null' => true
            ])
            ->save();

        $table = $this->table('acquires');
        $table
            ->addColumn('trust', 'float', [
                'after' => 'rarity_id',
                'default' => 0
            ])
            ->save();
    }
}
