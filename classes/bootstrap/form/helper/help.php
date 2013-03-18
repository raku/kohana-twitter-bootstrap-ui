<?php defined( 'SYSPATH' ) or die( 'No direct access allowed.' );

/**
 * http://twitter.github.com/bootstrap/base-css.html#forms
 * @package    Twitter bootstrap/Helper
 */
class Bootstrap_Form_Helper_Help extends Bootstrap_Helper_Element {
	
	/**
	 * Inline and block level support for help text that appears around form 
	 * controls.
	 */
	const INLINE = 'help-inline';
	const BLOCK = 'help-block';
	
	public function default_attributes()
	{
		return array(
			'class' => 'help-block'
		);
	}
	
	public function required()
	{
		return array('text');
	}
	
	protected function _build_content() 
	{
		parent::_build_content();
		
		$this->_content = '<span'.(string) $this->attributes().'>' . $this->get('text') . '</span>';
	}
}