--
-- PostgreSQL database dump
--

-- Dumped from database version 10.4
-- Dumped by pg_dump version 10.4

-- Started on 2018-10-18 10:17:54

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
-- TOC entry 2827 (class 0 OID 16509)
-- Dependencies: 201
-- Data for Name: alumno_tbl; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.alumno_tbl (id, name, lastname, dni) VALUES (1, 'Ignacio', 'Giampaoli', 36585527);
INSERT INTO public.alumno_tbl (id, name, lastname, dni) VALUES (2, 'Mariano', 'Giampaoli', 34132620);
INSERT INTO public.alumno_tbl (id, name, lastname, dni) VALUES (4, 'Juan', 'Perez', 42585578);
INSERT INTO public.alumno_tbl (id, name, lastname, dni) VALUES (6, 'juan', 'garcia', 12065548);
INSERT INTO public.alumno_tbl (id, name, lastname, dni) VALUES (5, 'jose', 'garcia', 11000000);


--
-- TOC entry 2825 (class 0 OID 16497)
-- Dependencies: 199
-- Data for Name: comprobante_tbl; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.comprobante_tbl (id, legajo, concept, unit_amount, total_amount, id_alumno, estado, dateadded, datepayed) VALUES (203, 36585527, 'Marzo, Abril', 100, 200, 1, 0, '2018-06-28', NULL);
INSERT INTO public.comprobante_tbl (id, legajo, concept, unit_amount, total_amount, id_alumno, estado, dateadded, datepayed) VALUES (204, 11065547, 'Marzo, Abril', 100, 200, 5, 1, '2018-06-28', '2018-07-02');
INSERT INTO public.comprobante_tbl (id, legajo, concept, unit_amount, total_amount, id_alumno, estado, dateadded, datepayed) VALUES (205, 36585527, 'Marzo, Abril, Mayo, Junio, Julio, Agosto, Septiembre, Octubre, Noviembre, Diciembre', 100, 1000, 1, 0, '2018-07-02', NULL);
INSERT INTO public.comprobante_tbl (id, legajo, concept, unit_amount, total_amount, id_alumno, estado, dateadded, datepayed) VALUES (207, 12065548, 'Marzo, Abril, Mayo', 100, 300, 6, 0, '2018-07-02', NULL);
INSERT INTO public.comprobante_tbl (id, legajo, concept, unit_amount, total_amount, id_alumno, estado, dateadded, datepayed) VALUES (209, 36585527, 'Marzo', 100, 100, 1, 0, '2018-07-11', NULL);
INSERT INTO public.comprobante_tbl (id, legajo, concept, unit_amount, total_amount, id_alumno, estado, dateadded, datepayed) VALUES (210, 12065548, 'Marzo', 100, 100, 6, 0, '2018-08-04', NULL);
INSERT INTO public.comprobante_tbl (id, legajo, concept, unit_amount, total_amount, id_alumno, estado, dateadded, datepayed) VALUES (211, 12065548, 'Marzo, Abril', 100, 200, 6, 0, '2018-08-16', NULL);


--
-- TOC entry 2829 (class 0 OID 16517)
-- Dependencies: 203
-- Data for Name: config_tbl; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.config_tbl (id, valorcuota, cuenta) VALUES (1, 100, 123456);


--
-- TOC entry 2823 (class 0 OID 16437)
-- Dependencies: 197
-- Data for Name: user_tbl; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO public.user_tbl (id, username, password, email, type) VALUES (1, 'admin', '96e79218965eb72c92a549dd5a330112', 'user@gmail.com', 'admin');
INSERT INTO public.user_tbl (id, username, password, email, type) VALUES (15, 'ignacio', '96e79218965eb72c92a549dd5a330112', 'ignacio@ignacio.com', 'normal');


--
-- TOC entry 2841 (class 0 OID 0)
-- Dependencies: 200
-- Name: alumno_tbl_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.alumno_tbl_id_seq', 7, true);


--
-- TOC entry 2842 (class 0 OID 0)
-- Dependencies: 198
-- Name: comprobante_tbl_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.comprobante_tbl_id_seq', 211, true);


--
-- TOC entry 2843 (class 0 OID 0)
-- Dependencies: 202
-- Name: config_tbl_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.config_tbl_id_seq', 1, true);


--
-- TOC entry 2844 (class 0 OID 0)
-- Dependencies: 196
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.user_id_seq', 15, true);


-- Completed on 2018-10-18 10:17:54

--
-- PostgreSQL database dump complete
--

