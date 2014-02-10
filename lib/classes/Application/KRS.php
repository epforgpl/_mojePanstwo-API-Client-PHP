<?

namespace MP;

class KRS extends Application
{

    protected $requests_prefix = '/krs/';

    public function getFeaturedOrganizationsByGroups()
    {
        $data = @$this->request('organizations/getFeaturedByGroups');
        return @$data['groups'];
    }

}