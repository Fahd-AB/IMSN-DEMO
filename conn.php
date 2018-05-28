 <?php
 
require_once'Class.php';
require_once'liste.php';

 error_reporting(0);
 
 $c=new connexion();
 
 $req="";
$obj_client;
$req=$_GET['client_req'];
$o = json_decode($req);
$type_main = $o->{'type'};
 
 
 if($type_main=="checkmember"){
   $liste_members=new liste();
   
   $ls=$c->afficher("admin","");
$taille_members=count($ls);
$i=0;
while($i<$taille_members){
$admin = new admin($ls[$i]['id'],$ls[$i]['login'],$ls[$i]['password']);
$liste_members->inserer_queue($admin,$c);
$i++;
}
$aff_members=$liste_members->afficher_liste();

  print json_encode($aff_members);
  
 

}
  
 
 
 

  $liste_personnes=new liste();
 if($type_main=="connect"){
  
   $ls=$c->afficher("personne","");  //extract all clients from DB
  
   
   
$taille_personne=count($ls);
$i=0;
while($i<$taille_personne){
	 $liste_subscriptions_cl=new liste();
	 $ls_sub=$c->afficher("subscription","id_pers='"+$ls[$i]['email']+"'"); //extract all subscriptions for the client from DB
	 $taille_sub=count($ls_sub);
     $j=0; 
	 while($j<$taille_sub){
		$subscription = new subscription($ls_sub[$j]['id'],$ls_sub[$j]['status'],$ls_sub[$j]['id_pers'],$ls_sub[$j]['code_offer']);
        $liste_subscriptions_cl->inserer_queue($subscription,$c);
        $j++; 
	 }
	 
$personne = new personne($ls[$i]['id'],$ls[$i]['firstname'],$ls[$i]['lastname'],$ls[$i]['email'],$ls[$i]['adress'],$ls[$i]['town'],$ls[$i]['country'],$ls[$i]['phone'],$liste_subscriptions_cl);
$liste_personnes->inserer_queue($personne,$c);
$i++;
}
$aff_personne=$liste_personnes->afficher_liste();

  print json_encode($aff_personne);
  
 

}




 
if($type_main=="countries"){
 $liste_countries=new liste();
   
   $ls=$c->afficher("country","");
$taille_countries=count($ls);
$i=0;
while($i<$taille_countries){
	 $liste_counties_country=new liste();
	 $ls_counties=$c->afficher("county","id_country='"+$ls[$i]['name']+"'"); //extract all counties for the country from DB
	 $taille_counties=count($ls_counties);
     $j=0; 
	 while($j<$taille_counties){
		$county = new county($ls_counties[$j]['code'],$ls_counties[$j]['name'],$ls_counties[$j]['id_country']);
        $liste_counties_country->inserer_queue($county,$c);
        $j++; 
	 }
	$liste_offers_country=new liste();
	 $ls_offers=$c->afficher("offer","country_id='"+$ls[$i]['name']+"'"); //extract all offers for the country from DB
	 $taille_offers=count($ls_offers);
     $k=0; 
	 while($k<$taille_offers){
		$offer = new offer($ls_offers[$k]['id'],$ls_offers[$k]['status'],$ls_offers[$k]['id_pers'],$ls_offers[$k]['code_offer']);
        $liste_offers_country->inserer_queue($offer,$c);
        $k++; 
	 }
    $country = new country($ls[$i]['code'],$ls[$i]['name'],$ls[$i]['fee'],$liste_offers_country,$liste_counties_country);

    $liste_countries->inserer_queue($country,$c);
    $i++;
}
$aff_countries=$liste_countries->afficher_liste();

  print json_encode($aff_countries);
}









if($type_main=="employees"){
$liste_employes=new liste();
   
$le=$c->afficher("employe","");
$taille_emp=count($le);
$x=0;
while($x<$taille_emp){
$employee = new employee($le[$x]['id_personne'],$le[$x]['login'],$le[$x]['hire_date'],$le[$x]['depart_date'],$le[$x]['service_name'],$le[$x]['period_of_work'],$le[$x]['discount']);
$liste_employes->inserer_queue($employee,$c);
$x++;
}
$aff_emplo=$liste_employes->afficher_liste();

  print json_encode($aff_emplo);
}





if($type_main=="counties"){
$liste_counties=new liste();
   
$lc=$c->afficher("county","");
$taille_emp=count($lc);
$i=0;
while($i<$taille_emp){
$county = new county($lc[$i]['code'],$lc[$i]['name'],$lc[$i]['id_country']);
$liste_counties->inserer_queue($county,$c);
$i++;
}
$aff_coun=$liste_counties->afficher_liste();

  print json_encode($aff_coun);
}

 

