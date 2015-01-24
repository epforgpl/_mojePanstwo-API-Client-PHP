<?php

namespace MP;


class Pisma extends Application
{
    protected $requests_prefix = '/pisma/';

    public function search($params) {
        return $this->request('documents', $params);
    }

    public function save($doc) {
        if (isset($doc['id']) && $doc['id']) {
            return $this->request($doc['id'], $doc, 'POST');

        } else {
            return $this->request('index', $doc, 'POST');
        }
    }
    
    
    public function getTemplatesGrouped() {
        return $this->request('templates/grouped');
    }
    
    public function getTemplate($id) {
        return $this->request('templates/' . $id);
    }

    public function document_read($id, $params = array()) {
	    return $this->request('documents/' . $id, $params);
    }
    
    public function document_create($doc) {
        return $this->request('documents', $doc, 'POST');
    }

    public function document_send($id) {
        return $this->request('documents/' . $id . '/send');
    }

    public function document_delete($id, $params = array()) {
        return $this->request('documents/' . $id, $params, 'DELETE');
    }
} 