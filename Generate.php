
<?php


// include all the functions
include('Functions.php');

// set up the parts of speech array
// functions will globally point to this variable
$pos = LoadPartsOfSpeech();

$number_of_sentences = 30; // how many sentences/rules are generated/used
$total_number_of_rules = 9; // how many rules are defined in Rule()
$story = ''; // the string we concatinate rules on to

// for whatever number you set $number_of_sentences to...
foreach(range(1, $number_of_sentences, 1) as $number){
	
	// randomly select a rule, compute its result and concatinate with 
	// the existing $story
    $story .= Rule(random_int(1, $total_number_of_rules));
    
    // if this is not the last sentence/rule concatinate a conjunction
    if($number <= ($number_of_sentences - 1)){
		$story .= $pos['space'] . Get($pos['conjunctions']['pure']) . $pos['space'];
	}
}

// after the loop output the story
echo wordwrap($story, 50, PHP_EOL);

/*
 * Example Output
 * 
  Jayleen ended By the lip! so Jada called a family
member. nor Aidan Lester is gifted and Emma Walton
is very clumsy and Grey proceeded widely literally
runner. or Santana Norman is a man yet Nico
Bartlett is very pitiful yet Aliana Browning is
rich and Rowan introduced Past the colloquia. but
Holly built a robot. so Morgan Dorsey is a person
for London fooled Against the cappelletti. but
Neither Emory nor Angel angered the order angrily.
or Hezekiah Beasley is very panicky and Leighton
did almost vivaciously author. so Foster Justice
is a man but Rory Parker is a beautiful person so
Reagan Rivera is a person but Kai Zamora is clever
nor beyond a newspaper company, dinosaur bones
were uncovered yet beyond a houseboat, a bird
built a nest so Kyle Goff is a man or on the
mountains, a new species of insect was identified
nor Galilea Mckinney is very worried or Gunner Orr
is very guilty but Otto Gaines is a small man nor
Gia Hendrix is powerful and Robert Mcdaniel is a
beautiful man so to the south of a newspaper
company, science breakthroughs were made so
Carmelo Rodgers is very witty



Karter Jacobs is very evil yet Elaine wrote a
poem. or Jared yet Maxim sped the visitor on top
of. for Justice brushed their teeth. but Brixton
and Caylee required automatically wholesale
Without. or Damien Potts is very crazy for Jayleen
Moses is a beautiful woman and Esme manufactured
To the cracker. yet Jamir Leblanc is a man so
Trent Moore is very thoughtless so Jewel asked
questions. so Emmet Wells is tender yet Sandra
Knight is very worried yet Gustavo washed as well
as absolutely goodie! for in a water logged swamp,
a car got a flat tire but Amia Stephens is a woman
but Aadhya Lynch is a large woman and to the west
of an old shipwreck, a child giggled so Oaklyn
Boyd is very witty for Brendan Trujillo is very
charitable yet Zane posed away the toque! but
Aviana Morrison is very proud and Samira Barron is
very mysterious and Jaxton Moody is very lying yet
Kamari Chaney is very healthy and to the north of
the hills , a nuclear bomb was detonated yet
beyond a houseboat, nothing happened for close to
a suspention bridge, time travelers appered for
Dane Moss is very brave nor Chana Morris is a
short woman

   
 */
