<?php

namespace Wjzijderveld\BaseBundle\Model;


class JobManager
{
    private $jobs;

    public function __construct()
    {
        $this->jobs = array(
            array(
                'title'    => 'Parking boy',
                'salary'   => '15cts an hour',
            ),
            array(
                'title'    => 'Lift boy',
                'salary'   => '10cts an hour',
            ),
        );
    }

    public function getJobs()
    {
        return $this->jobs;
    }

    public function getJob($id)
    {
        if (!array_key_exists((int)$id, $this->jobs)) {
            throw new \OutOfBoundsException('No such job');
        }

        return $this->jobs[$id];
    }
} 
