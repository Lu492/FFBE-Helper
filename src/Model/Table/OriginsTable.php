<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Origins Model
 *
 * @property \App\Model\Table\UnitsTable|\Cake\ORM\Association\HasMany $Units
 *
 * @method \App\Model\Entity\Origin get($primaryKey, $options = [])
 * @method \App\Model\Entity\Origin newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Origin[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Origin|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Origin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Origin[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Origin findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OriginsTable extends Table
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

        $this->table('origins');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Units', [
            'foreignKey' => 'origin_id'
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

        $validator
            ->requirePresence('shortname', 'create')
            ->notEmpty('shortname');

        return $validator;
    }
}