if($type_main=="services"){
$liste_services=new liste();
   
$lss=$c->afficher("network_service","");
$taille_serv=count($lss);
$i=0;
while($i<$taille_serv){
	   $liste_usage=new liste();
	 $ls_usa=$c->afficher("usage","service_name='"+$lss[$i]['name']+"'"); //extract all services for the usage from DB
	 $taille_usa=count($ls_usa);
     $j=0; 
	 while($j<$taille_usa){
		 
		 
			 $liste_bills=new liste();
			 $ls_bill=$c->afficher("bill","id_usage='"+$ls_usa[$j]['id_usage']+"'"); //extract all bills for the usage from DB
			 $taille_bill=count($ls_bill);
			 $m=0; 
			 while($m<$taille_bill){
				$usage = new usage($ls_bill[$m]['id'],$ls_bill[$m]['cost_service'],$ls_bill[$m]['tax_country'],$ls_bill[$m]['sum'],$ls_bill[$m]['id_usage']);
				$liste_bills->inserer_queue($usage,$c);
				$m++; 
			 }
				 
		 
		 
		$usage = new usage($ls_usa[$j]['id_usage'],$ls_usa[$j]['id_submission'],$ls_usa[$j]['quantity'],$ls_usa[$j]['date_hour_sub'],$ls_usa[$j]['phone_model'],$ls_usa[$j]['country_code'],$ls_usa[$j]['service_name'],$liste_bills);
        $liste_usage->inserer_queue($usage,$c);
        $j++; 
	 }
	
	
$service = new service($lss[$i]['name'],$lss[$i]['fee'],$lss[$i]['code_offer'],$liste_usage);
$liste_services->inserer_queue($service,$c);
$i++;
}
$aff_serv=$liste_services->afficher_liste();
  print json_encode($aff_serv);
}

 
if($type_main=="bills"){
$liste_bills=new liste();
   
$lb=$c->afficher("bill","");
$taille_bills=count($lb);
$x=0;
while($x<$taille_bills){
$bill = new bill($lb[$x]['id'],$lb[$x]['cost_service'],$lb[$x]['tax_country'],$lb[$x]['sum'],$lb[$x]['id_usage']);
$liste_bills->inserer_queue($bill,$c);
$x++;
}
$aff_bill=$liste_bills->afficher_liste();

  print json_encode($aff_bill);
}



if($type_main=="inser_cl"){

 $firstname = $o->{'firstname'};
 $lastname = $o->{'lastname'};
 $mail = $o->{'mail'};
  $adress = $o->{'adress'};
 $town = $o->{'town'};
 $country = $o->{'country'};
 $phone = $o->{'phone'};

$personne = new personne('',$firstname,$lastname,$mail,$adress,$town,$country,$phone,null);
$liste_personnes->inserer_queue($personne,$c);


}
//update_cl

if($type_main=="update_cl"){

 $firstname = $o->{'firstname'};
 $lastname = $o->{'lastname'};
 $mail = $o->{'mail'};
  $adress = $o->{'adress'};
 $town = $o->{'town'};
 $country = $o->{'country'};
 $phone = $o->{'phone'};

//$personne = new personne('',$firstname,$lastname,$mail,$adress,$town,$country,$phone,null);
//$liste_personnes->inserer_queue($personne,$c);
$sql="update personne set firstname='$firstname',lastname='$lastname',email='$mail',adress='$adress',town='$town',country='$country', phone='$phone' where email='$mail'";
mysql_query($sql);

}



if($type_main=="fire_employee"){
 $id_personne = $o->{'id_personne'};
 $date_end = $o->{'date_end'};	
	
$sql="update employe set depart_date='$date_end' where id_personne='$id_personne'";
mysql_query($sql);	
	

}



if($type_main=="rehire_employee"){
 $id_personne = $o->{'id_personne'};
 $date_begin = $o->{'date_begin'};	
	
$sql="update employe set depart_date='',hire_date='$date_begin' where id_personne='$id_personne'";
mysql_query($sql);	
	

}




if($type_main=="offers"){
	 

$liste_offers_un=new liste();
   
$loff=$c->afficher("offer","");
$taille_off=count($loff);
$r=0;
while($r<$taille_off){
	
	

	
 
$liste_services=new liste();
$lss=$c->afficher("network_service","offer_name='"+$lo[$x]['offer_name']+"'");
$taille_serv=count($lss);
$i=0;
while($i<$taille_serv){
	   $liste_usage=new liste();
	 $ls_usa=$c->afficher("usage","service_name='"+$lss[$i]['name']+"'"); //extract all services for the usage from DB
	 $taille_usa=count($ls_usa);
     $j=0; 
	 while($j<$taille_usa){
		 
		 
			 $liste_bills=new liste();
			 $ls_bill=$c->afficher("bill","id_usage='"+$ls_usa[$j]['id_usage']+"'"); //extract all bills for the usage from DB
			 $taille_bill=count($ls_bill);
			 $m=0; 
			 while($m<$taille_bill){
				$usage = new usage($ls_bill[$m]['id'],$ls_bill[$m]['cost_service'],$ls_bill[$m]['tax_country'],$ls_bill[$m]['sum'],$ls_bill[$m]['id_usage']);
				//$taille_bill->inserer_queue($usage,$c);
				$m++; 
			 }
				 
		 
		 
		$usage = new usage($ls_usa[$j]['id_usage'],$ls_usa[$j]['id_submission'],$ls_usa[$j]['quantity'],$ls_usa[$j]['date_hour_sub'],$ls_usa[$j]['phone_model'],$ls_usa[$j]['country_code'],$ls_usa[$j]['service_name'],$liste_bills);
        $liste_usage->inserer_queue($usage,$c);
        $j++; 
	 }
	
	
$service = new service($lss[$i]['name'],$lss[$i]['fee'],$lss[$i]['code_offer'],$liste_usage);
$liste_services->inserer_queue($service,$c);
$i++;
}
// fin récupération des services pour l offre courant
 $liste_subscriptions=new liste();
			 $ls_sub=$c->afficher("subscription","code_offer='"+$lo[$x]['code']+"'"); //extract all bills for the usage from DB
			 $taille_sub=count($ls_sub);
			 $n=0; 
			 while($n<$taille_sub){
				$subscription = new subscription($ls_sub[$n]['id'],$ls_sub[$n]['status'],$ls_sub[$n]['id_pers'],$ls_sub[$n]['code_offer']);
				$liste_subscriptions->inserer_queue($subscription,$c);
				$n++; 
			 }	
	




$offer_1 = new offer($loff[$r]['code'],$loff[$r]['offer_name'],$loff[$r]['price_per_month'],$loff[$r]['country_id'],$loff[$r]['id_network'],$liste_services,$liste_subscriptions);


$liste_offers_un->inserer_queue($offer_1,$c);
$r++;
}
$aff_offers=$liste_offers_un->afficher_liste();

  print json_encode($aff_offers);


}	






