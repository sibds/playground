PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE "nstable" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT,
    "tree" INTEGER,
    "lft" INTEGER NOT NULL,
    "rgt" INTEGER NOT NULL,
    "depth" INTEGER NOT NULL,
    "name" TEXT NOT NULL
);
INSERT INTO "nstable" VALUES(22,22,1,6,0,'test');
INSERT INTO "nstable" VALUES(23,22,2,3,1,'test2');
INSERT INTO "nstable" VALUES(24,22,4,5,1,'test3');
INSERT INTO "nstable" VALUES(25,25,1,2,0,'sample');
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
INSERT INTO "nscategory" VALUES(12,10,13,1,'test3',NULL,NULL);
INSERT INTO "nscategory" VALUES(13,5,8,2,'test2',NULL,NULL);
INSERT INTO "nscategory" VALUES(15,6,7,3,'sample',NULL,NULL);
CREATE TABLE pages (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT,
    "name" TEXT NOT NULL,
    "url" TEXT NOT NULL,
    "content" TEXT NOT NULL,
    "created_at" INTEGER NOT NULL,
    "created_by" INTEGER,
    "updated_at" INTEGER NOT NULL,
    "updated_by" INTEGER,
    "removed" INTEGER DEFAULT (0),
    "status" INTEGER DEFAULT (0),
    "locked" INTEGER DEFAULT (0)
, layout CHAR(50) NULL);
INSERT INTO "pages" VALUES(1,'test','test','<p>test1</p>
',1454396624,NULL,1457607386,NULL,0,0,0,'');
INSERT INTO "pages" VALUES(2,'Тестовая страница','testovaja-stranitsa','<p>Тестирование</p>
',1455197501,NULL,1455368185,NULL,0,0,0,NULL);
INSERT INTO "pages" VALUES(3,'Контроль таблицы (тест)','kontrol-tablitsy-test','<p>Работает</p>
',1455301640,NULL,1455616208,NULL,0,0,0,'');
INSERT INTO "pages" VALUES(4,'Третья страница','tretja-stranitsa','<p>Страница третья. Все работает!</p>
',1455371843,NULL,1455459383,NULL,0,0,1,NULL);
INSERT INTO "pages" VALUES(6,'Тестовая страница 2','testovaja-stranitsa-2','<p>Тестирование</p>
',1455448156,NULL,1455459385,NULL,0,0,1,'');
INSERT INTO "pages" VALUES(7,'Тестовая страница 3','testovaja-stranitsa-3','<p>Тестирование</p>
',1455450552,NULL,1455617550,NULL,0,0,0,'');
INSERT INTO "pages" VALUES(8,'Моя страница','moja-stranitsa','<p>Тест</p>
',1455617674,NULL,1455617674,NULL,0,0,0,'');
INSERT INTO "pages" VALUES(9,'Моя страница','moja-stranitsa','<p>Тест</p>
',1455617695,NULL,1455618253,NULL,1,0,0,'');
CREATE TABLE "news_category" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT,
    "tree" INTEGER,
    "lft" INTEGER NOT NULL,
    "rgt" INTEGER NOT NULL,
    "depth" INTEGER NOT NULL,
    "name" TEXT NOT NULL,
    "url" TEXT NOT NULL,
    "image" TEXT,
    "description" TEXT,
    "created_at" INTEGER NOT NULL,
    "created_by" INTEGER,
    "updated_at" INTEGER NOT NULL,
    "updated_by" INTEGER,
    "layout" CHAR(50) NULL
);
INSERT INTO "news_category" VALUES(1,1,1,2,0,'Основные','osnovnye','','',1455469635,NULL,1455469635,NULL,'');
INSERT INTO "news_category" VALUES(2,2,1,2,0,'Вторая','vtoraja','','',1457632305,NULL,1457632606,NULL,'');
CREATE TABLE news (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT,
    "name" TEXT NOT NULL,
    "category_id" INTEGER,
    "url" TEXT NOT NULL,
    "image" TEXT NOT NULL,
    "date_public" CHAR(10),
    "annotation" TEXT NOT NULL,
    "content" TEXT NOT NULL,
    "created_at" INTEGER NOT NULL,
    "created_by" INTEGER,
    "updated_at" INTEGER NOT NULL,
    "updated_by" INTEGER,
    "removed" INTEGER DEFAULT (0),
    "locked" INTEGER DEFAULT (0), 
    "layout" CHAR(50) NULL);
INSERT INTO "news" VALUES(1,'Первая новость',1,'pervaja-novost','','12.02.2016','<p>Тестирование</p>
','<p>Тестирование</p>
',1455473709,NULL,1457174331,NULL,0,0,'');
INSERT INTO "news" VALUES(2,'Вторая новость',1,'vtoraja-novost','','','<p>Тестирование</p>
','<p>Тестирование</p>
',1457174372,NULL,1457612580,NULL,0,1,'');
INSERT INTO "news" VALUES(3,'Удаленная новость',1,'udalennaja-novost','','','<p>Это новость будет удалена!</p>
','<p>Это новость будет удалена!</p>
',1457291306,NULL,1457291314,NULL,1,0,'');
CREATE TABLE news2 (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT,
    "name" TEXT NOT NULL,
    "category_id" INTEGER,
    "url" TEXT NOT NULL,
    "image" TEXT NOT NULL,
    "date_public" CHAR(10),
    "annotation" TEXT NOT NULL,
    "content" TEXT NOT NULL,
    "created_at" INTEGER NOT NULL,
    "created_by" INTEGER,
    "updated_at" INTEGER NOT NULL,
    "updated_by" INTEGER,
    "removed" INTEGER(1) DEFAULT (0),
    "locked" INTEGER(1) DEFAULT (0), 
    "layout" CHAR(50) NULL);
DELETE FROM sqlite_sequence;
INSERT INTO "sqlite_sequence" VALUES('nstable',25);
INSERT INTO "sqlite_sequence" VALUES('nscategory',15);
INSERT INTO "sqlite_sequence" VALUES('pages',9);
INSERT INTO "sqlite_sequence" VALUES('news_category',2);
INSERT INTO "sqlite_sequence" VALUES('news',3);
COMMIT;
