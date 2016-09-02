<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;

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
        $this->addBehavior('Search.Search');

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

        $this->hasMany('Acquires');

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
        $rules->addUpdate($rules->existsIn(['origin_id'], 'Origins'));
        $rules->addUpdate($rules->existsIn(['race_id'], 'Races'));
        $rules->addUpdate($rules->existsIn(['job_id'], 'Jobs'));
        $rules->addUpdate($rules->existsIn(['gender_id'], 'Genders'));

        return $rules;
    }

    /**
     * Configure the search parameters
     *
     * @return \Search\Manager;
     */
    public function searchConfiguration()
    {
        $search = new Manager($this);

        $search
            ->like('name', [
                'before' => true,
                'after' => true
            ])
            ->value('game', [
                'field' => 'origin_id'
            ])
            ->value('job', [
                'field' => 'job_id'
            ])
            ->compare('min_rarity', [
                'field' => 'base_rarity',
            ])
            ->compare('max_rarity')
            ->finder('role', [
                'finder' => 'bySpecialisation'
            ]);

        return $search;
    }

    /**
     * Find units based on their specialisation
     *
     * @param \Cake\ORM\Query $query
     * @param array $options
     * @return \Cake\ORM\Query
     */
    public function findBySpecialisation(Query $query, array $options)
    {
        if (!empty($options['role'])) {
            $query->contain(['Specialisations']);
            $query->matching('Specialisations', function ($q) use ($options) {
                return $q->where([
                    'Specialisations.id' => $options['role']
                ]);
            });
        }

        return $query;
    }

    /**
     * Select a single unit based on either a specialisation or a set of stats
     *
     * If no stats are passed, then stats will be pulled from the specialisation
     *
     * @param int $userId Currently logged in user id
     * @param int|null $specialisationId Specialisation id to select a unit for
     * @param array $stats If selecting units based purely on their stats
     *
     * @return mixed
     */
    public function selectUnit($userId, $specialisationId = null, array $stats = [])
    {
        $query = $this->Acquires->find()
            ->contain([
                'Units' => [
                    'Specialisations'
                ]
            ])
            ->where(['Acquires.user_id' => $userId]);

        if (!empty($specialisationId)) {
            $roleStats = $this->Specialisations->roleToStats($specialisationId);
            $query->order($roleStats);
        } elseif (!empty($stats)) {
            $roleStats = $stats;
            $query->order($roleStats);
        } else {
            $roleStats = ['hp'];
        }

        if (!empty($specialisationId)) {
            $query->matching('Units.Specialisations', function ($q) use ($specialisationId) {
                return $q->where(['Specialisations.id' => $specialisationId]);
            });
        }

        $unit = $query->first();

        if ($unit === null) {
            return $this->selectUnit($userId, null, $roleStats);
        }

        return $unit;
    }
}
