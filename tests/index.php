<?php

require __DIR__ . '/../../../autoload.php';
//Ao manipular a lib, alterar o caminho do autoload

use Notification\Email;

$novoEmail = new Email(
	'smtp.gmail.com', 
	'[seuamail@gmail.com]', 
	'[senha do email]', 
	'ssl', 
	'465');

$novoEmail->sendEmail(
	'seuamail@gmail.com', 
	'João', 
	'distinatario@gmail.com', 
	'Paulo', 
	'Esse email é um teste', 
	"<p>Isso é apenas um <b>Teste</b></p>");
