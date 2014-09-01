<?php

class AskController extends \BaseController {

	public function index()
	{
        return View::make('home');
	}

	public function create()
	{
        $name     = Input::get('name');
        $phone1   = Input::get('phone1');
        //$phone2   = Input::get('phone2');
        $question = Input::get('question');

        Sms::send(array('to'=>$phone1, 'text'=>$name.' asked the question: '.$question. 'Answer: 100% Yes!'));
        return 'tst';
	}

}