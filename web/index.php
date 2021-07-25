<?php

// Tab name
$TAB = ".net Web Apps";

// Include vesta functions
include($_SERVER['DOCUMENT_ROOT'] . "/inc/main.php");
require 'lib/RepoDownloader.php';

$action = isset($_POST['action']) ? $_POST['action']:"";



 if($action=="info"){
    if ($user == 'admin') {
        $output = Vesta::exec('dotnet --info');
    } else {
        $output = __("You are not allowed to perform this action");
    }
    Vesta::render_cmd_output($output, __(".net info"), $_SERVER['REQUEST_URI']);
}

else if($action=="install"){
    if ($user != 'admin') 
        $output = __("You are not allowed to perform this action");
    


//install 

//download repo
 $githubRepoName = $_POST["githubRepoName"];
 $githubUser = $_POST["githubUser"];
 $githubToken = $_POST["githubToken"];


 $web_parts = explode("|", $_POST['webDomain']);
 $userName = trim($web_parts[0]);
 $webDomain = trim($web_parts[1]);

 if ($user == 'admin' || $user == $user_name) {
     $output = Vesta::exec('v-install-dotnet-app', $app, $userName, $webDomain);
 } else {
     $output = __("You are not allowed to perform this action");
 }

 Vesta::render_cmd_output($output, __("Installing") . " $app", $_SERVER['REQUEST_URI']);


$repoDL = new RepoDownloader();

$repoDL->download(array(
    'user'   => $githubUser,
    'token'  =>  $githubToken,
    'repo'   =>  $githubRepoName,
    'saveAs' => $webDomain.'-latest.zip'
));

//publish 
// dotnet publish — configuration Release

//copy

//edit nginx block

/*

Create your Asp.Net service
Create the service file
sudo vim /etc/systemd/system/{your-service-name}.service
Service file example:
[Unit]
Description=This is a sample application for my tutorial
[Service]
WorkingDirectory=/home/ubuntu/apps/sample
ExecStart=/usr/bin/dotnet /home/ubuntu/apps/sample/Harrys.Sample.ddl
Restart=always
# Restart service after 10 seconds if the dotnet service crashes:
RestartSec=10
KillSignal=SIGINT
SyslogIdentifier=dotnet-example
User=www-data
Environment=ASPNETCORE_ENVIRONMENT=Production
Environment=DOTNET_PRINT_TELEMETRY_MESSAGE=false
# If you need to run multiple services on different ports set
# the ports environment variable here:
# Environment=ASPNETCORE_URLS=http://localhost:6000
[Install]
WantedBy=multi-user.target



Save the file and you can enable the service as follows:
sudo systemctl enable {your-service-name}.service
Then you need to start your service:
sudo systemctl start{your-service-name}.service
Check that it is running as follows:
sudo systemctl status {your-service-name}.service
If the application is not running successfully when you check the status you may need to look at verbose logs for debugging. To do this run use the journalctl interface:
sudo journalctl -fu {your-service-name}.service

*/
    
    
}




else {
    Vesta::render("/templates/install.php", ['plugin' => 'dotnetapps', 'data' => $data]);
}
