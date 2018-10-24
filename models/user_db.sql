CREATE SEQUENCE user_id_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;

CREATE TABLE user_tbl (
    id integer DEFAULT nextval('user_id_seq'::regclass) NOT NULL,
    username character varying(15) NOT NULL,
    password text NOT NULL,
    email character varying(30) NOT NULL,
    type character varying(15) NOT NULL
);

CREATE TABLE user_tbl (
    id SERIAL PRIMARY KEY,
    username character varying(15) NOT NULL,
    password text NOT NULL,
    email character varying(30) NOT NULL,
    type character varying(15) NOT NULL
);


INSERT INTO user_tbl (id, username, password, email, type) VALUES (2, 'kanel', '96e79218965eb72c92a549dd5a330112', 'soengkanel@gmail.com', 'user');
INSERT INTO user_tbl (id, username, password, email, type) VALUES (1, 'admin', '96e79218965eb72c92a549dd5a330112', 'soengkanel@gmail.com', 'admin');

CREATE TABLE alumno_tbl (
    id serial primary key,
    name varchar(30) NOT NULL,
	lastname varchar(30) NOT NULL,
    dni integer NOT NULL
);

CREATE TABLE comprobante_tbl (
   id SERIAL PRIMARY KEY,
   legajo INT NOT NULL,
   concept TEXT NOT NULL,
   kids INT NOT NULL,
   unit_amount DECIMAL NOT NULL,
   total_amount DECIMAL NOT NULL,
   id_alumno INT NOT NULL,
  estado INT DEFAULT(0),
  dateAdded DATE,
  datepayed DATE
);

CREATE TABLE config_tbl (
  id SERIAL PRIMARY KEY,
  valorCuota INT,
  cuenta INT
);

INSERT INTO config_tbl (valorcuota) VALUES (100);
