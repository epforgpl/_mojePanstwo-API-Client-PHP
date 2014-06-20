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
	
	public function getLatestData()
	{
		$ret = $this->request('latestData');	
		
		if( !empty($ret) ) {
			foreach( $ret as $key => &$val ) {
				if( isset($val['dataobjects']) && !empty($val['dataobjects']) ) {
					foreach( $val['dataobjects'] as &$object ) {
						
						$object = $this->Dane()->interpretateObject( $object );
						
					}	
				}
			}
		}
		
		return $ret;
	}
}