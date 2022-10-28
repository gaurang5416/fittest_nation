<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
	'protocol' => 'smtp',
	'smtp_host' => 'smtp.gmail.com',
	'smtp_port' => 587,
	'smtp_user' => 'gaurang5416@gmail.com',
	'smtp_pass' => 'icivliexjangfikk',
	'smtp_crypto' => 'tls', //can be 'ssl' or 'tls' for example
	'mailtype' => 'html', //plaintext 'text' mails or 'html'
	'smtp_timeout' => '4', //in seconds
	'charset' => 'iso-8859-1',
	'wordwrap' => TRUE,
	'newline' => "\r\n"
);

