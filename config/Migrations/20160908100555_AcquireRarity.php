<?php
use Migrations\AbstractMigration;

class AcquireRarity extends AbstractMigration
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
        $table = $this->table('acquires');
        $table
            ->renameColumn('rarity', 'rarity_id')
            ->save();
    }
}
