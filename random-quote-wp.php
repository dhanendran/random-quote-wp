<?php
/**
 * Displays a random quote at the bottom of the post.
 *
 * @package   random-quote-wp
 * @link      https://github.com/dhanendran/random-quote-wp
 * @author    Dhanendran Rajagopal <https://dhanendranrajagopal.me>
 * @license   GPL v3 or later
 *
 * Plugin Name:  Random Quote WP
 * Description:  Displays a random quote at the bottom of the post
 * Version:      0.1.0
 * Plugin URI:   https://github.com/dhanendran/wp-random-quote
 * Author:       Dhanendran Rajagopal
 * Author URI:   https://dhanendranrajagopal.me
 * Text Domain:  random-quote-wp
 * Network:      true
 * Requires PHP: 5.3
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */

require_once dirname(__FILE__) . '/class-quotes.php';

class Random_Quote_WP {

	/**
	* Hook into `the_content` action to append quote.
	*/
	public function init() {
		add_filter( 'the_content', array( $this, 'add_quote' ) );
	}

	/**
	* Prepare a templste for a quote.
	*
	* @return string
	*/
	public function get_quote_template() {

		$quote_object = new Quotes();

		$quote = $quote_object->get_quote();

		$template = sprintf( '<br/>
			<p>
				<b>Quote of the day</b>
				<blockquote> %s - %s</blockquote>
			</p>',
			$quote['quote'],
			$quote['by'] );

		return $template;
	}

	/**
	* Append a randon quote to post content.
	*
	* @return string
	*/
	public function add_quote( $content ) {

		return $content . $this->get_quote_template();
	}

}

( new Random_Quote_WP() )->init();