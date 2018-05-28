 <?php
  error_reporting(0);
session_start ();
 if(! isset($_SESSION['login_admin'])){
 header('Location: login.php');
 
}
       
		session_start ();
		$log= $_SESSION['login_admin'];
		$pass= $_SESSION['pwd_admin'] ;

		
$req="";
$obj_client;
$req=$_GET['client_req'];
$o = json_decode($req);
$type_main = $o->{'type'};
 
 
 if($type_main=="sessiondel"){
 
		session_start ();
                session_unset();
                session_destroy();

		}
 


  ?>
 
 
 
 <html>
 <head>
 
 <script src="jquery-1.9.1.min.js" type="text/javascript"></script>
 
 
     <link href='https://fonts.googleapis.com/css?family=Roboto:100' rel='stylesheet' type='text/css'>
	 <link rel="stylesheet" href="popup/example.css">
	  <!-- This is what you need -->
      <script src="popup/lib/sweet-alert.min.js"></script>
      <link rel="stylesheet" href="popup/lib/sweet-alert.css">
      <!--.......................-->
 
 <script src="jsPDF-master/jspdf.js" type="text/javascript"></script>
 <script src="jsPDF-master/FileSaver.js" type="text/javascript"></script>
 
 
 <script type="text/javascript">

$(window).load(function(){
	lunch();
date_extract();

load_countries();
load_offers();

});
var liste_cl;
var liste_countries;
var liste_emp;
var liste_counties;
var liste_services;
var liste_bills;
var liste_offers;
function show(json) {
	liste_cl=json;
    remplir_tab();
	}
	
function lunch(){
	
var main='{"type":"connect"}';
$.getJSON("conn.php",{client_req:main},show);

 }

 
 
 
 
setInterval(function(){ 

date_extract();


 }, 1000); 

function out() {
	
  var main='{"type":"sessiondel"}';
$.getJSON("member.php",{client_req:main},show);
 setTimeout(function(){document.location.href="login.php";},500);
 
   }

function date_extract() {

var currentdate = new Date(); 
var datetime = "Its: " + currentdate.getDate() + "/"+ (currentdate.getMonth()+1)  + "/" + currentdate.getFullYear() + " -- " + currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();   
 document.getElementById("timedate").innerHTML=datetime+"";
   
   
   
}
function load_countries(){
	
	var main='{"type":"countries"}';
$.getJSON("conn.php",{client_req:main},show_count);

	}
function show_count(json) {
	liste_countries=json;
    remplir_tab_countries();
	}
	
	
	
	
	
function load_employees(){
	
	var main='{"type":"employees"}';
$.getJSON("conn.php",{client_req:main},show_emp);

	}
function show_emp(json) {
	liste_emp=json;
    remplir_tab_emp();
	}
	
	
	
	
 function load_counties(){
	
	var main='{"type":"counties"}';
$.getJSON("conn.php",{client_req:main},show_counties);

	}
function show_counties(json) {
	liste_counties=json;
    remplir_tab_counties();
	}
	
	
	
	
	
	function load_services(){
	
	var main='{"type":"services"}';
	$.getJSON("conn.php",{client_req:main},show_services);
	}

function show_services(json) {
	liste_services=json;
    remplir_tab_services();
	}

	
	
function load_bills(){
	 
	var main='{"type":"bills"}';
$.getJSON("conn.php",{client_req:main},show_bills);
	}
function show_bills(json) {
	
	liste_bills=json;
    remplir_tab_bills();
	}

function load_offers(){
	 
	var main='{"type":"offers"}';
$.getJSON("conn.php",{client_req:main},show_offers);
	}
function show_offers(json) {
	
	liste_offers=json;
    remplir_tab_offers();
	}

function clients_menu() {
document.getElementById("clients_b").style.display = 'block';
document.getElementById("employees_b").style.display = 'none';
document.getElementById("countries_b").style.display = 'none';
document.getElementById("bills_b").style.display = 'none';
document.getElementById("services_b").style.display = 'none';
document.getElementById("counties_b").style.display = 'none';
document.getElementById("offers_b").style.display = 'none';
document.getElementById("add_client_b").style.display = 'none';
document.getElementById("edit_client_b").style.display = 'none';
document.getElementById("edit_bill_b").style.display = 'none';
document.getElementById("edit_service_b").style.display = 'none';
document.getElementById("edit_country_b").style.display = 'none';
document.getElementById("edit_county_b").style.display = 'none';
document.getElementById("edit_offer_b").style.display = 'none';
document.getElementById("add_bill_b").style.display = 'none';
//lunch();

}
function countrys_menu() {
load_countries();
document.getElementById("countries_b").style.display = 'block';
document.getElementById("clients_b").style.display = 'none';
document.getElementById("employees_b").style.display = 'none';
document.getElementById("bills_b").style.display = 'none';
document.getElementById("services_b").style.display = 'none';
document.getElementById("counties_b").style.display = 'none';
document.getElementById("offers_b").style.display = 'none';
document.getElementById("add_client_b").style.display = 'none';
document.getElementById("edit_client_b").style.display = 'none';
document.getElementById("edit_bill_b").style.display = 'none';
document.getElementById("edit_service_b").style.display = 'none';
document.getElementById("edit_country_b").style.display = 'none';
document.getElementById("edit_county_b").style.display = 'none';
document.getElementById("edit_offer_b").style.display = 'none';
document.getElementById("add_bill_b").style.display = 'none';
}
function bills_menu() {
load_bills();
document.getElementById("bills_b").style.display = 'block';
document.getElementById("clients_b").style.display = 'none';
document.getElementById("employees_b").style.display = 'none';
document.getElementById("countries_b").style.display = 'none';
document.getElementById("services_b").style.display = 'none';
document.getElementById("counties_b").style.display = 'none';
document.getElementById("offers_b").style.display = 'none';
document.getElementById("add_client_b").style.display = 'none';
document.getElementById("edit_client_b").style.display = 'none';
document.getElementById("edit_bill_b").style.display = 'none';
document.getElementById("edit_service_b").style.display = 'none';
document.getElementById("edit_country_b").style.display = 'none';
document.getElementById("edit_county_b").style.display = 'none';
document.getElementById("edit_offer_b").style.display = 'none';
document.getElementById("add_bill_b").style.display = 'none';
}
function offers_menu() {
load_offers();
document.getElementById("offers_b").style.display = 'block';
document.getElementById("bills_b").style.display = 'none';
document.getElementById("clients_b").style.display = 'none';
document.getElementById("employees_b").style.display = 'none';
document.getElementById("countries_b").style.display = 'none';
document.getElementById("services_b").style.display = 'none';
document.getElementById("counties_b").style.display = 'none';
document.getElementById("add_client_b").style.display = 'none';
document.getElementById("edit_client_b").style.display = 'none';
document.getElementById("edit_bill_b").style.display = 'none';
document.getElementById("edit_service_b").style.display = 'none';
document.getElementById("edit_country_b").style.display = 'none';
document.getElementById("edit_county_b").style.display = 'none';
document.getElementById("edit_offer_b").style.display = 'none';
document.getElementById("add_bill_b").style.display = 'none';
}
function services_menu() {
	load_services();
document.getElementById("services_b").style.display = 'block';
document.getElementById("clients_b").style.display = 'none';
document.getElementById("employees_b").style.display = 'none';
document.getElementById("countries_b").style.display = 'none';
document.getElementById("bills_b").style.display = 'none';
document.getElementById("counties_b").style.display = 'none';
document.getElementById("offers_b").style.display = 'none';
document.getElementById("add_client_b").style.display = 'none';
document.getElementById("edit_client_b").style.display = 'none';
document.getElementById("edit_bill_b").style.display = 'none';
document.getElementById("edit_service_b").style.display = 'none';
document.getElementById("edit_country_b").style.display = 'none';
document.getElementById("edit_county_b").style.display = 'none';
document.getElementById("edit_offer_b").style.display = 'none';
document.getElementById("add_bill_b").style.display = 'none';
}
function employees_menu() {
	load_employees();
document.getElementById("employees_b").style.display = 'block';
document.getElementById("clients_b").style.display = 'none';
document.getElementById("countries_b").style.display = 'none';
document.getElementById("bills_b").style.display = 'none';
document.getElementById("services_b").style.display = 'none';
document.getElementById("counties_b").style.display = 'none';
document.getElementById("offers_b").style.display = 'none';
document.getElementById("add_client_b").style.display = 'none';
document.getElementById("edit_client_b").style.display = 'none';
document.getElementById("edit_bill_b").style.display = 'none';
document.getElementById("edit_service_b").style.display = 'none';
document.getElementById("edit_country_b").style.display = 'none';
document.getElementById("edit_county_b").style.display = 'none';
document.getElementById("edit_offer_b").style.display = 'none';
document.getElementById("add_bill_b").style.display = 'none';
}
function counties_menu() {
	load_counties();
document.getElementById("counties_b").style.display = 'block';
document.getElementById("employees_b").style.display = 'none';
document.getElementById("clients_b").style.display = 'none';
document.getElementById("countries_b").style.display = 'none';
document.getElementById("bills_b").style.display = 'none';
document.getElementById("services_b").style.display = 'none';
document.getElementById("offers_b").style.display = 'none';
document.getElementById("add_client_b").style.display = 'none';
document.getElementById("edit_client_b").style.display = 'none';
document.getElementById("edit_bill_b").style.display = 'none';
document.getElementById("edit_service_b").style.display = 'none';
document.getElementById("edit_country_b").style.display = 'none';
document.getElementById("edit_county_b").style.display = 'none';
document.getElementById("edit_offer_b").style.display = 'none';
document.getElementById("add_bill_b").style.display = 'none';
}
function add_client_menu(){

document.getElementById("add_client_b").style.display = 'block';
document.getElementById("counties_b").style.display = 'none';
document.getElementById("employees_b").style.display = 'none';
document.getElementById("clients_b").style.display = 'none';
document.getElementById("countries_b").style.display = 'none';
document.getElementById("bills_b").style.display = 'none';
document.getElementById("services_b").style.display = 'none';
document.getElementById("offers_b").style.display = 'none';
document.getElementById("edit_client_b").style.display = 'none';
document.getElementById("edit_bill_b").style.display = 'none';
document.getElementById("edit_service_b").style.display = 'none';
document.getElementById("edit_country_b").style.display = 'none';
document.getElementById("edit_county_b").style.display = 'none';
document.getElementById("edit_offer_b").style.display = 'none';
document.getElementById("add_bill_b").style.display = 'none';
//load_counties();
load_country_list();
}
function edit_client_menu(){
document.getElementById("edit_client_b").style.display = 'block';
document.getElementById("add_client_b").style.display = 'none';
document.getElementById("counties_b").style.display = 'none';
document.getElementById("employees_b").style.display = 'none';
document.getElementById("clients_b").style.display = 'none';
document.getElementById("countries_b").style.display = 'none';
document.getElementById("bills_b").style.display = 'none';
document.getElementById("services_b").style.display = 'none';
document.getElementById("offers_b").style.display = 'none';
document.getElementById("edit_bill_b").style.display = 'none';
document.getElementById("edit_service_b").style.display = 'none';
document.getElementById("edit_country_b").style.display = 'none';
document.getElementById("edit_county_b").style.display = 'none';
document.getElementById("edit_offer_b").style.display = 'none';
document.getElementById("add_bill_b").style.display = 'none';
//load_counties();
load_country_list1();
}
function edit_bill_menu(){
document.getElementById("edit_bill_b").style.display = 'block';
document.getElementById("edit_client_b").style.display = 'none';
document.getElementById("add_client_b").style.display = 'none';
document.getElementById("counties_b").style.display = 'none';
document.getElementById("employees_b").style.display = 'none';
document.getElementById("clients_b").style.display = 'none';
document.getElementById("countries_b").style.display = 'none';
document.getElementById("bills_b").style.display = 'none';
document.getElementById("services_b").style.display = 'none';
document.getElementById("offers_b").style.display = 'none';
document.getElementById("edit_service_b").style.display = 'none';
document.getElementById("edit_country_b").style.display = 'none';
document.getElementById("edit_county_b").style.display = 'none';
document.getElementById("edit_offer_b").style.display = 'none';
document.getElementById("add_bill_b").style.display = 'none';
//load_counties();
//load_country_list1();
}

