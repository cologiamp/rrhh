--
-- PostgreSQL database dump
--

-- Dumped from database version 10.4
-- Dumped by pg_dump version 10.4

-- Started on 2018-10-19 08:50:24

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
-- TOC entry 2823 (class 0 OID 16562)
-- Dependencies: 196
-- Data for Name: alumno_tbl; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.alumno_tbl (id, name, lastname, dni, afiliado, dateadded, domicilio, telefono, celular, estadocivil, grupofliar, estudios, area, funcion, categoria, agrupamiento) VALUES (11, 'otro', 'otro', 31545689, 124, '2018-10-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO public.alumno_tbl (id, name, lastname, dni, afiliado, dateadded, domicilio, telefono, celular, estadocivil, grupofliar, estudios, area, funcion, categoria, agrupamiento) VALUES (10, 'afiliado', 'afiliado', 36585522, 123456, '2018-10-18', 'bascary 85022222', 4250443, 3816252158, 'Soltero', 2, 'Ingeniero en Informatica', 'Tecnica', 'Programador', 'categoria', 'agrup');


--
-- TOC entry 2825 (class 0 OID 16567)
-- Dependencies: 198
-- Data for Name: comprobante_tbl; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.comprobante_tbl (id, legajo, concept, unit_amount, total_amount, id_alumno, estado, dateadded, datepayed, novedad) VALUES (220, 0, 'M', 1, 1, 11, 0, '2018-10-18', NULL, '	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum');


--
-- TOC entry 2827 (class 0 OID 16576)
-- Dependencies: 200
-- Data for Name: config_tbl; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.config_tbl (id, valorcuota, cuenta) VALUES (1, 100, 123456);


--
-- TOC entry 2830 (class 0 OID 16583)
-- Dependencies: 203
-- Data for Name: user_tbl; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.user_tbl (id, username, password, email, type) VALUES (1, 'admin', '781e5e245d69b566979b86e28d23f2c7', 'user@gmail.com', 'admin');
INSERT INTO public.user_tbl (id, username, password, email, type) VALUES (15, 'ignacio', '781e5e245d69b566979b86e28d23f2c7', 'ignacio@ignacio.com', 'normal');


--
-- TOC entry 2842 (class 0 OID 0)
-- Dependencies: 197
-- Name: alumno_tbl_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.alumno_id_seq', 11, true);


--
-- TOC entry 2843 (class 0 OID 0)
-- Dependencies: 199
-- Name: comprobante_tbl_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.comprobante_id_seq', 220, true);


--
-- TOC entry 2844 (class 0 OID 0)
-- Dependencies: 201
-- Name: config_tbl_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.config_id_seq', 1, true);


--
-- TOC entry 2845 (class 0 OID 0)
-- Dependencies: 202
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.user_id_seq', 15, true);


-- Completed on 2018-10-19 08:50:25

--
-- PostgreSQL database dump complete
--

