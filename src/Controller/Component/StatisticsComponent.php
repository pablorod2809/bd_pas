<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Mailer\Email;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class StatisticsComponent extends Component
{
    
    public function getTotalContacts($broker_id) 
    {

        $this->Quotations = TableRegistry::get('Quotations');

        $query = $this->Quotations->find();
        $query->select(['total' => $query->func()->count('*')])
                 
                 ->where(['agent_id' => $broker_id]);

        return $query->first()->total;

    }


    public function getFastQuotations($broker_id) 
    {

        $this->Quotations = TableRegistry::get('Quotations');

        $subQuery = $this->Quotations->find();
        $subQuery->select(['Quotations.id', 'total' => $subQuery->func()->count('*')])
                 ->join([
                    [
                        'table' => 'quotations_proposals',
                        'alias' => 'QuotationsProposals',
                        'type' => 'INNER',
                        'conditions' => ['QuotationsProposals.quotation_id=Quotations.id']
                    ],
                 ])
                 ->where(['agent_id' => $broker_id])
                 ->group('Quotations.id')
                 ->having('total = 1');


        $query = $this->Quotations->find();
        $query->select(['total' => $query->func()->sum('total')])
              ->from(['temp' => $subQuery]);

        
        return $query->first()->total;

    }

    public function getDetailQuotations($broker_id) 
    {

        $this->Quotations = TableRegistry::get('Quotations');

        $subQuery = $this->Quotations->find();
        $subQuery->select(['Quotations.id', 'total' => $subQuery->func()->count('*'), 'request' => $subQuery->func()->max('emission_request')])
                 ->join([
                    [
                        'table' => 'quotations_proposals',
                        'alias' => 'QuotationsProposals',
                        'type' => 'INNER',
                        'conditions' => ['QuotationsProposals.quotation_id=Quotations.id']
                    ],
                 ])
                 ->where(['agent_id' => $broker_id])
                 ->group('Quotations.id')
                 ->having('total > 1 AND request IS NULL');


        $query = $this->Quotations->find();
        $query->select(['total' => $query->func()->count('total')])
              ->from(['temp' => $subQuery]);

        
        return $query->first()->total;

    }


    public function getEmissionRequest($broker_id) 
    {

        $this->Quotations = TableRegistry::get('Quotations');

        $query = $this->Quotations->find();
        $query->select(['total' => $query->func()->count('*')])
              ->join([
                    [
                        'table' => 'quotations_proposals',
                        'alias' => 'QuotationsProposals',
                        'type' => 'INNER',
                        'conditions' => ['QuotationsProposals.quotation_id=Quotations.id']
                    ],
                 ])   
               ->where(['agent_id' => $broker_id, 'emission_request IS NOT NULL']);

        return $query->first()->total;


    }

}