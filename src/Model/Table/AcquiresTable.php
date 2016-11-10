<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Acquires Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Units
 *
 * @method \App\Model\Entity\Acquire get($primaryKey, $options = [])
 * @method \App\Model\Entity\Acquire newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Acquire[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Acquire|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Acquire patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Acquire[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Acquire findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AcquiresTable extends Table
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

        $this->table('acquires');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Units', [
            'foreignKey' => 'unit_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Rarities');
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
            ->integer('level')
            ->allowEmpty('level')
            ->add('level', 'validRange', [
                'rule' => ['range', 1, 100],
                'message' => 'Level range is only between 1 and 100.'
            ])
            ->add('level', 'inRarity', [
                'rule' => function ($value, $context) {
                    $rarity = $this->Rarities->find()
                        ->where(['stars' => $context['data']['rarity_id']])
                        ->first();
                    if (!$rarity) {
                        return false;
                    }

                    if ($value >= 1 && $value <= $rarity->get('max_level')) {
                        return true;
                    }

                    return false;
                },
                'message' => 'Level is not allowed in this rarity.'
            ]);

        $validator
            ->integer('rarity_id')
            ->requirePresence('rarity_id', 'create')
            ->notEmpty('rarity_id')
            ->add('rarity_id', 'hasRarity', [
                'rule' => function ($value, $context) {
                    $unit = $this->Units->find()
                        ->select([
                            'id', 'name', 'base_rarity_id', 'max_rarity_id',
                            'BaseRarity.stars', 'MaxRarity.stars'
                        ])
                        ->contain([
                            'BaseRarity',
                            'MaxRarity'
                        ])
                        ->where(['Units.id' => $context['data']['unit_id']])
                        ->first();
                    if (!$unit) {
                        return false;
                    }

                    if ($value >= $unit->base_rarity->stars && $value <= $unit->max_rarity->stars) {
                        return true;
                    }
                    return false;
                },
                'message' => 'This unit is not available at this rarity.'
            ]);

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['unit_id'], 'Units'));

        return $rules;
    }

    /**
     * Ensure a user has acquired at least one unit for building parties with
     *
     * @param int $userId User id to filter acquisitions by
     * @param string $operator The comparison operator to use (gt|lt|gte|lte|eq)
     * @param int $count How many units
     *
     * @return bool
     */
    public function checkUnitCount($userId, $operator = 'gte', $count = 1)
    {
        $unitCount = $this->find()
            ->where(['Acquires.user_id' => $userId])
            ->count();

        $allowedOperators = ['gt', 'lt', 'gte', 'lte', 'eq'];
        if (in_array($operator, $allowedOperators)) {
            switch ($operator) {
                case "gt":
                    if ($unitCount > $count) {
                        return true;
                    }
                    break;
                case "lt":
                    if ($unitCount < $count) {
                        return true;
                    }
                    break;
                default:
                case "gte":
                    if ($unitCount >= $count) {
                        return true;
                    }
                    break;
                case "lte":
                    if ($unitCount <= $count) {
                        return true;
                    }
                    break;
                case "eq":
                    if ($unitCount === $count) {
                        return true;
                    }
                    break;
            }
        }

        return false;
    }
}
