<?php 

class StatusController
{
    public function all()
    {
        return StatusModel::all();
    }
}