function edit_country_menu(){
document.getElementById("edit_country_b").style.display = 'block';
document.getElementById("edit_bill_b").style.display = 'none';
document.getElementById("edit_client_b").style.display = 'none';
document.getElementById("add_client_b").style.display = 'none';
document.getElementById("counties_b").style.display = 'none';
document.getElementById("employees_b").style.display = 'none';
document.getElementById("clients_b").style.display = 'none';
document.getElementById("countries_b").style.display = 'none';
document.getElementById("bills_b").style.display = 'none';
document.getElementById("services_b").style.display = 'none';
document.getElementById("offers_b").style.display = 'none';
document.getElementById("edit_service_b").style.display = 'none';
document.getElementById("edit_county_b").style.display = 'none';
document.getElementById("edit_offer_b").style.display = 'none';
document.getElementById("add_bill_b").style.display = 'none';
//load_counties();
//load_country_list1();
}
function edit_service_menu(){
document.getElementById("edit_service_b").style.display = 'block';
document.getElementById("edit_country_b").style.display = 'none';
document.getElementById("edit_bill_b").style.display = 'none';
document.getElementById("edit_client_b").style.display = 'none';
document.getElementById("add_client_b").style.display = 'none';
document.getElementById("counties_b").style.display = 'none';
document.getElementById("employees_b").style.display = 'none';
document.getElementById("clients_b").style.display = 'none';
document.getElementById("countries_b").style.display = 'none';
document.getElementById("bills_b").style.display = 'none';
document.getElementById("services_b").style.display = 'none';
document.getElementById("offers_b").style.display = 'none';
document.getElementById("edit_county_b").style.display = 'none';
document.getElementById("edit_offer_b").style.display = 'none';
document.getElementById("add_bill_b").style.display = 'none';
load_offers_list();
 
}
function edit_county_menu(){
document.getElementById("edit_county_b").style.display = 'block';
document.getElementById("edit_country_b").style.display = 'none';
document.getElementById("edit_bill_b").style.display = 'none';
document.getElementById("edit_client_b").style.display = 'none';
document.getElementById("add_client_b").style.display = 'none';
document.getElementById("counties_b").style.display = 'none';
document.getElementById("employees_b").style.display = 'none';
document.getElementById("clients_b").style.display = 'none';
document.getElementById("countries_b").style.display = 'none';
document.getElementById("bills_b").style.display = 'none';
document.getElementById("services_b").style.display = 'none';
document.getElementById("offers_b").style.display = 'none';
document.getElementById("edit_service_b").style.display = 'none';
document.getElementById("edit_offer_b").style.display = 'none';
document.getElementById("add_bill_b").style.display = 'none';
load_country_code();
}

function edit_offer_menu(){
document.getElementById("edit_offer_b").style.display = 'block';
document.getElementById("edit_county_b").style.display = 'none';
document.getElementById("edit_country_b").style.display = 'none';
document.getElementById("edit_bill_b").style.display = 'none';
document.getElementById("edit_client_b").style.display = 'none';
document.getElementById("add_client_b").style.display = 'none';
document.getElementById("counties_b").style.display = 'none';
document.getElementById("employees_b").style.display = 'none';
document.getElementById("clients_b").style.display = 'none';
document.getElementById("countries_b").style.display = 'none';
document.getElementById("bills_b").style.display = 'none';
document.getElementById("services_b").style.display = 'none';
document.getElementById("offers_b").style.display = 'none';
document.getElementById("edit_service_b").style.display = 'none';
document.getElementById("add_bill_b").style.display = 'none';
load_country_code_offer();
}

function add_bill_menu(){
document.getElementById("add_bill_b").style.display = 'block';
document.getElementById("add_client_b").style.display = 'none';
document.getElementById("counties_b").style.display = 'none';
document.getElementById("employees_b").style.display = 'none';
document.getElementById("clients_b").style.display = 'none';
document.getElementById("countries_b").style.display = 'none';
document.getElementById("bills_b").style.display = 'none';
document.getElementById("services_b").style.display = 'none';
document.getElementById("offers_b").style.display = 'none';
document.getElementById("edit_client_b").style.display = 'none';
document.getElementById("edit_bill_b").style.display = 'none';
document.getElementById("edit_service_b").style.display = 'none';
document.getElementById("edit_country_b").style.display = 'none';
document.getElementById("edit_county_b").style.display = 'none';
document.getElementById("edit_offer_b").style.display = 'none';
load_clients_l();
}









/********tableau*****/

function delete_all_tab(){
var ta=contacts.length;
var arrayLignes = document.getElementById("tableau1").rows;

var j=0;
var tel=ta-1;
while(j<ta){
document.getElementById("tableau1").deleteRow(-1);
tel--;
j++;
}
//supp_contacts();
}





function remplir_tab(){
var arrayLignes = document.getElementById("tableau1").rows;
var taille=arrayLignes.length;
if(taille==1){
ajouterLigne_tab();
}
else{
delete_tab();
ajouterLigne_tab();
}
}
// remplir table offers
function remplir_tab_offers(){
var arrayLignes = document.getElementById("tableau9").rows;
var taille=arrayLignes.length;
if(taille==1){
ajouterLigne_tab_off();
}
else{
delete_tab_off();
ajouterLigne_tab_off();
}
}


//remplir table countries
function remplir_tab_countries(){
var arrayLignes = document.getElementById("tableau3").rows;
var taille=arrayLignes.length;
if(taille==1){
ajouterLigne_tab_countries();
}
else{
delete_tab_countries();
ajouterLigne_tab_countries();
}
} 
//remplir table employees
function remplir_tab_emp(){
 
var arrayLignes = document.getElementById("tableau2").rows;
var taille=arrayLignes.length;
if(taille==1){
	
ajouterLigne_tab_emp();
}
else{
delete_tab_emp();
ajouterLigne_tab_emp();
}
} 
//remplir table counties
function remplir_tab_counties(){
var arrayLignes = document.getElementById("tableau6").rows;
var taille=arrayLignes.length;
if(taille==1){
ajouterLigne_tab_counties();
}
else{
delete_tab_counties();
ajouterLigne_tab_counties();
}
}

//remplir table services
function remplir_tab_services(){
var arrayLignes = document.getElementById("tableau7").rows;
var taille=arrayLignes.length;
if(taille==1){
ajouterLigne_tab_services();
}
else{
delete_tab_services();
ajouterLigne_tab_services();
}
}

//remplir table bills

function remplir_tab_bills(){
	
var arrayLignes = document.getElementById("tableau4").rows;
var taille=arrayLignes.length;
if(taille==1){
ajouterLigne_tab_bills();
}
else{
	
delete_tab_bills();
ajouterLigne_tab_bills();
}
}


//delete tab offers
function delete_tab_off(){
 var ta=contacts.length;
var arrayLignes = document.getElementById("tableau9").rows;

var j=0;
var tel=ta-1;
while(j<ta){
document.getElementById("tableau9").deleteRow(-1);
tel--;
j++;
}
}



//delete tab bills
function delete_tab_bills(){
 var ta=contacts.length;
var arrayLignes = document.getElementById("tableau4").rows;

var j=0;
var tel=ta-1;
while(j<ta){
document.getElementById("tableau4").deleteRow(-1);
tel--;
j++;
}
}
//delete tab services
function delete_tab_services(){
 
var arrayLignes = document.getElementById("tableau7").rows;

var j=0;
var tel=ta-1;
while(j<ta){
document.getElementById("tableau7").deleteRow(-1);
tel--;
j++;
}
}

