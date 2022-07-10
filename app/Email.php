<?php

namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{	
	private $mail = \stdClass::class;

	public function __construct($host, $sender, $password, $SMTP, $port)
	{
		$this->mail = new PHPMailer(true);
		$this->mail->SMTPDebug  = 2;                               
		$this->mail->isSMTP();                                        
	    $this->mail->Host        = $host;                    
	    $this->mail->SMTPAuth    = false;    
	    $this->mail->Username    = $sender;
	    $this->mail->Password    = $password;                         
	    $this->mail->SMTPSecure  = $SMTP;            
	    $this->mail->Port        = $port;                              
	    $this->mail->CharSet     = 'utf-8';
	    $this->mail->setLanguage('br');
	    $this->mail->isHTML(true);
	}

	public function sendEmail($sender, $senderName, $address, $addressName, $subject, $body)
	{
		$this->mail->setFrom($sender, $senderName);
    	$this->mail->addAddress($address, $addressName);
    	$this->mail->addReplyTo($sender, $senderName);
	    $this->mail->Subject = $subject;
	    $this->mail->Body    = $body;

		try{
			$this->mail->send();
		} catch(Exception $e){
			echo "Erro ao enviar o email: {$this->mail->ErrorInfo} {$e->getMessage()}";
		}
	}
}