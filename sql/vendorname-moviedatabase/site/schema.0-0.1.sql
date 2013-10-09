--------------------------------------------------------------------------------
-- table: movies                                                              --
--------------------------------------------------------------------------------

CREATE TABLE movies
(
  id serial NOT NULL,
  title CHARACTER VARYING NOT NULL,
  "releaseYear" INTEGER NOT NULL,
  "imdbId" CHARACTER VARYING(9),
  CONSTRAINT movies_pkey PRIMARY KEY (id),
  CONSTRAINT "movies_title_releaseYear_key" UNIQUE (title, "releaseYear")
)
WITH (
  OIDS=FALSE
);
