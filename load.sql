LOAD DATA LOCAL INFILE "/Users/Tony/Desktop/test.csv" INTO TABLE bottlecap.caps
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n'
(id, brewer, name, type, country, color, othercolor, textcolor, rimcolor, text, opening, letter, creature, plant, wheat, cup, people, place, nature, building, sport, vehicle, coat, bodypart, flag, weapon, religion);