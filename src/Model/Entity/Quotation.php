<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Quotation Entity
 *
 * @property int $id
 * @property int $agent_id
 * @property int $customer_id
 * @property int $company_id
 * @property \Cake\I18n\FrozenTime $contact_date
 * @property int $company_vehicle_id
 * @property int $vehicle_model
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Agent $agent
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\CompaniesVehicle $companies_vehicle
 * @property \App\Model\Entity\QuotationsProposal[] $quotations_proposals
 * @property \App\Model\Entity\QuotationsVehiclesPicture[] $quotations_vehicles_pictures
 * @property \App\Model\Entity\Answer[] $answers
 */
class Quotation extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'agent_id' => true,
        'customer_id' => true,
        'company_id' => true,
        'contact_date' => true,
        'company_vehicle_id' => true,
        'vehicle_model' => true,
        'created' => true,
        'modified' => true,
        'agent' => true,
        'customer' => true,
        'company' => true,
        'companies_vehicle' => true,
        'quotations_proposals' => true,
        'quotations_vehicles_pictures' => true,
        'answers' => true
    ];


     // Manejo de Estados de la Cotización.
    public function getStatus($quotation = null)
    {
       
        $status = array();

        if(!empty($quotation->quotations_proposals))
        {

            if(count($quotation->quotations_proposals) > 1)
            {
                $status['name'] = 'Cotización Detallada'; 
                $status['class'] = 'label label-default font-bold';
                
                foreach($quotation->quotations_proposals as $proposals)
                {
                    if(!is_null($proposals->emission_request))
                    {
                        $status['name'] = 'Solicitud de Emisión';
                        $status['class'] = 'label label-success font-bold';
                        break;
                    }
                }
            }
            else
            {
                $status['name'] = 'Cotización Rápida';
                $status['class'] = 'label label-grey font-bold';  
            }

        }
        else
        {
            $status['name'] = 'Consulta sin Cotización';
            $status['class'] = 'label label-warning font-bold';  
        }
            

        return $status;
    }
}


