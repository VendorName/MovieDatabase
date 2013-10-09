-- remove data

DELETE FROM "module"
      WHERE "module" = 'VendorName\MovieDatabase';

DELETE FROM paragraph WHERE "rootId" = (SELECT id FROM paragraph WHERE type = 'metaContent' AND name = 'vendorNameMovieDatabase.movieList');
DELETE FROM paragraph WHERE "rootId" = (SELECT id FROM paragraph WHERE type = 'metaContent' AND name = 'vendorNameMovieDatabase.movieData');
