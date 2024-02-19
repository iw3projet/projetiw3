DROP TABLE IF EXISTS esgi_user CASCADE;
DROP TABLE IF EXISTS esgi_page CASCADE;
DROP TABLE IF EXISTS esgi_template CASCADE;
DROP TABLE IF EXISTS esgi_setting CASCADE;
DROP TABLE IF EXISTS esgi_term CASCADE;
DROP TABLE IF EXISTS esgi_comment CASCADE;
DROP TABLE IF EXISTS esgi_media CASCADE;

CREATE TABLE esgi_user (
    id_user SERIAL,
    login VARCHAR(16),
    password VARCHAR(255),
    email VARCHAR(320),
    role smallint,
    status smallint,
    is_deleted smallint,
    password_key VARCHAR(45),
    created date,
    updated date,
    PRIMARY KEY (id_user)
);

CREATE TABLE esgi_page (
    id_page SERIAL PRIMARY KEY,
    title VARCHAR(45),
    content TEXT,
    template VARCHAR(100),
    created date,
    updated date,
    user_id INTEGER REFERENCES esgi_user(id_user)
);

CREATE TABLE esgi_comment (
    id_comment SERIAL,
    content VARCHAR(255),
    created date,
    updated date,
    approved smallint,
    user_id integer,
    page_id integer,
    PRIMARY KEY (id_comment),
    FOREIGN KEY (page_id) REFERENCES esgi_page(id_page),
    FOREIGN KEY (user_id) REFERENCES esgi_user(id_user)
);

CREATE TABLE esgi_media (
    id_media SERIAL,
    created date,
    updated date,
    page_id integer,
    PRIMARY KEY (id_media),
    FOREIGN KEY (page_id) REFERENCES esgi_page(id_page)
);

CREATE TABLE esgi_setting (
    id_setting SERIAL,
    name VARCHAR(255),
    value VARCHAR(45),
    autoload smallint,
    created date,
    updated date,
    PRIMARY KEY (id_setting)
);



CREATE TABLE esgi_template (
    id_template SERIAL,
    name VARCHAR(255),
    created date,
    updated date,
    page_id integer,
    PRIMARY KEY (id_template),
    FOREIGN KEY (page_id) REFERENCES esgi_page(id_page)
);



CREATE TABLE esgi_term (
    id_terms SERIAL,
    tagname VARCHAR(255),
    page_id integer,
    PRIMARY KEY (id_terms),
    FOREIGN KEY (page_id) REFERENCES esgi_page(id_page)
);


