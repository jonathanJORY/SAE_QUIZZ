CREATE TABLE QUESTION (
  questionID INT PRIMARY KEY,
  questionText VARCHAR(255),
  questionType VARCHAR(30)
);

CREATE TABLE REPONSE (
  reponseID INT PRIMARY KEY,
  reponseText VARCHAR(255),
  questionID INT,
  correct BOOLEAN,
  FOREIGN KEY (questionID) REFERENCES question(questionID)
);

CREATE TABLE QUESTIONNAIRE (
  questionnaireID INT PRIMARY KEY,
  questionnaireName VARCHAR(255),
  questionnaireDescription TEXT
);

CREATE TABLE CONTENIR (
  questionnaireID INT,
  questionID INT,
  questionOrder INT,
  PRIMARY KEY (questionnaireID, questionID),
  FOREIGN KEY (questionnaireID) REFERENCES QUESTIONNAIRE(questionnaireID),
  FOREIGN KEY (questionID) REFERENCES questions(questionID)
);

CREATE TABLE USER (
  userID INT PRIMARY KEY,
  userName VARCHAR(255),
  email VARCHAR(255),
  Password VARCHAR(255)
);

CREATE TABLE RESULTAT (
  resultatID INT PRIMARY KEY,
  userID INT,
  questionnaireID INT,
  questionnaireDate DATE,
  score INT,
  FOREIGN KEY (userID) REFERENCES USER(userID),
  FOREIGN KEY (questionnaireID) REFERENCES QUESTIONNAIRE(questionnaireID)
);

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
(1,"Ace", 1, true),
(2,"Garp", 1, false),
(3,"Shanks", 1, false),
(4,"Sabo", 1, true),
(5,"Ace", 2, true),
(6,"Garp", 2, false),
(7,"Shanks", 2, false),
(8,"Sabo", 2, false),
(9,"Baggy Le Clown", 4, false),
(10,"Crocodile", 4, false),
(11,"Dracule Mihawk", 4, true),
(12,"Marshal D Teach", 4, false),
(13,"Boa Hancock", 4, false);

INSERT INTO CONTENIR (questionnaireID, questionID, questionOrder) VALUES 
(1,1,1),
(1,2,2),
(1,3,3),
(1,4,4);
