<?

namespace MP;

class Sejmometr extends Application
{

    protected $requests_prefix = '/sejmometr/';
    
    public function autorzy_projektow($params = array())
	{
		return $this->request('autorzy_projektow', $params);
	}

}