<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Mailer\Email;
use Cake\Event\Event;

class PassGeneratorComponent extends Component
{
    
    public function generate_password($length = 8) 
    {

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
     
        $password = substr(str_shuffle($chars), 0, $length);

        return $password;
    }


    // Envio mail con el password generado
    public function sendMailPassword($pass, $fullname, $username, $toEmail, $template)
    {
        //envío el mail
        $email = new Email();
        $email->viewVars(['password' => $pass]);
        $email->viewVars(['fullname' => $fullname]);
        $email->viewVars(['username' =>  $username]);
        $email->transport('mailjet');
        $email->from(['diegocerezo@uxorit.com' => 'Diego Cerezo'])
                ->template($template)
                ->emailFormat('html')
                ->to($toEmail)
                ->subject('Broker Digital - Bienvenido')
                ->send();

        return true;
    }

}