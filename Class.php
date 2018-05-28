<?php
//error_reporting (0);
class connexion{
var $db;
function connexion(){
error_reporting(0);
$db=mysql_connect("localhost", "root", "");
mysql_select_db("mobilenetwork");

}
//affiche
function afficher($table,$condition){
    $rows = array();
    $hostname="localhost";
	$username="root";
	$password="";
    $dbh = new PDO("mysql:host=$hostname; dbname=mobilenetwork", $username, $password);
if($condition==""){

    $stmt = $dbh->prepare("SELECT * FROM $table");
	$stmt->execute();
	$rows = $stmt->fetchAll();

}
else{
    $stmt = $dbh->prepare("SELECT * FROM $table where $condition");
	$stmt->execute();
	$rows = $stmt->fetchAll();
}

return $rows;
}



//insertion
function insert($table,$valeurs){
    $hostname="localhost";
	$username="root";
	$password="";
    $dbh = new PDO("mysql:host=$hostname; dbname=mobilenetwork", $username, $password);
$vals="";
$i=0; 
 
$taille=count($valeurs);
$almost=$taille-1;
while($i<$taille){
if($i==$almost){
$vals = $vals."'".$valeurs[$i]."'";
}
else{
$vals = $vals."'".$valeurs[$i]."'".",";
}
$i++;

}

    $stmt = $dbh->prepare("INSERT INTO $table values($vals)");
	$res=$stmt->execute();
	
	
 
return $res;
}




// delete
function supp($table,$condition){
	$hostname="localhost";
	$username="root";
	$password="";
    $dbh = new PDO("mysql:host=$hostname; dbname=mobilenetwork", $username, $password);
	$stmt="";
if($condition==""){
$stmt = $dbh->prepare("DELETE FROM $table");
}
else{
$stmt = $dbh->prepare("DELETE FROM $table WHERE $condition");
}

$res=$stmt->execute();
return $res;
}



//update
function modifier($table,$champ,$valeur,$condition){
	$hostname="localhost";
	$username="root";
	$password="";
    $dbh = new PDO("mysql:host=$hostname; dbname=mobilenetwork", $username, $password);
	$stmt="";
	
if($champ=="1")
{
$stmt = $dbh->prepare("UPDATE $table SET  $valeur  WHERE $condition");

}
else if($condition==""){
$stmt = $dbh->prepare("UPDATE $table SET $champ = '$valeur'");
}
else{
$stmt = $dbh->prepare("UPDATE $table SET $champ = '$valeur' WHERE $condition");

}
$res=$stmt->execute();
return $res;
}


//fermutre
function fermer(){
//
}
}





//++++++++++++++++class admin++++++
class admin{
var $id;
var $login;
var $password;
 

function admin($id,$login,$pass){
$this->id = $id;
$this->login = $login;
$this->password = $pass;

}

 public function getid() {
        return $this->id;
    }

    public function setid($id) {
        $this->id = $id;
    }
public function getlogin() {
        return $this->login;
    }

    public function setlogin($login) {
        $this->login = $login;
    }
public function getpassword() {
        return $this->password;
    }

    public function setpassword($password) {
        $this->password = $password;
    }	
	
}


//++++++++++++++++class personne++++++

class personne{
var $id;
var $firstname;
var $lastname;
var $email;
var $adresse;
var $town_name;
var $country_id;
var $phone;
var $list_subscriptions; //liste des subscriptions




function personne($id_personne,$first_name,$last_name,$email,$adresse,$town_name,$country_id,$phone,$list_subscriptions){
$this->id = $id_personne;
$this->firstname = $first_name;
$this->lastname = $last_name;
$this->email = $email;
$this->adresse = $adresse;
$this->town_name = $town_name;
$this->country_id = $country_id;
$this->phone = $phone;
$this->list_subscriptions = $list_subscriptions;
}
 public function getid() {
        return $this->id;
    }

    public function setid($id_personne) {
        $this->id = $id_personne;
    }
public function getfirstname() {
        return $this->firstname;
    }

    public function setfirstname($first_name) {
        $this->firstname = $first_name;
    }
public function getlastname() {
        return $this->lastname;
    }

    public function setlastname($last_name) {
        $this->lastname = $last_name;
    }	
public function getemail() {
        return $this->email;
    }

