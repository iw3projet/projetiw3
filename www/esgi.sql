DROP TABLE IF EXISTS esgi_user CASCADE;
DROP TABLE IF EXISTS esgi_page CASCADE;
DROP TABLE IF EXISTS esgi_setting CASCADE;
DROP TABLE IF EXISTS esgi_review CASCADE;


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
    slug VARCHAR(50),
    template VARCHAR(100),
    created date,
    updated date,
    user_id INTEGER REFERENCES esgi_user(id_user)
);

CREATE TABLE esgi_review (
    id SERIAL PRIMARY KEY,
    content TEXT,
    created date,
    updated date,
    approved smallint,
    user_id integer REFERENCES esgi_user(id_user)
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





