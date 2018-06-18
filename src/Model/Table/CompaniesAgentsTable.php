<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CompaniesAgents Model
 *
 * @property \App\Model\Table\CompaniesTable|\Cake\ORM\Association\BelongsTo $Companies
 * @property \App\Model\Table\AgentsTable|\Cake\ORM\Association\BelongsTo $Agents
 *
 * @method \App\Model\Entity\CompaniesAgent get($primaryKey, $options = [])
 * @method \App\Model\Entity\CompaniesAgent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CompaniesAgent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CompaniesAgent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CompaniesAgent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CompaniesAgent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CompaniesAgent findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CompaniesAgentsTable extends Table
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

        $this->setTable('companies_agents');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Agents', [
            'foreignKey' => 'agent_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('AgentsPlaces', [
            'foreignKey' => 'company_agent_id']);

        $this->belongsToMany('Places', [
            'foreignKey' => 'company_agent_id',
            'targetForeignKey' => 'place_id',
            'joinTable' => 'agents_places'
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
            ->scalar('file_number')
            ->maxLength('file_number', 45)
            ->allowEmpty('file_number');

        $validator
            ->dateTime('valid_from')
            ->allowEmpty('valid_from');

        $validator
            ->dateTime('valid_to')
            ->allowEmpty('valid_to');

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
        $rules->add($rules->existsIn(['agent_id'], 'Agents'));

        return $rules;
    }
}
