<?php
echo "<h1>Bienvenue dans cette super application</h1>";
$paris = "PARIS+(intramuros)";
$angers = "ANGERS+ST+LAUD";
$nantes = "NANTES";
$croisic = "LE+CROISIC";
$baule= "LA+BAULE+ESCOUBLAC";
$saintnaz="ST+NAZAIRE";
$lessables="LES+SABLES+D'OLONNE";
$jour='05';
$mois='04';
$annee='2018';
$date=$annee.'%2F'.$mois.'%2F'.$jour;
$url = 'https://data.sncf.com/api/records/1.0/search/';
$url = $url.'?dataset=tgvmax&q=od_happy_card%3D%27OUI%27&sort=date&facet=date&facet=origine&facet=destination&refine.date=';
$url = $url.$date.'&refine.origine=';
$url = $url.$paris;
$url = $url.'&refine.destination=';
$url = $url.$nantes;
$url2="curl https://3b036afe-0110-4202-b9ed-99718476c2e0@api.navitia.io/v1/coverage";
$json = file_get_contents($url);
$obj = json_decode($json);
$tab = $obj->parameters->dataset;
foreach($tab as $elem){
  echo $elem;
}
$recs = $obj->records;
foreach($recs as $rec){
  echo "<p>Date : ".$rec->fields->date."</p>";
  echo "<p>Départ de : ".$rec->fields->origine."</p>";
  echo "<p>Destination : ".$rec->fields->destination."</p>";
  echo "<p>Heure de départ : ".$rec->fields->heure_depart."</p>";
  echo "<p>Heure d'arrivée : ".$rec->fields->heure_arrivee."</p>";
}
 ?>
