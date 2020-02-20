<?php
namespace AMLO\Model;

/*
 * Some helpers for FIBO ontology
 */
abstract class FIBO extends \BOTK\Model\AbstractModel
{
    
    protected static $DEFAULT_OPTIONS = [
        'base' => [ 'default'=> 'http://data.example.org/resource/' ]
    ];
    
	protected static $VOCABULARY  = [
	   'fibo-fnd-dt-oc'    	=>  'https://spec.edmcouncil.org/fibo/ontology/FND/DatesAndTimes/Occurrences/',
	   'fibo-fnd-pas-pas'	=>  'https://spec.edmcouncil.org/fibo/ontology/FND/ProductsAndServices/ProductsAndServices/',
	   'fibo-fnd-arr-rt'	=>  'https://spec.edmcouncil.org/fibo/ontology/FND/Arrangements/Ratings/',
	   'fibo-fnd-arr-rep'	=>  'https://spec.edmcouncil.org/fibo/ontology/FND/Arrangements/Reporting/',
	   'fibo-fnd-arr-doc'	=>  'https://spec.edmcouncil.org/fibo/ontology/FND/Arrangements/Documents/',
	   'fibo-fnd-arr-asmt'	=>  'https://spec.edmcouncil.org/fibo/ontology/FND/Arrangements/Assessments/',
	   'fibo-fnd-arr-id'	=>  'https://spec.edmcouncil.org/fibo/ontology/FND/Arrangements/IdentifiersAndIndices/',
	   'fibo-fnd-acc-cur'	=>  'https://spec.edmcouncil.org/fibo/ontology/FND/Accounting/CurrencyAmount/',
	   'fibo-fnd-qt-qtu'	=>  'https://spec.edmcouncil.org/fibo/ontology/FND/Quantities/QuantitiesAndUnits/',
	   'fibo-fnd-acc-4217'	=>  'https://spec.edmcouncil.org/fibo/ontology/FND/Accounting/ISO4217-CurrencyCodes/',
	   'fibo-fnd-rel-rel'	=>  'https://spec.edmcouncil.org/fibo/ontology/FND/Relations/Relations/',
	   'fibo-fnd-aap-agt'	=>  'https://spec.edmcouncil.org/fibo/ontology/FND/AgentsAndPeople/Agents/',
	   'fibo-fnd-aap-ppl'   =>  'https://spec.edmcouncil.org/fibo/ontology/FND/AgentsAndPeople/People/',
	   'fibo-fnd-pty-pty'	=>  'https://spec.edmcouncil.org/fibo/ontology/FND/Parties/Parties/',
	   'fibo-be-oac-exec'	=>  'https://spec.edmcouncil.org/fibo/ontology/BE/OwnershipAndControl/Executives/',
	   'fibo-fbc-pas-caa'	=>  'https://spec.edmcouncil.org/fibo/ontology/FBC/ProductsAndServices/ClientsAndAccounts/',
	];
	
	/*
	 * Generates an URY from an id token
	 */
	public function buildURI($id=null, $suffix='')
	{
	    assert($this->data['base']);
	    
	    if (empty($id)) {
	        $idGenerator=$this->uniqueIdGenerator;
	        $id = $idGenerator($this->data); 
	    }
	    
	    return $this->data['base'] . $id . $suffix;
	}
	
	
	/**
	 * adds a FIBO idenfifier
	 */
	protected function addFiboIdentifier($idenfiedURI, $type, $id, $registryURI=null, $idURI=null)
	{
	    assert( $type && $id && $idenfiedURI);
	    
	    $subjectIdURI = $this->buildURI($id, '') ;
	    $this->addFragment("<$subjectIdURI> fibo-fnd-rel-rel:hasTag \"%s\" ;", $id, false);
	    $this->addFragment(" fibo-fnd-aap-agt:identifies <%s> ;", $idenfiedURI, false );
	    $this->addFragment(" fibo-fnd-rel-rel:isDefinedIn <%s> ;", $registryURI ,false );
	    $this->addFragment(" a %s .", $type ,false);
	    
	    return $this;
	}
	
	/**
	* adds a party in role
	*/
	protected function addPartyInRole($subjectURI, $partyURI, $role)
	{
	    assert( $subjectURI && $partyURI && $role );
	    
	    $this->rdf .= "<$subjectURI> fibo-fnd-pty-pty:hasPartyInRole [ a $role ; fibo-fnd-rel-rel:hasIdentity <$partyURI> ] .";
	    $this->tripleCount += 3;
	    
	    return $this;
	}
}