if($type_main=="delete_offer"){
 $id_offer = $o->{'id_offer'};
  $c=new connexion();
  $c->supp("offer","code='$id_offer'"); 

}
 
if($type_main=="delete_client"){
 $email = $o->{'email'};
 $c=new connexion();
 $c->supp("personne","email='$email'"); 
}

if($type_main=="delete_country"){
 $id_country = $o->{'id_country'};
 $c=new connexion();
 $c->supp("country","code='$id_country'"); 
}
if($type_main=="delete_county"){
 $id_county = $o->{'id_county'};
 $c=new connexion();
 $c->supp("county","code='$id_county'"); 
}
if($type_main=="delete_bill"){
 $id_bill = $o->{'id_bill'};
 $c=new connexion();
 $c->supp("bill","id='$id_bill'"); 
}
if($type_main=="delete_service"){
 $id_service = $o->{'id_service'};
 $c=new connexion();
 $c->supp("network_service","id='$id_service'"); 
}



if($type_main=="update_bill"){
 $id_bill = $o->{'id_bill'};
 $service_cost = $o->{'service_cost'};	
 $tax = $o->{'tax'};
 $sum = $o->{'sum'};	
 $c=new connexion();
 $req="cost_service='$service_cost',tax_country='$tax',sum='$sum'";
 $c->modifier("bill","1",$req,"id='$id_bill'"); 
}
if($type_main=="update_country"){
 $id_country = $o->{'id_country'};
 $name_country = $o->{'name_country'};	
 $fee_country = $o->{'fee_country'};
 	
 $c=new connexion();
 $req="name='$name_country',fee='$fee_country'";
 $c->modifier("country","1",$req,"code='$id_country'"); 
}
if($type_main=="update_service"){
 $name_serv = $o->{'name_serv'};
 $fee_sev = $o->{'fee_sev'};	
 $offer = $o->{'offer'};
 	
 $c=new connexion();
 $req="fee='$fee_sev',code_offer='$offer'";
 $c->modifier("network_service","1",$req,"name='$name_serv'"); 
}
if($type_main=="update_county"){
 $id_county = $o->{'id_county'};
 $name_county = $o->{'name_county'};	
 $code_country_l = $o->{'code_country_l'};
 	
 $c=new connexion();
 $req="name='$name_county',id_country='$code_country_l'";
 $c->modifier("county","1",$req,"code='$id_county'"); 
}

if($type_main=="update_offer"){
 $id_offer = $o->{'id_offer'};
 $name_offer = $o->{'name_offer'};	
 $price_offer = $o->{'price_offer'};
 $id_country = $o->{'id_country'};	
 $id_net = $o->{'id_net'};
 	
 $c=new connexion();
 $req="offer_name='$name_offer',price_per_month='$price_offer',country_id='$id_country',id_network='$id_net'";
 $c->modifier("offer","1",$req,"code='$id_offer'"); 
}

 
 if($type_main=="inser_bill"){

 $code_bill = $o->{'code_bill'};
 $cost_bill = $o->{'cost_bill'};
 $tax_bill = $o->{'tax_bill'};
 $sum_bill = $o->{'sum_bill'};
 $usage_bill = $o->{'usage_bill'};
 $c=new connexion();
 $valeurs=array();
 $valeurs[0]=$code_bill;
 $valeurs[1]=$cost_bill;
 $valeurs[2]=$tax_bill;
 $valeurs[3]=$sum_bill;
 $valeurs[4]=$usage_bill;
 $c->insert("bill",$valeurs);
 
//$bill1 = new bill($code_bill,$cost_bill,$tax_bill,$sum_bill,$usage_bill);
//$liste_bills->inserer_queue($bill1,$c);


}          
 

 ?>