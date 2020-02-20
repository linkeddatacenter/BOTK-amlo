<?php
require_once __DIR__.'/../../../vendor/autoload.php';

$options = [
	'factsProfile' => [
		'model'			=> '\\AMLO\\Model\\Gianos3D',
		'modelOptions'	=> [
			'base' => [ 'default'=> 'http://data.example.org/resource/' ]
		],
		'datamapper'	=> function($rawdata){
			$data = array();
			$data['activityId'] = $rawdata[0];
			$data['subjectId'] = $rawdata[1];
			$data['subjectName'] = $rawdata[2];
			$data['subjectNDG'] = $rawdata[3];
			$data['subjectCountry'] = $rawdata[4];
			$data['subjectGender'] = $rawdata[5];
			$data['subjectDateOfBirth'] = $rawdata[6];
			$data['subjectBornInMunicipality'] = $rawdata[7];
			$data['unexpectedActivityPeriod'] = $rawdata[8];
			
			$data['unexpectedActivityStatus'] = $rawdata[10];
			$data['unexpectedActivityStatusDescription'] = $rawdata[11];
			$data['evaluatorId'] = $rawdata[12];
			$data['unexpectedActivityNotes'] = $rawdata[13];
			$data['accountableBranchCode'] = $rawdata[14];
			$data['created'] = $rawdata[15];			
			$data['unexpectedActivityRiskProfile'] = $rawdata[16];
			return $data;
		},
		'rawdataSanitizer' => function( $rawdata){
			return (
			    $rawdata[0] &&
			    $rawdata[1] &&
			    $rawdata[12] &&
                ($rawdata[9]=='N')
			)?$rawdata:false;
		},	
	],
	'skippFirstLine'	=> true,
	'fieldDelimiter' => ','
];

BOTK\SimpleCsvGateway::factory($options)->run();