<?php

/**
 * imva.biz Developer's Guide
 * tmp Cleanup Module
 * 
 * 
 * 
 * For redistribution in the provider's network only.
 *
 * Weitergabe außerhalb des Anbieternetzwerkes verboten.
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
 * Urheberrecht geschützt. Diese Software wird ohne irgendwelche Garantien und "wie sie ist"
 * angeboten.
 *
 * Sie sind berechtigt, diese Software frei zu nutzen und auf Ihre Bedürfnisse anzupassen.
 *
 * Jegliche Modifikation, Vervielfältigung, Redistribution, Übertragung zum Zwecke der
 * Weiterentwicklung außerhalb der Netzwerke des Anbieters ist untersagt und stellt einen Verstoß
 * gegen die Lizenzvereinbarung dar.
 *
 * Mit der Übernahme dieser Software akzeptieren Sie die zwischen Ihnen und dem Herausgeber
 * festgehaltenen Bedingungen. Der Bruch dieser Bedingungen kann Schadensersatzforderungen nach
 * sich ziehen.
 *
 *
 *
 * (EULA-13/7-OS)
 * 
 * 
 *
 * (c) 2013-2015 imva.biz, Johannes Ackermann, ja@imva.biz
 * @author Johannes Ackermann
 *
 * 13/7/5-15/1/20
 * v 0.9.5.1
 *
 */

class imva_devguide_cleartemp extends imva_devguide_base
{
	
	
	
	/**
	 * Render
	 *
	 * @param null
	 * @return string
	 */
	public function render()
	{
		parent::render();
	
		// Determine whether dialogues are enabled and confirmed OR not enabled
		if (($this->oServ->askMe() and $this->oServ->getP('blconfirm')) or ($this->oServ->askMe() !== true and $this->oServ->getP('blconfirm') == null)){
			$this->_clearTemp();
		}
	
		return 'imva_devguide_cleartemp.tpl';
	}
	
	
	
	/**
	 * Delete contents from /tmp/
	 *
	 * @param null
	 * @return null
	 */
	private function _clearTemp()
	{
		// Compile dir
		$sTempDir = oxRegistry::getConfig()->getConfigParam('sCompileDir');
	
		// tmp
		$this->_clearDir($sTempDir);
	
		// tmp/smarty
		if (file_exists($sTempDir.'/smarty/')){
			$this->_clearDir($sTempDir.'/smarty/');
		}
	
		// tmp/css
		if (file_exists($sTempDir.'/css/')){
			$this->_clearDir($sTempDir.'/css/');
		}
	
		// tmp/less
		if (file_exists($sTempDir.'/less/')){
			$this->_clearDir($sTempDir.'/less/');
		}
	
		// Create new .htaccess
		$oFile = fopen($sTempDir.'/.htaccess','w+');
		fwrite($oFile,"# disabling file access\n<FilesMatch .*>\norder allow,deny\ndeny from all\n</FilesMatch>\n\nOptions -Indexes\n");
		fclose($oFile);
	
		// Set Success Flag
		$this->blSuccess = true;
	}
	
	
	
	/**
	 * Clear directory
	 *
	 * @param string
	 * @return null
	 */
	private function _clearDir($sPath)
	{
		if (is_dir($sPath)){
			if ($oDirH = opendir($sPath)){
				while (($sFile = readdir($oDirH)) !== false){
					if ($sFile != '.' and $sFile != '..'){ // don't do for . and ..
						@unlink($sPath.$sFile); // suppress warnings
					}
				}
				closedir($oDirH);
			}
		}
		else{
			$this->blFail = true;
		}
	}
}