<?

namespace MP;

class Kultura extends Application
{

    protected $requests_prefix = '/kultura/';

    public function getIndex( $id )
    {
        return @$this->request('indeksy/' . $id);
    }
    
}