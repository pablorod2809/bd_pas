<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Quotations Model
 *
 * @property \App\Model\Table\AgentsTable|\Cake\ORM\Association\BelongsTo $Agents
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\BelongsTo $Customers
 * @property \App\Model\Table\CompaniesTable|\Cake\ORM\Association\BelongsTo $Companies
 * @property \App\Model\Table\CompaniesVehiclesTable|\Cake\ORM\Association\BelongsTo $CompaniesVehicles
 * @property \App\Model\Table\QuotationsProposalsTable|\Cake\ORM\Association\HasMany $QuotationsProposals
 * @property \App\Model\Table\QuotationsVehiclesPicturesTable|\Cake\ORM\Association\HasMany $QuotationsVehiclesPictures
 * @property \App\Model\Table\AnswersTable|\Cake\ORM\Association\BelongsToMany $Answers
 *
 * @method \App\Model\Entity\Quotation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Quotation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Quotation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Quotation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Quotation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Quotation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Quotation findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QuotationsTable extends Table
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

        $this->setTable('quotations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Agents', [
            'foreignKey' => 'agent_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CompaniesVehicles', [
            'foreignKey' => 'company_vehicle_id'
        ]);
        $this->hasMany('QuotationsProposals', [
            'foreignKey' => 'quotation_id'
        ]);
        $this->hasMany('QuotationsAnswers', [
            'foreignKey' => 'quotation_id'
        ]);
        $this->hasMany('QuotationsVehiclesPictures', [
            'foreignKey' => 'quotation_id'
        ]);
        $this->belongsToMany('Answers', [
            'foreignKey' => 'quotation_id',
            'targetForeignKey' => 'answer_id',
            'joinTable' => 'quotations_answers'
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
            ->dateTime('contact_date')
            ->requirePresence('contact_date', 'create')
            ->notEmpty('contact_date');

        $validator
            ->integer('vehicle_model')
            ->allowEmpty('vehicle_model');

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
        $rules->add($rules->existsIn(['agent_id'], 'Agents'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['company_id'], 'Companies'));
        $rules->add($rules->existsIn(['company_vehicle_id'], 'CompaniesVehicles'));

        return $rules;
    }
}
