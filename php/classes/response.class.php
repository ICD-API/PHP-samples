<?php
	/**
	 * Formatted JSON response for an ajax call  
	 * 
	 * @version		1.0
	 * @author    	mdonada	 
	 * @package		classes
	 * @since 		icd-api-playground 1.0
	 */
	 
	class Response {
		
		private $status;	// int (0 => error, 1 => OK)
		private $data;		// string[]
				
		private $error = 'Generic error';		// string
						
				
		/**
		 * Response constructor
		 */	
		public function __construct() {
			
			$this->status = 0;
			$this->data = array('error' => 'Generic error');
		}

		
		/**
		 * Set status 
		 * @param int $status
		 */		
		public function setStatus($status) {
						
			$this->status = $status;			
		}
		
		
		/**
		 * Set data 
		 * @param string[] $data
		 */		
		public function setData($data) {
						
			$this->data = $data;			
		}
		
		
		/**
		 * Set error
		 * @param string $error
		 */
		public function setError($error) {
		
			$this->error = $error;
		}
		
		
		/**
		 * Set all response
		 * @param int $status
		 * @param string[] $data
		 */		
		public function set($status, $data) {
						
			$this->setStatus($status);
			$this->setData($data);	
		}		
		
		
		/**
		 * Get results in JSON format 
		 * @return string
		 */		
		public function encode() {			
			
			if($this->status == 0) {
				$this->data = array('error' => $this->error);
				$response = array('status' => $this->status, 'data' => $this->data);
			}
			else {
				$response = array('status' => $this->status, 'data' => $this->data);
			}					
			return json_encode($response);			
		}		
			
	}

?>
