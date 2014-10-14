<?php

namespace Wjzijderveld\Option2\Api2Bundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    public function getJobsAction()
    {
        $jobs = $this->get('wjzijderveld_option2.job_manager')->getJobs();

        usort($jobs, function ($a, $b) {
            return strcmp($a['title'], $b['title']);
        });

        return new Response(json_encode($jobs));
    }

    public function getJobAction($id)
    {
        $job = $this->get('wjzijderveld_option2.job_manager')->getJob($id);
        return new Response(json_encode($job));
    }
} 
