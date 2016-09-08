<?php
use Migrations\AbstractMigration;

class UnitRarity extends AbstractMigration
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
            ->renameColumn('base_rarity', 'base_rarity_id')
            ->renameColumn('max_rarity', 'max_rarity_id')
            ->save();
    }
}
