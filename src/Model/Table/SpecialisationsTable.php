<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Specialisations Model
 *
 * @property \Cake\ORM\Association\HasMany $Practises
 *
 * @method \App\Model\Entity\Specialisation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Specialisation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Specialisation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Specialisation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Specialisation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Specialisation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Specialisation findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SpecialisationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('specialisations');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Units', [
            'joinTable' => 'practises'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }

    /**
     * Convert a role id into a set of stats for ordering units by
     *
     * @param int $roleId The role id
     *
     * @return array
     */
    public function roleToStats($roleId)
    {
        switch ($roleId) {
            case 1: // Healing
                $stats = [
                    'spr' => 'desc',
                    'mag' => 'desc',
                    'hp' => 'desc'
                ];
                break;
            case 2: // Support
                $stats = [
                    'mag' => 'desc',
                    'def' => 'desc',
                    'hp' => 'desc'
                ];
                break;
            case 3: // Hybrid dmg
                $stats = [
                    'atk' => 'desc',
                    'mag' => 'desc',
                    'hp' => 'desc'
                ];
                break;
            case 4: // Magic dmg
                $stats = [
                    'mag'  => 'desc',
                    'spr'  => 'desc',
                    'mp' => 'desc'
                ];
                break;
            case 5: // Physical dmg
                $stats = [
                    'atk' => 'desc',
                    'def' => 'desc',
                    'hp' => 'desc'
                ];
                break;
            case 7: // Tank
                $stats = [
                    'def' => 'desc',
                    'spr' => 'desc',
                    'hp' => 'desc'
                ];
                break;
        }

        return $stats;
    }
}
