<?php

/**
 * imva.biz Developer's Guide
 * Main Class
 * 
 * 
 * 
 * For redistribution in the provicer's network only.
 *
 * Weitergabe au�erhalb des Anbieternetzwerkes verboten.
 *
 *
 *
 * This software is intellectual property of imva.biz respectively of its author and is protected
 * by copyright law. This software product is provided "as it is" with no guarantee.
 *
 * You are free to use this software and to modify it in order to fit your requirements.
 *
 * Any modification, copying, redistribution, transmission outsitde of the provider's platforms
 * is a violation of the license agreement and will be prosecuted by civil and criminal law.
 *
 * By applying and using this software product, you agree to the terms and conditions of use.
 *
 *
 *
 * Diese Software ist geistiges Eigentum von imva.biz respektive ihres Autors und ist durch das
 * Urheberrecht gesch�tzt. Diese Software wird ohne irgendwelche Garantien und "wie sie ist"
 * angeboten.
 *
 * Sie sind berechtigt, diese Software frei zu nutzen und auf Ihre Bed�rfnisse anzupassen.
 *
 * Jegliche Modifikation, Vervielf�ltigung, Redistribution, �bertragung zum Zwecke der
 * Weiterentwicklung au�erhalb der Netzwerke des Anbieters ist untersagt und stellt einen Versto�
 * gegen die Lizenzvereinbarung dar.
 *
 * Mit der �bernahme dieser Software akzeptieren Sie die zwischen Ihnen und dem Herausgeber
 * festgehaltenen Bedingungen. Der Bruch dieser Bedingungen kann Schadensersatzforderungen nach
 * sich ziehen.
 *
 *
 *
 * (EULA-13/7)
 * 
 * 
 *
 * (c) 2013 imva.biz, Johannes Ackermann, ja@imva.biz
 * @author Johannes Ackermann
 *
 * 13/7/5-14/2/12
 * v 0.8.5
 *
 */

class imva_devguide_main extends oxAdminView
{
	public $oServ				=	null;							// Devguide Service
	
	
	
	/**
	 * Construct
	 *
	 * Provice Service.
	 * @param null
	 * @return null
	 */
	public function init()
	{
		parent::init();
		$this->oServ = oxNew('imva_devguide_service');				// Service
	}
	
	
	
	/**
	 * Render
	 * @return string
	 */	
	public function render()
	{
		parent::render();		
		return 'imva_devguide_main.tpl';
	}
}