<?php

use Framework\Singleton\Router\Router;

Router::get()->addGet("/patient/findAll", "App\Modules\Patient\Controller\PatientController@findAll", 'patient.findAll');
Router::get()->addGet("/patient", "App\Modules\Patient\Controller\PatientController@find", 'patient.find');
Router::get()->addPost("/patient", "App\Modules\Patient\Controller\PatientController@create", 'patient.create');
Router::get()->addPut("/patient", "App\Modules\Patient\Controller\PatientController@update", 'patient.update');
Router::get()->addDelete("/patient", "App\Modules\Patient\Controller\PatientController@delete", 'patient.delete');
