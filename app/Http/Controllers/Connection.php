<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;


class Connection extends Controller
{
    public function sshconn() {
    	$command = base_path().'/vendor/bin/envoy run deploy';
    	$directory = base_path();
    	$process = new Process($command);
    	//dd('cacca');
    	//$process->start();
    	$process->run();
    	$process->setWorkingDirectory($command);
    	echo $process->getOutput();
    	echo "gagagag";
    	echo $process->getErrorOutput();
        $err = $process->getErrorOutput();
        $warn = $process->getOutput();
        //dd($process->getOutput());
    	return view('good', compact('err', 'warn'));
    }
}
