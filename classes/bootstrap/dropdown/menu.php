<?php defined( 'SYSPATH' ) or die( 'No direct access allowed.' );

/**
 * http://twitter.github.com/bootstrap/base-css.html#forms
 * @package    Twitter bootstrap/Dropdown
 */
class Bootstrap_Dropdown_Menu extends Bootstrap_Helper_Elements {
	
	const DIVIDER = 'divider';
	
	/**
	 * You can easily add dividers to your nav links with an empty list item 
	 * and a simple class. Just add this between links:
	 * 
	 *		<li class="divider"></li>
	 * 
	 * @return string
	 */
	public static function divider()
	{
		return '<li'.HTML::attributes(array('class' => Bootstrap_Dropdown_Menu::DIVIDER)).'></li>';
	}

	/**
	 * 
	 * @return string
	 */
	public static function caret()
	{	
		return '<span'.HTML::attributes(array('class' => 'caret')).'></span>';
	}
	
	protected $_template = 'dropdown/menu';
	
	public function default_attributes()
	{
		return array(
			'class' => 'dropdown-menu'
		);
	}
	
	/**
	 * 
	 * @param Bootstrap_Helper_Element $element
	 * @param integer $priority
	 */
	public function add( $element, $priority = 0 )
	{
		parent::add($element, $priority);
		
		$element->attributes()->delete('class', '^btn');
		
		return $this;
	}
	
	/**
	 * 
	 * @return \Bootstrap_Dropdown_Menu
	 */
	public function add_divider()
	{
		$this->_elements[] = Bootstrap_Dropdown_Menu::divider();
		return $this;
	}

	protected function _build_content() 
	{
		$this->_template->set('elements', $this->_elements);
	}
}