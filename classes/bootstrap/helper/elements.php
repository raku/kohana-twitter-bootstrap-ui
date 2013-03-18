<?php defined( 'SYSPATH' ) or die( 'No direct access allowed.' );

/**
 * http://twitter.github.com/bootstrap/base-css.html#forms
 * @package    Twitter bootstrap/UI
 */
class Bootstrap_Helper_Elements extends Bootstrap_Helper_Element implements Countable {
	
	/**
	 *
	 * @var array 
	 */
	protected $_elements = array();
	
	/**
	 * 
	 * @param Bootstrap_Helper_Element $element
	 * @param integer $priority
	 */
	public function add( $element, $priority = 0 )
	{
		if( is_string( $element ) )
		{
			$element = Bootstrap::HTML( $element );
		}

		if( ! ($element instanceof Bootstrap_Helper_Element ))
			throw new Bootstrap_Exception(
					'Element must be an instance of Bootstrap_Helper_Element');

		$priority = (int) $priority;

		while ( isset( $this->_elements[$priority] ) )
		{
			$priority++;
		}
		
		$this->_elements[$priority] = $element
			->set_parent( $this );
		
		return $this;
	}
	
	public function br()
	{
		return $this->add( Bootstrap::HTML('<br />'));
	}
	
	public function hr()
	{
		return $this->add( Bootstrap::HTML('<hr />'));
	}

	/**
	 * 
	 * @return integer
	 */
	public function count()
	{
		return count($this->_elements);
	}
	
	protected function _build_content() 
	{
		$this->_content = View::factory( $this->_template_folder . '/elements')
			->bind('elements', $this->_elements);
	}
}