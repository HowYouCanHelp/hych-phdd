DROP DATABASE IF EXISTS linesdb;
CREATE DATABASE linesdb;
use linesdb;

CREATE TABLE people (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) DEFAULT NULL,
  email varchar(255) DEFAULT NULL,
  password varchar(255) DEFAULT NULL,
  photo_uri varchar(255) DEFAULT NULL,
  description text DEFAULT NULL,
  `date_joined` datetime DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE line (
  id int(11) NOT NULL AUTO_INCREMENT,
  num int(11) NOT NULL AUTO_INCREMENT,
  photo_uri varchar(255) DEFAULT NULL,
  date_range varchar(255) DEFAULT NULL,
  title varchar(255) DEFAULT NULL,
  content text DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE people_line (
    people_id VARCHAR(50) REFERENCES people (id),
    line_id VARCHAR(50) REFERENCES line (id),
    PRIMARY KEY (people_id, line_id)
)