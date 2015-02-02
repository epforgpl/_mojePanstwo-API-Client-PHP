<?

namespace MP;

class WyjazdyPoslow extends Application
{

    protected $requests_prefix = '/wyjazdyposlow/';

    public function getStats()
    {
        return @$this->request('stats');
    }

}