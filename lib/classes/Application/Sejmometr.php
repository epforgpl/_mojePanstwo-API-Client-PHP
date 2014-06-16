<?

namespace MP;

class Sejmometr extends Application
{

    protected $requests_prefix = '/sejmometr/';
    
    
    public function autorzy_projektow($params = array())
	{
		return $this->request('autorzy_projektow', $params);
	}
	
	public function zawody()
	{
		return $this->request('zawody');
	}
	
	public function getStats()
	{
		return $this->request('stats');
	}

}