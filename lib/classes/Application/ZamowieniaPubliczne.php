<?

namespace MP;

class ZamowieniaPubliczne extends Application
{

    protected $requests_prefix = '/zamowieniapubliczne/';

    public function getStats()
    {
        $data = @$this->request('stats');
        return @$data['stats'];
    }

}