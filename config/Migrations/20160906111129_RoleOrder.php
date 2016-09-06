<?php
use Migrations\AbstractMigration;

class RoleOrder extends AbstractMigration
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
        $table = $this->table('specialisations');
        $table
            ->addColumn('team_pick_order', 'integer', [
                'after' => 'stats'
            ])
            ->save();
    }
}
