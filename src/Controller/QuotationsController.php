<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Quotations Controller
 *
 *
 * @method \App\Model\Entity\Quotation[] paginate($object = null, array $settings = [])
 */
class QuotationsController extends AppController
{



    // Control de seguridad de acceso segun rol del usuario
    public function isAuthorized($agent)
    {
        if(isset($agent))
        {
            return true;
        }

        return parent::isAuthorized($employee);
    }


    public function index($companyId = null)
    {
            
      $quotations = $this->Quotations
                  ->find('all',[
                          'conditions' => 
                              ['Quotations.agent_id' => 
                                  $this->Auth->user('id') , 
                               'Quotations.company_id' => $companyId 
                              ]
                          ])
                  ->contain([
                              'Agents' => ['fields' => ['id','first_name','last_name']],
                              'CompaniesVehicles' => ['fields' => ['id','mark','model','version']],
                              'Customers' => ['fields' => ['id','customer_name','place_id']],
                              'Customers.Places' => ['fields' => ['id','description']],
                              'QuotationsProposals' => ['fields' => ['id', 'quotation_id','coverage','price','hired','emission_request']],
                              'QuotationsAnswers' => ['fields' => ['id','question_id','quotation_id','answer_id','value']],
                              'QuotationsAnswers.Questions' => ['fields' => ['id','description']],
                              'QuotationsAnswers.Answers' => ['fields' => ['id','description']],
                                          ]);

      $company = TableRegistry::get('Companies');
      $company = $company->find('all')
                         ->select('company_name')
                         ->where(['id' => $companyId])
                         ->first();



       // Envio la variable a usar en la vista
      $this->set('company_name', $company->company_name);
      $this->set('quotations', $quotations->all());
      $this->set('questions', $quotations->first()); 
      $this->set('company_id', $companyId);
      
      // Seteo el nombre del excel a generar
      $this->set('_filename','ConsultaCotizaciones');
    }

    public function detail($quotationId = null)
    {
      if($this->request->is('Ajax')) //Ajax Detection
      {
          $this->autoRender = false; // Set Render False

          $quotation = $this->Quotations->get($this->request->data('quotationId'), 
                                  ['contain' => ['CompaniesVehicles','Customers','Customers.Places','QuotationsProposals']]);

          $this->set('quotation', $quotation);
          $this->render('detail');
      }
      else
      {
        return $this->redirect($this->referer());
      }

    }

    
}
