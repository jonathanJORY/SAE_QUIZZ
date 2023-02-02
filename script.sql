CREATE TABLE QUESTION (
  questionID INT PRIMARY KEY,
  questionText VARCHAR(255),
  questionType VARCHAR(30),
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

CREATE TABLE RESULTAT (
  resultatID INT PRIMARY KEY,
--UserID INT,
  questionnaireID INT,
  questionnaireDate DATE,
  score INT,
--FOREIGN KEY (UserID) REFERENCES Users(UserID),
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

INSERT INTO CONTENIR (questionnaireID, questionID, questionOrder) VALUES 
(1,1,1),
(2,1,1),
(3,1,1),
(4,1,1),
(5,1,1),
(6,1,1),
(7,1,1);
