CREATE TABLE iciprefix_user (
    id SERIAL,
    login VARCHAR(16),
    password VARCHAR(255),
    email VARCHAR(320),
    role smallint,
    status smallint,
    is_deleted smallint,
    password_key VARCHAR(45),
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE iciprefix_page (
    id SERIAL PRIMARY KEY,
    title VARCHAR(45),
    content TEXT,
    slug VARCHAR(50),
    template VARCHAR(100),
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id INTEGER REFERENCES iciprefix_user(id)
);

CREATE TABLE iciprefix_comment (
    id SERIAL,
    content VARCHAR(255),
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    approved smallint,
    user_id integer,
    page_id integer,
    PRIMARY KEY (id),
    FOREIGN KEY (page_id) REFERENCES iciprefix_page(id),
    FOREIGN KEY (user_id) REFERENCES iciprefix_user(id)
);

CREATE TABLE iciprefix_media (
    id SERIAL,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    page_id integer,
    PRIMARY KEY (id),
    FOREIGN KEY (page_id) REFERENCES iciprefix_page(id)
);

CREATE TABLE iciprefix_setting (
    id SERIAL,
    name VARCHAR(255),
    value VARCHAR(45),
    autoload smallint,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);



CREATE TABLE iciprefix_template (
    id SERIAL,
    name VARCHAR(255),
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    page_id integer,
    PRIMARY KEY (id),
    FOREIGN KEY (page_id) REFERENCES iciprefix_page(id)
);



CREATE TABLE iciprefix_term (
    id SERIAL,
    tagname VARCHAR(255),
    page_id integer,
    PRIMARY KEY (id),
    FOREIGN KEY (page_id) REFERENCES iciprefix_page(id)
);

CREATE TABLE iciprefix_passwordReset (
    id SERIAL,
    email VARCHAR(250) NOT NULL,
    key VARCHAR(250) NOT NULL,
    exp_date date NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE iciprefix_pages (
  id SERIAL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  layout VARCHAR(255) NOT NULL,
  data TEXT,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE iciprefix_page_translations (
  id SERIAL PRIMARY KEY,
  page_id INT NOT NULL,
  locale VARCHAR(50) NOT NULL,
  title VARCHAR(255) NOT NULL,
  meta_title VARCHAR(255) NOT NULL,
  meta_description VARCHAR(255) NOT NULL,
  route VARCHAR(255) NOT NULL,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  UNIQUE (page_id, locale),
  FOREIGN KEY (page_id) REFERENCES iciprefix_pages(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE iciprefix_uploads (
  id SERIAL PRIMARY KEY,
  public_id VARCHAR(50) NOT NULL,
  original_file VARCHAR(512) NOT NULL,
  mime_type VARCHAR(50) NOT NULL,
  server_file VARCHAR(512) NOT NULL,
  UNIQUE (public_id),
  UNIQUE (server_file)
);

CREATE TABLE iciprefix_settings (
  id SERIAL PRIMARY KEY,
  setting VARCHAR(50) NOT NULL,
  value TEXT NOT NULL,
  is_array BOOLEAN NOT NULL,
  UNIQUE (setting)
);