<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Home Controller
 *
 *
 * @method \App\Model\Entity\Home[] paginate($object = null, array $settings = [])
 */
class HomeController extends AppController
{

    // Control de seguridad de acceso segun rol del usuario
     public function isAuthorized($employee)
    {
        if(isset($employee['user_type']) && $employee['user_type'] === "Usuario")
        {
            if(in_array($this->request->action, ['index','logout']))
            {
                return true;
            }
        }

        return parent::isAuthorized($employee);
    }

    // Para inicializar defaults + Load Components
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Statistics');
    }


    public function index()
    {
        $this->loadModel('CompaniesAgents');

      $companiesAgents = $this->CompaniesAgents->find('all', [
                                                    'fields' => ['id','agent_id','file_number'],
                                                    'conditions' => ['agent_id' => $this->Auth->user('id'), 'valid_to IS NULL']
                                                ])
                                            ->contain([
                                                    'Companies' => ['fields' => ['id','company_name','logo','base_url']
                                                    ]                                                    
                                                ]);
        // Envio la variable a usar en la vista
        $this->set('companiesAgents', $companiesAgents);

        /**************************
        *   ESTADISTICAS
        **************************/
        // Contactos totales
        $estadisticas['contacts'] = $this->Statistics->getTotalContacts($this->Auth->user('id'));
        // Cotizaciones Rápidas
        $estadisticas['fast_quotations'] = $this->Statistics->getFastQuotations($this->Auth->user('id'));
        // Cotizaciones Detalladas
        $estadisticas['detail_quotations'] = $this->Statistics->getDetailQuotations($this->Auth->user('id'));
        // Solicitud de Emisión
        $estadisticas['emission_request'] = $this->Statistics->getEmissionRequest($this->Auth->user('id'));

        


        // Seteo las variables de estadisticas
        $this->set('estadisticas',$estadisticas);

        
    }

 
}
