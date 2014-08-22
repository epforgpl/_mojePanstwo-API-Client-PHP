<?php

namespace MP;


class Pisma extends Application
{
    protected $requests_prefix = '/pisma/';

    public function documents_index() {
        return $this->request('documents');
    }

    public function document_save($doc) {
        if (isset($doc['id']) && $doc['id']) {
            return $this->request('documents/' . $doc['id'], $doc, 'POST');

        } else {
            return $this->request('documents', $doc, 'POST');
        }
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