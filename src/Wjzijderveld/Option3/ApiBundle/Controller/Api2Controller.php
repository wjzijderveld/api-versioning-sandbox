<?php

namespace Wjzijderveld\Option3\ApiBundle\Controller;


use Symfony\Component\HttpFoundation\Response;

class Api2Controller extends ApiController
{
    public function getJobsAction()
    {
        $jobs = $this->get('wjzijderveld_option2.job_manager')->getJobs();

        uasort($jobs, function ($a, $b) {
            return -1 * strcmp($a['title'], $b['title']);
        });

        return new Response(json_encode($jobs));
    }
}