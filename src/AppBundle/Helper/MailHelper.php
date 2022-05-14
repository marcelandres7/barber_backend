<?php
namespace AppBundle\Helper;

include 'Mailin.php';
include 'Template.php';

class MailHelper
{
	


	
	
	public function sendSearchEmail($html,$subject,$title)
	{
		$templateClass = new Template();
		$template = $templateClass->getMain();

		
		$html_replaced = str_replace("_TITLE_",$title,$template);
		$html_replaced = str_replace("_CONTENT_",$html,$html_replaced);
		
		$res = $this->sendEmail($html_replaced,$subject,'andre@aioproperty.com');
		return $res;		
	}
	
	
	
	
	
	public function sendEmail($template,$subject,$toEmail)
	{
	
		
		$mailin = new Mailin('andre@globalterragroup.com', 'k3Z2CnIsQp4jNBgw');
		$mailin->
		addTo($toEmail, $toEmail)->
		setFrom('info@aioproperty.com', 'AIO Property')->
		setReplyTo('info@aioproperty.com','AIO Property')->
		setSubject($subject)->
		//setCc('servicio@aguilalibreweb.com')->
		//setText('Hello')->
		setHtml($template);
		$res = $mailin->send();	
		//print_r($res);exit;
		return $res;
		
	}
	
}		
	