    public function setemail($email) {
        $this->email = $email;
    }		
public function getadresse() {
        return $this->adresse;
    }

    public function setadresse($adresse) {
        $this->adresse = $adresse;
    }	
public function gettown_name() {
        return $this->town_name;
    }

    public function settown_name($town_name) {
        $this->town_name = $town_name;
    }	
public function getcountry_id() {
        return $this->country_id;
    }

    public function setcountry_id($country_id) {
        $this->country_id = $country_id;
    }	
public function getphone() {
        return $this->phone;
    }

    public function setphone($phone) {
        $this->phone = $phone;
    }		
public function getlist_subscriptions() {
        return $this->list_subscriptions;
    }

    public function setlist_subscriptions($list_subscriptions) {
        $this->list_subscriptions = $list_subscriptions;
    }		



	
		
	
}
//++++++++++++++++++++++++++class countries+++++++++++++++++++++++++++++
class country{
var $code;
var $name;
var $fee;
var $list_offers;
var $list_counties;


function country($code,$name,$fee,$list_offers,$list_counties){
$this->code = $code;
$this->name = $name;
$this->fee = $fee;
$this->list_offers = $list_offers;
$this->list_counties = $list_counties;
}
 public function getcode() {
        return $this->code;
    }

    public function setcode($code) {
        $this->code = $code;
    }
public function getname() {
        return $this->name;
    }

    public function setname($name) {
        $this->name = $name;
    }
public function getfee() {
        return $this->fee;
    }

    public function setfee($fee) {
        $this->fee = $fee;
    }	
public function getlist_offers() {
        return $this->list_offers;
    }

    public function setlist_offers($list_offers) {
        $this->list_offers = $list_offers;
    }	
public function getlist_counties() {
        return $this->list_counties;
    }

    public function setlist_counties($list_counties) {
        $this->list_counties = $list_counties;
    }			
}

//++++++++++++++++class employee++++++
class employee{
var $id_personne;
var $login;
var $hire_date;
var $depart_date;
var $service_name;
var $period_of_work;
var $discount;    // percentage of discount

function employee($id_personne,$login,$hire_date,$depart_date,$service_name,$period_of_work,$discount){
$this->id_personne = $id_personne;
$this->login = $login;
$this->hire_date = $hire_date;
$this->depart_date = $depart_date;
$this->service_name = $service_name;
$this->period_of_work = $period_of_work;
$this->discount = $discount;
}
public function getid_personne() {
        return $this->id_personne;
    }

    public function setid_personne($id_personne) {
        $this->id_personne = $id_personne;
    }
 public function getlogin() {
        return $this->login;
    }

    public function setlogin($login) {
        $this->login = $login;
    }
public function gethire_date() {
        return $this->hire_date;
    }

    public function sethire_date($hire_date) {
        $this->hire_date = $hire_date;
    }
public function getdepart_date() {
        return $this->depart_date;
    }

    public function setdepart_date($depart_date) {
        $this->depart_date = $depart_date;
    }	
	
	public function getservice_name() {
        return $this->service_name;
    }

    public function setservice_name($service_name) {
        $this->service_name = $service_name;
    }	
	public function getperiod_of_work() {
        return $this->period_of_work;
    }

    public function setperiod_of_work($period_of_work) {
        $this->period_of_work = $period_of_work;
    }	
	public function getdiscount() {
        return $this->discount;
    }

    public function setdiscount($discount) {
        $this->discount = $discount;
    }	
	
}

//++++++++++++++++  class county   ++++++++++++++
class county{
var $code;
var $name;
var $id_country;
 

function county($code,$name,$id_country){
$this->code = $code;
$this->name = $name;
$this->id_country = $id_country;

}

 public function getcode() {
        return $this->code;
    }

    public function setcode($code) {
        $this->code = $code;
    }
public function getname() {
        return $this->name;
    }

    public function setname($name) {
        $this->name = $name;
    }
public function getid_country() {
        return $this->id_country;
    }

    public function setid_country($id_country) {
        $this->id_country = $id_country;
    }	
	
}

