<?php
namespace kilyakus\web\widgets;

class Select2 extends \kilyakus\select2\Select2
{
	public function init()
	{
		if($this->pluginOptions['closeOnSelect'] === null){
			$this->pluginOptions['closeOnSelect'] = false;
		}
		parent::init();
	}
}