<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CompaniesVehicles Model
 *
 * @property \App\Model\Table\CompaniesTable|\Cake\ORM\Association\BelongsTo $Companies
 *
 * @method \App\Model\Entity\CompaniesVehicle get($primaryKey, $options = [])
 * @method \App\Model\Entity\CompaniesVehicle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CompaniesVehicle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CompaniesVehicle|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CompaniesVehicle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CompaniesVehicle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CompaniesVehicle findOrCreate($search, callable $callback = null, $options = [])
 */
class CompaniesVehiclesTable extends Table
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

        $this->setTable('companies_vehicles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER'
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
            ->scalar('mark')
            ->maxLength('mark', 60)
            ->requirePresence('mark', 'create')
            ->notEmpty('mark');

        $validator
            ->scalar('model')
            ->maxLength('model', 60)
            ->requirePresence('model', 'create')
            ->notEmpty('model');

        $validator
            ->scalar('version')
            ->maxLength('version', 60)
            ->requirePresence('version', 'create')
            ->notEmpty('version');

        $validator
            ->scalar('vehicle_code')
            ->maxLength('vehicle_code', 10)
            ->requirePresence('vehicle_code', 'create')
            ->notEmpty('vehicle_code');

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
        $rules->add($rules->existsIn(['company_id'], 'Companies'));

        return $rules;
    }
}
