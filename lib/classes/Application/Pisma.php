<?php

namespace MP;


class Pisma extends Application
{
    protected $requests_prefix = '/pisma/';

	public function transfer_anonymous($params) {
        return $this->request('transfer_anonymous', $params);
    }
	
    public function documents_search($params) {
        return $this->request('documents', $params);
    }
    
    public function documents_create($doc) {
        return $this->request('documents', $doc, 'POST');
    }
    
    public function documents_read($id, $params = array()) {
	    return $this->request('documents/' . $id, $params);
    }
    
    public function documents_update($id, $doc) {
        return $this->request('documents/' . $id, $doc, 'POST');
    }
    
    public function documents_delete($id, $params = array()) {
        return $this->request('documents/' . $id, $params, 'DELETE');
    }
    
    public function documents_send($id) {
        return $this->request('documents/' . $id . '/send', null, 'POST');
    }
        
    public function templates_grouped() {
        return $this->request('templates/grouped');
    }
    
    public function templates_read($id) {
        return $this->request('templates/' . $id);
    }
} 