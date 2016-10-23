<?php 

class ContributorMetadataPlugin extends Omeka_Plugin_AbstractPlugin
{
    private $_elementSetName = 'Contributor Information';

/**
* @var array Hooks for the plugin.
*/
    protected $_hooks = array(
        'install',
        'uninstall',
        'admin_append_to_plugin_uninstall_message'
    );
    
/**
* Install the plugin.
*/
    public function hookInstall()
    {

        // Load elements to add.
        require_once('elements.php');

        // Don't install if an element set already exists.
        if ($this->_getElementSet($this->_elementSetName)) {
            throw new Omeka_Plugin_Installer_Exception('An element set by the name "' . $this->_elementSetName . '" already exists. You must delete that element set to install this plugin.');
        }
		// *** For BMA: Comment out the the following line
		else {insert_element_set($elementSetMetadata, $elements);}
		
//*** For BMA: add the current contributor elements to this element set ***
//	  insert_element_set($elementSetMetadata);
//    $idArray = array(68, 70, 71, 72, 73, 74);
//      foreach($idArray as $elementID)
//	  {
//       $elementBMA = $this->_db->getTable('Element')->find($elementID);
//       $elementBMA->setElementSet("Contributor Information");
//	     $elementBMA->save();
//	  }
//	  $nameId = 70;
//	  $name = $this->_db->getTable('Element')->find($nameId);
//	  $name->name = "Contributor Name";
//	  $name->save();
	  
        
    }
    
/**
* Uninstall the plugin.
*/
    public function hookUninstall()
    {
	  $this->_clearContributionTypeElements($this->_elementSetName);
      $this->_deleteElementSet($this->_elementSetName);
    }
    
/**
* Warns before the uninstallation of the plugin.
*/
    public function hookAdminAppendToPluginUninstallMessage()
    {
        echo '<p><strong>' . __('Warning') . '</strong>:'
            . __('This will remove all the "' . $this->_elementSetName . '" elements added by this plugin and permanently delete all element texts entered in those fields.')
            . '</p>';
    }

	protected function _getElement($elementName)
 	{
        $element = $this->_db->getTable('Element')->findByName($elementName);
		return $element;
	 }
	 
	 protected function _getElementSet($elementSet)
 	{
        $element = $this->_db->getTable('ElementSet')->findByName($elementSet);
		return $element;
	 }
	 
	  protected function _clearContributionTypeElements($elementSet)
	 {
		 $db = get_db();
		 $elementTable = $db->getTable('Element');
		 
		 $setElements = $elementTable->findBySet('Contributor Information');
		
		 $elementIds = array();
		 foreach($setElements as $setElement)
		 {
			 $elementIds[] = $setElement->id;
			 
		 }
		  
		  $contributionTypeTable = $db->getTable('ContributionTypeElement');
 
  		  foreach($elementIds as $ID)
		 {
		 	$deleteElement = $contributionTypeTable->findBy(array('element_id' => $ID));
			foreach($deleteElement as $delete)
			{
				$delete->delete();
			}
		 }
	 }
	 
	 protected function _deleteElementSet($elementSet)
	 {
		$this->_db->getTable('ElementSet')->findByName($elementSet)->delete();
	 }
	 
	
}

