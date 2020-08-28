<?php
/**
 * Class Test_Random_Quote_WP
 *
 * @package Random_Quote_Wp
 */

/**
 * Tests for Random_Quote_Wp class
 */
class Test_Random_Quote_WP extends WP_UnitTestCase {

	/**
	* Holds post id.
	*
	* @var int
	*/
	private $post_id;

	/**
	* Create a post for our test.
	*/
	public function setUp() {
		$this->post_id = $this->factory->post->create( [
			'post_title' => 'Hello World',
			'post_content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
			'post_status' => 'publish'
		] );
	}

	/**
	* Delete the post after the test.
	*/
	public function tearDown() {
		wp_delete_post( $this->post_id );
	}

	/**
	* Test to ensure quote template.
	*/
	public function test_random_quote_template() {
		$random_quote = new Random_Quote_Wp();

		$template = $random_quote->get_quote_template();

		$this->assertInternalType( 'string', $template );

		$this->assertRegExp( '/<br\/><p><b>(.*?)<\/b><blockquote>(.*?)<\/blockquote><\/p>/', $template );
	}

	/**
	* Test to ensure random quote added to post.
	*/
	public function test_random_quote_post() {
		$content = apply_filters( 'the_content', get_post_field( 'post_content', $this->post_id ) );

		$this->assertInternalType( 'string', $content );

		$this->assertRegExp( '/<br\/><p><b>(.*?)<\/b><blockquote>(.*?)<\/blockquote><\/p>/', $content );
	}
}
