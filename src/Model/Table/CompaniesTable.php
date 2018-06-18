<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Companies Model
 *
 * @property \App\Model\Table\CompaniesAdsTable|\Cake\ORM\Association\HasMany $CompaniesAds
 * @property \App\Model\Table\CompaniesGroupsTable|\Cake\ORM\Association\HasMany $CompaniesGroups
 * @property \App\Model\Table\CompaniesParametersTable|\Cake\ORM\Association\HasMany $CompaniesParameters
 * @property \App\Model\Table\CompaniesVehiclesTable|\Cake\ORM\Association\HasMany $CompaniesVehicles
 * @property \App\Model\Table\EmployeesTable|\Cake\ORM\Association\HasMany $Employees
 * @property \App\Model\Table\QuotationsTable|\Cake\ORM\Association\HasMany $Quotations
 * @property \App\Model\Table\AgentsTable|\Cake\ORM\Association\BelongsToMany $Agents
 * @property \App\Model\Table\AnswersTable|\Cake\ORM\Association\BelongsToMany $Answers
 * @property \App\Model\Table\QuestionsTable|\Cake\ORM\Association\BelongsToMany $Questions
 *
 * @method \App\Model\Entity\Company get($primaryKey, $options = [])
 * @method \App\Model\Entity\Company newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Company[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Company|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Company patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Company[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Company findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CompaniesTable extends Table
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

        $this->setTable('companies');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('CompaniesAds', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('CompaniesGroups', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('CompaniesParameters', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('CompaniesVehicles', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('Employees', [
            'foreignKey' => 'company_id'
        ]);
        $this->hasMany('Quotations', [
            'foreignKey' => 'company_id'
        ]);
        $this->belongsToMany('Agents', [
            'foreignKey' => 'company_id',
            'targetForeignKey' => 'agent_id',
            'joinTable' => 'companies_agents'
        ]);
        $this->belongsToMany('Answers', [
            'foreignKey' => 'company_id',
            'targetForeignKey' => 'answer_id',
            'joinTable' => 'companies_answers'
        ]);
        $this->belongsToMany('Questions', [
            'foreignKey' => 'company_id',
            'targetForeignKey' => 'question_id',
            'joinTable' => 'companies_questions'
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
            ->scalar('company_name')
            ->maxLength('company_name', 60)
            ->requirePresence('company_name', 'create')
            ->notEmpty('company_name')
            ->add('company_name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('ssn_cod')
            ->maxLength('ssn_cod', 5)
            ->requirePresence('ssn_cod', 'create')
            ->notEmpty('ssn_cod')
            ->add('ssn_cod', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->scalar('logo')
            ->maxLength('logo', 60)
            ->requirePresence('logo', 'create')
            ->notEmpty('logo');

        $validator
            ->scalar('base_url')
            ->maxLength('base_url', 45)
            ->requirePresence('base_url', 'create')
            ->notEmpty('base_url')
            ->add('base_url', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('api_base_url')
            ->maxLength('api_base_url', 200)
            ->allowEmpty('api_base_url');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['company_name']));
        $rules->add($rules->isUnique(['ssn_cod']));
        $rules->add($rules->isUnique(['base_url']));

        return $rules;
    }
}
