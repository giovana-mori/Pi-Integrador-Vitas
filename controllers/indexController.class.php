<?php
class indexController extends LayoutController
{
	public function index()
	{
		$data['title'] = 'Home';
		$this->render('views/index', $data);
	}

}