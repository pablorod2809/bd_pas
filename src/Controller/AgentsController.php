<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Component\AuthComponent;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Event\Event;


/**
 * Agents Controller
 *
 * @property \App\Model\Table\AgentsTable $Agents
 */
class AgentsController extends AppController
{

	 // Accesos autorizados para usuarios sin loguearse
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['recoveryPassword']);
    }

    // Control de seguridad de acceso segun rol del usuario
     public function isAuthorized($agent)
    {
        if(isset($agent))
        {
            if(in_array($this->request->action, ['index','logout','sendMailPassword']))
            {
                return true;
            }
        }

        return parent::isAuthorized($agent);
    }

    // Para inicializar defaults + Load Components
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('PassGenerator');
    }
    
    // Administrar Perfil
    public function profile()
    {

        $agent = $this->Agents->get($this->Auth->user('id'), ['contain' => ['Places']]);

        if($this->request->is(['patch','post','put']))
        {
            // Actualizo los valores correspondientes
            $query = $this->Agents->query();
            $result = $query->update()
                ->set([$this->request->data('name') => $this->request->data('value')])
                    ->where([
                        'id' => $this->request->data('pk')
                        ]);
            $result = $query->execute();

            $map = $this->getmap($this->Auth->user('id'));

            $agent = $this->Agents->get($this->Auth->user('id'), ['contain' => ['Places']]);
            // Refresco la información de sesión
            $this->request->session()->write('Auth.User', $agent->toArray());  

            $response = $this->response->withType('application/json')->withStringBody(json_encode($map));

            return $response;
        }

        // Obtengo el listado de Places
        $companiesAgents = TableRegistry::get('companiesAgents');
        $companiesAgents = $companiesAgents->find('all')
                                  ->where(['agent_id' => $this->Auth->user('id')])
                                  ->contain(['AgentsPlaces','Places'])
                                  ->first();
            
         // Refresco la información de sesión
        $this->request->session()->write('Auth.User', $agent->toArray());  

        $map = $this->getmap($this->Auth->user('id'));

        $this->set('map',$map);
        $this->set('companiesAgents',$companiesAgents);
        $this->set(compact('agent'));
    }

    public function avatar()
    {

        $uploadsDir = $_SERVER['DOCUMENT_ROOT'].'/companiesImg';

        if($this->request->is(['patch','post','put']))
        {
            // Renombro el archivo      
            $ext = pathinfo($this->request->data(['image_file'])['name'], PATHINFO_EXTENSION);
            $photo = $this->request->data('enrollment').'.'.$ext;

            if(!empty($this->request->data(['image_file'])['name']))
            {
                $destination =  $uploadsDir . DS .$photo;

               if(move_uploaded_file($this->request->data(['image_file'])['tmp_name'], $destination))
               {

                    $query = $this->Agents->query();
                    $result = $query->update()
                        ->set(['photo' => $photo])
                            ->where([
                                'id' => $this->Auth->user('id')
                                ])
                            ->execute();

                    $this->Flash->success('La imagen de perfil ha sido guardada correctamente.');
               }
               else
               {
                    $this->Flash->error('La imagen de perfil no pudo ser cargada. Por favor intente nuevamente.');
               }
            }
            else
            {
                $this->Flash->error('Debe subir una imagen para reemplazar la foto de perfil.');
            }

            
        return $this->redirect(['action' => 'profile']);    
            
           
        }
    }

        // Administrar Perfil
    public function places()
    {

        $this->autoRender = false; // avoid to render view

        // Obtengo el listado de Places
        $places = TableRegistry::get('Places');
        $places = json_encode($places->find('all')
                                    ->select(['value' => 'id', 'text' => 'description'])
                                     ->order(['description' => 'ASC']));

        $this->response->type('json');
        $this->response->body($places);
        return $this->response;


    }

    public function getmap($agentId = null)
    {
        $agent = $this->Agents->get($this->Auth->user('id'), ['contain' => ['Places']]);

        // obtengo la direccion del broker
        $address = $agent->address.', '.$agent->place->description;

        // Obtengo lat y long del map para dibujar
        $call = 'https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&key=AIzaSyDNTIocPhfgnzqUtSRyOFXqX77EvO2jlsc';

        $call_rsta = json_decode(file_get_contents($call),true);

        if($call_rsta['status'] !== 'ZERO_RESULTS')
            $map = $call_rsta['results'][0]['geometry']['location'];
        else
            $map = 0;

        return $map;
    }

    // Recuperar password
    public function recoveryPassword()
    {
        // Seteo el layout a utilizar
        $this->viewBuilder()->setLayout('login'); 
        $this->autoRender = false; // For ajax propose
        // Recupero la información del formulario
        if ($this->request->is('post')){

            //verifico si existe el mail ingesado y el usuario se encuentre activo
            $data = $this->request->getData();
            $email = $data['email'];
            $agent = $this->Agents->find('all', array('conditions' => array('email' => $email)));
            $agent = $agent->first(); // Asigno el resultado encontrado

            if (!is_null($agent))
            {

                // Genero el password temporal
                $pass = $this->PassGenerator->generate_password();

   
         
                // Establezco el password generado a la entidad
                $agent->password = $pass;

                // Actualizo la entidad
                if($this->Agents->save($agent))
                {
                    
                    // Trato de enviar el mail con la contraseña generada
                    if($this->PassGenerator->sendMailPassword($pass, $agent->agent_name, $agent->enrollment, $agent->email, 'email_recuperar_password'))
                    {
                       
                        $msg = "La contraseña ha sido reestablecida correctamente. Por favor ingrese al sistema con la nueva contraseña que enviamos a su email.";
                    }else{
                       $msg = 'Se produjo un error al actualizar la contraseña. Por favor vuelva a intentarlo.';
                    }
                }else{
                    $msg = 'Se produjo un error al modificar la contraseña. Por favor vuelva a intentarlo.';
                }

            }
            else
            {
                $msg = "El email ingresado no existe en nuestra base de datos.";
            }

            // printeo el mensaje a mostrar
            echo $msg;
        }
                        
    }

    // CHANGE PASSWORD 
    public function changePassword()
    {
       $agent = $this->Agents->get($this->Auth->user('id'));

        if(!empty($this->request->data))
        {
            $agent = $this->Agents->patchEntity($agent, [
                    'old_password'      => $this->request->data['old_password'],
                    'password'          => $this->request->data['new_password'],
                    'new_password'      => $this->request->data['new_password'],
                    'confirm_password'  => $this->request->data['confirm_password']
                ],
                    ['validate' => 'password']
                
            );
            
            if($this->Agents->save($agent))
            {
                $this->Flash->success('La contraseña fue modificada correctamente.');
                $this->redirect($this->referer());
            }
            else
            {
                $this->Flash->error('Error al modificar la contraseña, intentelo nuevamente.');
            }
            
        }
        
       $this->set('agent',$agent);
    }


    // LOGIN
    public function login()
    {

        $this->viewBuilder()->layout('login');

        if($this->request->is('post'))
        {
            $agent = $this->Auth->identify();

            if($agent)
            {
                $this->Auth->setUser($agent);
                return $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Flash->set("Los datos ingresados son incorrectos. Intente nuevamente.", ['element' => 'login','key' => 'auth']);
            }
        }

        // Valido si esta logueado, redirecciono al home.
        if($this->Auth->user())
        {
            return $this->redirect(['controller' => 'Home', 'action' => 'index']);
        }

       

    }

    // LOGOUT
    public function logout(){
        return $this->redirect($this->Auth->logout());
    }
   
}
