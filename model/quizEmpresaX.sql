CREATE DATABASE QuizEmpresaX;
USE QuizEmpresaX;

CREATE TABLE Respostas_candidatos(
 ID int unsigned auto_increment not null,
 V1 int,
 V2 int,
 V3 int,
 V4 int,
 V5 int,
 V6 int,
 V7 int,
 V8 int,
 V9 int,
 V10 int,
 V11 int,
 V12 int,
 V13 int,
 V14 int,
 V15 int,
 V16 int,
 primary key(Id)
)ENGINE = INNODB;

select* from Respostas_candidatos