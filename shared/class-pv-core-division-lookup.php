<?php
/**
 * Shared validator class
 *
 * @link       philadelphiavotes.com
 * @since      1.0.0
 *
 * @package    Pv_Elections_Core
 * @subpackage Pv_Elections_Core/db
 * @author     matthew murphy <matthew.e.murphy@phila.gov>
 */

if ( ! class_exists( 'Pv_Core_Division_Lookup' ) ) {

	/**
	 * Shared simple division lookup class
	 */
	class Pv_Core_Division_Lookup {

		/**
		 * Local copy of the data.
		 *
		 * @var mixed $data
		 **/
		public $data;

		/**
		 * Local copy of the data.
		 *
		 * @var string $key
		 **/
		public $key;

		/**
		 * Return from $service_url
		 *
		 * @var mixed $results
		 */
		public $results;

		/**
		 * Url for looking up Divisions
		 *
		 * @var string $service_url
		 */
		public $service_url = 'https://api.phila.gov/ais/v1/search/%s?gatekeeperKey%s';

		/**
		 * Setup.
		 *
		 * @param      mixed $data   The data.
		 */
		public function __construct( $data ) {
			$this->data = &$data;
			$this->process_address();
		}

		/**
		 * Gets the division.
		 *
		 * @return     mixed $this->results The division.
		 */
		public function get_division() {
			return $this->results->features[0]->properties->election_precinct;
		}


		/**
		 * Gets the division.
		 *
		 * @return     mixed $this->results The division.
		 */
		public function is_success() {
			if ( isset( $this->results->status ) ) {
				return false;
			}

			if ( ! count( $this->results->features ) ) {
				return false;
			}

			return true;
		}

		/**
		 * Does the actual work.
		 */
		public function process_address() {
			$this->results = json_decode(
				wp_remote_get(
					sprintf(
						$this->service_url,
						$this->data['street_address'],
						$this->key
					)
				)
			);
		}

		/**
		 * Sets the key.
		 *
		 * @param      string $value  The key.
		 */
		public function set_key( $value ) {
			$this->key = $value;
		}
	}
}