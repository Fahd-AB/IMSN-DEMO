<?php

require_once 'Class.php';







class noeud
{

    public $contenu;
    public $suivant;
    
    

    function __construct($contenu)
    {
        $this->contenu = $contenu;
        $this->suivant = NULL;
    }
    
    function afficher_noeud()
    {
        return $this->contenu;
    }
}






class liste
{
    private $tete;
    private $queue;
    private $taille;
    
    
   
    function __construct()
    {
        $this->tete = NULL;
        $this->queue = NULL;
        $this->taille = 0;
    }

    public function est_vide()
    {
        return ($this->tete == NULL);
    }
    
    public function inserer_tete($contenu,$c)
    {
        $nouveau = new noeud($contenu);
        $nouveau->suivant = $this->tete;
        $this->tete = &$nouveau;
        
        if($this->queue == NULL)
            $this->queue = &$nouveau;
            
        $this->taille++;
    }
    
    public function inserer_queue($contenu,$c)
    {  $table="";
	   $val=Array();
        if($this->tete != NULL)
        {
            $nouveau = new noeud($contenu);
            $this->queue->suivant = $nouveau;
            $nouveau->suivant = NULL;
            $this->queue = &$nouveau;
            $this->taille++;
        }
        else
        {
            $this->inserer_tete($contenu);
        }
		
		
	//++++++++test si instance of admin+++++++++
if($contenu instanceof admin)
{
$table="admin";
$count_id=$contenu->getid();

$exist=$c->afficher($table,"id=".$count_id);
 
 
$taille=count($exist);
		if($taille==0)
		{
		
		$val[0]=$contenu->getid();
		$val[1]=$contenu->getlogin();
		$val[2]=$contenu->getpassword();
		
		}
 
}
	
 //++++++++test si instance of personne+++++++++		
if($contenu instanceof personne)
{
$table="personne";
$cli_id=$contenu->getid();

$exist=$c->afficher($table,"id=".$cli_id);
 
 
$taille=count($exist);
		if($taille==0)
		{
		
		$val[0]="";
		$val[1]=$contenu->getfirstname();
		$val[2]=$contenu->getlastname();
		$val[3]=$contenu->getemail();
		$val[4]=$contenu->getadresse();
		$val[5]=$contenu->gettown_name();
		$val[6]=$contenu->getcountry_id();
		$val[7]=$contenu->getphone();
		//$val[8]=$contenu->getlist_subscriptions();
		
		}
 
}

//+++++++++++++test si instance of bill+++++
 if($contenu instanceof bill)
{
 
$table="bill";
$count_id=$contenu->getid_bill();

$exist=$c->afficher($table,"id=".$count_id);
 
 
$taille=count($exist);
		if($taille==0)
		{
		$val[0]=$contenu->getid_bill();
		$val[1]=$contenu->getcost_service();
		$val[2]=$contenu->gettax_country();
		$val[3]=$contenu->getsum();
		$val[4]=$contenu->getid_usage();
		}
}




//++++++++test si instance of subscription+++++++++
if($contenu instanceof subscription)
{
$table="subscription";
$count_id=$contenu->getid();

$exist=$c->afficher($table,"id=".$count_id);
 
 
$taille=count($exist);
		if($taille==0)
		{
		
		$val[0]=$contenu->getid();
		$val[1]=$contenu->getstatus();
		$val[2]=$contenu->getid_personne();
		$val[3]=$contenu->getcode_offer();
		
		}
 
}



//++++++++test si instance of country+++++++++
if($contenu instanceof country)
{
$table="country";
$count_id=$contenu->getcode();

$exist=$c->afficher($table,"code=".$count_id);
 
 
$taille=count($exist);
		if($taille==0)
		{
		
		$val[0]=$contenu->getcode();
		$val[1]=$contenu->getname();
		$val[2]=$contenu->getfee();
		
		}
 
}

//++++++++test si instance of county+++++++++
if($contenu instanceof county)
{
$table="county";
$count_id=$contenu->getcode();

$exist=$c->afficher($table,"code=".$count_id);
 
 
$taille=count($exist);
		if($taille==0)
		{
		
		$val[0]=$contenu->getcode();
		$val[1]=$contenu->getname();
		$val[2]=$contenu->getid_country();
		
		}
 
}



//+++++++++++++test si instance of employees+++++
 if($contenu instanceof employee)
{
 
$table="employe";
$count_id=$contenu->getid_personne();

$exist=$c->afficher($table,"id_personne=".$count_id);
 
 
$taille=count($exist);
		if($taille==0)
		{
		$val[0]=$contenu->getid_personne();
		$val[1]=$contenu->getlogin();
		$val[2]=$contenu->gethire_date();
		$val[3]=$contenu->getdepart_date();
		$val[4]=$contenu->getservice_name();
		$val[5]=$contenu->getperiod_of_work();
		$val[6]=$contenu->getdiscount();
		}
}




 
        if(count($val)!=0)
		{
		$result=$c->insert($table,$val);	
		}
		
    
}
   
	
	
	
    public function supprimer_tete()
    {  
        $temp = $this->tete;
        $this->tete = $this->tete->suivant;
        if($this->tete != NULL)
            $this->taille--;
         $nouveau_tete=$this->tete;
        return $nouveau_tete;
    }
    