//++++++++++++++++  class offer   ++++++++++++++
class offer{
var $code;
var $offer_name;
var $price_per_month;
var $country_id;
var $id_network;
var $list_services;
var $list_subscriptions;

function offer($code,$offer_name,$price_per_month,$country_id,$id_network,$list_services,$list_subscriptions){
$this->code = $code;
$this->offer_name = $offer_name;
$this->price_per_month = $price_per_month;
$this->country_id = $country_id;
$this->id_network = $id_network;
$this->list_services = $list_services;
$this->list_subscriptions = $list_subscriptions;

}

 public function getcode() {
        return $this->code;
    }

    public function setcode($code) {
        $this->code = $code;
    }
public function getoffer_name() {
        return $this->offer_name;
    }

    public function setoffer_name($offer_name) {
        $this->offer_name = $offer_name;
    }
public function getprice_per_month() {
        return $this->price_per_month;
    }

    public function setprice_per_month($price_per_month) {
        $this->price_per_month = $price_per_month;
    }	
public function getcountry_id() {
        return $this->country_id;
    }

    public function setcountry_id($country_id) {
        $this->country_id = $country_id;
    }	
public function getid_network() {
        return $this->id_network;
    }

    public function setid_network($id_network) {
        $this->id_network = $id_network;
    }	
public function getlist_services() {
        return $this->list_services;
    }

    public function setlist_services($list_services) {
        $this->list_services = $list_services;
    }	
public function getlist_subscriptions() {
        return $this->list_subscriptions;
    }

    public function setlist_subscriptions($list_subscriptions) {
        $this->list_subscriptions = $list_subscriptions;
    }		
}

//++++++++++++++++  class network   ++++++++++++++
class network{
var $network_id;
var $id_country;
var $technology;
var $list_phones;
var $listoffers;


function network($network_id,$id_country,$technology,$list_phones,$listoffers){
$this->network_id = $network_id;
$this->id_country = $id_country;
$this->technology = $technology;
$this->list_phones = $list_phones;
$this->listoffers = $listoffers;
 

}

 public function getnetwork_id() {
        return $this->network_id;
    }

    public function setnetwork_id($network_id) {
        $this->network_id = $network_id;
    }
public function getid_country() {
        return $this->id_country;
    }

    public function setid_country($id_country) {
        $this->id_country = $id_country;
    }
public function gettechnology() {
        return $this->technology;
    }

    public function settechnology($technology) {
        $this->technology = $technology;
    }	
public function getlist_phones() {
        return $this->list_phones;
    }

    public function setlist_phones($list_phones) {
        $this->list_phones = $list_phones;
    }	
public function getlistoffers() {
        return $this->listoffers;
    }

    public function setid_network($listoffers) {
        $this->listoffers = $listoffers;
    }	
}

//++++++++++++++++  class service   ++++++++++++++
class service{
var $name;
var $fee;
var $code_offer;
var $list_usages;



function service($name,$fee,$code_offer,$list_usages){
$this->name = $name;
$this->fee = $fee;
$this->code_offer = $code_offer;
$this->list_usages = $list_usages;

 

}

 public function getname() {
        return $this->name;
    }

    public function setname($name) {
        $this->name = $name;
    }
public function getfee() {
        return $this->fee;
    }

    public function setfee($fee) {
        $this->fee = $fee;
    }
public function getcode_offer() {
        return $this->code_offer;
    }

    public function setcode_offer($code_offer) {
        $this->code_offer = $code_offer;
    }	
public function getlist_usages() {
        return $this->list_usages;
    }

    public function setlist_usages($list_usages) {
        $this->list_usages = $list_usages;
    }	
}

//++++++++++++++++  class subscription   ++++++++++++++
class subscription{
var $id;
var $status;
var $id_personne;
var $code_offer;



function subscription($id,$status,$id_personne,$code_offer){
$this->id = $id;
$this->status = $status;
$this->id_personne = $id_personne;
$this->code_offer = $code_offer;

}

 public function getid() {
        return $this->id;
    }

    public function setid($id) {
        $this->id = $id;
    }
public function getstatus() {
        return $this->status;
    }

    public function setstatus($status) {
        $this->status = $status;
    }
public function getid_personne() {
        return $this->id_personne;
    }

    public function setid_personne($id_personne) {
        $this->id_personne = $id_personne;
    }	
public function getcode_offer() {
        return $this->code_offer;
    }

