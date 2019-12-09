<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


class Connection extends Controller
{
    public function sshconn() {
    	$command = base_path().'/vendor/bin/envoy run deploy';
    	$directory = base_path();
        //$open = new Process('cd ..');
        //$content = ['cd ..', '/vendor/bin/envoy run deploy'];
    	//$process = new Process('cd .. && vendor/bin/envoy run deploy');
        $process = new Process('ls');
    	//dd('cacca');
    	//$process->start();
        //$open->run();
        $process->run();
        
        echo $process->getOutput();
        echo "gagagag";
        echo $process->getErrorOutput();
    	
    	//$process->setWorkingDirectory($command);
    	
        $err = $process->getErrorOutput();
        $warn = $process->getOutput();
        //dd($process->getOutput());
        
    	return view('good', compact('err', 'warn'));
    }

    
}
