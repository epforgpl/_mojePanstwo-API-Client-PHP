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
    
    public function search($q)
    {
        $search = @$this->request('search', array(
        	'q' => $q,
        ));
        return $search;
    }
    
    public function getOrganizationIdBy($params)
    {
	    return $this->request('organizations/getOrganizationIdBy', $params);
    }

}