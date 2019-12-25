<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Storage;

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
        Storage::disk('local')->put('.ssh/id_rsa.pub', $convert);
        Storage::disk('local')->put('.ssh/id_rsa', $convpriv);

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

    if (ssh2_auth_pubkey_file($connection, 'marce',
                          '/home/username/.ssh/id_rsa.pub',
                          '/home/username/.ssh/id_rsa', 'Caspita')) {
        echo "Public Key Authentication Successful\n";
    } 
    else {
        die('Public Key Authentication Failed');
        }
    }

    public function ftpconn() {
        $ftp_server = "167.99.86.138";
        $ftp_user = "ftploader";
        $ftp_pass = "load";
        $file = '/home/marcello/Scrivania/upload.php';
        $remote_file = 'upload.php';
        $conn_id = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server"); 

        if (@ftp_login($conn_id, $ftp_user, $ftp_pass)) {
            echo "Connected as $ftp_user@$ftp_server\n";
        } 
        else {
            echo "Couldn't connect as $ftp_user\n";
        }
        //ftp_chdir($conn_id, '/var/www/html/');
        if (ftp_put($conn_id, '/html/'.$remote_file, $file, FTP_ASCII)) {
            echo "successfully uploaded $file\n";
        } 
        else {
            echo "There was a problem while uploading $file\n";
        }

        ftp_close($conn_id);  
        return view('good');
    }
}
