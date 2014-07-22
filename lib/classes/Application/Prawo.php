<?

namespace MP;

class Prawo extends Application
{

    protected $requests_prefix = '/prawo/';
    
    public function getExposedTags()
    {
	    return $this->request('tags/getExposed');
    }
    
    public function search($q)
    {
        
        return $this->Dane()->searchDataset('prawo', array(
        	'limit' => 1,
        ));
        
    }

}