CREATE TABLE QUESTION (
  questionID INTEGER PRIMARY KEY,
  questionText VARCHAR(255),
  questionType VARCHAR(30)
);

CREATE TABLE REPONSE (
  reponseID INTEGER PRIMARY KEY,
  reponseText VARCHAR(255),
  questionID INTEGER,
  correct INTEGER,
  FOREIGN KEY (questionID) REFERENCES question(questionID)
);

CREATE TABLE QUESTIONNAIRE (
  questionnaireID INTEGER PRIMARY KEY,
  questionnaireName VARCHAR(255) UNIQUE,
  questionnaireDescription TEXT
);

CREATE TABLE CONTENIR (
  questionnaireID INTEGER,
  questionID INTEGER,
  questionOrder INTEGER,
  PRIMARY KEY (questionnaireID, questionID),
  FOREIGN KEY (questionnaireID) REFERENCES QUESTIONNAIRE(questionnaireID),
  FOREIGN KEY (questionID) REFERENCES questions(questionID)
);

CREATE TABLE USER (
  userID INTEGER PRIMARY KEY,
  userName VARCHAR(255),
  email VARCHAR(255),
  Password VARCHAR(255)
);

CREATE TABLE RESULTAT (
  resultatID INTEGER PRIMARY KEY,
  userID INTEGER,
  questionnaireID INTEGER,
  questionnaireDate DATE,
  score INTEGER,
  FOREIGN KEY (userID) REFERENCES USER(userID),
  FOREIGN KEY (questionnaireID) REFERENCES QUESTIONNAIRE(questionnaireID)
);
