CREATE TABLE main.smartphones (
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
    price integer,
    antutu integer,
    created_at timestamp(0),
    updated_at timestamp(0)
);