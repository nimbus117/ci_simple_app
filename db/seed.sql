DROP TABLE IF EXISTS todos;
CREATE TABLE todos (
        id int(11) NOT NULL AUTO_INCREMENT,
        task varchar(200) NOT NULL,
        `order` int(10) UNSIGNED NOT NULL,
        completed BOOLEAN NOT NULL,
        PRIMARY KEY (id)
);

INSERT INTO todos
  (task, `order`, completed)
VALUES
  ('washing', 1, TRUE);

INSERT INTO todos
  (task, `order`, completed)
VALUES
  ('homework', 2, FALSE);

INSERT INTO todos
  (task, `order`, completed)
VALUES
  ('shopping', 3, FALSE);
