-- Наборы прав доступа
CREATE TABLE IF NOT EXISTS "access_sets" (
    "id" SERIAL NOT NULL PRIMARY KEY,
    "name" VARCHAR(255) NOT NULL,
    "roles" TEXT,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    "deleted_at" TIMESTAMP
);

-- Коды аутентификации
CREATE TABLE IF NOT EXISTS "auth_codes" (
    "id" BIGSERIAL NOT NULL PRIMARY KEY,
    "auth_id" VARCHAR(255) NOT NULL,
    "code" VARCHAR(255) NOT NULL,
    "ip" VARCHAR(255) NOT NULL DEFAULT '',
    "user_id" INT NOT NULL,
    "attempts" SMALLINT NOT NULL DEFAULT 0,
    "created_at" TIMESTAMP,
    UNIQUE ("auth_id")
);

-- Дата последнего запроса кода аутентификации
CREATE TABLE IF NOT EXISTS "auth_codes_lasts" (
    "id" BIGSERIAL NOT NULL PRIMARY KEY,
    "user_id" INT NOT NULL,
    "created_at" TIMESTAMP NOT NULL
);

-- Лог действий пользователей
CREATE TABLE IF NOT EXISTS "data_change_logs" (
    "id" BIGSERIAL NOT NULL PRIMARY KEY,
    "user_id" INT NOT NULL,
    "table_name" VARCHAR(255) NOT NULL,
    "action_name" VARCHAR(255) NOT NULL,
    "record_id" INT,
    "data" TEXT,
    "created_at" TIMESTAMP
);

-- Пример раздела
CREATE TABLE IF NOT EXISTS "example" (
    "id" BIGSERIAL NOT NULL PRIMARY KEY,
    "name" VARCHAR(255),
    "files" TEXT,
    "created_at" TIMESTAMP
    "updated_at" TIMESTAMP,
    "deleted_at" TIMESTAMP
);

INSERT INTO "example" ("id", "name", "created_at") VALUES
(1, 'Пример раздела №1', '2018-10-28 00:00:00');

INSERT INTO "example" ("id", "name", "created_at") VALUES
(2, 'Пример раздела №2', '2018-10-28 00:00:00');

-- Файлы
CREATE TABLE IF NOT EXISTS "files" (
    "id" SERIAL NOT NULL PRIMARY KEY,
    "path" VARCHAR(255) NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "ext" VARCHAR(255) NOT NULL,
    "container_type" VARCHAR(255) NOT NULL,
    "container_id" VARCHAR(255),
    "created_at" TIMESTAMP,
    "deleted_at" TIMESTAMP
);

-- Токены скачивания файлов
CREATE TABLE IF NOT EXISTS "files_downloads" (
    "id" SERIAL NOT NULL PRIMARY KEY,
    "type" VARCHAR(255) NOT NULL,
    "path" VARCHAR(255) NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "token" VARCHAR(255) NOT NULL,
    "created_at" TIMESTAMP,
    UNIQUE ("token")
);

-- Пример справочника
CREATE TABLE IF NOT EXISTS "guide_example" (
    "id" BIGSERIAL NOT NULL PRIMARY KEY,
    "name" VARCHAR(255),
    "created_at" TIMESTAMP
    "updated_at" TIMESTAMP,
    "deleted_at" TIMESTAMP
);

INSERT INTO "guide_example" ("id", "name", "created_at") VALUES
(1, 'Пример справочника №1', '2018-10-28 00:00:00');

INSERT INTO "guide_example" ("id", "name", "created_at") VALUES
(2, 'Пример справочника №2', '2018-10-28 00:00:00');

-- История регистраций
CREATE TABLE IF NOT EXISTS "history_registrations" (
    "id" BIGSERIAL NOT NULL PRIMARY KEY,
    "device_uuid" VARCHAR(255),
    "device_platform" VARCHAR(255),
    "device_version" VARCHAR(255),
    "device_manufacturer" VARCHAR(255),
    "device_model" VARCHAR(255),
    "created_at" TIMESTAMP
);

-- Информация о пользователях (добавляйте любые дополнительные поля)
CREATE TABLE IF NOT EXISTS "info_users" (
    "id" SERIAL NOT NULL PRIMARY KEY,
    "user_id" INT NOT NULL,
    "roles" JSONB,
    "email" VARCHAR(255),
    "first_name" VARCHAR(255),
    "second_name" VARCHAR(255),
    "last_name" VARCHAR(255),
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    "deleted_at" TIMESTAMP,
    UNIQUE ("user_id")
);

INSERT INTO "info_users" ("id", "user_id", "roles", "email", "first_name", "second_name", "last_name", "created_at") VALUES
(1, 1, '{"admin": true}', 'lemurro@lemurro', 'для', 'cli-скриптов', 'Пользователь', '2020-11-16 00:00:00');

-- Сессии пользователей
CREATE TABLE IF NOT EXISTS "sessions" (
    "id" BIGSERIAL NOT NULL PRIMARY KEY,
    "session" VARCHAR(255) NOT NULL,
    "ip" VARCHAR(255),
    "user_id" INT NOT NULL,
    "device_info" JSONB,
    "geoip" JSONB,
    "admin_entered" SMALLINT NOT NULL DEFAULT 0,
    "created_at" TIMESTAMP,
    "checked_at" TIMESTAMP,
    UNIQUE ("session")
);

-- Пользователи
CREATE TABLE IF NOT EXISTS "users" (
    "id" SERIAL NOT NULL PRIMARY KEY,
    "auth_id" VARCHAR(255) NOT NULL,
    "locked" SMALLINT NOT NULL DEFAULT 0,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    "deleted_at" TIMESTAMP,
    UNIQUE ("auth_id")
);

INSERT INTO "users" ("id", "auth_id", "created_at") VALUES
(1, 'lemurro@lemurro', '2020-11-16 00:00:00');

-- Функция JSON_EXTRACT для совместимости с MySQL
CREATE OR REPLACE FUNCTION JSON_EXTRACT(roles jsonb, item varchar(255)) RETURNS jsonb AS $$
  SELECT roles -> item
$$ LANGUAGE SQL SECURITY DEFINER;

-- Функция JSON_SEARCH для совместимости с MySQL
CREATE OR REPLACE FUNCTION JSON_SEARCH(roles jsonb, search_type varchar(10), VARIADIC items varchar(255)[]) RETURNS bool AS $$
  DECLARE res bool := false;

  BEGIN
    IF search_type = 'all' THEN
      res := roles ?& items;
    ELSE
      res := roles ?| items;
    END IF;

    IF res THEN
      RETURN res;
    ELSE
      RETURN NULL;
    END IF;
  END;
$$ LANGUAGE plpgsql SECURITY DEFINER;