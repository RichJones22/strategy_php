<?php
/**
 * Created by PhpStorm.
 * User: Rich
 * Date: 6/22/2015
 * Time: 9:12 AM
 *
 * Strategy Pattern:
 * - A strategy pattern defines a family of algorithms.
 * - Encapsulates each one.
 * - And then makes them interchangeable.
 *
 * In this way we can build loosely coupled applications via polymorphism with the ability to swap out
 * the various algorithms at runtime.
 *
 *
 */


//Encapsulate and make them interchangeable.
interface Logger {

    public function log($data);
}

// Define a family of algorithms.
class LogToFile implements Logger{

    public function log($data)
    {
        var_dump("Log '$data' to a file.");
    }
}
class LogToDataBase implements Logger{

    public function log($data)
    {
        var_dump("Log '$data' to a database.");
    }
}
class LogToXWebService implements Logger{

    public function log($data)
    {
        var_dump("Log '$data' to a web service.");
    }
}

// define the app class
Class App {
    public function log ($data, Logger $logger = null)
    {
        // set default, if needed.
        $logger = $logger ?: new LogToFile;

        $logger->log($data);
    }
}

// create app instance.
$app = new App;

// pop. $Logs for looping.  Note: null is a default for LogToFile().
$Logs = array(new LogToFile(), new LogToDataBase(), New LogToXWebService(), null);

// execute $app->log routine using "Some DATA"
foreach($Logs as $log)
{
    $app->log("Some DATA", $log);
}
$app->log("Some DATA");  // invokes default case.