    public function setcode_offer($code_offer) {
        $this->code_offer = $code_offer;
    }	
}

//++++++++++++++++  class bill   ++++++++++++++
class bill{
var $id_bill;
var $cost_service;
var $tax_country;
var $sum;
var $id_usage;


function bill($id_bill,$cost_service,$tax_country,$sum,$id_usage){
$this->id_bill = $id_bill;
$this->cost_service = $cost_service;
$this->tax_country = $tax_country;
$this->sum = $sum;
$this->id_usage = $id_usage;
}

 public function getid_bill() {
        return $this->id_bill;
    }

    public function setid($id_bill) {
        $this->id_bill = $id_bill;
    }
public function getcost_service() {
        return $this->cost_service;
    }

    public function setcost_service($cost_service) {
        $this->cost_service = $cost_service;
    }
public function gettax_country() {
        return $this->tax_country;
    }

    public function settax_country($tax_country) {
        $this->tax_country = $tax_country;
    }	
public function getsum() {
        return $this->sum;
    }

    public function setsum($sum) {
        $this->sum = $sum;
    }	
public function getid_usage() {
        return $this->id_usage;
    }

    public function setid_usage($id_usage) {
        $this->id_usage = $id_usage;
    }	
}

//++++++++++++++++  class phone   ++++++++++++++
class phone{
var $reference;
var $name;
var $brand_name;
var $model;
var $id_network;


function phone($reference,$name,$brand_name,$model,$id_network){
$this->reference = $reference;
$this->name = $name;
$this->brand_name = $brand_name;
$this->model = $model;
$this->id_network = $id_network;
}

 public function getreference() {
        return $this->reference;
    }

    public function setreference($reference) {
        $this->reference = $reference;
    }
public function getname() {
        return $this->name;
    }

    public function setname($name) {
        $this->name = $name;
    }
public function getbrand_name() {
        return $this->brand_name;
    }

    public function setbrand_name($brand_name) {
        $this->brand_name = $brand_name;
    }	
public function getmodel() {
        return $this->model;
    }

    public function setmodel($model) {
        $this->model = $model;
    }	
public function getid_network() {
        return $this->id_network;
    }

    public function setid_network($id_network) {
        $this->id_network = $id_network;
    }	
}


//++++++++++++++++  class usage   ++++++++++++++
class usage{
var $id_usage;
var $id_subscription;
var $quantity;
var $date_hour_sub;
var $phone_model;
var $country_code;
var $service_name;
var $list_bills;

function usage($id_usage,$id_subscription,$quantity,$date_hour_sub,$phone_model,$country_code,$service_name,$list_bills){
$this->id_usage = $id_usage;
$this->id_subscription = $id_subscription;
$this->quantity = $quantity;
$this->date_hour_sub = $date_hour_sub;
$this->phone_model = $phone_model;
$this->country_code = $country_code;
$this->service_name = $service_name;
$this->list_bills = $list_bills;
}

 public function getid_usage() {
        return $this->id_usage;
    }

    public function setid_usage($id_usage) {
        $this->id_usage = $id_usage;
    }
public function getid_subscription() {
        return $this->id_subscription;
    }

    public function setid_subscription($id_subscription) {
        $this->id_subscription = $id_subscription;
    }
public function getquantity() {
        return $this->quantity;
    }

    public function setquantity($quantity) {
        $this->quantity = $quantity;
    }	
public function getdate_hour_sub() {
        return $this->date_hour_sub;
    }

    public function setdate_hour_sub($date_hour_sub) {
        $this->date_hour_sub = $date_hour_sub;
    }	
public function getphone_model() {
        return $this->phone_model;
    }

    public function setphone_model($phone_model) {
        $this->phone_model = $phone_model;
    }	
public function getcountry_code() {
        return $this->country_code;
    }

    public function setcountry_code($country_code) {
        $this->country_code = $country_code;
    }	
public function getservice_name() {
        return $this->service_name;
    }

    public function setservice_name($service_name) {
        $this->service_name = $service_name;
    }	
public function getlist_bills() {
        return $this->list_bills;
    }

    public function setlist_bills($list_bills) {
        $this->list_bills = $list_bills;
    }	
}




?>