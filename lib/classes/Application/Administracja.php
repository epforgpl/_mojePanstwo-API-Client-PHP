<?

namespace MP;

class Administracja extends Application
{

    protected $requests_prefix = '/administracja/';
    
    
    public function getData($params = array())
	{
		return $this->request('getData', $params);
	}
	
}