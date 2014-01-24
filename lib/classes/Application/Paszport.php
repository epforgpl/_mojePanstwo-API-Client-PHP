<?

namespace MP;
class Paszport extends Application
{

    protected $requests_prefix = '/paszport/';

    public function info($params = array())
    {
        return $this->User()->info($params);
    }

    public function find($endpoint, $queryData, $type = 'first')
    {
        return $this->request($endpoint . '/find/' . $type, $queryData);
    }

    public function findAsList($endpoint, $queryData = array())
    {
        return $this->request($endpoint . '/as_list', $queryData);
    }

    public function User()
    {
        return new PaszportUser($this->user_id, $this->stream_id);
    }

    public function deletefield($model, $object_id, $field)
    {
        return $this->request("$model/deletefield/$object_id/$field");
    }

    public function field($model, $object_id, $params = array())
    {
        return $this->request("$model/field/$object_id", $params);
    }

    public function add($endpoint, $params = array())
    {
        return $this->request($endpoint . '/add', $params);
    }

    public function delete($endpoint, $object_id)
    {
        return $this->request("$endpoint/delete/$object_id");
    }
}