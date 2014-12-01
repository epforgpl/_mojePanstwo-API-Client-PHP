<?php

namespace MP;


class Pisma extends Application
{
    protected $requests_prefix = '/pisma/';

    public function search() {
        return $this->request('search');
    }

    public function save($doc) {
        if (isset($doc['id']) && $doc['id']) {
            return $this->request($doc['id'], $doc, 'POST');

        } else {
            return $this->request('index', $doc, 'POST');
        }
    }
    
    public function load($id) {
	    return $this->request($id);
    }
    
    public function getTemplatesGrouped() {
        return $this->request('templates/grouped');
    }
    
    public function getTemplate($id) {
        return $this->request('templates/' . $id);
    }

    public function document_get($id) {
        return $this->request('documents/' . $id);
    }

    public function document_send($id) {
        return $this->request('documents/' . $id . '/send');
    }

    public function document_delete($id) {
        return $this->request('documents/' . $id . '/delete');
    }
} 