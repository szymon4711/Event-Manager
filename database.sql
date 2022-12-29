/*
 Navicat Premium Data Transfer

 Source Server         : dockerdb
 Source Server Type    : PostgreSQL
 Source Server Version : 150001 (150001)
 Source Host           : localhost:5432
 Source Catalog        : dbname
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 150001 (150001)
 File Encoding         : 65001

 Date: 29/12/2022 16:04:40
*/


-- ----------------------------
-- Sequence structure for archive_events_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."archive_events_id_seq";
CREATE SEQUENCE "public"."archive_events_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for projects_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."projects_id_seq";
CREATE SEQUENCE "public"."projects_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for table_name_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."table_name_id_seq";
CREATE SEQUENCE "public"."table_name_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for user_details_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."user_details_id_seq";
CREATE SEQUENCE "public"."user_details_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for users_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_id_seq";
CREATE SEQUENCE "public"."users_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Table structure for archive_events
-- ----------------------------
DROP TABLE IF EXISTS "public"."archive_events";
CREATE TABLE "public"."archive_events" (
  "id" int4 NOT NULL DEFAULT nextval('archive_events_id_seq'::regclass),
  "title" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "description" text COLLATE "pg_catalog"."default",
  "like" int4 DEFAULT 0,
  "dislike" int4 DEFAULT 0,
  "uncertain" int4 DEFAULT 0,
  "id_assigned_by" int4 NOT NULL,
  "date" date,
  "image" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of archive_events
-- ----------------------------

-- ----------------------------
-- Table structure for events
-- ----------------------------
DROP TABLE IF EXISTS "public"."events";
CREATE TABLE "public"."events" (
  "id" int4 NOT NULL DEFAULT nextval('projects_id_seq'::regclass),
  "title" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "description" text COLLATE "pg_catalog"."default",
  "like" int4 DEFAULT 0,
  "dislike" int4 DEFAULT 0,
  "uncertain" int4 DEFAULT 0,
  "id_assigned_by" int4 NOT NULL,
  "date" date,
  "image" varchar(255) COLLATE "pg_catalog"."default" DEFAULT 'public/img/uploads/default.svg'::character varying,
  "location" varchar(100) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of events
-- ----------------------------
INSERT INTO "public"."events" VALUES (18, 'Food and wine festival', 'Experience the best in local and international cuisine and drink at our food and wine festival. Featuring top chefs and winemakers, this event is sure to be a culinary delight.', 1, 0, 0, 1, '2023-01-11', 'cousine.jpg', 'Sopot');
INSERT INTO "public"."events" VALUES (16, 'Hackathon', 'Join us for a two-day hackathon in Cracow, where talented developers and designers will come together to create innovative software solutions. Mentors will be on hand to provide guidance and support throughout the event. Whether you''re a seasoned pro or new to the world of coding, you''ll find a welcoming community and plenty of opportunities to learn and grow. Don''t miss this exciting opportunity to be a part of the next big thing!', 0, 1, 1, 1, '2023-01-03', 'hackathon.jpg', 'Cracow');
INSERT INTO "public"."events" VALUES (15, 'Metallica Concert', 'Metallica in Warsaw. There are two concerts ahead of us at the PGE National Stadium. The M72 tour will feature a bold new set design that brings the famous Metallica Snake Pit to the center of the stage, as well as an "I Disappear" package for the entire tour and, for the first time, the option of discounted tickets for fans under 16.', 3, 0, 0, 1, '2023-01-01', 'metallica1.jpg', 'Warsaw');

-- ----------------------------
-- Table structure for friends
-- ----------------------------
DROP TABLE IF EXISTS "public"."friends";
CREATE TABLE "public"."friends" (
  "id_user" int4 NOT NULL,
  "id_friend" int4 NOT NULL
)
;

-- ----------------------------
-- Records of friends
-- ----------------------------
INSERT INTO "public"."friends" VALUES (1, 6);
INSERT INTO "public"."friends" VALUES (1, 3);

-- ----------------------------
-- Table structure for user_details
-- ----------------------------
DROP TABLE IF EXISTS "public"."user_details";
CREATE TABLE "public"."user_details" (
  "id" int4 NOT NULL DEFAULT nextval('user_details_id_seq'::regclass),
  "name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "surname" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "admin" bool NOT NULL DEFAULT false
)
;

-- ----------------------------
-- Records of user_details
-- ----------------------------
INSERT INTO "public"."user_details" VALUES (3, 'Jan', 'Nowak', 'jnow@gmail.com', 'f');
INSERT INTO "public"."user_details" VALUES (5, 'Dariusz', 'Gamrot', 'dg@dsa.com', 'f');
INSERT INTO "public"."user_details" VALUES (1, 'Szymon', 'Jura', 'sjura@gmail.com', 't');
INSERT INTO "public"."user_details" VALUES (2, 'Eryk', 'Walaszek', 'ewalaszek@gm.com', 'f');
INSERT INTO "public"."user_details" VALUES (4, 'Tadeusz', 'Kot', 'ema@da.pl', 'f');
INSERT INTO "public"."user_details" VALUES (6, 'Maciej', 'Foks', 'maciej@gmail.com', 'f');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id" int4 NOT NULL DEFAULT nextval('table_name_id_seq'::regclass),
  "username" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "id_user_details" int4 NOT NULL,
  "uuid" uuid NOT NULL DEFAULT uuid_generate_v4()
)
;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO "public"."users" VALUES (1, 'sjura', '$2y$10$p1pptzfpyl9Af.5ls5S7tOLCn.qFtdVN5sl6TEk5yYwdkV3xdUSKO', 1, '18262a3f-e1b5-441e-a1e3-ed512f0ede08');
INSERT INTO "public"."users" VALUES (3, 'jnowak', '$2y$10$p1pptzfpyl9Af.5ls5S7tOLCn.qFtdVN5sl6TEk5yYwdkV3xdUSKO', 3, '4b9963c3-e52c-43f4-8fc0-3268915571c1');
INSERT INTO "public"."users" VALUES (5, 'dgamrot', '$2y$10$f2hknBFX.MmCZmwd2NnnTuExYTD9qLOUPRjBAWc5v5oDYC8TLR2z.', 5, '6142554d-124e-4d25-802f-b1f4e7008c51');
INSERT INTO "public"."users" VALUES (2, 'ewalasz', '$2y$10$HPCWyM9v.ywWsAwPTXC5jueosEMQbDGxZhXlaLz0XMA4Q3JB1BNl6', 2, '43bad51b-1db8-4ed8-940a-a777541312a8');
INSERT INTO "public"."users" VALUES (4, 'tadek', '$2y$10$p1pptzfpyl9Af.5ls5S7tOLCn.qFtdVN5sl6TEk5yYwdkV3xdUSKO', 4, '358dec0a-2719-43a5-b778-ef56a352669f');
INSERT INTO "public"."users" VALUES (6, 'maciejas', '$2y$10$YV4q9EPyAA9lZyWwO49gVuoRf5VrByLomuAftp4gEyNT35XkiPOFm', 6, '9d9cca77-534c-4ad6-accf-b28c57d78574');

-- ----------------------------
-- Table structure for users_events
-- ----------------------------
DROP TABLE IF EXISTS "public"."users_events";
CREATE TABLE "public"."users_events" (
  "id_user" int4 NOT NULL,
  "id_event" int4 NOT NULL,
  "flag" bool NOT NULL DEFAULT false
)
;

-- ----------------------------
-- Records of users_events
-- ----------------------------
INSERT INTO "public"."users_events" VALUES (1, 15, 't');
INSERT INTO "public"."users_events" VALUES (6, 15, 't');
INSERT INTO "public"."users_events" VALUES (1, 16, 'f');
INSERT INTO "public"."users_events" VALUES (3, 15, 't');
INSERT INTO "public"."users_events" VALUES (3, 18, 't');
INSERT INTO "public"."users_events" VALUES (3, 16, 'f');
INSERT INTO "public"."users_events" VALUES (1, 15, 't');
INSERT INTO "public"."users_events" VALUES (1, 15, 't');
INSERT INTO "public"."users_events" VALUES (1, 15, 't');

-- ----------------------------
-- Function structure for archive_deleted_events_rows
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."archive_deleted_events_rows"();
CREATE OR REPLACE FUNCTION "public"."archive_deleted_events_rows"()
  RETURNS "pg_catalog"."trigger" AS $BODY$
BEGIN
    INSERT INTO archive_events (title, description, "like", dislike, uncertain, id_assigned_by, date, image)
    VALUES (OLD.title, OLD.description, OLD."like", OLD.dislike, OLD.uncertain, OLD.id_assigned_by, OLD.date, OLD.image);
    RETURN OLD;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Function structure for get_friends
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."get_friends"("id" int4);
CREATE OR REPLACE FUNCTION "public"."get_friends"("id" int4)
  RETURNS TABLE("result" int4) AS $BODY$
BEGIN
    RETURN QUERY SELECT
        CASE
            WHEN id_user = id THEN id_friend
            WHEN id_friend = id THEN id_user
        END AS result
    FROM friends
    WHERE id_user = id OR id_friend = id;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100
  ROWS 1000;

-- ----------------------------
-- Function structure for uuid_generate_v1
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_generate_v1"();
CREATE OR REPLACE FUNCTION "public"."uuid_generate_v1"()
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_generate_v1'
  LANGUAGE c VOLATILE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_generate_v1mc
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_generate_v1mc"();
CREATE OR REPLACE FUNCTION "public"."uuid_generate_v1mc"()
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_generate_v1mc'
  LANGUAGE c VOLATILE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_generate_v3
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_generate_v3"("namespace" uuid, "name" text);
CREATE OR REPLACE FUNCTION "public"."uuid_generate_v3"("namespace" uuid, "name" text)
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_generate_v3'
  LANGUAGE c IMMUTABLE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_generate_v4
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_generate_v4"();
CREATE OR REPLACE FUNCTION "public"."uuid_generate_v4"()
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_generate_v4'
  LANGUAGE c VOLATILE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_generate_v5
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_generate_v5"("namespace" uuid, "name" text);
CREATE OR REPLACE FUNCTION "public"."uuid_generate_v5"("namespace" uuid, "name" text)
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_generate_v5'
  LANGUAGE c IMMUTABLE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_nil
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_nil"();
CREATE OR REPLACE FUNCTION "public"."uuid_nil"()
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_nil'
  LANGUAGE c IMMUTABLE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_ns_dns
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_ns_dns"();
CREATE OR REPLACE FUNCTION "public"."uuid_ns_dns"()
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_ns_dns'
  LANGUAGE c IMMUTABLE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_ns_oid
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_ns_oid"();
CREATE OR REPLACE FUNCTION "public"."uuid_ns_oid"()
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_ns_oid'
  LANGUAGE c IMMUTABLE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_ns_url
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_ns_url"();
CREATE OR REPLACE FUNCTION "public"."uuid_ns_url"()
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_ns_url'
  LANGUAGE c IMMUTABLE STRICT
  COST 1;

-- ----------------------------
-- Function structure for uuid_ns_x500
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."uuid_ns_x500"();
CREATE OR REPLACE FUNCTION "public"."uuid_ns_x500"()
  RETURNS "pg_catalog"."uuid" AS '$libdir/uuid-ossp', 'uuid_ns_x500'
  LANGUAGE c IMMUTABLE STRICT
  COST 1;

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."archive_events_id_seq"
OWNED BY "public"."archive_events"."id";
SELECT setval('"public"."archive_events_id_seq"', 14, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."projects_id_seq"
OWNED BY "public"."events"."id";
SELECT setval('"public"."projects_id_seq"', 18, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."table_name_id_seq"
OWNED BY "public"."users"."id";
SELECT setval('"public"."table_name_id_seq"', 6, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."user_details_id_seq"
OWNED BY "public"."user_details"."id";
SELECT setval('"public"."user_details_id_seq"', 6, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."users_id_seq"', 1, false);

-- ----------------------------
-- Primary Key structure for table archive_events
-- ----------------------------
ALTER TABLE "public"."archive_events" ADD CONSTRAINT "archive_events_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Triggers structure for table events
-- ----------------------------
CREATE TRIGGER "archive_deleted_events_rows" AFTER DELETE ON "public"."events"
FOR EACH ROW
EXECUTE PROCEDURE "public"."archive_deleted_events_rows"();

-- ----------------------------
-- Primary Key structure for table events
-- ----------------------------
ALTER TABLE "public"."events" ADD CONSTRAINT "events_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table friends
-- ----------------------------
ALTER TABLE "public"."friends" ADD CONSTRAINT "friends_pkey" PRIMARY KEY ("id_user", "id_friend");

-- ----------------------------
-- Primary Key structure for table user_details
-- ----------------------------
ALTER TABLE "public"."user_details" ADD CONSTRAINT "user_details_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "table_name_username_key" UNIQUE ("username");
ALTER TABLE "public"."users" ADD CONSTRAINT "users_id_user_details_key" UNIQUE ("id_user_details");
ALTER TABLE "public"."users" ADD CONSTRAINT "users_uuid_key" UNIQUE ("uuid");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "table_name_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table events
-- ----------------------------
ALTER TABLE "public"."events" ADD CONSTRAINT "events_users_id_fk" FOREIGN KEY ("id_assigned_by") REFERENCES "public"."users" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table friends
-- ----------------------------
ALTER TABLE "public"."friends" ADD CONSTRAINT "friends_users_id_fk" FOREIGN KEY ("id_user") REFERENCES "public"."users" ("id") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."friends" ADD CONSTRAINT "friends_users_id_fk_2" FOREIGN KEY ("id_friend") REFERENCES "public"."users" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_user_details_id_fk" FOREIGN KEY ("id_user_details") REFERENCES "public"."user_details" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table users_events
-- ----------------------------
ALTER TABLE "public"."users_events" ADD CONSTRAINT "users_events___fkPROJECTS" FOREIGN KEY ("id_event") REFERENCES "public"."events" ("id") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."users_events" ADD CONSTRAINT "users_events___fkUSER" FOREIGN KEY ("id_user") REFERENCES "public"."users" ("id") ON DELETE NO ACTION ON UPDATE CASCADE;
