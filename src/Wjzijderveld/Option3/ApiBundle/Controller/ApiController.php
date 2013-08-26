<?php

namespace Wjzijderveld\Option3\ApiBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    public function getJobsAction()
    {
        $jobs = $this->get('wjzijderveld_option2.job_manager')->getJobs();

        return new Response(json_encode($jobs));
    }

    public function getJobAction($id)
    {
        $job = $this->get('wjzijderveld_option2.job_manager')->getJob($id);
        return new Response(json_encode($job));
    }
} 