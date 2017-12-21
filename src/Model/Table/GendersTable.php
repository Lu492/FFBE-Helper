<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Rule\IsUnique;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Genders Model
 *
 * @property \App\Model\Table\UnitsTable|\Cake\ORM\Association\HasMany $Units
 *
 * @method \App\Model\Entity\Gender get($primaryKey, $options = [])
 * @method \App\Model\Entity\Gender newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Gender[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Gender|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gender patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Gender[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Gender findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GendersTable extends Table
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

        $this->table('genders');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Units', [
            'foreignKey' => 'gender_id'
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
     * Don't allow duplicate genders
     *
     * @param \Cake\ORM\RulesChecker $rules Rules instance to modify
     *
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->addCreate(new IsUnique(['name']), 'uniqueGender', [
            'errorField' => 'Genders.name',
            'message' => 'This gender already exists'
        ]);

        return $rules;
    }
}
