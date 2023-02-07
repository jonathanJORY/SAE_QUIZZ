INSERT INTO QUESTIONNAIRE (questionnaireID, questionnaireName, questionnaireDescription) VALUES 
(1,"Test 1","ORLEANS"),
(2,"Test 2","ORLEANS"),
(3,"Test 3","ORLEANS"),
(4,"Test 4","ORLEANS"),
(5,"Test 5","ORLEANS"),
(6,"Test 6","ORLEANS"),
(7,"Test 7","ORLEANS");

INSERT INTO QUESTION (questionID, questionText, questionType) VALUES 
(1,"Qui sont les fréres de Luffy ?","checkbox"),
(2,"Le quel est mort à Marine Ford ?","radio"),
(3,"Quel est votre personnage favoris ?","text"),
(4,"Quel Shichibukai est le rival de Shanks ?","dropdown");

INSERT INTO REPONSE (reponseID, reponseText, questionID, correct) VALUES
(1,"Ace", 1, 1),
(2,"Garp", 1, 0),
(3,"Shanks", 1, 0),
(4,"Sabo", 1, 1),
(5,"Ace", 2, 1),
(6,"Garp", 2, 0),
(7,"Shanks", 2, 0),
(8,"Sabo", 2, 0),
(9,"Baggy Le Clown", 4, 0),
(10,"Crocodile", 4, 0),
(11,"Dracule Mihawk", 4, 1),
(12,"Marshal D Teach", 4, 0),
(13,"Boa Hancock", 4, 0);

INSERT INTO CONTENIR (questionnaireID, questionID, questionOrder) VALUES 
(1,1,1),
(1,2,2),
(1,3,3),
(1,4,4);