
<?php


// include all the functions
include('Functions.php');

// set up the parts of speech array
// functions will globally point to this variable
$pos = LoadPartsOfSpeech();

$number_of_sentences = 100; // how many sentences/rules are generated/used
$total_number_of_rules = 8; // how many rules are defined in Rule()
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
  
Nathanael reduced yieldingly before riddle! or
Diana Snow is vast so Ridge Weber is very uptight
or Aurelia Herring is a plain woman for Tadeo
stood interestingly the zampone! nor Dario
concerned before the cry. nor Zane Tanner is a
unsightly man but Willie Kirkland is clever and
Winston Fischer is alive nor Kaylee Joseph is very
lively and Tiana Sheppard is very faithful or
Addilynn Short is a woman and Samira Bean is a
small woman yet Susan George is a woman so Junior
Park is inexpensive for above a dumpy city,
spaceship blueprints exchanged hands yet
Maximilian Mcconnell is helpful and Riley and
Sutton introduced the handlebar viciously. nor
Warren Dale is poor for Carmen Tyler is very
polite yet Lewis Sanchez is a fancy man or
Ellianna Solomon is very obnoxious for beyond a
mill , a new idea was concieved and around a farm
, vegitables were grown and Naya Valentine is a
woman but Justin summoned In case of acidly truth!
yet Neither Frankie nor Alexis overcame the block
Opposite. yet Charlotte Shepherd is a woman nor
Cecelia Clark is very jolly yet in a sports
stadium, childeren played or Nathalia Burch is a
woman so to the north of the deck of a giant
spaceship, a wolf howled and Paityn Maynard is
careful or Prince read Alongside unexpectedly
vaulting! for Grace Black is very compassionate
but Neither Cameron nor Briar dated the board
literally. but Cohen Hill is very diligent yet to
the south of an estate , spaceship blueprints
exchanged hands for Amelie feared prior to the
stamina. and Elianna Lucas is very energetic but
Virginia Mooney is a woman nor Clark Odom is a
long man for Jaiden Berg is very vain for Riley
Walsh is a person but Magnus Mcconnell is a man
nor Neither Shiloh nor Eden sat the
anethesiologist greatly. for Selene Castillo is a
woman for Maverick Hobbs is a man for Neither
Emery nor London reflected the pearl wearily. and
Jeremiah Lancaster is a man so Lucille followed as
well as actually manx! and Melvin Anthony is vast
for Roselyn Gill is a small woman and Beckett
Melton is very ambitious so Milan and Hunter
embraced the attention In case of. nor inside a
newspaper company, a bird built a nest but on a
well maintained cemetery, a nuclear bomb was
detonated but Peyton and Jayden lived the
athletics Up. nor Daniella Ramsey is a woman for
Aadhya Turner is very pitiful but Bradley Perez is
a man and Adrianna Levine is gifted for Alyson
Compton is very attentive for Nola Holcomb is very
calm so Elora Carrillo is very jolly yet Neither
Remington nor Dallas handled the suppression much.
nor Carter and Kai opted the she Near. nor Oaklee
Leach is very pitiful so Jaxxon Pearson is a
unkempt man or Elisa Miranda is a small woman for
Kendall and Jessie jumped the laugh majestically.
yet beyond a newspaper company, aliens attacked
nor Vicente Lott is a man for Milani Holland is
easy but Annabelle listened Against never garden!
nor Daniella Edwards is mealy nor Gwen won quickly
the parentheses. so Ahmed Shields is alive but
Arely Watson is very calm for Leia Ferrell is a
handsome woman so Natasha Barron is very
thoughtless nor Alexzander Patton is odd so Ryan
and Payton amended the cuckoo tremendously. yet
Gunner English is shy but Hugo Dickson is mushy
for Karlie Ellison is unimportant but Isabela
Huffman is a gorgeous woman for Aden Bishop is a
magnificent man so Frederick Ochoa is poor and
Sylvie Pickett is a woman and Jayleen Langley is
very brave for next to an old church, a portal to
somewhere materialized or close to an advanced
research laboratory, bigfoot was sighted or Zion
Ayers is very lying so Freya Ellis is a woman nor
Jaxson Clark is a fit man yet Neither Phoenix nor
London judged the split questioningly. nor Jaylene
stood Round the chasuble! yet Alaia Blackburn is
very thankful so Peyton and Jordan organised the
antler once.

   
 */
