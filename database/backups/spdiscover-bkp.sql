--
-- PostgreSQL database dump
--

-- Dumped from database version 10.12 (Ubuntu 10.12-0ubuntu0.18.04.1)
-- Dumped by pg_dump version 12.0

-- Started on 2020-02-22 19:32:20

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

--
-- TOC entry 202 (class 1259 OID 49182)
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: root
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO root;

--
-- TOC entry 201 (class 1259 OID 49180)
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: root
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.failed_jobs_id_seq OWNER TO root;

--
-- TOC entry 2927 (class 0 OID 0)
-- Dependencies: 201
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: root
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- TOC entry 197 (class 1259 OID 49154)
-- Name: migrations; Type: TABLE; Schema: public; Owner: root
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO root;

--
-- TOC entry 196 (class 1259 OID 49152)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: root
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO root;

--
-- TOC entry 2928 (class 0 OID 0)
-- Dependencies: 196
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: root
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 200 (class 1259 OID 49173)
-- Name: password_resets; Type: TABLE; Schema: public; Owner: root
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO root;

--
-- TOC entry 204 (class 1259 OID 49194)
-- Name: smartphones; Type: TABLE; Schema: public; Owner: root
--

CREATE TABLE public.smartphones (
    id bigint NOT NULL,
    brand character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    year integer NOT NULL,
    chipset character varying(255) NOT NULL,
    mem_ram integer NOT NULL,
    mem_int integer NOT NULL,
    mem_exp_boolean boolean NOT NULL,
    display double precision NOT NULL,
    main_cam integer NOT NULL,
    selfie_cam integer NOT NULL,
    battery integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.smartphones OWNER TO root;

--
-- TOC entry 203 (class 1259 OID 49192)
-- Name: smartphones_id_seq; Type: SEQUENCE; Schema: public; Owner: root
--

CREATE SEQUENCE public.smartphones_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.smartphones_id_seq OWNER TO root;

--
-- TOC entry 2929 (class 0 OID 0)
-- Dependencies: 203
-- Name: smartphones_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: root
--

ALTER SEQUENCE public.smartphones_id_seq OWNED BY public.smartphones.id;


--
-- TOC entry 199 (class 1259 OID 49162)
-- Name: users; Type: TABLE; Schema: public; Owner: root
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO root;

--
-- TOC entry 198 (class 1259 OID 49160)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: root
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO root;

--
-- TOC entry 2930 (class 0 OID 0)
-- Dependencies: 198
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: root
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 2778 (class 2604 OID 49185)
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- TOC entry 2776 (class 2604 OID 49157)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 2780 (class 2604 OID 49197)
-- Name: smartphones id; Type: DEFAULT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.smartphones ALTER COLUMN id SET DEFAULT nextval('public.smartphones_id_seq'::regclass);


--
-- TOC entry 2777 (class 2604 OID 49165)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 2919 (class 0 OID 49182)
-- Dependencies: 202
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: root
--

COPY public.failed_jobs (id, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- TOC entry 2914 (class 0 OID 49154)
-- Dependencies: 197
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: root
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	2014_10_12_000000_create_users_table	1
2	2014_10_12_100000_create_password_resets_table	1
3	2019_08_19_000000_create_failed_jobs_table	1
4	2020_02_20_173623_smartphone	1
\.


--
-- TOC entry 2917 (class 0 OID 49173)
-- Dependencies: 200
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: root
--

COPY public.password_resets (email, token, created_at) FROM stdin;
\.


--
-- TOC entry 2921 (class 0 OID 49194)
-- Dependencies: 204
-- Data for Name: smartphones; Type: TABLE DATA; Schema: public; Owner: root
--

COPY public.smartphones (id, brand, name, year, chipset, mem_ram, mem_int, mem_exp_boolean, display, main_cam, selfie_cam, battery, created_at, updated_at) FROM stdin;
1	samsung	Samsung Galaxy S20 Ultra 5G	2020	s865	12	128	t	6.90000000000000036	108	40	5000	2020-02-22 21:13:26	2020-02-22 21:13:26
2	samsung	Samsung Galaxy S20 Ultra 5G	2020	s865	12	256	t	6.90000000000000036	108	40	5000	2020-02-22 21:13:52	2020-02-22 21:13:52
3	samsung	Samsung Galaxy S20 Ultra 5G	2020	s865	16	512	t	6.90000000000000036	108	40	5000	2020-02-22 21:14:19	2020-02-22 21:14:19
9	samsung	Samsung Galaxy S20	2020	s865	8	128	t	6.20000000000000018	12	10	4000	2020-02-22 21:24:37	2020-02-22 21:24:37
10	samsung	Samsung Galaxy S20 Ultra	2020	s865	12	128	t	6.90000000000000036	108	40	5000	2020-02-22 21:25:46	2020-02-22 21:25:46
11	samsung	Samsung Galaxy S8	2017	s835	4	64	t	5.79999999999999982	12	8	3000	2020-02-22 21:34:53	2020-02-22 21:34:53
4	samsung	Samsung Galaxy A51	2019	e9611	4	64	t	6.5	48	32	4000	2020-02-22 21:16:38	2020-02-22 21:16:38
5	samsung	Samsung Galaxy A51	2019	e9611	4	128	t	6.5	48	32	4000	2020-02-22 21:20:10	2020-02-22 21:20:10
6	samsung	Samsung Galaxy A51	2019	e9611	6	128	t	6.5	48	32	4000	2020-02-22 21:20:49	2020-02-22 21:20:49
7	samsung	Samsung Galaxy A71	2020	s730	6	128	t	6.70000000000000018	64	32	4500	2020-02-22 21:21:52	2020-02-22 21:21:52
8	samsung	Samsung Galaxy A71	2020	s730	8	128	t	6.70000000000000018	64	32	4500	2020-02-22 21:22:39	2020-02-22 21:22:39
\.


--
-- TOC entry 2916 (class 0 OID 49162)
-- Dependencies: 199
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: root
--

COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 2931 (class 0 OID 0)
-- Dependencies: 201
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: root
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- TOC entry 2932 (class 0 OID 0)
-- Dependencies: 196
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: root
--

SELECT pg_catalog.setval('public.migrations_id_seq', 4, true);


--
-- TOC entry 2933 (class 0 OID 0)
-- Dependencies: 203
-- Name: smartphones_id_seq; Type: SEQUENCE SET; Schema: public; Owner: root
--

SELECT pg_catalog.setval('public.smartphones_id_seq', 11, true);


--
-- TOC entry 2934 (class 0 OID 0)
-- Dependencies: 198
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: root
--

SELECT pg_catalog.setval('public.users_id_seq', 1, false);


--
-- TOC entry 2789 (class 2606 OID 49191)
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 2782 (class 2606 OID 49159)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 2791 (class 2606 OID 49202)
-- Name: smartphones smartphones_pkey; Type: CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.smartphones
    ADD CONSTRAINT smartphones_pkey PRIMARY KEY (id);


--
-- TOC entry 2784 (class 2606 OID 49172)
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 2786 (class 2606 OID 49170)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 2787 (class 1259 OID 49179)
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: root
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


-- Completed on 2020-02-22 19:32:20

--
-- PostgreSQL database dump complete
--

