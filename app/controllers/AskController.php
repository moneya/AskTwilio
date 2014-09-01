<?php

class AskController extends \BaseController {

	public function index()
	{
        return View::make('home');
	}

	public function create()
	{
        $name     = trim(Input::get('name'));
        $phone1   = $this->formatNumber(Input::get('phone1'));
        $phone2   = $this->formatNumber(Input::get('phone2'));
        $question = trim(Input::get('question'));

        $validator = Validator::make(
            array(
                'name'     => $name,
                'phone1'   => $phone1,
                'phone2'   => $phone2,
                'question' => $question,
            ),
            array(
                'name' => 'required',
                'phone1' => 'required',
                'phone2' => 'required',
                'question' => 'required',
            )
        );

        if ($validator->fails())
        {
            return Redirect::to('/')->withErrors($validator);
        }

        Sms::send(array('to'=> $phone1, 'text'=> $name.' asked the question: '.$question. ' Answer: 100% Yes!'));
        Sms::send(array('to'=> $phone2, 'text'=> $name.' asked the question: '.$question. ' Answer: 100% Yes!'));
        return 'tst';
	}

    private function formatNumber($number){
        $number = preg_replace("/[^0-9]/", "", $number);
        if(substr($number, 0, 1) === 1 )
        {
            return '+'.$number;
        }
        return '+1'.$number;
    }

}