<?php

namespace Wjzijderveld\ApiBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    public function getJobsAction()
    {
        $jobs = $this->get('wjzijderveld_api.job_manager')->getJobs();

        return new Response(json_encode($jobs));
    }

    public function getJobAction($id)
    {
        $job = $this->get('wjzijderveld_api.job_manager')->getJob($id);
        return new Response(json_encode($job));
    }
} 