//delete tab counties
function delete_tab_counties(){
var ta=contacts.length;
var arrayLignes = document.getElementById("tableau6").rows;

var j=0;
var tel=ta-1;
while(j<ta){
document.getElementById("tableau6").deleteRow(-1);
tel--;
j++;
}
}



//delete tab employees
function delete_tab_emp(){
var ta=contacts.length;
var arrayLignes = document.getElementById("tableau2").rows;

var j=0;
var tel=ta-1;
while(j<ta){
document.getElementById("tableau2").deleteRow(-1);
tel--;
j++;
}
}


//delete tab client
function delete_tab(){
var ta=contacts.length;
var arrayLignes = document.getElementById("tableau1").rows;

var j=0;
var tel=ta-1;
while(j<ta){
document.getElementById("tableau1").deleteRow(-1);
tel--;
j++;
}
}
//delete tab countries
function delete_tab_countries(){
var ta=contacts.length;
var arrayLignes = document.getElementById("tableau3").rows;

var j=0;
var tel=ta-1;
while(j<ta){
document.getElementById("tableau3").deleteRow(-1);
tel--;
j++;
}
}
 
 
 
 
 
 
 
 
 
//add line tab client
function ajouterLigne_tab()
{ 
var ta=liste_cl.length;
var i=0;	
 while(i<ta){

     var id=liste_cl[i].id;
	 var firstname=liste_cl[i].firstname;
	 var lastname=liste_cl[i].lastname;
	 var email=liste_cl[i].email;
	 var adress=liste_cl[i].adress;
	 var town=liste_cl[i].town_name;
	 var country=liste_cl[i].country_id;
	 var phone=liste_cl[i].phone;
	 
	
      
 	var tableau = document.getElementById("tableau1");

	var ligne = tableau.insertRow(-1);

	var colonne1 = ligne.insertCell(0);
	colonne1.innerHTML += "<div>"+id+"</div>";//on y met le contenu de titre

	var colonne2 = ligne.insertCell(1);
	colonne2.innerHTML += "<div>"+firstname+"</div>";

	 
	var colonne3 = ligne.insertCell(2);
	colonne3.innerHTML += "<div>"+lastname+"</div>";

	var colonne4 = ligne.insertCell(3);
	colonne4.innerHTML += "<div>"+email+"</div>";
	
	var colonne5 = ligne.insertCell(4);
	colonne5.innerHTML += "<div>"+town+"</div>";
	
	var colonne6 = ligne.insertCell(5);
	colonne6.innerHTML += "<div>"+country+"</div>";

	
	var colonne7 = ligne.insertCell(6);
	colonne7.innerHTML += "<div>"+phone+"</div>";
	
	
	var colonne8 = ligne.insertCell(7);
	colonne8.innerHTML += "<center><div><div class='button_table' type='button' id='"+liste_cl[i].email+"'  onClick='delete_client(this.id)'>Delete</div> <div class='button_table' type='button' id='"+liste_cl[i].email+"'  onClick='edit_client(this.id)'>Edit</div></div></center>";

	
     
	i++;
	}
		 //alert (info);	
}







//add line tab offers
function ajouterLigne_tab_off()
{ 
var tai=liste_offers.length;
//alert(liste_offers[0]);
var i=0;	
 while(i<tai){

     var code=liste_offers[i].code;
	 var name=liste_offers[i].offer_name;
	 var price=liste_offers[i].price_per_month;
	 var country=liste_offers[i].country_id;
	 var network=liste_offers[i].id_network;
	 //var list_serv=liste_offers[i].list_services;
	 //var list_submissions=liste_offers[i].list_subscriptions;
	 
	 
	
      
 	var tableau = document.getElementById("tableau9");

	var ligne = tableau.insertRow(-1);

	var colonne1 = ligne.insertCell(0);
	colonne1.innerHTML += "<div>"+code+"</div>";//on y met le contenu de titre

	var colonne2 = ligne.insertCell(1);
	colonne2.innerHTML += "<div>"+name+"</div>";

	 
	var colonne3 = ligne.insertCell(2);
	colonne3.innerHTML += "<div>"+price+"</div>";

	var colonne4 = ligne.insertCell(3);
	colonne4.innerHTML += "<div>"+country+"</div>";
	
	var colonne5 = ligne.insertCell(4);
	colonne5.innerHTML += "<div>"+network+"</div>";
	
	var colonne6 = ligne.insertCell(5);
	colonne6.innerHTML += "<center><div><div class='button_table' type='button' id='"+liste_offers[i].code+"'  onClick='delete_offer(this.id)'>Delete</div> <div class='button_table' type='button' id='"+liste_offers[i].code+"'  onClick='edit_offer(this.id)'>Edit</div></div></center>";

	
	 
     
	i++;
	}
		 //alert (info);	
}
















//add line tab employe
function ajouterLigne_tab_emp()
{ 
var ta=liste_emp.length;
var i=0;	
 while(i<ta){

   
	 var id_personne=liste_emp[i].id_personne;
	 var login=liste_emp[i].login;
	 var hire_date=liste_emp[i].hire_date;
	 var depart_date=liste_emp[i].depart_date;
	 var service_name=liste_emp[i].service_name; 
	 var period=liste_emp[i].period_of_work;
	 var discount=liste_emp[i].discount;
	
      
 	var tableau = document.getElementById("tableau2");

	var ligne = tableau.insertRow(-1);

	var colonne1 = ligne.insertCell(0);
	colonne1.innerHTML += "<div>"+id_personne+"</div>";//on y met le contenu de titre

	var colonne2 = ligne.insertCell(1);
	colonne2.innerHTML += "<div>"+login+"</div>";

	 
	var colonne3 = ligne.insertCell(2);
	colonne3.innerHTML += "<div>"+hire_date+"</div>";

	var colonne4 = ligne.insertCell(3);
	colonne4.innerHTML += "<div>"+depart_date+"</div>";
	
	var colonne5 = ligne.insertCell(4);
	colonne5.innerHTML += "<div>"+service_name+"</div>";
	
	var colonne6 = ligne.insertCell(5);
	colonne6.innerHTML += "<div>"+period+"</div>";
	
	var colonne7 = ligne.insertCell(6);
	colonne7.innerHTML += "<div>"+discount+"</div>";
	
	var colonne8 = ligne.insertCell(7);
	if((depart_date=="00-00-0000")||(depart_date=="00/00/0000")||(depart_date=="")){
	colonne8.innerHTML += "<center><div><div class='button_table' type='button' id='"+liste_emp[i].id_personne+"'  onClick='fire_employee(this.id)'>Fire</div></div></center>";
    }else{
	colonne8.innerHTML += "<center><div><div class='button_table' type='button' id='"+liste_emp[i].id_personne+"'  onClick='rehire_employee(this.id)'>Rehire</div></div></center>";	
	}
     
	i++;
	}
		 //alert (info);	
}




 

//add line tab countries
function ajouterLigne_tab_countries()
{ 
var ta=liste_countries.length;

var i=0;	
 while(i<ta){

     var id=liste_countries[i].code;
	 var name=liste_countries[i].name;
	 var cost=liste_countries[i].fee;
	
	
      
 	var tableau = document.getElementById("tableau3");

	var ligne = tableau.insertRow(-1);

	var colonne1 = ligne.insertCell(0);
	colonne1.innerHTML += "<div>"+id+"</div>";//on y met le contenu de titre

	var colonne2 = ligne.insertCell(1);
	colonne2.innerHTML += "<div>"+name+"</div>";

	 
	var colonne3 = ligne.insertCell(2);
	colonne3.innerHTML += "<div>"+cost+"</div>";

	var colonne4 = ligne.insertCell(3);
	colonne4.innerHTML += "<center><div class='button_table' type='button' id='"+liste_countries[i].code+"'  onClick='delete_country(this.id);'>Delete</div> <div class='button_table' type='button' id='"+liste_countries[i].code+"'  onClick='edit_country(this.id);'>Edit</div></center>";
	
	 
	i++;
	}
		 //alert (info);	
}
function load_country_list(){
	
	var ta=liste_countries.length;
	 
	var result="";
	var menu_option="<select name='countrylist' id='countrylist' onchange=''><option value=''>---</option>";
var i=0;	
 while(i<ta){
	 var name=liste_countries[i].name; 
	 menu_option+="<option>"+name+"</option>";
	 i++;
 }



result=menu_option+"</select>";

document.getElementById("country_place").innerHTML=""+result;	
}


function load_country_list1(){
	
	var ta=liste_countries.length;
	 
	var result="";
	var menu_option="<select name='countrylist1' id='countrylist1' onchange=''><option value=''>---</option>";
var i=0;	
 while(i<ta){
	 var name=liste_countries[i].name; 
	 menu_option+="<option id='"+i+"'>"+name+"</option>";
	 i++;
 }



result=menu_option+"</select>";

document.getElementById("country_place1").innerHTML=""+result;	
}



function load_offers_list(){
	
	var ta=liste_offers.length;
	 
	var result="";
	var menu_option="<select name='offerlist' id='offerlist' onchange=''><option value=''>---</option>";
var i=0;	
 while(i<ta){
	 var code=liste_offers[i].code; 
	 menu_option+="<option id='lo"+code+"'>"+code+"</option>";
	 i++;
 }



result=menu_option+"</select>";

document.getElementById("offer_place").innerHTML=""+result;	
}

function load_country_code(){
	
	var ta=liste_countries.length;
	 
	var result="";
	var menu_option="<select name='lcountrycode' id='lcountrycode' onchange=''><option value=''>---</option>";
var i=0;	
 while(i<ta){
	 var code=liste_countries[i].code; 
	 menu_option+="<option id='lcoff"+code+"'>"+code+"</option>";
	 i++;
 }



result=menu_option+"</select>";

document.getElementById("country_list_pl").innerHTML=""+result;	
}


