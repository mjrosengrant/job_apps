PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE "balances" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT,
    "account_id" INTEGER,
    "account_name" TEXT,
    "date" date,
    "balance" INTEGER,
    "type" TEXT
);
INSERT INTO "balances" VALUES(1,10001001,'Classic Checking','2015-11-17',250,'asset');
INSERT INTO "balances" VALUES(2,10001001,'Classic Checking','2015-11-28',245,'asset');
INSERT INTO "balances" VALUES(3,10001001,'Classic Checking','2015-12-02',5245,'asset');
INSERT INTO "balances" VALUES(4,10001001,'Classic Checking','2015-12-07',4997,'asset');
INSERT INTO "balances" VALUES(5,10001001,'Classic Checking','2015-12-08',4123,'asset');
INSERT INTO "balances" VALUES(6,10001001,'Classic Checking','2015-12-18',2101,'asset');
INSERT INTO "balances" VALUES(7,10001001,'Classic Checking','2015-12-22',320,'asset');
INSERT INTO "balances" VALUES(8,10001001,'Classic Checking','2015-12-31',54,'asset');
INSERT INTO "balances" VALUES(9,10001002,'Signature Savings','2015-11-15',109,'asset');
INSERT INTO "balances" VALUES(10,10001002,'Signature Savings','2015-12-01',2609,'asset');
INSERT INTO "balances" VALUES(11,10001002,'Signature Savings','2015-12-19',732,'asset');
INSERT INTO "balances" VALUES(12,21112001,'Gold Card','2015-11-05',468,'liability');
INSERT INTO "balances" VALUES(13,21112001,'Gold Card','2015-11-30',699,'liability');
INSERT INTO "balances" VALUES(14,21112001,'Gold Card','2015-12-03',1371,'liability');
INSERT INTO "balances" VALUES(15,21112001,'Gold Card','2015-12-07',1630,'liability');
INSERT INTO "balances" VALUES(16,21112001,'Gold Card','2015-12-17',1992,'liability');
INSERT INTO "balances" VALUES(17,21112001,'Gold Card','2016-02-28',2307,'liability');
INSERT INTO "balances" VALUES(18,21112001,'Gold Card','2015-12-30',2598,'liability');
INSERT INTO "balances" VALUES(19,32223001,'30-Year Fixed Mortgage','2015-12-01',190269,'liability');
DELETE FROM sqlite_sequence;
INSERT INTO "sqlite_sequence" VALUES('balances',19);
COMMIT;
