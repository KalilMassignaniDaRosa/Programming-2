<?php
interface Repository
{
    public function create(array $data);
    public function save($obj);
    public function list();
    public function getById($id);
    public function update(array $data);
    public function delete($id);
}
