CREATE DATABASE VITAS;

USE VITAS;

## CRIAÇÃO DA TABELA CLINICA

DROP TABLE IF EXISTS CLINICA;

CREATE TABLE CLINICA (
  ID_CLINICA BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  NOME VARCHAR(250) NOT NULL,
  CNPJ CHAR(14) NULL,
  INSCRICAO_ESTADUAL CHAR(14) NULL,
  LOGO VARCHAR(250) NULL,
  EMAIL VARCHAR(250) NULL,
  CEP CHAR(9) NULL,
  LOGRADOURO VARCHAR(250) NULL,
  BAIRRO VARCHAR(250) NULL,
  ESTADO VARCHAR(250) NULL,
  CIDADE VARCHAR(250) NULL,
  SEGUNDA VARCHAR(100) NULL,
  TERCA VARCHAR(100) NULL,
  QUARTA VARCHAR(100) NULL,
  QUINTA VARCHAR(100) NULL,
  SEXTA VARCHAR(100) NULL,
  SABADO VARCHAR(100) NULL,
  DOMINGO VARCHAR(100) NULL,
  FERIADOS BOOLEAN NULL DEFAULT FALSE,
  PRIMARY KEY (ID_CLINICA)
);

## FIM CRIAÇÃO TABELA CLINICA
## CRIAÇÃO DA TABELA PESSOA

DROP TABLE IF EXISTS PESSOAS;

CREATE TABLE PESSOAS (
  ID_PESSOA BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  NOME VARCHAR(250) NOT NULL,
  CPF CHAR(11) NULL,
  DATANASC DATE NULL,
  GENERO ENUM("M", "F") NULL,
  EMAIL VARCHAR(250) NOT NULL,
  SENHA VARCHAR(250) NOT NULL DEFAULT '$2y$10$Kd1ZwMexhr4e7Ekmsty3oOjCAtJYNYVZE5jqsQIakuhDa/fwVqhmy',
  FOTO VARCHAR(250) NULL,
  CEP CHAR(9) NULL,
  LOGRADOURO VARCHAR(250) NULL,
  BAIRRO VARCHAR(250) NULL,
  ESTADO VARCHAR(250) NULL,
  CIDADE VARCHAR(250) NULL,
  PRIMARY KEY (ID_PESSOA)
);

## FIM CRIAÇÃO TABELA PESSOA
## INICIO CRIAÇÃO DA TABELA CONVENIOS

DROP TABLE IF EXISTS CONVENIOS;

CREATE TABLE CONVENIOS (
  ID_CONVENIO BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  DESCRITIVO VARCHAR(250) NOT NULL,
  TIPO VARCHAR(250) NULL,
  PRIMARY KEY (ID_CONVENIO)
);

## FIM CRIAÇÃO DA TABELA CONVENIOS

DROP TABLE IF EXISTS PESSOA_CONVENIOS;

CREATE TABLE PESSOA_CONVENIOS (
  ID_PESSOA_CONVENIO BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  CONVENIO_ID BIGINT UNSIGNED NOT NULL,
  PESSOA_ID BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (ID_PESSOA_CONVENIO)
);

## CRIAÇÃO DA TABELA TELEFONE

DROP TABLE IF EXISTS TELEFONES;

CREATE TABLE TELEFONES (
  ID_TELEFONE BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  DDD CHAR(3) NOT NULL,
  NUMERO CHAR(11) NOT NULL,
  PESSOA_ID BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (ID_TELEFONE)
);

## FIM CRIAÇÃO TABELA TELEFONE
## CRIAÇÃO DA TABELA ESPECIALIDADES

DROP TABLE IF EXISTS ESPECIALIDADES;

CREATE TABLE ESPECIALIDADES(
  ID_ESPECIALIDADE BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  DESCRITIVO VARCHAR(250) NOT NULL,
  TIPO VARCHAR(50) NULL,
  PRIMARY KEY (ID_ESPECIALIDADE)
);

## FIM DA CRIAÇÃO DA TABELA ESPECIALIDADE
## CRIAÇÃO DA TABELA TIPO_PROFISSIONAL

DROP TABLE IF EXISTS TIPO_PROFISSIONAL;

CREATE TABLE TIPO_PROFISSIONAL(
  ID_TIPO_PROFISSIONAL BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  NOME VARCHAR(50) NOT NULL,
  PRIMARY KEY (ID_TIPO_PROFISSIONAL)
);

## FIM DA CRIAÇÃO DA TABELA TIPO_PROFISSIONAL

DROP TABLE IF EXISTS PROFISSIONAL_ESPECIALISTA;

## CRIAÇÃO DA TABELA PROFISSIONAL

DROP TABLE IF EXISTS PROFISSIONAIS;

CREATE TABLE PROFISSIONAIS (
  ID_PROFISSIONAL BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  REGISTROCLASSEPROFISSIONAL VARCHAR(50) NULL,
  PESSOA_ID BIGINT UNSIGNED NOT NULL,
  TIPO_PROFISSIONAL_ID BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (ID_PROFISSIONAL)
);

