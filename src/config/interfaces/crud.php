<?php

    namespace BruzDeporte\config\Interfaces;

    interface Crud {
        public function store($data);
        public function findAll();
        public function find($id);
        public function update($id, $data);
        public function delete($id);
    }
