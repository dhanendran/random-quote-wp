<?php
/**
* Quotes class
*/

class Quotes {
	/**
	* Quotes
	*/
	private $quotes = array(
		array(
			'quote' => 'The greatest glory in living lies not in never falling, but in rising every time we fall.',
			'by' => 'Nelson Mandela',
		),
		array(
			'quote' => 'The way to get started is to quit talking and begin doing.',
			'by' => 'Walt Disney',
		),
		array(
			'quote' => 'Your time is limited, so don\'t waste it living someone else\'s life. Don\'t be trapped by dogma – which is living with the results of other people\'s thinking.',
			'by' => 'Steve Jobs',
		),
		array(
			'quote' => 'There is noting like good thing or bad thing. It\'s all about majorities.',
			'by' => 'Dhanendran Rajagopal',
		),
		array(
			'quote' => 'Life is what happens when you\'re busy making other plans.',
			'by' => 'John Lennon',
		),
	);

	/**
	* Return a random quote.
	*
	* @return array
	*/
	public function get_quote() {
		return $this->quotes[ rand(0, 4) ];
	}
}