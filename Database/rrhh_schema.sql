--
-- PostgreSQL database dump
--

-- Dumped from database version 10.4
-- Dumped by pg_dump version 10.4

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: alumno_tbl; Type: TABLE; Schema: public; Owner: postgres
--
CREATE SEQUENCE public.alumno_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.alumno_id_seq OWNER TO postgres;


CREATE TABLE public.alumno_tbl (
    id integer DEFAULT nextval('public.alumno_id_seq'::regclass) NOT NULL,
    name character varying(30) NOT NULL,
    lastname character varying(30) NOT NULL,
    dni integer NOT NULL,
    afiliado integer,
    dateadded date,
    domicilio character varying(50),
    telefono numeric,
    celular numeric,
    estadocivil character varying(25),
    grupofliar integer,
    estudios character varying(35),
    area character varying(35),
    funcion character varying(35),
    categoria character varying(35),
    agrupamiento character varying(35)
);


ALTER TABLE public.alumno_tbl OWNER TO postgres;

--
-- Name: alumno_tbl_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

--
-- Name: alumno_tbl_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--


--
-- Name: comprobante_tbl; Type: TABLE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.comprobante_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.comprobante_id_seq OWNER TO postgres;

CREATE TABLE public.comprobante_tbl (
    id integer DEFAULT nextval('public.comprobante_id_seq'::regclass) NOT NULL,
    legajo integer NOT NULL,
    concept text NOT NULL,
    unit_amount numeric NOT NULL,
    total_amount numeric NOT NULL,
    id_alumno integer NOT NULL,
    estado integer DEFAULT 0,
    dateadded date,
    datepayed date,
    novedad text
);


ALTER TABLE public.comprobante_tbl OWNER TO postgres;

--
-- Name: comprobante_tbl_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--


--
-- Name: comprobante_tbl_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

--
-- Name: config_tbl; Type: TABLE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.config_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.config_id_seq OWNER TO postgres;


CREATE TABLE public.config_tbl (
    id integer DEFAULT nextval('public.config_id_seq'::regclass) NOT NULL,
    valorcuota integer,
    cuenta integer
);


ALTER TABLE public.config_tbl OWNER TO postgres;

--
-- Name: config_tbl_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--


--
-- Name: config_tbl_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--


--
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_id_seq OWNER TO postgres;

--
-- Name: user_tbl; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.user_tbl (
    id integer DEFAULT nextval('public.user_id_seq'::regclass) NOT NULL,
    username character varying(15) NOT NULL,
    password text NOT NULL,
    email character varying(30) NOT NULL,
    type character varying(15) NOT NULL
);


ALTER TABLE public.user_tbl OWNER TO postgres;

--
-- Name: alumno_tbl id; Type: DEFAULT; Schema: public; Owner: postgres
--


--
-- PostgreSQL database dump complete
--