## FIM CRIAÇÃO DA TABELA PROFISSIONAL

CREATE TABLE PROFISSIONAL_ESPECIALISTA(
  ID_PROFISSIONAL_ESPECIALISTA BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  PROFISSIONAL_ID BIGINT UNSIGNED NOT NULL,
  ESPECIALIDADE_ID BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (ID_PROFISSIONAL_ESPECIALISTA)
);

## INICIO CRIAÇÃO DA TABELA CONTATO

DROP TABLE IF EXISTS CONTATOS;

CREATE TABLE CONTATOS ( -- verificado
  ID_CONTATO BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  ASSUNTO VARCHAR(250) NULL,
  DESCRICAO VARCHAR(250) NULL,
  PESSOA_ID BIGINT UNSIGNED NOT NULL,
  DATA DATE NULL,
  PRIMARY KEY (ID_CONTATO)
);

## FIM CRIAÇÃO DA TABELA CONTATO

DROP TABLE IF EXISTS AGENDAS;

CREATE TABLE AGENDAS(
  ID_AGENDA BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  DATA DATE NULL,
  HORA TIME NULL,
  DURACAO INT NULL,
  STATUS ENUM("SIM", "NÂO") NULL,
  OBSERVACOES VARCHAR(250) NULL,
  FACULTATIVO BOOLEAN NULL,
  PESSOA_ID BIGINT UNSIGNED NULL,
  PROFISSIONAL_ID BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (ID_AGENDA)
);

## FIM CRIAÇÃO DA TABELA AGENDAS

DROP TABLE IF EXISTS HORARIOS_PROFISSIONAIS;

## INICIO CRIAÇÃO DA TABELA HORARIOS

CREATE TABLE HORARIOS_PROFISSIONAIS (
  ID_HORARIO BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  DIA_SEMANA ENUM('segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado', 'domingo') NOT NULL,
  PERIODO ENUM('manha', 'tarde') NULL,
  HORA_INICIO TIME NULL,
  HORA_FIM TIME NULL,
  DURACAO INT NULL,
  PROFISSIONAL_ID BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (ID_HORARIO)
);

## ALTER TABLE PARA ADICIONAR AS CHAVES ESTRANGEIRAS
## TABELA PESSOA_CONVENIOS

ALTER TABLE PESSOA_CONVENIOS ADD FOREIGN KEY (CONVENIO_ID) REFERENCES CONVENIOS(ID_CONVENIO);

ALTER TABLE PESSOA_CONVENIOS ADD FOREIGN KEY (PESSOA_ID) REFERENCES PESSOAS(ID_PESSOA);

## TABELA TELEFONE

ALTER TABLE TELEFONES ADD FOREIGN KEY (PESSOA_ID) REFERENCES PESSOAS(ID_PESSOA);

## FIM SS
##TABELAS RELACIONADAS A TABELA PROFISSIOANIS

ALTER TABLE PROFISSIONAL_ESPECIALISTA ADD FOREIGN KEY (PROFISSIONAL_ID) REFERENCES PROFISSIONAIS(ID_PROFISSIONAL);

ALTER TABLE PROFISSIONAL_ESPECIALISTA ADD FOREIGN KEY (ESPECIALIDADE_ID) REFERENCES ESPECIALIDADES(ID_ESPECIALIDADE);

ALTER TABLE PROFISSIONAIS ADD FOREIGN KEY (TIPO_PROFISSIONAL_ID) REFERENCES TIPO_PROFISSIONAL(ID_TIPO_PROFISSIONAL);

ALTER TABLE PROFISSIONAIS ADD FOREIGN KEY (PESSOA_ID) REFERENCES PESSOAS(ID_PESSOA);

ALTER TABLE HORARIOS_PROFISSIONAIS ADD FOREIGN KEY (PROFISSIONAL_ID) REFERENCES PROFISSIONAIS(ID_PROFISSIONAL);

##FIM SS
## TABELA CONTATO

ALTER TABLE CONTATOS ADD FOREIGN KEY (PESSOA_ID) REFERENCES PESSOAS(ID_PESSOA);

## TABELA AGENDAS

ALTER TABLE AGENDAS ADD FOREIGN KEY (PROFISSIONAL_ID) REFERENCES PROFISSIONAIS(ID_PROFISSIONAL);

## FIM SS
## INSERT PARA PESSOAS
## TODAS AS SENHAS SAO 12345

INSERT INTO PESSOAS (
  NOME,
  CPF,
  DATANASC,
  GENERO,
  EMAIL,
  SENHA,
  FOTO,
  CEP,
  LOGRADOURO,
  BAIRRO,
  ESTADO,
  CIDADE
) VALUES(
  "Giovana Mori",
  "41059642832",
  "1993-09-03",
  "F",
  "giovana_mori@outlook.com",
  "$2y$10$Kd1ZwMexhr4e7Ekmsty3oOjCAtJYNYVZE5jqsQIakuhDa/fwVqhmy",
  NULL,
  "17345-080",
  "",
  "",
  "",
  ""
);

