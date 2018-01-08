<?php

$worker = new \GearmanWorker();
$worker->addServer('gearman');
$worker->addFunction('echo', 'doEcho');
$worker->addFunction('test', 'doTest');

while ($worker->work());
function doEcho($job) {
    // Can be viewed via the worker's supervisor logs
    echo "Workload: ".$job->workload()."\n";
}

function doTest($job) {
    // Can be viewed via the worker's supervisor logs
    echo "Workload-Test: ".$job->workload()."\n";
}
