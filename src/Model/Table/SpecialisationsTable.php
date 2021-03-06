<?php
namespace App\Model\Table;

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
 * @method \App\Model\Entity\Specialisation findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @property \App\Model\Table\UnitsTable|\Cake\ORM\Association\BelongsToMany $Units
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

        $this->setTable('specialisations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

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
    public function validationDefault(Validator $validator): Validator
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
     * Find the stats favoured for a specific specialisation
     *
     * @param int $specialisationId Which specialisation to find stats for
     * @param bool $ordering Should the stats returned be an order() compatible array
     * @return array
     */
    public function favouredStats($specialisationId, $ordering = false): array
    {
        $stats = $this->find()
            ->select(['stats'])
            ->where(['id' => $specialisationId])
            ->first();

        $statsArray = explode(',', $stats->get('stats'));
        if (!$ordering) {
            return $statsArray;
        }

        $statsOrder = array_flip($statsArray);

        foreach ($statsOrder as $stat => $dir) {
            $statsOrder[$stat] = 'desc';
        }

        return $statsOrder;
    }
}
