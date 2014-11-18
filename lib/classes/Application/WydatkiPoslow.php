<?

namespace MP;

class WydatkiPoslow extends Application
{

    protected $requests_prefix = '/wydatkiposlow/';

    public function getStats()
    {
        return @$this->request('stats');
    }

}