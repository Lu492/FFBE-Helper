<?php
namespace App\Model\Table;

use App\Model\Entity\Acquire;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;

/**
 * Units Model
 *
 * @property \App\Model\Table\OriginsTable|\Cake\ORM\Association\BelongsTo $Origins
 * @property \App\Model\Table\RacesTable|\Cake\ORM\Association\BelongsTo $Races
 * @property \App\Model\Table\JobsTable|\Cake\ORM\Association\BelongsTo $Jobs
 * @property \App\Model\Table\GendersTable|\Cake\ORM\Association\BelongsTo $Genders
 * @property \Cake\ORM\Association\HasMany $Practises
 *
 * @method \App\Model\Entity\Unit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Unit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Unit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Unit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Unit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Unit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Unit findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @property \App\Model\Table\RaritiesTable|\Cake\ORM\Association\BelongsTo $BaseRarity
 * @property \App\Model\Table\RaritiesTable|\Cake\ORM\Association\BelongsTo $MaxRarity
 * @property \App\Model\Table\AcquiresTable|\Cake\ORM\Association\HasMany $Acquires
 * @property \App\Model\Table\SpecialisationsTable|\Cake\ORM\Association\BelongsToMany $Specialisations
 * @mixin \Search\Model\Behavior\SearchBehavior
 * @mixin \Proffer\Model\Behavior\ProfferBehavior
 */
class UnitsTable extends Table
{

    /**
     * Store the Acquires id's of the units used in the party already to prevent duplicate selections
     *
     * @var array
     */
    public $party = [];

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('units');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Search');
        $this->addBehavior('Proffer.Proffer', [
            'image' => [
                'dir' => 'image_dir'
            ]
        ]);

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
        $this->belongsTo('BaseRarity', [
            'className' => 'Rarities',
            'foreignKey' => 'base_rarity_id',
            'bindingKey' => 'id',
            'propertyName' => 'base_rarity'
        ]);
        $this->belongsTo('MaxRarity', [
            'className' => 'Rarities',
            'foreignKey' => 'max_rarity_id',
            'bindingKey' => 'id',
            'propertyName' => 'max_rarity'
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
            ->requirePresence('name')
            ->notEmpty('name');

        $validator
            ->requirePresence('description')
            ->notEmpty('description');

        $validator
            ->integer('base_rarity_id')
            ->requirePresence('base_rarity_id', 'create')
            ->notEmpty('base_rarity_id');

        $validator
            ->integer('max_rarity_id')
            ->requirePresence('max_rarity_id', 'create')
            ->notEmpty('max_rarity_id');

        $validator
            ->allowEmpty('trust_master_reward');

        $validator
            ->integer('hp')
            ->requirePresence('hp', 'create')
            ->notEmpty('hp');

        $validator
            ->requirePresence('image', 'create')
            ->allowEmpty('image', 'update');

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
            ->value('min_rarity', [
                'field' => 'base_rarity_id'
            ])
            ->value('max_rarity', [
                'field' => 'max_rarity_id'
            ])
            ->finder('role', [
                'finder' => 'bySpecialisation'
            ]);

        return $search;
    }

    /**
     * Find units based on their specialisation
     *
     * @param \Cake\ORM\Query $query Currenty query object
     * @param array $options Array of query options
     * @return \Cake\ORM\Query
     */
    public function findBySpecialisation(Query $query, array $options): Query
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
     * Select a single unit from the users acquired units based on a number of different criteria
     *
     * Primarily it will try and select a unit based on it's role, if no unit is found, it'll select a 'best fit' unit
     * based on the stats of the role it's finding a unit for.
     *
     * Units selection can be constrained by rarity as well.
     *
     * @param int $userId Currently logged in user id
     * @param array $options Array of options
     *
     *  - `unitId` int : A specific units primary key
     *  - `fallback` bool : If no unit is found for a role should the selection fallback to searching by stats
     *  - `party` bool : Add the selected unit to a party to prevent duplicate selections
     *  - `specialisationId` int : The id of the specialisation to find a unit with
     *  - `stats` array : An array of stats in the form [stat => dir] for ordering units
     *  - `minRarity` int : The minimum rarity of unit which is eligible for the party
     *  - `maxRarity` int : The maximum rarity of unit which is eligible for the party
     *  - `rarity` int : The acquired rarity the unit must be to be selected
     *  - `existingParty` array : Acquired unit id's already in the party
     *
     * @return \App\Model\Entity\Acquire|null
     */
    public function selectUnit($userId, array $options = []): ?Acquire
    {
        $defaultOptions = [
            'fallback' => true,
            'party' => true,
            'existingParty' => []
        ];
        $options = array_merge($defaultOptions, $options);

        if (!empty($options['existingParty'])) {
            $this->party = $options['existingParty'];
        }

        $query = $this->Acquires->find()
            ->contain([
                'Rarities',
                'Units' => [
                    'Specialisations',
                    'BaseRarity',
                    'MaxRarity'
                ]
            ])
            ->where(['Acquires.user_id' => $userId]);

        if (!empty($this->party)) {
            $query->andWhere(['Acquires.id NOT IN' => $this->party]);
        }

        if (!empty($options['unitId'])) {
            $query->andWhere(['Acquires.unit_id' => $options['unitId']]);
        }

        if (!empty($options['specialisationId'])) {
            $roleStats = $this->Specialisations->favouredStats($options['specialisationId'], true);
            $query->order($roleStats);
        } elseif (!empty($options['stats'])) {
            $roleStats = $options['stats'];
            $query->order($roleStats);
        } else {
            $roleStats = [
                'hp' => 'desc',
                'mp' => 'desc'
            ];
        }

        if (!empty($options['specialisationId'])) {
            $query->matching('Units.Specialisations', function ($q) use ($options) {
                return $q->where(['Specialisations.id' => $options['specialisationId']]);
            });
        }

        if (!empty($options['minRarity'])) {
            $query->matching('Units', function ($q) use ($options) {
                return $q->where(['Units.base_rarity_id >=' => $options['minRarity']]);
            });
        }

        if (!empty($options['maxRarity'])) {
            $query->matching('Units', function ($q) use ($options) {
                return $q->where(['Units.max_rarity_id <=' => $options['maxRarity']]);
            });
        }

        if (!empty($options['rarity'])) {
            $query->andWhere(['Acquires.rarity_id' => $options['rarity']]);
        }

        $unit = $query->first();

        if ($unit === null) {
            if ($options['fallback'] === true) {
                return $this->selectUnit($userId, ['stats' => $roleStats]);
            } else {
                return null;
            }
        }

        if ($options['party']) {
            $this->party[] = $unit->get('id');
        }

        return $unit;
    }
}