INSERT INTO PESSOAS (
  NOME,
  CPF,
  DATANASC,
  GENERO,
  EMAIL,
  SENHA,
  FOTO,
  CEP,
  LOGRADOURO,
  BAIRRO,
  ESTADO,
  CIDADE
) VALUES(
  "Fulano Bandeiras",
  "22562949005",
  "1991-11-23",
  "M",
  "fulano@gmail.com",
  "$2y$10$Kd1ZwMexhr4e7Ekmsty3oOjCAtJYNYVZE5jqsQIakuhDa/fwVqhmy",
  NULL,
  "17345-080",
  "",
  "",
  "",
  ""
);

INSERT INTO PESSOAS (
  NOME,
  CPF,
  DATANASC,
  GENERO,
  EMAIL,
  SENHA,
  FOTO,
  CEP,
  LOGRADOURO,
  BAIRRO,
  ESTADO,
  CIDADE
) VALUES(
  "Jaiminho Arturito",
  "22562949015",
  "1983-01-01",
  "M",
  "jaiminho_arturito@outlook.com",
  "$2y$10$Kd1ZwMexhr4e7Ekmsty3oOjCAtJYNYVZE5jqsQIakuhDa/fwVqhmy",
  NULL,
  "17345-080",
  "",
  "",
  "",
  ""
);

## INSERT PARA CONVENIOS

INSERT INTO CONVENIOS(
  DESCRITIVO,
  TIPO
) VALUES(
  'SUS',
  NULL
);

INSERT INTO CONVENIOS(
  DESCRITIVO,
  TIPO
) VALUES(
  'FUNERARIA PIZZO',
  NULL
);

INSERT INTO CONVENIOS(
  DESCRITIVO,
  TIPO
) VALUES(
  'UNIMED',
  NULL
);

INSERT INTO CONVENIOS(
  DESCRITIVO,
  TIPO
) VALUES(
  'NEWCARD',
  NULL
);

## INSERT PARA TELEFONES

INSERT INTO TELEFONES(
  DDD,
  NUMERO,
  PESSOA_ID
) VALUES(
  '14',
  '99777-1111',
  1
),
(
  '14',
  '99777-1818',
  1
),
(
  '16',
  '99877-1158',
  2
);

## INSERT ESPECIALIDADES

INSERT INTO ESPECIALIDADES (
  DESCRITIVO,
  TIPO
) VALUES (
  'ONCOLOGISTA',
  'MÉDICO'
),
(
  'CARDIOLOGISTA',
  'MÉDICO'
),
(
  'PEDIATRA',
  'MÉDICO'
),
(
  'PSIQUIATRA',
  'MÉDICO'
),
(
  'ONCOLOGIA',
  'ENFERMEIRO'
),
(
  'PEDIATRIA ',
  'ENFERMEIRO'
);

## INSERT TIPO_PROFISSIONAL

INSERT INTO TIPO_PROFISSIONAL (
  NOME
) VALUES(
  'ADM GERAL'
),
(
  'PROFISSIONAL SAÚDE'
);

## INSERT PROFISSIONAIS

INSERT INTO PROFISSIONAIS (
  REGISTROCLASSEPROFISSIONAL,
  PESSOA_ID,
  TIPO_PROFISSIONAL_ID
) VALUES(
  NULL,
  2,
  1
),
(
  'CRM/SP 123456',
  1,
  2
),
(
  'CRM/SP 234567',
  3,
  2
);

## INSERT PROFISSIONAL_ESPECIALISTA

INSERT INTO PROFISSIONAL_ESPECIALISTA(
  PROFISSIONAL_ID,
  ESPECIALIDADE_ID
) VALUES(
  2,
  1
),
(
  2,
  2
),
(
  3,
  2
);

## INSERT CLINICA CONFIGURACOES

INSERT INTO CLINICA(
  NOME,
  CNPJ,
  INSCRICAO_ESTADUAL,
  EMAIL,
  LOGO,
  CEP,
  LOGRADOURO,
  BAIRRO,
  ESTADO,
  CIDADE,
  SEGUNDA,
  TERCA,
  QUARTA,
  QUINTA,
  SEXTA
) VALUES (
  'VITAS',
  '93274178000101',
  '150230960445',
  'contato@vitas.com.br',
  NULL,
  '17345080',
  NULL,
  NULL,
  'SP',
  'Jaú',
  '08:00|12:00;12:00|13:00;13:00|17:00',
  '08:00|12:00;12:00|13:00;13:00|17:00',
  '08:00|12:00;12:00|13:00;13:00|17:00',
  '08:00|12:00;12:00|13:00;13:00|17:00',
  '08:00|12:00;12:00|13:00;13:00|17:00'
)