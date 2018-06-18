<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QuotationsProposals Model
 *
 * @property \App\Model\Table\QuotationsTable|\Cake\ORM\Association\BelongsTo $Quotations
 *
 * @method \App\Model\Entity\QuotationsProposal get($primaryKey, $options = [])
 * @method \App\Model\Entity\QuotationsProposal newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\QuotationsProposal[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QuotationsProposal|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuotationsProposal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\QuotationsProposal[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\QuotationsProposal findOrCreate($search, callable $callback = null, $options = [])
 */
class QuotationsProposalsTable extends Table
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

        $this->setTable('quotations_proposals');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Quotations', [
            'foreignKey' => 'quotation_id',
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
            ->scalar('coverage')
            ->maxLength('coverage', 60)
            ->requirePresence('coverage', 'create')
            ->notEmpty('coverage');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->scalar('contract_detail')
            ->allowEmpty('contract_detail');

        $validator
            ->scalar('contract_resume')
            ->allowEmpty('contract_resume');

        $validator
            ->scalar('hired')
            ->maxLength('hired', 1)
            ->allowEmpty('hired');

        $validator
            ->dateTime('emission_request')
            ->allowEmpty('emission_request');

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
        $rules->add($rules->existsIn(['quotation_id'], 'Quotations'));

        return $rules;
    }
}
