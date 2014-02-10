<?

namespace MP;

class Ustawy extends Application
{

    protected $requests_prefix = '/ustawy/';
    
    public function search($q)
    {
        
        return $this->Dane()->searchDataset('ustawy', array(
        	'limit' => 1,
        ));
        
    }

}