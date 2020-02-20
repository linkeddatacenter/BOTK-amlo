<?php
namespace AMLO\Model;

class Gianos3D extends FIBO implements \BOTK\ModelInterface
{
	protected static $VOCABULARY  = [
	   'amlo' =>  'http://w3id.org/amlo/core#',			
	];
	
	const DEFAULT = ['filter'=> FILTER_DEFAULT, 'flags'=> FILTER_REQUIRE_SCALAR] ;
	
	protected static $DEFAULT_OPTIONS = [
        'ndg-registry-uri' => [ 'default'=> 'http://data.example.org/resource/ndg-registry' ],
        'activityId' => self::DEFAULT ,
        'subjectId' => self::DEFAULT ,
        'subjectName' => self::DEFAULT ,
        'subjectNDG' => self::DEFAULT ,
        'subjectCountry' => self::DEFAULT ,
        'subjectGender' => self::DEFAULT ,
        'subjectDateOfBirth' => self::DEFAULT ,
        'subjectBornInMunicipality' => self::DEFAULT ,
        'unexpectedActivityPeriod' => self::DEFAULT ,
        'ignore' => self::DEFAULT ,
        'unexpectedActivityStatus' => self::DEFAULT ,
        'unexpectedActivityStatusDescription'  => self::DEFAULT ,
        'evaluatorId' => self::DEFAULT ,
        'unexpectedActivityNotes' => self::DEFAULT ,
        'accountableBranchCode' => self::DEFAULT ,
        'created' => self::DEFAULT ,
        'unexpectedActivityRiskProfile' => self::DEFAULT ,
	];
	
	public function asTurtleFragment()
	{
		if(is_null($this->rdf)) {
		    
		    /********************************
		     * Individuals URIs
		     ********************************/
		    // unexpected activity
		    $activityURI = $this->buildURI($this->data['activityId'], '-activity');
		    
		    // autonomous agent
		    $subjectURI = $this->buildURI($this->data['subjectId'], '-agent' ) ;
		    
		    //Bank branch office
		    $branchURI = $this->buildURI($this->data['accountableBranchCode'], '-branch' );
		    
		    //Unexpected Activity Report
		    $reportURI = $this->buildURI($this->data['activityId'], '-report' );
		    
		    
		    
		    /********************************
		     * Facts
		     ********************************/
		    # E' stata identificata una operatività inattesa di cui è responsabile un soggetto (agente)
		    $this->addFragment('<%s> a amlo:UnexpectedActivity .', $activityURI ,false);
		    $this->addPartyInRole($activityURI, $subjectURI, 'amlo:Accountable');
		    
			# Il soggetto è identificato nel registro dei clienti della banca		    
			$this->addFragment('<%s> a fibo-fnd-aap-ppl:Person ;', $subjectURI ,false);
			$this->addFragment(' fibo-fnd-aap-agt:hasName "%s" ;', $this->data['subjectName']);
			$this->addFragment(' fibo-fnd-aap-ppl:hasGender "%s" ;', $this->data['subjectGender']);
			$this->addFragment(' fibo-fnd-aap-ppl:hasDateOfBirth "%s" ;', $this->data['subjectDateOfBirth']);
			$this->addFragment(' fibo-fnd-aap-ppl:hasPlaceOfBirth "%s" ;', $this->data['subjectBornInMunicipality']);
			$this->rdf .= '.';
			$this->addFiboIdentifier( $subjectURI, 'fibo-fnd-pas-pas:ClientIdentifier', $this->data['subjectId'],  $this->data['ndg-registry-uri'] );
			
			# l'operatività inattesa è stata segnalata alla dipendenza incaricata delle indagini
			$this->addFragment('<%s> a amlo:ActivityReport ;', $reportURI ,false);
			$this->addFragment(' amlo:isReportedOnDate "%s"^^xsd:dateTime  ;',$this->data['created'] ,false);
			$this->addFragment(' fibo-fnd-arr-rep:isReportedTo <%s>  ;',$branchURI ,false);
			$this->addFragment(' fibo-fnd-arr-rep:reportsOn <%s>  .',$activityURI ,false);
		}

		return $this->rdf;
	}
}