    public function supprimer_queue()
    {
        if($this->tete != NULL)
        {
            if($this->tete->suivant == NULL)
            {
                $this->tete = NULL;
                $this->taille--;
            }
            else
            {
                $precedent = $this->tete;
                $courant = $this->tete->suivant;
                
                while($courant->suivant != NULL)
                {
                    $precedent = $courant;
                    $courant = $courant->suivant;
                }
                
                $precedent->suivant = NULL;
                $this->taille--;
            }
        }
    }
    
    public function supprimer_noeud($cle,$tab,$con,$c)
    {
        $courant = $this->tete;
        $precedent = $this->tete;
        $result;
	   
        while($courant->contenu != $cle)
        {
            if($courant->suivant == NULL)
                return NULL;
            else
            {
                $precedent = $courant;
                $courant = $courant->suivant;
            }
        }

        if($courant == $this->tete)
         {
              if($this->taille == 1)
               {
                  $this->queue = $this->tete;
               }
               $this->tete = $this->tete->suivant;
        }
        else
        {
            if($this->queue == $courant)
            {
                 $this->queue = $precedent;
             }
            $precedent->suivant = $courant->suivant;
        }
        $this->taille--;  
		
		$result=$c->supp($tab,$con);
	
		
		return $result;
    }
    
	
	
	
    public function recherche($cle)
    {
        $courant = $this->tete;
        while($courant->contenu != $cle)
        {
            if($courant->suivant == NULL)
                return null;
            else
                $courant = $courant->suivant;
        }
        return $courant->contenu;
    }
    
	
	
	
    public function noeud_contenu($position)
    {
        if($position <= $this->count)
        {
            $courant = $this->tete;
            $pos = 1;
            while($pos != $position)
            {
                if($courant->suivant == NULL)
                    return null;
                else
                    $courant = $courant->suivant;
                    
                $pos++;
            }
            return $courant->contenu;
        }
        else
            return NULL;
    }
    
	
	
    public function liste_taille()
    {
        return $this->taille;
    }
    
	
    public function afficher_liste()
    {
        $l = array();
        $courant = $this->tete;
        
        while($courant != NULL)
        {
            array_push($l, $courant->afficher_noeud());
            $courant = $courant->suivant;
        }
        return $l;
    }
    
  
	public function modifier_objet($tab,$champ,$nv_val,$cond,$c){
	    $result=$c->modifier($tab,$champ,$nv_val,$cond);
	}
	
	
}

 
?>