function load_country_code_offer(){
	
	var ta=liste_countries.length;
	 
	var result="";
	var menu_option="<select name='lcountrycodeoffer' id='lcountrycodeoffer' onchange=''><option value=''>---</option>";
var i=0;	
 while(i<ta){
	 var code=liste_countries[i].code; 
	 menu_option+="<option id='lco"+code+"'>"+code+"</option>";
	 i++;
 }



result=menu_option+"</select>";

document.getElementById("country_list_off").innerHTML=""+result;	
}
 

function load_clients_l(){
	
	var ta=liste_cl.length;
	 
	var result="";
	var menu_option="<select name='lcl' id='lcl' onchange=''><option value=''>---</option>";
var i=0;	
 while(i<ta){
	 var email=liste_cl[i].email; 
	 menu_option+="<option id='cl"+i+"'>"+email+"</option>";
	 i++;
 }



result=menu_option+"</select>";

document.getElementById("clients_list_place").innerHTML=""+result;	
}


//add line tab counties
function ajouterLigne_tab_counties()
{ 
var ta=liste_counties.length;

var i=0;	
 while(i<ta){

     var num=liste_counties[i].code;
	 var name=liste_counties[i].name;
	 var country=liste_counties[i].id_country;
	  
	 
	
      
 	var tableau = document.getElementById("tableau6");

	var ligne = tableau.insertRow(-1);

	var colonne1 = ligne.insertCell(0);
	colonne1.innerHTML += "<div>"+num+"</div>";

	var colonne2 = ligne.insertCell(1);
	colonne2.innerHTML += "<div>"+name+"</div>";

	var colonne3 = ligne.insertCell(2);
	colonne3.innerHTML += "<div>"+country+"</div>";

	var colonne4 = ligne.insertCell(3);
	colonne4.innerHTML += "<center><div class='button_table' type='button' id='"+liste_counties[i].code+"'  onClick='delete_county(this.id);'>Delete</div> <div class='button_table' type='button' id='"+liste_counties[i].code+"'  onClick='edit_county(this.id);'>Edit</div></center>";
	
	 
	
	i++;
	}
		//alert ("ok");	
}

//add line tab services
function ajouterLigne_tab_services()
{ 
var ta=liste_services.length;

var i=0;	
 while(i<ta){

    
	 var name=liste_services[i].name;
	 var price=liste_services[i].fee;
	  var code_offer=liste_services[i].code_offer;
	  var list_usages=liste_services[i].list_usages;
	 
	
      
 	var tableau = document.getElementById("tableau7");

	var ligne = tableau.insertRow(-1);

	var colonne1 = ligne.insertCell(0);
	colonne1.innerHTML += "<div>"+name+"</div>";

	var colonne2 = ligne.insertCell(1);
	colonne2.innerHTML += "<div>"+price+"</div>";

	var colonne3 = ligne.insertCell(2);
	colonne3.innerHTML += "<div>"+code_offer+"</div>";

	var colonne4 = ligne.insertCell(3);
	colonne4.innerHTML += "<center><div><div class='button_table' type='button' id='"+liste_services[i].name+"'  onClick='delete_service(this.id);'>Delete</div> <div class='button_table' type='button' id='"+liste_services[i].name+"'  onClick=' edit_service(this.id);'>Edit</div></div></center>";
	
	 
	i++;
	}
		//alert ("ok");	
}

//add line tab bills
function ajouterLigne_tab_bills()
{ 
	
var ta=liste_bills.length;

var i=0;	
 while(i<ta){

     var id=liste_bills[i].id_bill;
	 var cost_service=liste_bills[i].cost_service;
	 var tax_country=liste_bills[i].tax_country;
	  var sum=liste_bills[i].sum;
	  var id_usage=liste_bills[i].id_usage;
 
	
      
 	var tableau = document.getElementById("tableau4");

	var ligne = tableau.insertRow(-1);

	var colonne1 = ligne.insertCell(0);
	colonne1.innerHTML += "<div>"+id+"</div>";

	var colonne2 = ligne.insertCell(1);
	colonne2.innerHTML += "<div>"+cost_service+"</div>";

	var colonne3 = ligne.insertCell(2);
	colonne3.innerHTML += "<div>"+tax_country+"</div>";

	var colonne4 = ligne.insertCell(3);
	colonne4.innerHTML += "<div>"+sum+"</div>";
	
	var colonne5 = ligne.insertCell(4);
	colonne5.innerHTML += "<div>"+id_usage+"</div>";
	
	 var colonne6 = ligne.insertCell(5);
	colonne6.innerHTML += "<center><div style='width:120px;'><div class='button_table' type='button' id='"+id+"'  onClick='edit_bill(this.id)'>Edit</div> <div class='button_table' type='button' id='"+id+"'  onClick='delete_bill(this.id)'>Delete</div> <div class='button_table' type='button' id='"+id+"'  onClick='print_bill(this.id)'>Print</div></div></center>";
	
	i++;
	}
		//alert ("ok");	
}
function add_client(){
	  
	      var firstname=document.getElementById("name").value+"";
		  var lastname=document.getElementById("lastname").value+""; 
		  var mail=document.getElementById("email").value+"";
		  var country=document.getElementById("countrylist").value+"";
		  var town=document.getElementById("town_id").value+"";
		  var adress=document.getElementById("adress").value+"";
		  var phone=document.getElementById("phone").value+"";
		   if((firstname=="")||(mail=="")||(lastname=="")||(country=="")||(adress=="")||(town=="")||(phone=="")){
			  swal("Cancelled", "Data incomplete !", "error");   
		   }
		   else if((mail.indexOf("@")<0)||(mail.indexOf(".")<0))
		   {
			  swal("Cancelled", "Invalid Email !", "error");   
		   }
                
		   else {  
		   document.getElementById("name").value="";
		   document.getElementById("lastname").value=""; 
		   document.getElementById("email").value="";
		   document.getElementById("countrylist").value="";
		   document.getElementById("town_id").value="";
		   document.getElementById("adress").value="";
		   document.getElementById("phone").value="";
		    var main='{"type":"inser_cl","firstname":"'+firstname+'","lastname":"'+lastname+'","mail":"'+mail+'","country":"'+country+'","town":"'+town+'","adress":"'+adress+'","phone":"'+phone+'"}';
                          $.getJSON("conn.php",{client_req:main});
	        swal("Client Saved !", "You can find the new client on the client list area.", "success");
			 setTimeout(function(){ location.reload();},1500);  
		   }
}

function fire_employee(id_employee){
	
var currentdate = new Date(); 
var datetime = currentdate.getDate() + "/"+ (currentdate.getMonth()+1)  + "/" + currentdate.getFullYear() + " -- " + currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();   

 

swal({   title: "Are you sure ?",   text: "This Employee will be Fired !", 
  type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55", 
  confirmButtonText: "Yes, Fire Him!",   closeOnConfirm: false }, function(){ 
  var main='{"type":"fire_employee","id_personne":"'+id_employee+'","date_end":"'+datetime+'"}';
 $.getJSON("conn.php",{client_req:main});
  swal("Employee Fired !", "The Selected Employee Has Been Fired.", "success");
 setTimeout(function(){ location.reload();},1500);  
  
  
  });
 

}
function rehire_employee(id_employee){
	
var currentdate = new Date(); 
var datetime = currentdate.getDate() + "/"+ (currentdate.getMonth()+1)  + "/" + currentdate.getFullYear() + " -- " + currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();   

swal({   title: "Are you sure ?",   text: "This Employee will be Rehired !", 
  type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55", 
  confirmButtonText: "Yes, Rehire Him!",   closeOnConfirm: false }, function(){ 
var main='{"type":"rehire_employee","id_personne":"'+id_employee+'","date_begin":"'+datetime+'"}';
 $.getJSON("conn.php",{client_req:main});
  swal("Employee Rehired !", "The Selected Employee Has Been Rehired.", "success");
 setTimeout(function(){ location.reload();},1500);  
  
  
  });
}

function delete_offer(id_offer){

swal({   title: "Are you sure ?",   text: "This Offer will be Deleted !", 
  type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55", 
  confirmButtonText: "Yes, Delete it !",   closeOnConfirm: false }, function(){ 
var main='{"type":"delete_offer","id_offer":"'+id_offer+'"}';
 $.getJSON("conn.php",{client_req:main});
  swal("Offer Deleted !", "The Selected Offer Has Been Deleted.", "success");
 setTimeout(function(){ location.reload();},1500);  
  
  
  });	

}

function delete_country(id_country){

swal({   title: "Are you sure ?",   text: "This Country will be Deleted !", 
  type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55", 
  confirmButtonText: "Yes, Delete it !",   closeOnConfirm: false }, function(){ 
var main='{"type":"delete_country","id_country":"'+id_country+'"}';
 $.getJSON("conn.php",{client_req:main});
  swal("Country Deleted !", "The Selected Country Has Been Deleted.", "success");
 setTimeout(function(){ location.reload();},1500);  
  
  
  });	

}
function delete_county(id_county){

swal({   title: "Are you sure ?",   text: "This County will be Deleted !", 
  type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55", 
  confirmButtonText: "Yes, Delete it !",   closeOnConfirm: false }, function(){ 
var main='{"type":"delete_county","id_county":"'+id_county+'"}';
 $.getJSON("conn.php",{client_req:main});
  swal("County Deleted !", "The Selected County Has Been Deleted.", "success");
 setTimeout(function(){ location.reload();},1500);  
  
  
  });	

}
function delete_bill(id_bill){

swal({   title: "Are you sure ?",   text: "This Bill will be Deleted !", 
  type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55", 
  confirmButtonText: "Yes, Delete it !",   closeOnConfirm: false }, function(){ 
var main='{"type":"delete_bill","id_bill":"'+id_bill+'"}';
 $.getJSON("conn.php",{client_req:main});
  swal("Bill Deleted !", "The Selected Bill Has Been Deleted.", "success");
 setTimeout(function(){ location.reload();},1500);  
  
  
  });	

}
function delete_service(id_service){

swal({   title: "Are you sure ?",   text: "This Service will be Deleted !", 
  type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55", 
  confirmButtonText: "Yes, Delete it !",   closeOnConfirm: false }, function(){ 
var main='{"type":"delete_service","id_service":"'+id_service+'"}';
 $.getJSON("conn.php",{client_req:main});
  swal("Service Deleted !", "The Selected Service Has Been Deleted.", "success");
 setTimeout(function(){ location.reload();},1500);  
  
  
  });	

}

