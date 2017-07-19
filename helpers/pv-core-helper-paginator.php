<?php
/**
 * Shared validator class
 *
 * @link       philadelphiavotes.com
 * @since      1.0.0
 *
 * @package    Pv_Core
 * @subpackage Pv_Core/helpers
 * @author     matthew murphy <matthew.e.murphy@phila.gov>
 */

if ( ! class_exists( 'Pv_Core_Helper_Paginator' ) ) {
	/**
	 * Class for pv core paginator helper.
	 */
	class Pv_Core_Helper_Paginator {

		/**
		 * Pagination
		 *
		 * @var mixed $pagination
		 */
		protected $pagination;

		/**
		 * Constructor
		 *
		 * @param      mixed $pagination  The pagination.
		 */
		public function setup( $pagination = null ) {
			$this->pagination = $pagination;
		}

		/**
		 * Gets the list footer.
		 */
		public function get_list_footer() {
			?>
			<div class="row-actions visible">
				<span class="first panel left"><a href="#">&lt;&lt; first</a> |</span>
				<span class="previous panel left"><a href="#">&lt; previous</a> |</span>
				<span class="next panel right"><a href="#">next &gt;</a> |</span>
				<span class="last panel right"><a href="#">last &gt;&gt;</a></span>
			</div>
			<?php
		}
	}
}
