CREATE TABLE "nscategory" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT,    
    "lft" INTEGER NOT NULL,
    "rgt" INTEGER NOT NULL,
    "depth" INTEGER NOT NULL,
    "name" TEXT NOT NULL,
     "locked" INTEGER, 
     "removed" INTEGER
);
INSERT INTO "nscategory" VALUES(9,1,14,0,'Основная',NULL,NULL);
INSERT INTO "nscategory" VALUES(10,4,9,1,'test',NULL,NULL);
INSERT INTO "nscategory" VALUES(12,5,8,2,'test3',NULL,NULL);
INSERT INTO "nscategory" VALUES(13,10,13,1,'test2',NULL,NULL);
INSERT INTO "nscategory" VALUES(15,11,12,2,'sample',NULL,NULL);