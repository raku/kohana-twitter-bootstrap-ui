Generation Twitter Bootstrap UI with Kohana
===========================

На данный момент модуль позволяет построить практически любые формы (Я так 
предполагаю, т.к. сам только сделал формы для примеров, но старался 
предусмотреть разные варианты)

Все элементы системы наследуют класс `Bootstrap_Abstract` и поэтому создание 
экземпляра любого элемента системы начинается с `Bootstrap_...::factory(array $data, array $attributes)`

От `Bootstrap_Abstract` наследуется два основных класса:

 * `Bootstrap_Helper_Element` - используется для создания одиночных элементов.
 * `Bootstrap_Helper_Elements` - используется для создания списка элементов 
`Bootstrap_Helper_Element` также может делать все то, что и `Bootstrap_Helper_Element`

Т.к. каждый элемент может содержать любое кол-во входных данных, то может 
возникнуть ситуация, что не все данные будут переданы в элемент. 
Для контроля входных данных используется:

<pre>
	public function required()
	{
		return array('name', 'title');
	}
</pre>

Для любого элемента модуля можно указать параметры его элемента через метод
`->attributes(...)` и передать любые значения `->set(...)`.

Атрибуты по умолчанию можно задать у любого элемента:
<pre>
	public function default_attributes()
	{
		return array(
			'method' => Request::POST,
			'enctype' => Bootstrap_Form::URLENCODED
		);
	}
</pre>


### Формы

В модуле есть 4 вида форм:

 * `Bootstrap_Form`
 * `Bootstrap_Form_Inline`
 * `Bootstrap_Form_Search`
 * `Bootstrap_Form_Horizontal`

Все виды форм наследованы от класса `Bootstrap_Form` и имеют незначительные изменения.
В основном это `css` класс формы.

`Bootstrap_Form_Search` - содержит в себе уже поле ввода и кнопку поиска.

`Bootstrap_Form_Horizontal` - поидее преобразует все элементы формы к требуемуму
для горизонтального отображения.



### Примеры:

Формы для примера взяты:
http://twitter.github.com/bootstrap/base-css.html#forms

#### Default
<pre>
	Bootstrap_Form::factory()
		->add(
			Bootstrap_Form_Element_Fieldset::factory(array(
				'title' => __('Legend')
			))
			->add(
				Bootstrap_Form_Element_Input::factory(array(
					'name' => 'input'
				))
				->label('Label name')
				->placeholder('Type something…')
				->help_text('Example block-level help text here.')
			)
			->add(
				Bootstrap_Form_Element_Checkbox::factory(array(
					'name' => 'checkbox'
				))
				->label('Check me out')
			)
			->add(
				Bootstrap_Form_Element_Button::factory(array(
					'name' => 'submit', 'title' => __('Submit') 
				))
			)
		);
</pre>

#### Search form
<pre>
	Bootstrap_Form_Search::factory();
</pre>

#### Inline form
<pre>
	Bootstrap_Form_Inline::factory()
		->add(
			Bootstrap_Form_Element_Input::factory(array(
				'name' => 'email'
			))
			->placeholder('Email')
			->label('Email')
		)
		->add(
			Bootstrap_Form_Element_Password::factory(array(
				'name' => 'password'
			))
			->placeholder('Password')
			->label('Password')
		)
		->add(
			Bootstrap_Form_Element_Checkbox::factory(array(
				'name' => 'checkbox'
			))
			->label('Remember me')
		)
		->add(
			Bootstrap_Form_Element_Button::factory(array(
				'name' => 'submit', 'title' => __('Sign-in') 
			))
		);
</pre>

#### Horizontal form
<pre>
	Bootstrap_Form_Horizontal::factory()
		->add(
			Bootstrap_Form_Element_Input::factory(array(
				'name' => 'Email'
			))
			->label('Email')
		)
		->add(
			Bootstrap_Form_Element_Input::factory(array(
				'name' => 'Password'
			))
			->label('Password')
		)
		->add(
			Bootstrap_Form_Element_Control_Group::factory()
			->add(
				Bootstrap_Form_Element_Checkbox::factory(array(
					'name' => 'checkbox'
				))
				->label('Remember me')
			)
			->add(
				Bootstrap_Form_Element_Button::factory(array(
					'name' => 'submit', 'title' => __('Sign-in') 
				))
			)
		);
</pre>