function delete_client(id_cl){

swal({   title: "Are you sure ?",   text: "This Client will be Deleted !", 
  type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55", 
  confirmButtonText: "Yes, Delete it !",   closeOnConfirm: false }, function(){ 
var main='{"type":"delete_client","email":"'+id_cl+'"}';
 $.getJSON("conn.php",{client_req:main});
  swal("Client Deleted !", "The Selected Client Has Been Deleted.", "success");
 setTimeout(function(){ location.reload();},1500);  
  
  
  });	

}
function edit_client(id_cl){
	var email=id_cl;
	var firstname="";
	var lastname="";
	var country="";
	var town="";
	var adress="";
	var phone="";
	var ls_cl_taille=liste_cl.length;
	var i=0;
	while(i<ls_cl_taille){
		if(liste_cl[i].email==email){
			firstname=liste_cl[i].firstname;
			lastname=liste_cl[i].lastname;
			country=liste_cl[i].country_id;
			town=liste_cl[i].town_name;
			adress=liste_cl[i].adresse;
			phone=liste_cl[i].phone;
		}
		i++;
	}
	
edit_client_menu();
         
		  document.getElementById("client_name").innerHTML="Edit Client : "+firstname+" "+lastname;
		   document.getElementById("name1").value=""+firstname;
		   document.getElementById("lastname1").value=""+lastname; 
		   document.getElementById("email1").value=""+email;
		   document.getElementById("town_id1").value=""+town;
		   document.getElementById("adress1").value=""+adress;
		   document.getElementById("phone1").value=""+phone;
		   
		   if((country=="Tun")||(country=="tun")||(country=="TUN")){
			   document.getElementById("0").selected=true;
		   }
		   if((country=="Alg")||(country=="alg")||(country=="ALG")){
			   document.getElementById("1").selected=true;
		   }
		   if((country=="Fra")||(country=="fra")||(country=="FRA")){
			   document.getElementById("2").selected=true;
		   }
           //		   
  
 

}
function submit_edit_client(){
     
	       var firstname=document.getElementById("name1").value+"";
		  var lastname=document.getElementById("lastname1").value+""; 
		  var mail=document.getElementById("email1").value+"";
		  var country=document.getElementById("countrylist1").value+"";
		  //alert("ok");
		  var town=document.getElementById("town_id1").value+"";
		  var adress=document.getElementById("adress1").value+"";
		  var phone=document.getElementById("phone1").value+"";
		   if((firstname=="")||(mail=="")||(lastname=="")||(country=="")||(adress=="")||(town=="")||(phone=="")){
			  swal("Cancelled", "Data incomplete !", "error");   
		   }
		   else if((mail.indexOf("@")<0)||(mail.indexOf(".")<0))
		   {
			  swal("Cancelled", "Invalid Email !", "error");   
		   }
                
		   else {  
		   var main='{"type":"update_cl","firstname":"'+firstname+'","lastname":"'+lastname+'","mail":"'+mail+'","country":"'+country+'","town":"'+town+'","adress":"'+adress+'","phone":"'+phone+'"}';
                          $.getJSON("conn.php",{client_req:main});
	        swal("Client Updated !", "You can find the the updates on the client on the client list area.", "success");
			 setTimeout(function(){ location.reload();},1500);  
		   }
	 
	 
	 
   

}
//edit_bill_menu()
function edit_bill(id_bill_e){
	var id=id_bill_e;
	var cost_service="";
	var tax_country="";
	var sum="";
	var id_usage="";
	 
	var ls_b_taille=liste_bills.length;
	var i=0;
	while(i<ls_b_taille){
		if(liste_bills[i].id_bill==id){
			cost_service=liste_bills[i].cost_service;
			tax_country=liste_bills[i].tax_country;
			sum=liste_bills[i].sum;
			id_usage=liste_bills[i].id_usage;
		}
		i++;
	}
	
edit_bill_menu();
 

         
		  document.getElementById("id_bill").value=""+id;;
		   document.getElementById("service_cost").value=""+cost_service;
		   document.getElementById("tax").value=""+tax_country; 
		   document.getElementById("sum").value=""+sum;
   
 

}
function submit_edit_bill(){
     
	 
	       var id_bill=document.getElementById("id_bill").value+"";
		  var service_cost=document.getElementById("service_cost").value+""; 
		  var tax=document.getElementById("tax").value+"";
		  var sum=document.getElementById("sum").value+"";
		  //alert("ok");
		  
		 
		   if((id_bill=="")||(service_cost=="")||(tax=="")||(sum=="")){
			  swal("Cancelled", "Data incomplete !", "error");   
		   }      
		   else {  
		   var main='{"type":"update_bill","id_bill":"'+id_bill+'","service_cost":"'+service_cost+'","tax":"'+tax+'","sum":"'+sum+'"}';
                   $.getJSON("conn.php",{client_req:main});
	        swal("Bill Updated !", "You can find the the updates on the bill on the bill list area.", "success");
			 setTimeout(function(){ location.reload();},1500);  
		   }
	 
	 
	 
   

}
//edit_country_menu()

function edit_country(id_country){
	var code=id_country;
	var name="";
	var fee="";
	 
	 
	var ls_country_taille=liste_countries.length;
	var i=0;
	while(i<ls_country_taille){
		if(liste_countries[i].code==code){
		
			name=liste_countries[i].name;
			fee=liste_countries[i].fee;
		 
		}
		i++;
	}
	
edit_country_menu();
 

         
		  document.getElementById("id_country").value=""+code;
		   document.getElementById("name_country").value=""+name;
		   document.getElementById("fee_country").value=""+fee; 
		  
   
 

}
function submit_edit_country(){
     
	 
	       var id_country=document.getElementById("id_country").value+"";
		  var name_country=document.getElementById("name_country").value+""; 
		  var fee_country=document.getElementById("fee_country").value+"";
 
		  
		 
		   if((id_country=="")||(name_country=="")||(fee_country=="")){
			  swal("Cancelled", "Data incomplete !", "error");   
		   }      
		   else {  
		  var main='{"type":"update_country","id_country":"'+id_country+'","name_country":"'+name_country+'","fee_country":"'+fee_country+'"}';
               $.getJSON("conn.php",{client_req:main});
	        swal("Country Updated !", "You can find the the updates on the country on the countries list area.", "success");
			 setTimeout(function(){ location.reload();},1500);  
		   }
	 
	 
	 
   

}
//edit_service_menu
function edit_service(id_service){
	 
	var name=id_service;
	var fee="";
	var code_offer="";
	 
	 
	var ls_services_taille=liste_services.length;
	var i=0;
	while(i<ls_services_taille){
		if(liste_services[i].name==name){
		
		 
			fee=liste_services[i].fee;
			code_offer=liste_services[i].code_offer;
		 
		}
		i++;
	}
	
edit_service_menu();
 

         
		  
		   document.getElementById("name_serv").value=""+name;
		   document.getElementById("fee_sev").value=""+fee; 
		   document.getElementById("lo"+code_offer+"").selected=true;
		   
		  
   
 

}
function submit_edit_service(){
     
	 
	       var name_serv=document.getElementById("name_serv").value+"";
		  var fee_sev=document.getElementById("fee_sev").value+""; 
		  var offerl=document.getElementById("offerlist").value+"";
 
		  //alert(offerlist);
		 
		   if((name_serv=="")||(fee_sev=="")||(offerl=="")){
			  swal("Cancelled", "Data incomplete !", "error");   
		   }      
		   else {  
		 var main='{"type":"update_service","name_serv":"'+name_serv+'","fee_sev":"'+fee_sev+'","offer":"'+offerl+'"}';
               $.getJSON("conn.php",{client_req:main});
	        swal("Service Updated !", "You can find the the updates on the service on the services list area.", "success");
			 setTimeout(function(){ location.reload();},1500);  
		   }
	 
	 
	 
   

}

//edit_county_b

function edit_county(id_county){
	var code=id_county;
	var name="";
	var id_country="";
	 
	 
	var ls_county_taille=liste_counties.length;
	var i=0;
	while(i<ls_county_taille){
		if(liste_countries[i].code==code){
		
			name=liste_counties[i].name;
			id_country=liste_counties[i].id_country;
		 
		}
		i++;
	}
	
edit_county_menu();
 

         
		  document.getElementById("id_county").value=""+code;
		   document.getElementById("name_county").value=""+name;
		    document.getElementById("lcoff"+id_country+"").selected=true;
		   
		  
   
 

}
function submit_edit_county(){
     
	 
	       var id_county=document.getElementById("id_county").value+"";
		  var name_county=document.getElementById("name_county").value+""; 
		  var code_country_l=document.getElementById("lcountrycode").value+"";
 
		  
		 
		   if((id_county=="")||(name_county=="")||(code_country_l=="")){
			  swal("Cancelled", "Data incomplete !", "error");   
		   }      
		   else {  
		  var main='{"type":"update_county","id_county":"'+id_county+'","name_county":"'+name_county+'","code_country_l":"'+code_country_l+'"}';
             $.getJSON("conn.php",{client_req:main});
	        swal("County Updated !", "You can find the the updates on the county on the counties list area.", "success");
			 setTimeout(function(){ location.reload();},1500);  
		   }
	 
	 
	 
   

}
//edit_offer_menu


