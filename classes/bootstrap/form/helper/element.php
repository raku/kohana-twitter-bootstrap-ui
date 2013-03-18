<?php defined( 'SYSPATH' ) or die( 'No direct access allowed.' );

/**
 * http://twitter.github.com/bootstrap/base-css.html#forms
 * @package    Twitter bootstrap/Helper
 */
class Bootstrap_Form_Helper_Element extends Bootstrap_Helper_Element {

	/**
	 * 
	 * @param string $text
	 * @param boolean $inline
	 * @return \Bootstrap_Abstract
	 */
	public function help_text( $text, $inline = FALSE)
	{
		$attributes = array('class' => Bootstrap_Form_Helper_Help::BLOCK);
		
		if($inline !== FALSE)
			$attributes = array('class' => Bootstrap_Form_Helper_Help::INLINE);
		
		$help_text = Bootstrap_Form_Helper_Help::factory(array(
				'text' => $text
			))
			->attributes($attributes)
			->set_parent( $this );
		
		return $this->set('help_text', $help_text);
	}
}