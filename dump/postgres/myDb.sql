-- put in ./dump directory

BEGIN;

SET TIME ZONE '+00:00';

CREATE TABLE Person (
  id SERIAL PRIMARY KEY,
  name VARCHAR(20) NOT NULL
);

INSERT INTO Person (id, name) VALUES
(1, 'William'),
(2, 'Marc'),
(3, 'John');

COMMIT;
