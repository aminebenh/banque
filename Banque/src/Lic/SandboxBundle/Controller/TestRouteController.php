<?php

namespace Lic\SandboxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TestRouteController extends Controller
{
    public function test1Action($year, $month, $filename, $ext)
    {
        $args = array(
            'year' => $year,
            'month' => $month,
            'filename' => $filename,
            'ext' => $ext,
        );
        return $this->render('@LicSandbox/TestRoute/test1.html.twig', $args);
    }

    public function test4bAction($year)
    {
        $args = array(
            'year' => $year,
        );
        return $this->render('@LicSandbox/TestRoute/test4b.html.twig', $args);
    }

}