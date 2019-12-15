<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


class Connection extends Controller
{
    public function sshconn() {
    	//$command = base_path().'/vendor/bin/envoy run deploy';
    	//$directory = base_path();
        //$open = new Process('cd ..');
        //$content = ['cd ..', '/vendor/bin/envoy run deploy'];
    	//$process = new Process('cd .. && vendor/bin/envoy run deploy');
        //$process = new Process('ls');
    	//dd('cacca');
    	//$process->start();
        //$open->run();
        //$process->run();
        $url = "http://159.65.168.219/conn.php";
        $contents = file_get_contents($url);
        $dec = json_decode($contents);
        $convert = $dec->{'key'};
        $convpriv = $dec->{'keypriv'};
        //$filepub = "id_rsa.pub";
        //Storage::disk('local')->putFile('.ssh', $filepub);


        //echo $contents;
        //echo $process->getOutput();
        //echo "gagagag";
        //echo $process->getErrorOutput();
    	
    	//$process->setWorkingDirectory($command);
    	
        //$err = $process->getErrorOutput();
        //$warn = $process->getOutput();
        //dd($process->getOutput());
        
    	return view('good');
    }

    function connect() {
        $connection = ssh2_connect('shell.example.com', 22, array('hostkey'=>'ssh-rsa'));

if (ssh2_auth_pubkey_file($connection, 'username',
                          '/home/username/.ssh/id_rsa.pub',
                          '/home/username/.ssh/id_rsa', 'secret')) {
  echo "Public Key Authentication Successful\n";
} else {
  die('Public Key Authentication Failed');
}
    }
}