function edit_offer(id_offer){
	var code=id_offer;
	var name="";
	var price="";
	var country="";
	var network="";
	 
	 
	var ls_offer_taille=liste_offers.length;
	var i=0;
	while(i<ls_offer_taille){
		if(liste_offers[i].code==code){
		
			name=liste_offers[i].offer_name;
			price=liste_offers[i].price_per_month;
			country=liste_offers[i].country_id;
			network=liste_offers[i].id_network;
		 
		}
		i++;
	}
	
edit_offer_menu();
 

       
	 
	
	 
	 
		  document.getElementById("id_offer").value=""+code;
		  document.getElementById("name_offer").value=""+name;
		    document.getElementById("price_offer").value=""+price;
		    document.getElementById("lco"+country+"").selected=true;
			document.getElementById("id_net").value=""+network;
		   
		  
   
 

}
function submit_edit_offer(){
     
	 
	      var id_offer=document.getElementById("id_offer").value+"";
		  var name_offer=document.getElementById("name_offer").value+""; 
		  var price_offer=document.getElementById("price_offer").value+"";
          var id_country=document.getElementById("lcountrycodeoffer").value+""; 
		  var id_net=document.getElementById("id_net").value+"";
		  
		 
		   if((id_offer=="")||(name_offer=="")||(price_offer=="")||(id_country=="")||(id_net=="")){
			  swal("Cancelled", "Data incomplete !", "error");   
		   }      
		   else {  
		  var main='{"type":"update_offer","id_offer":"'+id_offer+'","name_offer":"'+name_offer+'","price_offer":"'+price_offer+'","id_country":"'+id_country+'","id_net":"'+id_net+'"}';
            $.getJSON("conn.php",{client_req:main});
	        swal("Offer Updated !", "You can find the the updates on the offer on the offers list area.", "success");
			 setTimeout(function(){ location.reload();},1500);  
		   }
	 
	 
	 
   

}


//add_bill
 

function add_bill(){
	  
	      var code_bill=document.getElementById("code_bill").value+"";
		  var cost_bill=document.getElementById("cost_bill").value+""; 
		  var tax_bill=document.getElementById("tax_bill").value+"";
		  var sum_bill=document.getElementById("sum_bill").value+"";
		  var usage_bill=document.getElementById("usage_bill").value+"";
		  var client_id=document.getElementById("lcl").value+"";
		  
		   if((code_bill=="")||(cost_bill=="")||(tax_bill=="")||(sum_bill=="")||(usage_bill=="")||(client_id=="")){
			  swal("Cancelled", "Data incomplete !", "error");   
		   }
		   
                
		   else {  
		   
		   document.getElementById("code_bill").value="";
		   document.getElementById("cost_bill").value=""; 
		   document.getElementById("tax_bill").value="";
		   document.getElementById("sum_bill").value="";
		   document.getElementById("usage_bill").value="";
		   document.getElementById("lcl").value="";
		  
		   var currentdate = new Date(); 
           var datetime = currentdate.getDate() + "/"+ (currentdate.getMonth()+4)  + "/" + currentdate.getFullYear();   

		 
		    var main='{"type":"inser_bill","code_bill":"'+code_bill+'","cost_bill":"'+cost_bill+'","tax_bill":"'+tax_bill+'","sum_bill":"'+sum_bill+'","usage_bill":"'+usage_bill+'"}';
                    $.getJSON("conn.php",{client_req:main});
	        swal("Bill Saved !", "You can find the new bill on the client bill area, an email hes been sent to client : "+client_id+".", "success");
			var text="Hello ,Dear Our Client :<br> You are requested to pay your bill for using our services.<br><br>Bill Number : "+code_bill+"<br>Amout to pay : "+sum_bill+"<br>Paying deadlines :"+datetime+" That's 3 months from today <br><br>With gratitude IMSN.";
			sendmail(client_id,text);
			 setTimeout(function(){ location.reload();},3000);  
		   }
}


	



	
function sendmail(mail,text){
  
    $.ajax({
      type: 'POST',
      url: 'https://mandrillapp.com/api/1.0/messages/send.json',
      data: {
        'key': 'ViGfWjXVxKSZJespIVh-mw',
        'message': {
          'from_email': 'fahed.abdellaoui2@gmail.com',
          'to': [
              {
                'email': mail,
                'name': 'IMSN',
                'type': 'to'
              }
            ],
          'autotext': 'true',
          'subject': 'IMSN Billing',
          'html': text
        }
      }
     }).done(function(response) {
      
     }); 
}


function calc_sum(){
          var cost_bill=document.getElementById("cost_bill").value+""; 
		  var tax_bill=document.getElementById("tax_bill").value+"";	
		  
		  var prix=parseFloat(cost_bill);
		  var tax=parseFloat(tax_bill);
	
	 document.getElementById("sum_bill").value=prix+tax;
	
}











function print_bill(id_bill)
{
	var taille_bills=liste_bills.length;
	var i=0;
	var cost_service="";
	var tax_country="";
	var sum="";
	var id_usage=""
	var currentdate = new Date(); 
    var datetime = currentdate.getDate() + "/"+ (currentdate.getMonth()+1)  + "/" + currentdate.getFullYear() + " -- " + currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();   

	while(i<taille_bills){
		if(liste_bills[i].id_bill==id_bill){
			cost_service=liste_bills[i].cost_service;
			tax_country=liste_bills[i].tax_country;
			sum=liste_bills[i].sum;
			id_usage=liste_bills[i].id_usage;
		}
		i++;
	}
	
var doc = new jsPDF();
doc.setFontSize(12);
doc.text(20, 20, "_____________________Welcome To IMSN Billing System__________________\n");
doc.text(20, 30, "___\n");
doc.text(20, 40, "This Bill Has been Generated on : "+datetime+"\n");
doc.text(20, 50, "Bill Number : "+id_bill+"");
doc.text(20, 60, "Total Cost for using the service : "+cost_service+"");
doc.text(20, 70, "Country taxes : "+tax_country+"");
doc.text(20, 80, "_________________");
doc.text(20, 90, "Bill Sum :"+sum+"");

doc.save('Bill.pdf');
}


</script>
 
 
 </head>
 <title>IMSN - Member</title>
 <style>
 
 
 .ta1{
border: 1px solid #BFE5FF;
border-radius: 5px;
height:44px;
width:160px;
padding-left:5px;

margin-top:4px;
resize:none;
}
 
 
 input{
border: 1px solid #BFE5FF;
border-radius: 5px;
height:30px;
width:200px;
padding-left:5px;
}
 .increase {
    width:12px;
    height:12px;
	display: inline-block;
}
.carre{
margin-left:15%;
margin-right:15%;
width:70%;
min-width:500px;
height:500px;
margin-top:5%;
text-align:center;	
background-color:rgba(249,249,249,1);
border: 1px solid #BFE5FF;
border-radius: 5px;
text-align:center;
overflow-y:auto;
}
.carre1{
margin-left:0px;
width:180px;
height:100px;
margin-top:-4px;
text-align:center;	
background-color:rgba(249,249,249,1);
border: 1px solid #BFE5FF;
border-radius: 5px;
text-align:center;
overflow:hidden;
 padding-top:4px;
}
.carreall{
margin-left:10px;
width:180px;;
min-width:180px;
height:400px;
margin-top:-502px;
text-align:center;	
background-color:rgba(249,249,249,1);
text-align:center;
 padding-top:4px;
}
.carre4{
margin-left:-1px;
width:182px;;
height:280px;
margin-top:0px;
text-align:center;	
background-color:#757575;
border-radius: 5px;
margin-top:10px;
text-align:center;
 padding-top:4px;
}
.button_side{
	
	margin-top:3px;
display: inline-block;
background:#757575;
padding-top:6px;
text-align:center;
height:23px;
width:182px;
text-align:center;
color:#FFF;
font-family: 'Roboto', sans-serif;
font-size:14px;
 

}
.button_side:hover{
cursor:pointer;
background:#f9f9f9;
color:#757575;
}




.carre3{
margin-left:15%;
margin-right:15%;
width:70%;
display:none;
min-width:500px;
height:500px;
margin-top:5%;
text-align:center;	
background-color:rgba(249,249,249,1);
border: 1px solid #BFE5FF;
border-radius: 5px;
text-align:center;
overflow-y:auto;
}
.font1{
margin-top:23px;	
text-align:center;
color:rgba(12,12,50,1);
font: normal 40px/1 "Aguafina Script", Helvetica, sans-serif;
}
.fo1{
margin-top:90px;	
text-align:center;
}

input{
border: 1px solid #BFE5FF;
border-radius: 5px;
height:30px;
width:200px;
padding-left:5px;
}

.buttons{
width:100%;
height:50px;
 padding-top:15px;
text-align:center;

background:rgba(89,188,217,1);
   
}
.button_style{
	display: inline-block;

font-family: 'Roboto', sans-serif;
font-size:17px;
background:rgba(89,188,217,1);

 padding-top:4px;
text-align:center;
height:23px;
width:110px;
color:#fff;
}

.button_style:hover{
display: inline-block;
background:rgba(89,188,217,1);

padding-top:4px;
text-align:center;
height:23px;
width:110px;
cursor:pointer;
color:rgba(30,115,190,1);
}




.button_table{
	display: inline-block;
font-family: 'Roboto', sans-serif;
font-size:10px;
background:rgba(25,156,216,1);
 
border-radius: 4px;
 padding-top:2px;
text-align:center;
height:15px;
width:34px;
color:#fff;
}

.button_table:hover{
display: inline-block;
background:#fff;
background:rgba(21,129,178,1);
padding-top:2px;
text-align:center;
height:15px;
width:34px;
font-family: 'Roboto', sans-serif;
font-size:10px;
cursor:pointer;
color:#fff;
}












html, body {
 
  padding: 0;
  margin: 0;

}
.a{
 text-align: center;	
    text-decoration: none;
    display: inline-block;
}


