<?

namespace MP;

class ZamowieniaPubliczne extends Application
{

    protected $requests_prefix = '/zamowieniapubliczne/';

    public function getStats()
    {
        return @$this->request('stats');
    }

}