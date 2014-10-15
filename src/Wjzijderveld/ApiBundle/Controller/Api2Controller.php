<?php

namespace Wjzijderveld\ApiBundle\Controller;


use Symfony\Component\HttpFoundation\Response;

class Api2Controller extends ApiController
{
    public function getJobsAction()
    {
        $jobs = $this->get('wjzijderveld_api.job_manager')->getJobs();

        usort($jobs, function ($a, $b) {
            return strcmp($a['title'], $b['title']);
        });

        return new Response(json_encode($jobs));
    }
}
