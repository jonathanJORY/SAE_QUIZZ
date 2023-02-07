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
  questionnaireID INT IDENTITY(1,1) NOT NULL,
  --questionnaireName VARCHAR(255) NOT NULL UNIQUE,
  questionnaireName VARCHAR(255),
  questionnaireDescription TEXT,
  PRIMARY KEY(questionnaireID)
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


