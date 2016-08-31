<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Units Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Origins
 * @property \Cake\ORM\Association\BelongsTo $Races
 * @property \Cake\ORM\Association\BelongsTo $Jobs
 * @property \Cake\ORM\Association\BelongsTo $Genders
 * @property \Cake\ORM\Association\HasMany $Practises
 *
 * @method \App\Model\Entity\Unit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Unit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Unit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Unit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Unit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Unit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Unit findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UnitsTable extends Table
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

        $this->table('units');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Origins', [
            'foreignKey' => 'origin_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Races', [
            'foreignKey' => 'race_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Jobs', [
            'foreignKey' => 'job_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Genders', [
            'foreignKey' => 'gender_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsToMany('Specialisations', [
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

        $validator
            ->integer('base_rarity')
            ->requirePresence('base_rarity', 'create')
            ->notEmpty('base_rarity');

        $validator
            ->integer('max_rarity')
            ->requirePresence('max_rarity', 'create')
            ->notEmpty('max_rarity');

        $validator
            ->allowEmpty('trust_master_reward');

        $validator
            ->integer('hp')
            ->requirePresence('hp', 'create')
            ->notEmpty('hp');

        $validator
            ->integer('mp')
            ->requirePresence('mp', 'create')
            ->notEmpty('mp');

        $validator
            ->integer('atk')
            ->requirePresence('atk', 'create')
            ->notEmpty('atk');

        $validator
            ->integer('def')
            ->requirePresence('def', 'create')
            ->notEmpty('def');

        $validator
            ->integer('mag')
            ->requirePresence('mag', 'create')
            ->notEmpty('mag');

        $validator
            ->integer('spr')
            ->requirePresence('spr', 'create')
            ->notEmpty('spr');

        $validator
            ->integer('hits')
            ->requirePresence('hits', 'create')
            ->notEmpty('hits');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        // TODO: These rules should be run in edit, but not in add
//        $rules->add($rules->existsIn(['origin_id'], 'Origins'));
//        $rules->add($rules->existsIn(['race_id'], 'Races'));
//        $rules->add($rules->existsIn(['job_id'], 'Jobs'));
//        $rules->add($rules->existsIn(['gender_id'], 'Genders'));

        return $rules;
    }
}
