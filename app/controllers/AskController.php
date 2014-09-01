<?php

class AskController extends \BaseController {

	public function index()
	{
        return View::make('home');
	}

	public function create()
	{
        $name     = trim(Input::get('name'));
        $phone1   = $this->cleanNumber(Input::get('phone1'));
        $phone2   = $this->cleanNumber(Input::get('phone2'));
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

        $answer = $this->getAnswer();

        Sms::send(array('to'=> $this->formatNumber($phone1), 'text'=> $name.' asked the question: '.$question. ' Answer: '.$answer));
        Sms::send(array('to'=> $this->formatNumber($phone2), 'text'=> $name.' asked the question: '.$question. ' Answer: '.$answer));
        return 'tst';
	}

    private function cleanNumber($number)
    {
        return preg_replace("/[^0-9]/", "", $number);
    }

    private function formatNumber($number)
    {
        if(substr($number, 0, 1) === 1 )
        {
            return '+'.$number;
        }
        return '+1'.$number;
    }

    private function getAnswer()
    {
        $random = rand(1,10);

        switch ($random) {
            case 1:
                return '100% Yes!';
                break;
            case 2:
                return "Let's hope not...";
                break;
            case 3:
                return "Don't count on it!";
                break;
            case 4:
                return "Seems that way.";
                break;
            case 5:
                return "Without a dout!";
                break;
            case 6:
                return "Meh...";
                break;
            case 7:
                return "Hahaha whatever you say...";
                break;
            case 8:
                return "Hard to tell.";
                break;
            case 9:
                return "Weird question :/";
                break;
            case 10:
                return "Better not tell you.";
                break;
        }
    }

}