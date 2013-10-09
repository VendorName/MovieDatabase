-- insert default values for table: module

INSERT INTO "module" ( "module", "enabled" )
     VALUES ( 'VendorName\MovieDatabase', TRUE );
     
-- insert default values for table: movies

INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('Hellboy', 2004, 'tt0167190');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('Watchmen', 2009, 'tt0409459');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('The Godfather', 1972, 'tt0068646');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('Pulp Fiction', 1994, 'tt0110912');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('Fight Club', 1999, 'tt0137523');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('Star Wars: Episode V - The Empire Strikes Back', 1980, 'tt0080684');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('Goodfellas', 1990, 'tt0099685');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('Star Wars', 1977, 'tt0076759');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('The Matrix', 1999, 'tt0133093');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('The Silence of the Lambs', 1991, 'tt0102926');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('Raiders of the Lost Ark', 1981, 'tt0082971');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('Léon: The Professional', 1994, 'tt0110413');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('Terminator 2: Judgment Day', 1991, 'tt0103064');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('The Departed', 2006, 'tt0407887');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('Django Unchained', 2012, 'tt1853728');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('The Lion King', 1994, 'tt0110357');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('Some Like It Hot', 1959, 'tt0053291');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('The Adventures of Ford Fairlane', 1990, 'tt0098987');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('Total Recall', 2012, 'tt1386703');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('Total Recall', 1990, 'tt0100802');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('The Corporal and Others', 1965, 'tt0059812');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('The Shawshank Redemption', 1994, 'tt0111161');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('Sin City', 2005, 'tt0401792');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('Kill Bill: Vol. 1', 2003, 'tt0266697');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('Ratatouille', 2007, 'tt0382932');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('Slumdog Millionaire', 2009, 'tt1010048');
INSERT INTO movies (title, "releaseYear", "imdbId") VALUES ('V for Vendetta', 2006, 'tt0434409');

-- create meta-contents

DO LANGUAGE plpgsql $$
DECLARE
    "vLastId"   INTEGER;
BEGIN
 
    -- insert meta-content: vendorNameMovieDatabase.movieList
 
    INSERT INTO "paragraph" ( "type", "left", "right", "name" )
         VALUES ( 'metaContent', 1, 6, 'vendorNameMovieDatabase.movieList' );
 
    "vLastId" = currval( 'paragraph_id_seq' );
 
    -- meta-content's title: Movie List
 
    INSERT INTO "paragraph_property" ( "paragraphId", "locale", "name", "value" )
         VALUES ( "vLastId", 'en', 'title', 'Movie List' );
 
    -- meta-content's title: Film lista
 
    INSERT INTO "paragraph_property" ( "paragraphId", "locale", "name", "value" )
         VALUES ( "vLastId", 'hu', 'title', 'Film lista' );
 
    INSERT INTO "paragraph" ( "type", "rootId", "left", "right", "name" )
         VALUES ( 'title', "vLastId", 2, 3, NULL );
 
    INSERT INTO "paragraph" ( "type", "rootId", "left", "right", "name" )
         VALUES ( 'contentPlaceholder', "vLastId", 4, 5, NULL );
 
 
 
    -- insert meta-content: vendorNameMovieDatabase.movieData
 
    INSERT INTO "paragraph" ( "type", "left", "right", "name" )
         VALUES ( 'metaContent', 1, 6, 'vendorNameMovieDatabase.movieData' );
 
    "vLastId" = currval( 'paragraph_id_seq' );
 
    -- meta-content's title: Movie Data
 
    INSERT INTO "paragraph_property" ( "paragraphId", "locale", "name", "value" )
         VALUES ( "vLastId", 'en', 'title', 'Movie Data' );
 
    -- meta-content's title: Film adatlap
 
    INSERT INTO "paragraph_property" ( "paragraphId", "locale", "name", "value" )
         VALUES ( "vLastId", 'hu', 'title', 'Film adatlap' );
 
    INSERT INTO "paragraph" ( "type", "rootId", "left", "right", "name" )
         VALUES ( 'title', "vLastId", 2, 3, NULL );
 
    INSERT INTO "paragraph" ( "type", "rootId", "left", "right", "name" )
         VALUES ( 'contentPlaceholder', "vLastId", 4, 5, NULL );
END $$;