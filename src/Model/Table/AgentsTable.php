<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Agents Model
 *
 * @property \App\Model\Table\PlacesTable|\Cake\ORM\Association\BelongsTo $Places
 * @property \App\Model\Table\QuotationsTable|\Cake\ORM\Association\HasMany $Quotations
 * @property \App\Model\Table\PlacesTable|\Cake\ORM\Association\BelongsToMany $Places
 * @property \App\Model\Table\CompaniesTable|\Cake\ORM\Association\BelongsToMany $Companies
 * @property \App\Model\Table\CompaniesGroupsTable|\Cake\ORM\Association\BelongsToMany $CompaniesGroups
 *
 * @method \App\Model\Entity\Agent get($primaryKey, $options = [])
 * @method \App\Model\Entity\Agent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Agent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Agent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Agent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Agent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Agent findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AgentsTable extends Table
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

        $this->setTable('agents');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Places', [
            'foreignKey' => 'place_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Quotations', [
            'foreignKey' => 'agent_id'
        ]);
        
        $this->belongsToMany('Companies', [
            'foreignKey' => 'agent_id',
            'targetForeignKey' => 'company_id',
            'joinTable' => 'companies_agents'
        ]);
        $this->belongsToMany('CompaniesGroups', [
            'foreignKey' => 'agent_id',
            'targetForeignKey' => 'companies_group_id',
            'joinTable' => 'companies_groups_agents'
        ]);
        $this->hasMany('CompaniesAgents', [
            'foreignKey' => 'agent_id']);

        
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
            ->scalar('first_name')
            ->maxLength('first_name', 45)
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 45)
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->integer('enrollment')
            ->requirePresence('enrollment', 'create')
            ->notEmpty('enrollment')
            ->add('enrollment', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->date('birthday')
            ->allowEmpty('birthday');

        $validator
            ->scalar('photo')
            ->maxLength('photo', 45)
            ->allowEmpty('photo');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 45)
            ->allowEmpty('phone');

        $validator
            ->scalar('address')
            ->maxLength('address', 45)
            ->allowEmpty('address');

        $validator
            ->scalar('facebook')
            ->maxLength('facebook', 100)
            ->allowEmpty('facebook');

        $validator
            ->scalar('token')
            ->maxLength('token', 255)
            ->allowEmpty('token')
            ->add('token', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        return $validator;
    }

    // Password Validator for changing pass.
    public function validationPassword(Validator $validator)
    {
        $validator
                ->add('old_password','custom',[
                    'rule' => function($value, $context){
                        $user = $this->get($context['data']['id']);
                        if($user)
                        {
                            if((new \Cake\Auth\DefaultPasswordHasher)->check($value, $user->password))
                            {
                                return true;
                            }
                        }
                        return false;
                    },
                    'message' => 'La contraseña ingresada no coincide con la registrada en en sistema.',
                ])
                ->notEmpty('old_password');
        
        $validator
                ->add('new_password',[
                    'length' => [
                        'rule' => ['minLength',4],
                        'message' => 'Please enter atleast 4 characters in password your password.'
                    ]
                ])
                ->add('new_password',[
                    'match' => [
                        'rule' => ['compareWith','confirm_password'],
                        'message' => 'Las contraseñas ingresadas no coinciden.'
                    ]
                ])
                ->notEmpty('new_password');
        
        $validator
                ->add('confirm_password',[
                    'length' => [
                        'rule' => ['minLength',4],
                        'message' => 'Please enter atleast 4 characters in password your password.'
                    ]
                ])
                ->add('confirm_password',[
                    'match' => [
                        'rule' => ['compareWith','new_password'],
                        'message' => 'Las contraseñas ingresadas no coinciden.'
                    ]
                ])
                ->notEmpty('confirm_password');
        
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
        $rules->add($rules->isUnique(['enrollment']));
        $rules->add($rules->isUnique(['token']));
        $rules->add($rules->existsIn(['place_id'], 'Places'));

        return $rules;
    }
}