.CSSTable {
	margin:4px;padding:0px;
	width:99%;
	
	
	
}
.CSSTable table{
    border-spacing: 0;
	width:100%;
	height:100%;

}

.CSSTable tr:hover td{
	background-color:#ffffff;
		

}
.CSSTable td{
	vertical-align:middle;
	background:-o-linear-gradient(bottom, #e5e5e5 5%, #ffffff 100%);
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #e5e5e5), color-stop(1, #ffffff) ); 
	background:-moz-linear-gradient( center top, #e5e5e5 5%, #ffffff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#e5e5e5", endColorstr="#ffffff");
	background: -o-linear-gradient(top,#e5e5e5,ffffff);
	border:1px solid #ffffff;
	text-align:left;
	padding:9px;
	font-family: 'Roboto', sans-serif;
    font-size:13px;
	font-weight:normal;
	color:#000000;

}
.CSSTable tr:last-child td{
	border-width:0px 1px 0px 0px;
}
.CSSTable tr td:last-child{
	border-width:0px 0px 1px 0px;
}
.CSSTable tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.CSSTable tr:first-child td{
		background:-o-linear-gradient(bottom, #1E73BE 5%, #1E73BE 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #1E73BE), color-stop(1, #1E73BE) );
	background:-moz-linear-gradient( center top, #1E73BE 5%, #1E73BE 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#1E73BE", endColorstr="#1E73BE");	background: -o-linear-gradient(top,#1E73BE,1E73BE);

	background:rgba(89,188,217,1);
	border:0px solid #ffffff;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:10px;
	font-family: 'Roboto', sans-serif;
font-size:15px;
	color:#ffffff;
}
.CSSTable tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #1E73BE 5%, #1E73BE 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #1E73BE), color-stop(1, #1E73BE) );
	background:-moz-linear-gradient( center top, #1E73BE 5%, #1E73BE 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#1E73BE", endColorstr="#1E73BE");	background: -o-linear-gradient(top,#1E73BE,1E73BE);

	background:rgba(89,188,217,1);
}
.CSSTable tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.CSSTable tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}



.buttons1{
width:200px;
height:50px;
margin-left:40%;
margin-right:40%;
text-align:center;

}
.button_style1{
margin-left:40px;
font-family: 'Roboto', sans-serif;
font-size:15px;
background:rgba(25,156,216,1);
margin-top:20px;
border-radius: 4px;
padding-top:10px;
text-align:center;
height:30px;
width:90px;
color:#fff;
}

.button_style1:hover{
background:rgba(21,129,178,1);
font-family: 'Roboto', sans-serif;
font-size:15px;

padding-top:10px;
text-align:center;
height:30px;
width:90px;
cursor:pointer;
color:#fff;
}

.font1{
margin-top:13px;	
text-align:center;
color:rgba(30,115,190,1);
font-family: 'Roboto', sans-serif;
font-size:27px;

}
.font2{
margin-top:13px;
margin-bottom:13px;	
text-align:center;
color:#000;
font-family: 'Roboto', sans-serif;
font-size:17px;

}
.logo1{
float:left;
background-image: url("log1.png");
background-repeat:no-repeat;
background-position: 0px 0px;
height:45px;
width:45px;
text-align: left;
margin-left:20px;
 padding-bottom:15px;


}
.title_f{
	padding-top:1px;
float:left;
height:45px;
width:45px;
text-align: left;
margin-left:20px;
color:#fff;
font-family: 'Roboto', sans-serif;
font-size:23px;	
}
.button_style_logout{
font-family: 'Roboto', sans-serif;
font-size:15px;
background:rgba(25,156,216,1);
float:right;
margin-right:20px;
border-radius: 4px;
padding-top:10px;
text-align:center;
height:30px;
width:90px;

color:#fff;
}

.button_style_logout:hover{
background:rgba(21,129,178,1);
 cursor:pointer;
font-family: 'Roboto', sans-serif;
font-size:15px;

 
border-radius: 4px;
 
text-align:center;
height:30px;
width:90px;

color:#fff;
}


.button_style_{
font-family: 'Roboto', sans-serif;
font-size:15px;
background:rgba(25,156,216,1);
margin-right:20px;
border-radius: 4px;
padding-top:10px;
text-align:center;
height:30px;
width:90px;

color:#fff;
}

.button_style_:hover{
background:rgba(21,129,178,1);
 cursor:pointer;
font-family: 'Roboto', sans-serif;
font-size:15px;
border-radius: 4px; 
text-align:center;
height:30px;
width:90px;

color:#fff;
}
.line1{
border-color:rgba(21,129,178,0.1);
width:300px;	
}






.font3{
margin-top:13px;
margin-bottom:13px;	
text-align:center;
color:#000;
font-family: 'Roboto', sans-serif;
font-size:15px;

}
.champ_style
{
font-family: 'Roboto', sans-serif;
font-size:17px;
color:rgba(30,115,190,1)
}
 
   .champ_style_interne
{
font-family: 'Roboto', sans-serif;
font-size:17px;
color:#000;
}
.t_input{
border: 1px solid #BFE5FF;
border-radius: 5px;
height:30px;
width:160px;
padding-left:5px;
}
.t_input1{
border: 1px solid #BFE5FF;
border-radius: 5px;
height:30px;
width:300px;
padding-left:5px;
}
 </style>
 <body bgcolor="#f9f9f9">
 
 <div class="buttons">
 <div class="button_style" type="button" onClick="clients_menu();">Clients</div>
 <div class="button_style" type="button" onClick="countrys_menu();">Countries</div>
 <div class="button_style" type="button" onClick="bills_menu();">Bills</div>
  <div class="button_style" type="button" onClick="offers_menu();">Offers</div>
 <div class="button_style" type="button" onClick="services_menu();">Services</div>
 <div class="button_style" type="button" onClick="employees_menu();">Employees</div>
 <div class="button_style" type="button" onClick="counties_menu();">Counties</div>
<div  class="button_style_logout"type="button" onClick="out();">Logout</div>
 <div id="logo" class="logo1"></div><div class="title_f">IMSN</div>
 </div>
<div class="carre" id="clients_b"> 
<div class="font1">Clients</div>
								<div class="CSSTable">
									<table id="tableau1" border=1 >
										<thead>
											<tr>
												<td>Id</td>
												<td>First Name</td>
												<td>Last Name</td>
												<td>Email</td>
												<td>Town</td>
												<td>Country</td>
												<td>Phone</td>
												<td>Action</td>
											</tr>
										</thead>
										<tbody>
											
											 
										</tbody>
									</table>
									</div>


</div>

<div class="carre3" id="employees_b"> 
<div class="font1">Employees</div>
								<div class="CSSTable">
									<table id="tableau2" border=1 >
										<thead>
											<tr>
												<td>Email</td>
												<td>Login</td>
												<td>Hire Date</td>
												<td>Fire Date</td>
												<td>Service</td>
												<td>Period of Work(Days)</td>
												<td>Discount(%)</td>
												<td>Action</td>
											</tr>
										</thead>
										<tbody>
											
											 
										</tbody>
									</table>
									</div>
</div></div>
<div class="carre3" id="countries_b"> 
<div class="font1">Countries</div>
								<div class="CSSTable">
									<table id="tableau3" border=1 >
										<thead>
											<tr>
												<td>Code</td>
												<td>Name</td>
												<td>Fee</td>
												<td>Action</td>
											</tr>
										</thead>
										<tbody>
											
											 
										</tbody>
									</table>
									</div>
</div>
</div>

<div class="carre3" id="bills_b"> 
<div class="font1">Bills</div>
								<div class="CSSTable">
									<table id="tableau4" border=1 >
										<thead>
											<tr>
												<td>Code</td>
												<td>Cost Service</td>
												<td>Tax Country</td>
												<td>Sum</td>
												<td>Id Usage</td>
												<td>Action</td>
												
											</tr>
										</thead>
										<tbody>
											
											 
										</tbody>
									</table>
									</div>
</div>
</div>
<div class="carre3" id="services_b"> 
<div class="font1">Services</div>
								<div class="CSSTable">
									<table id="tableau7" border=1 >
										<thead>
											<tr>
												<td>Name</td>
												<td>Fee</td>
												<td>Related Code Offer</td>
												<td>Action</td>
												
											</tr>
										</thead>
										<tbody>
											
											 
										</tbody>
									</table>
									</div>
</div>
</div>
<div class="carre3" id="counties_b"> 
<div class="font1">Counties</div>
								<div class="CSSTable">
									<table id="tableau6" border=1 >
										<thead>
											<tr>
												<td>Code</td>
												<td>Name</td>
												<td>Country Name</td>
												<td>Action</td>
											</tr>
										</thead>
										<tbody>
											
											 
										</tbody>
									</table>
									</div>
</div>
<div class="carre3" id="offers_b"> 
<div class="font1">Offers</div>
								<div class="CSSTable">
									<table id="tableau9" border=1 >
										<thead>
											<tr>
												<td>Code</td>
												<td>Offer Name</td>
												<td>Price/Month</td>
												<td>Country</td>
												<td>Network</td>
												<td>Action</td>
											</tr>
										</thead>
										<tbody>
											
											 
										</tbody>
									</table>
									</div>
</div>
<div class="carre3" style="overflow:hidden;scroll:none;" id="add_client_b"> 

<div class="font1" style="margin-top:100px;">New Client</div>
<hr class="line1">
<center>
	 <table cellspacing="7" cellpadding="0" style="margin-top:30px;">
     <tr><td class="champ_style">First Name :*&nbsp;</td><td><input class="t_input" id="name" type="text" placeholder="Your First Name Here" onFocus="" onkeypress=""></td><td class="champ_style">&nbsp; Last Name :*&nbsp;</td><td><input class="t_input" id="lastname" type="text" placeholder="Your Last name Here" onFocus="" onkeypress="submit_enter(event)"></td><td class="champ_style">&nbsp; Email :*&nbsp;</td><td><input class="t_input"  id="email" type="text" placeholder="Your Email Here" onFocus="" onkeypress="submit_enter(event)"></td></tr>
	 <tr><td class="champ_style">Town :&nbsp;</td><td><input class="t_input" id="town_id" type="text" placeholder="Your Town Name Here" onFocus="" onkeypress=""></td><td class="champ_style">&nbsp; Country :&nbsp;</td><td>
	 <div id="country_place" name="country_place"></div>
	 </td><td class="champ_style">&nbsp; Adress :&nbsp;</td><td>
	 <textarea class="ta1" id="adress"></textarea>
	 
	 </td></tr>
	 <tr><td class="champ_style">Phone Number :&nbsp;</td><td><input class="t_input" id="phone" type="text" placeholder="Your Phone Name Here" onFocus="" onkeypress=""></td></tr>
	 	 </table><center><div  class="button_style_"type="button" style="margin-top:30px;margin-left:20px;" onClick="add_client();">Save</div></center></center>
</div>
<div class="carre3" style="overflow:hidden;scroll:none;" id="edit_client_b"> 

<div class="font1" style="margin-top:100px;" id="client_name"></div>
<hr class="line1">
<center>
	 <table cellspacing="7" cellpadding="0" style="margin-top:30px;">
     <tr><td class="champ_style">First Name :&nbsp;</td><td><input class="t_input" id="name1" type="text" placeholder="Your First Name Here" onFocus="" onkeypress=""></td><td class="champ_style">&nbsp; Last Name :&nbsp;</td><td><input class="t_input" id="lastname1" type="text" placeholder="Your Last name Here" onFocus="" onkeypress="submit_enter(event)"></td><td class="champ_style">&nbsp; Email :&nbsp;</td><td><input class="t_input"  id="email1" type="text" placeholder="Your Email Here"  readonly disabled></td></tr>
	 <tr><td class="champ_style">Town :&nbsp;</td><td><input class="t_input" id="town_id1" type="text" placeholder="Your Town Name Here" onFocus="" onkeypress=""></td><td class="champ_style">&nbsp; Country :&nbsp;</td><td>
	 <div id="country_place1" name="country_place1"></div>
	 </td><td class="champ_style">&nbsp; Adress :&nbsp;</td><td>
	 <textarea class="ta1" id="adress1"></textarea>
	 
	 </td></tr>
	 <tr><td class="champ_style">Phone Number :&nbsp;</td><td><input class="t_input" id="phone1" type="text" placeholder="Your Phone Name Here" onFocus="" onkeypress=""></td></tr>
	 	 </table><center><div  class="button_style_"type="button" style="margin-top:30px;margin-left:20px;width:110px;" onClick="submit_edit_client();">Save Changes</div></center></center>
</div>


<div class="carre3" style="overflow:hidden;scroll:none;" id="edit_bill_b"> 

<div class="font1" style="margin-top:100px;" >Edit Bills</div>
<hr class="line1">
<center>
	 <table cellspacing="7" cellpadding="0" style="margin-top:30px;">
	 <tr><td class="champ_style">Bill Id :&nbsp;</td><td><input class="t_input" id="id_bill" type="text" readonly disabled></td><td class="champ_style">&nbsp; Service Cost :&nbsp;</td><td><input class="t_input" id="service_cost" type="text"></td></tr>
	 <tr><td class="champ_style">Country Taxes :&nbsp;</td><td><input class="t_input" id="tax" type="text"></td><td class="champ_style">&nbsp; SUM :&nbsp;</td><td><input class="t_input" id="sum" type="text"></td></tr>

     </table><center><div  class="button_style_"type="button" style="margin-top:30px;margin-left:20px;width:110px;" onClick="submit_edit_bill();">Save Changes</div></center></center>
</div>

<div class="carre3" style="overflow:hidden;scroll:none;" id="edit_country_b"> 

<div class="font1" style="margin-top:100px;" >Edit Country</div>
<hr class="line1">
<center>
 
		  
	 <table cellspacing="7" cellpadding="0" style="margin-top:30px;">
	 <tr><td class="champ_style">Country Code :&nbsp;</td><td><input class="t_input" id="id_country" type="text" readonly disabled></td><td class="champ_style">&nbsp; Country Name :&nbsp;</td><td><input class="t_input" id="name_country" type="text"></td></tr>
	 <tr><td class="champ_style">Fees :&nbsp;</td><td><input class="t_input" id="fee_country" type="text"></td><td></td></tr>

     </table><center><div  class="button_style_"type="button" style="margin-top:30px;margin-left:20px;width:110px;" onClick="submit_edit_country();">Save Changes</div></center></center>
</div>



<div class="carre3" style="overflow:hidden;scroll:none;" id="edit_service_b"> 

<div class="font1" style="margin-top:100px;" >Edit Service</div>
<hr class="line1">
<center>
    
		
		  
	 <table cellspacing="7" cellpadding="0" style="margin-top:30px;">
	 <tr><td class="champ_style">Service Name :&nbsp;</td><td><input class="t_input" id="name_serv" type="text" readonly disabled></td><td class="champ_style">&nbsp; Service Cost :&nbsp;</td><td><input class="t_input" id="fee_sev" type="text"></td></tr>
	 <tr><td class="champ_style">Offer Code :&nbsp;</td><td><div id="offer_place"></div></td></tr>

     </table><center><div  class="button_style_"type="button" style="margin-top:30px;margin-left:20px;width:110px;" onClick="submit_edit_service();">Save Changes</div></center></center>
</div>


<div class="carre3" style="overflow:hidden;scroll:none;" id="edit_county_b"> 

<div class="font1" style="margin-top:100px;" >Edit County</div>
<hr class="line1">
<center>
 
		  
	 <table cellspacing="7" cellpadding="0" style="margin-top:30px;">
	 <tr><td class="champ_style">County Code :&nbsp;</td><td><input class="t_input" id="id_county" type="text" readonly disabled></td><td class="champ_style">&nbsp; County Name :&nbsp;</td><td><input class="t_input" id="name_county" type="text"></td></tr>
	 <tr><td class="champ_style">Country :&nbsp;</td><td><div id="country_list_pl"></div></td><td></td></tr>

     </table><center><div  class="button_style_"type="button" style="margin-top:30px;margin-left:20px;width:110px;" onClick="submit_edit_county();">Save Changes</div></center></center>
</div>


<div class="carre3" style="overflow:hidden;scroll:none;" id="edit_offer_b"> 

<div class="font1" style="margin-top:100px;" >Edit Offer</div>
<hr class="line1">
<center>
 
		  
	 <table cellspacing="7" cellpadding="0" style="margin-top:30px;">
	 <tr><td class="champ_style">Offer Code :&nbsp;</td><td><input class="t_input" id="id_offer" type="text" readonly disabled></td><td class="champ_style">&nbsp; Offer Name :&nbsp;</td><td><input class="t_input" id="name_offer" type="text"></td>
	 </tr>
	 
	 <tr>
	 
	 <td class="champ_style">Price/Month :&nbsp;</td><td><input class="t_input" id="price_offer" type="text"></td>
	 <td class="champ_style">&nbsp; Country :&nbsp;</td>
	 <td><div id="country_list_off"></div></td>
	
	 </tr>
 <tr>
	  <td class="champ_style">Network :&nbsp;</td>
	 <td><input class="t_input" id="id_net" type="text"></td>
	 </tr> 
	 
     </table><center><div  class="button_style_"type="button" style="margin-top:30px;margin-left:20px;width:110px;" onClick="submit_edit_offer();">Save Changes</div></center></center>
</div>



<div class="carre3" style="overflow:hidden;scroll:none;" id="add_bill_b"> 

<div class="font1" style="margin-top:100px;">New Bill</div>
<hr class="line1">
<center>
	 <table cellspacing="7" cellpadding="0" style="margin-top:30px;">
     <tr><td class="champ_style">Bill Code :&nbsp;</td><td><input class="t_input" id="code_bill" type="text" placeholder="Your Bill Code Here" onFocus="" onkeypress=""></td><td class="champ_style">&nbsp; Cost Service :&nbsp;</td><td><input class="t_input" id="cost_bill" type="text" placeholder="Service Cost Here" onFocus="" onkeypress=""></td></tr>
	 <tr><td class="champ_style">Country Tax :&nbsp;</td><td><input class="t_input"  id="tax_bill" type="text" placeholder="Country Tax Here" onFocus="" onkeypress=""></td>
	 <td class="champ_style">&nbsp; SUM :&nbsp;</td><td><input class="t_input" id="sum_bill" type="text" placeholder="Bill Sum Here" onFocus="calc_sum();" onkeypress=""></td></tr>
	 <tr><td class="champ_style">Usage ID :&nbsp;</td><td>
	 <input class="t_input" id="usage_bill" type="text" placeholder="Usage Id Here" onFocus="" onkeypress="">
	 </td><td class="champ_style">&nbsp; Client ID :&nbsp;</td><td><div id="clients_list_place"></div></td></tr>
	</table><center><div  class="button_style_"type="button" style="margin-top:30px;margin-left:20px;" onClick="add_bill();">Save</div></center></center>
</div>



</div>



 <div class="carreall">
 <div class="carre1">
 <div class="font2" style="margin-bottom:1px;">Welcome</div><br>
 <div name="timedate" id="timedate"class="font3"> </div>
 </div>
 
 <div name="options" id="options"class="carre4">
 <div class="font2" style="margin-bottom:1px;color:#fff; margin-bottom:10px;">Options</div>
 <hr width="100">
  <div class="button_side" onClick="add_client_menu();">Add Client</div>
  <div  class="button_side">Add Country</div>
  <div  class="button_side" onClick="add_bill_menu();">Add Bill</div>
  <div  class="button_side">Add Service</div>
  <div  class="button_side">Add Employee</div>
  <div  class="button_side">Add County</div>
 
 </div>
 </div>
 
 </body>
 </html>