<?

namespace MP;

class Exception extends \Exception
{
	
	public $data = array();
	
	public function __construct($message = null, $data, $code = 0, Exception $previous = null) {
		
		$this->data = $data;
		parent::__construct($message, $code, $previous);
		
	}
	
	public function getData() {
		return $this->data;
	}
	
}